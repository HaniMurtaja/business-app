@extends('layout.adminLayout')

@section('title')  
    {{ucwords(__('translate.trademarks'))}}
@endsection


@section('css')
<style>
	#map-canvas{
		width: 800px;
		height: 350px;
	}
</style>
@endsection


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase" style="color: #e02222 !important;">{{__('translate.trademarks')}}</span>
                    </div>
                </div>

                <div class="portlet-body form">

                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-12" style="text-align: center;"> <img src="{{ @$item->image }}" style="max-width: 250px;"> </div>
                        </div>
                    </fieldset>

                    <fieldset style="padding: 10px; background-color: #f2f2f2;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> {{__('translate.name')}} </label>
                            <div class="col-md-10 bold"> {{ @$item->name }} </div>
                        </div>
                    </fieldset>

                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> {{__('translate.type')}} </label>
                            <div class="col-md-10 bold"> {{ __('translate.' . $item->type) }} </div>
                        </div>
                    </fieldset>

                    <fieldset style="padding: 10px; background-color: #f2f2f2;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> {{__('translate.description')}} </label>
                            <div class="col-md-10 bold"> {{ @$item->description }} </div>
                        </div>
                    </fieldset>

                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> {{__('translate.keywords')}} </label>
                            <div class="col-md-10 bold"> {{ @$item->keywords }} </div>
                        </div>
                    </fieldset>


              
                    {{-- <fieldset style="padding: 10px; background-color: #ccc;">
                        <div class="form-group">
                            <div class="col-md-10 bold"> {{__('translate.statistics')}} </div>
                        </div>
                    </fieldset> 

                    
                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> {{__('translate.use_count')}} </label>
                            <div class="col-md-10 bold"> {{ @$item->use_count }} </div>
                        </div>
                    </fieldset> --}}

                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')

<script src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&libraries=places"
  type="text/javascript"></script> 
<script>
    var latitude=$('#latitude').data("id");
    var longitude=$('#longitude').data("id");
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: latitude,
        	lng: longitude
		},
		zoom:9
	});
	var marker = new google.maps.Marker({
		position: {
			lat: latitude,
        	lng: longitude
		},
		map: map,
		draggable: true
	});
	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
	google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
  			marker.setPosition(place.geometry.location); //set marker position new...
  		}
  		map.fitBounds(bounds);
  		map.setZoom(15);
	});
	google.maps.event.addListener(marker,'position_changed',function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		$('#latitude').val(lat);
		$('#longitude').val(lng);
	});
</script>
@endsection



@section('script')
@endsection
