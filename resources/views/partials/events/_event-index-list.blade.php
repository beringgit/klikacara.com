<div class="search-controller">
    <form action="">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari events">
            <div class="input-group-btn">
                <button class="btn btn-custom" type="button">Go!</button>
            </div>
        </div>
    </form>
</div>
<hr>
<div class="list-controller">
    <div class="row">
        <div class="list-of-">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="{{ URL::asset('images/events/events-storage-image/event1.jpg') }}" alt=Logo"" class="logo-event" width="200">
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="row event-detail-on-list">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <a href="{{ action('PageController@events_show',1) }}" class="pjax"><h4>Young On Top National Conference 2016</h4></a>
                        {{--<p class="flow-text">Oleh : klikacara.com</p>--}}
                        <p class="flow-text">"It's Millennials Time to Lead This Nation"</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="col l3 m3 s12 padd">
                            <p class="flow-text"><i class="fa fa-calendar">&nbsp;</i>Sabtu, 14 Mei 2016</p>
                            {{--<p class="flow-text"><i class="fa fa-money">&nbsp;</i>100&nbsp;&nbsp;--}}
                            {{--<i class="fa fa-users">&nbsp;</i>200</p>--}}
                            <p class="flow-text"><i class="fa fa-map-marker">&nbsp;</i>Balairung, Universitas Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@include('.partials._pagination')