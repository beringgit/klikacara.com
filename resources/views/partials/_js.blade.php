<script src="{{ URL::asset('js/jquery-2.2.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/velocity.min.js') }}"></script>
<script src="{{ URL::asset('js/hammer.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.hammer.js') }}"></script>
<script src="{{ URL::asset('js/jquery.pjax.js') }}"></script>
<script src="{{ URL::asset('js/carousel.js') }}"></script>
<script async src="{{ URL::asset('js/app.js') }}"></script>
<script>

    $(document).ready(function(){
        NProgress.configure({ showSpinner: false });
        if ($.support.pjax) {
            $.pjax.defaults.timeout = 31200;
        }
        $(document).pjax('.subnav .navbar-nav li a', '#main_content');
        $(document).pjax('.pjax', '#main_content');
        $(document).pjax('.nav_login', '#login_content');
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });
    });
    $('.slider').slider({
        full_width: true,
        height : 300
    });
    NProgress.done();
</script>

