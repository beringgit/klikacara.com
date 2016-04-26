<nav class="main_nav navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="navbar-header">
                    @include('partials._nav-header')
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <input type="text" class="form-control" placeholder="Search for...">
                    <div class="input-group-btn">
                        <button class="btn btn-custom" type="button">Go!</button>
                    </div>
                </div><!-- /input-group -->
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <ul class="nav navbar-nav navbar-right hidden-md hidden-sm">
                    <li><a class="nav_login" href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="nav_login">Register</a></li>
                    <li><a href="{{ url('/logout') }}" class="nav_login">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>