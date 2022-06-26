@extends('layout.adminLayout')


@section('title')
    <span class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
             viewBox="0 0 24 24" fill="none">
        <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
              fill="black"></path>
        <path opacity="0.3"
              d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
              fill="black"></path>
        <path opacity="0.3"
              d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
              fill="black"></path>
    </svg>
    </span>

    &nbsp;{{ __('cp.orders') }}
@endsection


@section('css')
    <style>
        #transport_map_canvas {
            width: 800px;
            height: 350px;
        }

        #receivin_map_canvas {
            width: 800px;
            height: 350px;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">

                </div>

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data"
                          class="form-horizontal" role="form" id="form_category">
                        {{ csrf_field() }}
                        <div class="form-body">


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="company_id">
                                    {{__('cp.select')}} {{__('cp.company')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select name="company_id" id="company_id" class="form-control">
                                        @foreach($companies as $one)
                                            <option value="{{$one->id}}">{{$one->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_mobile">
                                    {{__('cp.user_mobile')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="user_mobile"
                                           value="{{ old('user_mobile') }}" id="user_mobile"
                                           placeholder="{{__('cp.user_mobile')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="product_name">
                                    {{__('cp.product_name')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="product_name"
                                           value="{{ old('product_name') }}" id="product_name"
                                           placeholder="{{__('cp.product_name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="customer_name">
                                    {{__('cp.customer_name')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="customer_name"
                                           value="{{ old('customer_name') }}" id="customer_name"
                                           placeholder="{{__('cp.customer_name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="transport_address">
                                    {{__('cp.transport_address')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="transport_address"
                                           value="{{ old('transport_address') }}" id="transport_address"
                                           placeholder="{{__('cp.transport_address')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<input type="text" id="searchmap">-->
                                <div id="transport_map_canvas"></div>
                            </div>
                            <input type="hidden" class="form-control input-sm" name="transport_latitude"
                                   value="24.712475836302612" id="transport_latitude">
                            <input type="hidden" class="form-control input-sm" name="transport_longitude"
                                   value="46.74000000000001" id="transport_longitude">

                            <br>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="receiving_address">
                                    {{__('cp.receiving_address')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="receiving_address"
                                           value="{{ old('receiving_address') }}" id="receiving_address"
                                           placeholder="{{__('cp.receiving_address')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <!--<input type="text" id="searchmap">-->
                                <div id="receivin_map_canvas"></div>
                            </div>
                            <input type="hidden" class="form-control input-sm" name="receiving_latitude"
                                   value="24.712475836302612" id="receiving_latitude">
                            <input type="hidden" class="form-control input-sm" name="receiving_longitude"
                                   value="46.74000000000001" id="receiving_longitude">


                            <br>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="price">
                                    {{__('cp.price')}}
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                                           id="price"
                                           placeholder="{{__('cp.price')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="delivery_cost_id">
                                    {{__('cp.select')}} {{__('cp.city')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select name="delivery_cost_id" id="delivery_cost_id" class="form-control">
                                        @foreach($DeliveryCost as $one)
                                            <option value="{{$one->id}}">{{$one->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="product_type">
                                    {{__('cp.select')}} {{__('cp.type')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="ordinary_things"> {{ __('cp.ordinary_things') }} </option>
                                        <option value="eating_cooling"> {{ __('cp.eating_cooling') }} </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="notes">
                                    {{__('cp.notes')}}
                                </label>
                                <div class="col-md-8">
                                    <textarea rows="4" class="form-control" name="notes"
                                              placeholder="{{ __('cp.notes') }}" id="notes"
                                              aria-required="true">{{ old('cp.notes') }}</textarea>
                                </div>
                            </div>


                            <legend>{{__('cp.image')}}</legend>
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-md-8 col-md-offset-3">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                    <div class="fileinput-new thumbnail"
                                         onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                        <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage">
                                    </div>
                                    <div class="btn red" onclick="document.getElementById('edit_image').click()">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image"
                                           style="display:none">
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                                        <a href="{{ route('admin.orders.index') }}" class="btn btn-warning">
                                            {{ __('cp.cancel') }}
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&libraries=places"
            type="text/javascript"></script>

    <script>
        var transport_map = new google.maps.Map(document.getElementById('transport_map_canvas'), {
            center: {
                lat: 24.70,
                lng: 46.74
            },
            zoom: 9
        });
        var marker = new google.maps.Marker({
            position: {
                lat: 24.70,
                lng: 46.74
            },
            map: transport_map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#transport_latitude').val(lat);
            $('#transport_longitude').val(lng);
        });
    </script>


    <script>
        var transport_map = new google.maps.Map(document.getElementById('receivin_map_canvas'), {
            center: {
                lat: 24.70,
                lng: 46.74
            },
            zoom: 9
        });
        var marker = new google.maps.Marker({
            position: {
                lat: 24.70,
                lng: 46.74
            },
            map: transport_map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#receiving_latitude').val(lat);
            $('#receiving_longitude	').val(lng);
        });
    </script>



@endsection


@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });

    </script>
@endsection
