@extends('layout.adminLayout')

@section('title') 
    {{ __('cp.orders') }}
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
                
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.order_id') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->id }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.created') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->created_at }} </label>
                                </div>
                            </div>
                        </fieldset>
                        

                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.type') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ __('cp.' . $order->type) }} </label>
                                </div>
                            </div>
                        </fieldset>     
                        

                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.employee') }}</b> <span>:</span> </label>
                                <div class="col-md-3">
                                    <select class="form-control" aria-required="true" aria-describedby="select-error" aria-invalid="false" id="employee_id" name="employee_id">
                                        <option value="" selected></option>
                                        @isset($employees)
                                        @foreach ($employees as $one)
                                            <option {{ $order->employee_id == $one->id? 'selected' : ''}}  value="{{ $one->id }}"> {{ $one->name }} </option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </fieldset>                         
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.customer_name') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->user->name }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.customer_mobile') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->user->mobile }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.service') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->service->title }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.price') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->price }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.quantity') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->quantity }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.sub_total') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ $order->quantity * $order->price }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.discount%') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->coupon_percent }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.final_price') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->final_price }} </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        
                        
                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.payment_method') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->payment_method->name }} </label>
                                </div>
                            </div>
                        </fieldset>
                        


                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.title') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->title }} </label>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset>
                            <div class="form-group" style="margin-bottom: 10px; border-bottom: 1px dotted #666;">
                                <label class="col-sm-2"> <b>{{ __('cp.details') }}</b> <span>:</span> </label>
                                <div class="col-md-6">
                                    <label class="col-sm-12 bold" style="margin-bottom: 5px; margin-top: 5px; font-size:14px;"> {{ @$order->details }} </label>
                                </div>
                            </div>
                        </fieldset>


                        
                        <fieldset style="margin-top: 10px;">
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="col-sm-2"> <b>{{ __('cp.status') }}</b> <span>:</span> </label>
                                <div class="col-md-3">
                                    <select class="form-control" aria-required="true" aria-describedby="select-error" aria-invalid="false" id="status" name="status">
                                        <option {{ $order->status == 'in_progress'? 'selected' : ''}}  value="in_progress">{{__('cp.in_progress')}}</option>
                                        <option {{ $order->status == 'delivered'? 'selected' : ''}}  value="delivered">{{__('cp.delivered')}}</option>
                                        <option {{ $order->status == 'completed'? 'selected' : ''}}  value="completed">{{__('cp.completed')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary"> {{ __('cp.save') }} </button>
                                    <a href="{{ route('admin.orders.index')}}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>  
                                </div>   
                            </div>
                        </fieldset>
                        
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
