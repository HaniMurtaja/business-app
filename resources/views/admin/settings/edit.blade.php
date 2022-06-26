@extends('layout.adminLayout')

@section('title')
    {{ __('cp.setting') }}
@endsection

@section('css')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&callback=initMap"> </script>
    <style>
        legend {
            color: #e50d0d;
            margin: 15px 0;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">



                                <legend class="font-blue">{{__('cp.title_setting')}}</legend>

                            @foreach($locales as $locale)
                                
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="title_{{$locale->lang}}">
                                            {{__('cp.appName_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="title_{{$locale->lang}}" name="title_{{$locale->lang}}" value="{{old('title_'.$locale->lang,@$item->translate($locale->lang)->title)}}">
                                        </div>
                                    </div>
                            @endforeach


        


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="address_{{$locale->lang}}">
                                            {{__('cp.address_'.$locale->lang)}} <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            {{-- <textarea rows="4" class="form-control" name="address_{{$locale->lang}}" placeholder="{{__('cp.address_'.$locale->lang)}}" id="address_{{$locale->lang}}" required="" aria-required="true">{{ old('cp.address_'.$locale->lang,@$item->translate($locale->lang)->address) }}</textarea> --}}
                                            <input type="text" class="form-control" id="address_{{$locale->lang}}" 
                                            name="address_{{$locale->lang}}" 
                                            value="{{old('address_'.$locale->lang,@$item->translate($locale->lang)->address)}}">

                                        </div>
                                    </div>
                                @endforeach


                            @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="description_{{$locale->lang}}">
                                            {{__('cp.description_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="description_{{$locale->lang}}" name="description_{{$locale->lang}}" value="{{old('description_'.$locale->lang,@$item->translate($locale->lang)->description)}}">
                                        </div>
                                    </div>
                            @endforeach




                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="url">
                                        {{__('cp.url')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" id="url" name="url" 
                                        value="{{old('url',$item->url)}}">
                                    </div>
                                </div>


                          

                                 <div class="form-group">
                                    <label class="col-sm-3 control-label" for="app_store_url">
                                        {{__('cp.app_store_url')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" id="app_store_url" name="app_store_url" value="{{old('app_store_url',$item->app_store_url)}}">
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="play_store_url">
                                        {{__('cp.play_store_url')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" id="play_store_url" name="play_store_url" value="{{old('play_store_url',$item->play_store_url)}}">
                                    </div>
                                </div>
                                

 

                                <legend>{{__('cp.contact_info')}}</legend>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="info_email">
                                        {{__('cp.info_email')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="info_email" name="info_email" value="{{old('info_email',$item->info_email)}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="mobile">
                                        {{__('cp.mobile')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile" value="{{old('mobile',$item->mobile)}}" id="mobile">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="whatsapp">
                                        {{__('cp.whatsapp')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="whatsapp" value="{{old('whatsapp', $item->whatsapp)}}" id="whatsapp">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="phone">
                                        {{__('cp.phone')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" value="{{old('phone',$item->phone)}}" id="phone">
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="facebook">
                                        {{__('cp.facebook')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="facebook" value="{{old('facebook',$item->facebook)}}" id="facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="twitter">
                                        {{__('cp.twitter')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="twitter" value="{{old('twitter',$item->twitter)}}" id="twitter">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instagram">
                                        {{__('cp.instagram')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="instagram" value="{{old('instagram',$item->instagram)}}" id="instagram">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="linked_in">
                                        {{__('cp.linked_in')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="linked_in" value="{{old('linked_in',$item->linked_in)}}" id="linked_in">
                                    </div>
                                </div>



               

                                <legend>{{__('cp.app_settings')}}</legend>

                                <legend>{{__('cp.logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_logo').click()" style="cursor:pointer">
                                            <img src="{{url($item->logo)}}" style="max-width: 200px;" id="editlogo">
                                        </div>
                                        <br>
                                        <div class="btn btn-info" onclick="document.getElementById('edit_logo').click()">
                                            <i class="fa fa-pencil"></i> {{__('cp.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="logo" id="edit_logo" style="display:none">
                                    </div>
                                </div>
                                
                                <fieldset>
                                    <legend>{{""}}</legend>
                                    <input id="searchInput" class="input-controls" type="text"
                                           placeholder="{{__('cp.search')}}">
                                    <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                    <div class="form_area">
                                        <input type="hidden" value="{{$setting->address}}" name="address" id="location">
                                        <input type="hidden" value="{{$setting->latitude}}" name="latitude" id="lat">
                                        <input type="hidden" value="{{$setting->longitude}}" name="longitude" id="lng">
                                    </div>
                                </fieldset>
                            
                            

                                <legend>{{__('cp.control_panel_image')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                            <img src="{{url($item->image)}}" id="editImage">
                                        </div>
                                        <Br>
                                        <div class="btn btn-info" onclick="document.getElementById('edit_image').click()">
                                            <i class="fa fa-pencil"></i> {{__('cp.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                    </div>
                                </div>

                            
<Br><Br>
                                <!--<fieldset>-->
                                <!--    <legend>{{""}}</legend>-->
                                <!--    <input id="searchInput" class="input-controls" type="text"-->
                                <!--           placeholder="{{__('cp.search')}}">-->
                                <!--    <div class="map" id="map" style="width: 100%; height: 300px;"></div>-->
                                <!--    <div class="form_area">-->
                                <!--        <input type="hidden" value="{{$setting->address}}" name="address" id="location">-->
                                <!--        <input type="hidden" value="{{$setting->latitude}}" name="latitude" id="lat">-->
                                <!--        <input type="hidden" value="{{$setting->longitude}}" name="longitude" id="lng">-->
                                <!--    </div>-->

                                <!--</fieldset>-->




                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/home')}}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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
@endsection
@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });


        $('#edit_logo').on('change', function (e) {
            readURL(this, $('#editlogo'));
        });

        function format(){
            var e = document.getElementById("type");
            var type = e.options[e.selectedIndex].value;
            //alert(type);

            if(type == 2){

                $('#park').removeClass('hidden');
                $('#edu').prop('required',true);
            }

            if(type == 1){
                $('#park').addClass('hidden');
                $('#edu').prop('required',false);
            }

        }



        /* script */
        function initialize() {
            var latlng = new google.maps.LatLng('{{$setting->latitude}}', '{{$setting->longitude}}');
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 10
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: true,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            var geocoder = new google.maps.Geocoder();
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);

            });
            // this function will work on marker move event into map
            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        }

        function bindDataToForm(address, lat, lng) {
            document.getElementById('location').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
//                                                console.log('location = ' + address);
//                                                console.log('lat = ' + lat);
//                                                console.log('lng = ' + lng);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
