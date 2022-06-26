@extends('layout.adminLayout')

@section('title') 
    <img src="{{ url('uploads/icons/orders.png') }}" style="width: 45px;"> {{ __('cp.orders') }}
@endsection

@section('css')


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&sensor=false&libraries=places"></script>
   
   
<style type="text/css">
     .input-controls {
         margin-top: 10px;
         border: 1px solid transparent;
         border-radius: 2px 0 0 2px;
         box-sizing: border-box;
         -moz-box-sizing: border-box;
         height: 32px;
         outline: none;
         box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
     }

     #searchInput {
         background-color: #fff;
         font-family: Roboto;
         font-size: 15px;
         font-weight: 300;
         margin-left: 12px;
         padding: 0 11px 0 13px;
         text-overflow: ellipsis;
         width: 50%;
     }

     #searchInput:focus {
         border-color: #4d90fe;
     }
 </style>


@endsection
@section('content')

    <div class="row" >
        <div class="col-md-12" >
            <div class="portlet light bordered" >
                <div class="portlet-body form" >

                    <form method="post" action="{{ route('admin.orders.update', $order->id)}}"
                        enctype="multipart/form-data" role="form" id="form_company">
                      {{ csrf_field() }}
                      {{ method_field('PATCH')}}

                    <div class="form-body" >
                        
                        
                        @if($order->has_invoice == 0)
                            <a href="{{ route('admin.orders.IssuanceOfInvoice', $order->id)}}" class="btn btn-danger"> 
                                {{ __('cp.IssuanceOfInvoice') }} 
                            </a> 

                        @else
                            <a href="{{ route('admin.orders.editInvoice', $order->id)}}" class="btn btn-danger"> 
                                <i class="glyphicon glyphicon-edit"></i> {{ __('cp.editInvoice') }} 
                            </a> 

                            <a href="{{ route('admin.orders.printInvoice', $order->id)}}" target="_blank" class="btn btn-info"> 
                                <i class="glyphicon glyphicon-print"></i> {{ __('cp.printInvoice') }} 
                            </a> 


                        @endif


                        <br><br>

                        
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.order_id') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->id }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.created') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->created_at }} </label>
                                </div>
                            </div>
                        </fieldset>
                        

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.type') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ __('cp.' .$order->product_type) }} </label>
                                </div>
                            </div>
                        </fieldset>     
                        
                        
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.city') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->delivery_area->city }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.price') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->price }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset style="margin-bottom:8px;">
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.delivery_cost') }} <span>:</span> </label>
                                <div class="col-md-3">
                                    <input type="text" name="delivery_cost" value="{{ @$order->delivery_cost }}" class="form-control">
                                </div>
                            </div>
                        </fieldset> 



                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.drivers') }} <span>:</span> </label>
                                <div class="col-md-3">
                                    <select class="form-control" aria-required="true" aria-describedby="select-error" aria-invalid="false" id="driver_id" name="driver_id">
                                        
                                        <option value="" selected> </option>

                                        @isset($drivers)
                                        @foreach ($drivers as $one)
                                            <option {{ $order->driver_id == $one->id? 'selected' : ''}}  value="{{ $one->id }}"> {{ $one->name }} </option>
                                        @endforeach
                                        @endisset

                                    </select>
                                </div>
                            </div>
                        </fieldset> 

                        
                        <fieldset style="margin-top: 10px;">
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.status') }} <span>:</span> </label>
                                <div class="col-md-3">
                                    <select class="form-control" aria-required="true" aria-describedby="select-error" aria-invalid="false" id="status" name="status">
                                        <option {{ $order->status == 'in_the_way'? 'selected' : ''}}  value="in_the_way">{{__('cp.in_the_way')}}</option>
                                        <option {{ $order->status == 'canceled'? 'selected' : ''}}  value="canceled">{{__('cp.canceled')}}</option>
                                        <option {{ $order->status == 'done'? 'selected' : ''}}  value="done">{{__('cp.done')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary"> {{ __('cp.save') }} </button>
                                    <a href="{{ route('admin.orders.index')}}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>  
                                </div>   
                            </div>
                        </fieldset>
                        
                        <hr>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" >
                                <label class="col-sm-2"> {{ __('cp.customer_name') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->user->name }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.customer_mobile') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->user->mobile }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                  
                        <hr>

      
                        <fieldset>
                            <div class="form-group" >
                                <label class="col-sm-2"> {{ __('cp.company_name') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->company->name }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.company_mobile') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->company->mobile }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.company_address') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->company->address }} </label>
                                </div>
                            </div>
                        </fieldset>

                        <hr>


                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.image') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> <img src="{{ @$order->image }}" style="max-width:250px;"> </label>
                                </div>
                            </div>
                        </fieldset>
            


                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.product_name') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->product_name }} </label>
                                </div>
                            </div>
                        </fieldset>
            

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2"> {{ __('cp.notes') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->notes }} </label>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
           
                                    

                        <fieldset>
                            <div class="form-group" >
                                <label class="col-sm-2"> {{ __('cp.transport_address') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->transport_address }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <script>

                            function initialize() {
                                var latlng = new google.maps.LatLng('{{@$order->transport_latitude}}', '{{@$order->transport_longitude}}');
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
                        
                            function bindDataToForm(address, transport_latitude, transport_longitude) {
                                document.getElementById('location').value = address;
                                document.getElementById('transport_latitude').value = transport_latitude;
                                document.getElementById('transport_longitude').value = transport_longitude;
                        
                            }
                        
                            google.maps.event.addDomListener(window, 'load', initialize);
                        
                        
                            jQuery(document).ready(function() {
                                FormValidation.init();
                            });
                        
                        
                        </script>
                        


                        <fieldset>
                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            <div class="form_area">
                                <input type="hidden" value="{{@$order->transport_latitude}}" name="transport_latitude" id="transport_latitude">
                                <input type="hidden" value="{{@$order->transport_longitude}}" name="transport_longitude" id="transport_longitude">
                            </div>
                        </fieldset>


                        <hr>
                        
                  

                        <fieldset>
                            <div class="form-group" >
                                <label class="col-sm-2"> {{ __('cp.receiving_address') }} <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold"> {{ @$order->receiving_address }} </label>
                                </div>
                            </div>
                        </fieldset>


                        @include('admin.orders.receiving_address')


                        <hr>
                        


                </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
@section('script')




@endsection
