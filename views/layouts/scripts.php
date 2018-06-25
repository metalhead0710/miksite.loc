<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/validate.js"></script>
<script>
    $(function(){
        $('.bordered').on("click", function () {
            $('.mobbutton').toggleClass('fa-bars');
            $('.mobbutton').toggleClass('fa-times');
        });
        $('.navbar-nav li a').filter(function() {
            return this.href == window.location;
        }).closest('li').addClass('active');
        $('.handle').on('click', function(e) {
          $('.feedback').toggleClass('open');
          e.preventDefault();
        });
        $('.feedback button').on('click', function(e) {
          $('.feedback form').validate({
            messages: {
              email: {
                email: "<?=Dict::_('NOTVALIDEMAIL')?>"
              },
              phone: "<?=Dict::_('REQUIRED')?>"
            },
            submitHandler: function() {
              sendReq();
            }
          });
        });
      sendReq = function() {
          var msg = $('.feedback form').serialize();
          $.ajax({
            type: 'POST',
            url: '/get-call',
            data: msg,
            success: function(data) {
              $('.flash-message').html(data);
              wait();
              $('.feedback form')[0].reset();
            },
            error:  function(xhr, str){
              console.log('Error: ' + xhr.responseCode);
            }
          });
        },
        wait = function(){
          $('.alert').fadeOut(4000)
        }
    });
</script>