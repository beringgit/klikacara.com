<script src="{{ URL::asset('js/jquery-2.2.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/velocity.min.js') }}"></script>
<script src="{{ URL::asset('js/hammer.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.hammer.js') }}"></script>
<script src="{{ URL::asset('js/jquery.pjax.js') }}"></script>
<script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script src="{{ URL::asset('js/carousel.js') }}"></script>
<script async src="{{ URL::asset('js/app.js') }}"></script>
<script>

    $(document).ready(function(){
        NProgress.configure({ showSpinner: false });
        if ($.support.pjax) {
            $.pjax.defaults.timeout = 31200;
        }

        $('select').select2({
            placeholder : 'Please choose tags'
        });
        $(document).pjax('.subnav .navbar-nav li a', '#main_content');
        $(document).pjax('.pjax', '#main_content');
        $(document).pjax('.nav_login', '#main_content');
        $(document).pjax('.pagination ul li a', '#main_content');
        $(document).pjax('ol.breadcrumbs li a', '#main_content');
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });

        $(document.body).on('submit', '.pjax-form', function(event) {
            event.preventDefault();
            $.pjax.submit(event, '#main_content');
        });
    });
    $('.slider').slider({
        full_width: true,
        height : 400
    });
    NProgress.done();
</script>

