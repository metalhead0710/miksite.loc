<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('.bordered').on("click", function () {
            $('.mobbutton').toggleClass('fa-bars');
            $('.mobbutton').toggleClass('fa-times');
        });
    });
</script>