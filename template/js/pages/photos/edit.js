$(function() {
  $('.delete-link').on('click', function() {
    var url = $(this).data('deletelink');
    $('.delete_form').attr('action', url);
  });
  $('.forma :checkbox').change(function() {
    if (this.checked) {
      $('.submit-btn').show(50);
    }
  });
  $('.submit-btn').click(function() {
    $('.forma').submit();
  });

  $('.row-edit-btn').on('click', function(e) {
    var row = $(this).closest('tr');
    editRow(row);
    e.preventDefault();
  });

  $('.row-cancel-btn').on('click', function(e) {
    var row = $(this).closest('tr');
    cancelEditRow(row);
  });

  $('.row-save-btn').on('click', function(e) {
    var row = $(this).closest('tr');
    saveRow(row);
  });

  var editRow = function(row) {
    row.find('.edit-actions-group').hide().siblings('.editable-actions-group').show();
    row.find('.editable-cell').each(function(index) {
      $(this).find('span').hide().siblings('input').val($.trim($(this).text())).show();
    });
  };
  var cancelEditRow = function(row) {
    row.find('.editable-actions-group').hide().siblings('.edit-actions-group').show();
    row.find('.editable-cell').each(function(index) {
      $(this).find('input').hide().siblings('span').show();
    });
  };

  var saveRow = function(row) {
    var photoItem = {
      photo: {
        photoId: row.data('id'),
        name: row.find('input.name').val(),
        name_ru: row.find('input.name_ru').val(),
        model: row.find('input.model').val(),
        dimension: row.find('input.dimension').val()
      }
    };
    $.ajax({
      type: 'post',
      url: '/admin/photo/edit-one',
      data: photoItem,
      dataType: 'json',
      success: function(data) {
        row.find('span.name').text(data.name);
        row.find('span.name_ru').text(data.name_ru);
        row.find('span.model').text(data.model);
        row.find('span.dimension').text(data.dimension);
        cancelEditRow(row);
      },
      error: function() {
        alert('Помилка сервера. Спробуйте папіжже');
      }
    });
  };

  var showSaveButton = function() {
    $('.save-order').show();
  };
  var hideSaveButton = function() {
    $('.save-order').hide();
  };
  $('.save-order').on('click', function(e) {
    var data = collectSortState();
    $.ajax({
      type: 'post',
      url: '/admin/photo/sort-out',
      data: {ids: data},
      dataType: 'json',
      success: function() {
        alert("Відсортовано!");
        hideSaveButton();
      },
      error: function() {
        alert('Помилка сервера. Спробуйте папіжже');
      }
    });
    e.preventDefault();
  });

  let collectSortState = function() {
    let vals = [],
        value = {};
    $('#photos tbody tr').each(function() {
      id = $(this).data('id');
      sort = $(this).data('sort');
      value = {
        id: id,
        sort: sort
      };
      vals.push(value);
    });

    return vals;
  };

  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();
      $helper.children().each(function(index) {
        $(this).width($originals.eq(index).width());
      });
      return $helper;
    },
    updateIndex = function(e, ui) {
      $('tr', ui.item.parent()).each(function(i) {
        $(this).attr('data-sort', i + 1);
      });
    };

  $('#photos tbody').sortable({
    handle: '> .handle',
    helper: fixHelperModified,
    stop: function(e, ui) {
      updateIndex(e, ui);
      showSaveButton();
    }
  }).disableSelection();
});