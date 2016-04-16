<nav class="subnav navbar navbar-default">
    <div class="container">
        <div class="collapse navbar-collapse" id="sub-nav">
            <ul class="nav navbar-nav">
                <li class="{{ $status['home'] }}">
                    <a href="{{ action('PageController@home') }}"><i class="fa fa-home"></i> Home                        <span class="sr-only">(current)</span></a></li>
                <li class="{{ $status['service'] }}">
                    <a href="{{ action('PageController@services') }}"> <i class="fa fa-recycle"></i> Service
                       <span class="sr-only">(current)</span></a></li>
                {{--<li class="{{ $status['order'] }}">--}}
                    {{--<a href="{{ action('PageController@order') }}"> <i class="fa fa-shopping-cart"></i> How to order--}}
                        {{--<span class="sr-only">(current)</span></a></li>--}}
                <li class="{{ $status['events'] }}">
                    <a href="{{ action('PageController@events') }}"><i class="fa fa-calendar"></i> Events
                        <span class="sr-only">(current)</span></a></li>
                <li class="{{ $status['contact'] }}">
                    <a href="{{ action('PageController@contact') }}"><i class="fa fa-phone"></i> Contact
                        <span class="sr-only">(current)</span></a></li>
                <li class="{{ $status['about'] }}">
                    <a href="{{ action('PageController@about') }}"> <i class="fa fa-user"></i> About
                        <span class="sr-only">(current)</span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>