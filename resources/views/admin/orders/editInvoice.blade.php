@extends('layout.adminLayout')
@section('title'){{__('cp.IssuanceOfInvoice')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"
                              style="color: #e02222 !important;">{{__('cp.IssuanceOfInvoice')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.orders.updateInvoice', $order->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">

                        {{ csrf_field() }}
                        <div class="form-body">



                 
                       




                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="date">
                                        {{__('cp.date')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="date" 
                                        value="{{old('date', $order->invoice->date)}}">
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="sender_name">
                                        {{__('cp.sender_name')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sender_name" 
                                        value="{{old('sender_name', $order->invoice->sender_name)}}">
                                    </div>
                                </div>
                            </fieldset>                   
  

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="sender_city">
                                        {{__('cp.sender_city')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sender_city" 
                                        value="{{old('sender_city', $order->invoice->sender_city)}}">
                                    </div>
                                </div>
                            </fieldset> 


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="sender_area">
                                        {{__('cp.sender_area')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sender_area" 
                                        value="{{old('sender_area', $order->invoice->sender_area)}}">
                                    </div>
                                </div>
                            </fieldset> 



                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="sender_address">
                                        {{__('cp.sender_address')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sender_address" 
                                        value="{{old('sender_address', $order->invoice->sender_address)}}">
                                    </div>
                                </div>
                            </fieldset> 


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="sender_mobile">
                                        {{__('cp.sender_mobile')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sender_mobile" 
                                        value="{{old('sender_mobile', $order->invoice->sender_mobile)}}">
                                    </div>
                                </div>
                            </fieldset> 

                            <hr>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_name">
                                        {{__('cp.recipient_name')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_name" 
                                        value="{{old('recipient_name', $order->invoice->recipient_name)}}">
                                    </div>
                                </div>
                            </fieldset> 



                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_city">
                                        {{__('cp.recipient_city')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_city" 
                                        value="{{old('recipient_city', $order->invoice->recipient_city)}}">
                                    </div>
                                </div>
                            </fieldset> 


                            
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_area">
                                        {{__('cp.recipient_area')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_area" 
                                        value="{{old('recipient_area', $order->invoice->recipient_area)}}">
                                    </div>
                                </div>
                            </fieldset> 


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_address">
                                        {{__('cp.recipient_address')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_address" 
                                        value="{{old('recipient_address', $order->invoice->recipient_address)}}">
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_mobile">
                                        {{__('cp.recipient_mobile')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_mobile" 
                                        value="{{old('recipient_mobile', $order->invoice->recipient_mobile)}}">
                                    </div>
                                </div>
                            </fieldset>



                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="recipient_tel">
                                        {{__('cp.recipient_tel')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="recipient_tel" 
                                        value="{{old('recipient_tel', $order->invoice->recipient_tel)}}">
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="notes">
                                        {{__('cp.notes')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="notes" 
                                        value="{{old('notes', $order->invoice->notes)}}">
                                    </div>
                                </div>
                            </fieldset>



                            <fieldset>
                                <div class="form-group" id="gover_option">
                                    <label class="col-sm-2 control-label" >{{__('cp.fragile')}}
                                    </label>
                                    <div class="col-md-2">
                                        <select id="multiple2" class="form-control select" name="fragile">
                                            <option value=""></option>
                                            <option {{ $order->invoice->fragile == "yes"? 'selected' :'' }} value="yes"> {{ __('cp.yes') }} </option>
                                            <option {{ $order->invoice->fragile == "no"? 'selected' :'' }} value="no"> {{ __('cp.no') }} </option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group" id="gover_option">
                                    <label class="col-sm-2 control-label" >{{__('cp.cool_area')}}
                                    </label>
                                    <div class="col-md-2">
                                        <select id="multiple2" class="form-control select" name="cool_area">
                                            <option value=""></option>
                                            <option {{ $order->invoice->cool_area == "yes"? 'selected' :'' }} value="yes"> {{ __('cp.yes') }} </option>
                                            <option {{ $order->invoice->cool_area == "no"? 'selected' :'' }}  value="no"> {{ __('cp.no') }} </option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>




                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="contents">
                                        {{__('cp.contents')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="contents" 
                                        value="{{old('contents', $order->invoice->contents)}}">
                                    </div>
                                </div>
                            </fieldset>

                            <hr>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order_value">
                                        {{__('cp.order_value')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="order_value" 
                                        value="{{old('order_value', $order->invoice->order_value)}}">
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="delviery_charge">
                                        {{__('cp.delviery_charge')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="delviery_charge" 
                                        value="{{old('delviery_charge', $order->invoice->delviery_charge)}}">
                                    </div>
                                </div>
                            </fieldset>



                            
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="extra_charge">
                                        {{__('cp.extra_charge')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="extra_charge" 
                                        value="{{old('extra_charge', $order->invoice->extra_charge)}}">
                                    </div>
                                </div>
                            </fieldset>



                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="over_weight">
                                        {{__('cp.over_weight')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="over_weight" 
                                        value="{{old('over_weight', $order->invoice->over_weight)}}">
                                    </div>
                                </div>
                            </fieldset>



                       
                            <fieldset>
                                <legend>{{__('cp.logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="{{url($order->invoice->logo)}}" id="editImage">
                                        </div>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_image').click()">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <input type="file" class="form-control" name="image"
                                               id="edit_image"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>
                            
                            
                              

             


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
@endsection

@section('script')

    <script>
       $('#all_images').on('change', function (e) {
            readURLMultiple(this, $('.imageupload'));
        });
        
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });

    </script>

@endsection

