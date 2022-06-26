@extends('layout.adminLayout')
@section('title')
    {{__('cp.services')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.services.update',$product->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}



                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                                        {{__('cp.title_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}"
                                               value="{{ old('title_'.$locale->lang, $product->translate($locale->lang)->title) }}" required>
                                    </div>
                                </div>
                            @endforeach

                        


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="details_{{$locale->lang}}">
                                        {{__('cp.details_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                            <textarea rows="6" class="form-control" name="details_{{$locale->lang}}"  id="details_{{$locale->lang}}" required aria-required="true">{{ old('details_'.$locale->lang, $product->translate($locale->lang)->details) }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                

                            <div class="form-group" id="category_id">
                                    <label class="col-sm-2 control-label" >{{__('cp.category')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6 input-field">
                                        <select class="form-control select02" name="category_id" >
                                            <!--<option value=""> {{__('cp.select')}} </option>-->
                                            @foreach($categories as $one)
                                                <option value="{{ $one->id }}" {{ $product->category_id == $one->id ? 'selected' : '' }}>
                                                    {{ $one->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>   
              
              


                                <div class="form-group" id="type">
                                    <label class="col-sm-2 control-label" >{{__('cp.type')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6 input-field">
                                        <select class="form-control select02 serviceType" name="type">
                                            <option {{ $product->type == 'fixed_price' ? 'selected' : '' }} value="fixed_price"> {{ __('cp.fixed_price') }} </option>
                                            <option {{ $product->type == 'unfixed_price' ? 'selected' : '' }} value="unfixed_price"> {{ __('cp.unfixed_price') }} </option>
                                            <option {{ $product->type == 'points' ? 'selected' : '' }} value="points"> {{ __('cp.points') }} </option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group servicePrice">
                                    <label class="col-sm-2 control-label" for="price">
                                        {{__('cp.price')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="price" min="0"  value="{{ $product->price }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>
                                </div>

              
                                <div class="form-group serviceOfferPrice">
                                    <label class="col-sm-2 control-label" for="offer_price">
                                        {{__('cp.offer_price')}}
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="offer_price" min="0"  value="{{ $product->offer_price }}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>    
                                
                                
                                
                                <div class="form-group servicePointsCount">
                                    <label class="col-sm-2 control-label" for="points_count">
                                        {{__('cp.points_count')}}
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="points_count" min="0" value="{{ $product->points_count }}">
                                    </div>
                                </div>    
                                
              
              
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="estimated_time">
                                        {{__('cp.estimated_time')}}
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="estimated_time" value="{{ $product->estimated_time }}">
                                    </div>
                                </div>   
                                
              

                            <legend>{{__('cp.image')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail"
                                         onclick="document.getElementById('edit_image').click()" style="cursor:pointer; max-width:100%;">
                                        <img src="{{url($product->image)}}" id="editImage" style="max-width: 100%;">
                                    </div>
                                    <div class="btn red" onclick="document.getElementById('edit_image').click()">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                </div>
                            </div>

        
                        <div class="form-actions">
                            <div class="row">
                               <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







@endsection
@section('script')
    <script>

        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
        
        
        var thisItemType = "{{ $product->type }}";
        if(thisItemType == 'fixed_price'){
            $('.servicePrice').show(1000);
            $('.serviceOfferPrice').show(1000);
            $('.servicePointsCount').hide(1000);
        }
        if(thisItemType == 'unfixed_price'){
            $('.servicePrice').hide(1000);
            $('.serviceOfferPrice').hide(1000);
            $('.servicePointsCount').hide(1000);
        }
        if(thisItemType == 'points'){
            $('.servicePrice').hide(1000);
            $('.serviceOfferPrice').hide(1000);
            $('.servicePointsCount').show(1000);
        }
     
        
        
        $(document).on('change','.serviceType',function(e){
            var product_type = $(this).val();
    
            if(product_type == 'fixed_price'){
                $('.servicePrice').show(1000);
                $('.serviceOfferPrice').show(1000);
                $('.servicePointsCount').hide(1000);
                return false;
            }
            if(product_type == 'unfixed_price'){
                $('.servicePrice').hide(1000);
                $('.serviceOfferPrice').hide(1000);
                $('.servicePointsCount').hide(1000);
                return false;
            }
            if(product_type == 'points'){
                $('.servicePrice').hide(1000);
                $('.serviceOfferPrice').hide(1000);
                $('.servicePointsCount').show(1000);
                return false;
            }
            else{
                $('.servicePrice').hide(1000);
                $('.serviceOfferPrice').hide(1000);
                $('.servicePointsCount').hide(1000);
                return false;
            }
        });
        
        

    </script>

@endsection