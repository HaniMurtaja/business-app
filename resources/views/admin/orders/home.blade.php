@extends('layout.adminLayout')

@section('title')
    {{ __('cp.orders') }}
    
    @if(auth()->guard('admin')->user()->type != 'admin')
        <br>
        ({{ __('cp.deserved_amount') }}  {{ auth()->guard('admin')->user()->deserved_amount }})
    @endif

    
@endsection

@section('css')
@endsection
@section('content')




    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="table-toolbar">

                <div class="row">

                    <div class="col-sm-9">

                        <div class="btn-group">

                            <!--<a href="{{ route('admin.orders.create') }}" style="margin-right: 5px"-->
                            <!--   class="btn btn-primary">-->
                            <!--    {{ __('cp.add') }}-->
                            <!--    <i class="fa fa-plus"></i>-->
                            </a>

                            <button class="btn btn-warning event"  id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                                {{__('cp.delete')}}
                                <i class="fa fa-times"></i>
                            </button>

                        </div>
                        <br><br>

                    </div>



                </div>

        

            </div>


            <!--<h4><strong>{{ __('cp.TotalOrdersPrice') }} ({{ @$TotalOrdersPrice }})</strong></h4><br>-->






                @isset($items)
                @foreach($items as $one)
                    <div class="border rounded shadow mb-6 overflow-hidden">
                        <div class="d-flex align-items-center" id="faqItem{{ $loop->iteration }}">
                            <h5 class="mb-0 w-100">
                                <button class="d-flex align-items-center text-left p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" 
                                type="button" data-bs-toggle="collapse" data-bs-target="#faqItem{{ $loop->iteration }}" aria-expanded="true" 
                                aria-controls="Curriculumcollapse{{ $loop->iteration }}">
                                    {{ @$one->name }}
                                </button>
                            </h5>
                        </div>

                        <div id="faqItem{{ $loop->iteration }}" class="collapse" aria-labelledby="faqItem{{ $loop->iteration }}" data-parent="#accordionCurriculum">
                            <div class="p-6 border-top">


                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                    <thead>
                        <tr>
                        <th> </th>
                        <th> {{ __('cp.order_id') }} </th>
                        <th> {{ __('cp.type') }} </th>
                        <th> {{ __('cp.customer_name') }} </th>                       
                        <th> {{ __('cp.employee') }} </th>
                        <th> {{ __('cp.status') }} </th>
                        <th> {{ __('cp.created')}} </th>                        
                        <th> {{ __('cp.action') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($one->orders as $item)
                        <tr class="odd gradeX" id="tr-{{$item->id}}">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes chkBox" value="{{$item->id}}" name="chkBox"/>
                                    <span></span>
                                </label>
                            </td>

                            <td> {{ $item->id }} </td>
                            <td> {{ __('cp.' . $item->type) }} </td>
                            <td> {{ @$item->user->name }} </td>
                            <td>
                              {{ @$item->employee->name }}
                            </td>

                            <td class="p-0">
                                
                                <?php 
                                
                                if($item->status == 'in_progress') {
                                    $cls    = 'btn-light-danger';
                                }
                             
                                elseif ($item->status == 'delivered') {
                                    $cls    = 'btn-light-info';
                                }
                                
                                elseif ($item->status == 'completed') {
                                    $cls    = 'btn-light-success';
                                }
                                ?>
                                
                                <span class="btn   {{$cls}}" id="label-{{$item->id}}">
                                {{ __('cp.' . $item->status) }}
                            </span>

                            </td>
                  
                            <td> {{ $item->created_at }} </td>

                            <td class="p-0">
                                <div class="btn-group btn-action">

                                     <a href="{{ route('admin.orders.show', $item->id) }}" class="btn btn-xs tooltips"
                                        data-container="body" data-placement="top" data-original-title="{{__('cp.view')}}">
                                        <i class="fa fa-eye text-success fs-2"></i>
                                    </a>

                                    <a data-id="{{$item->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
                                       data-original-title="{{__('cp.delete')}}"
                                       class="btn btn-delete tooltips"> <i class="fa fa-trash text-danger fs-2"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                
                    @endforeach
                    </tbody>
                </table>


                            </div>
                        </div>
                    </div>
                @endforeach
                @endisset






            </div>
        </div>
        @endsection

        @section('js')
        @endsection
        @section('script')
            <script>
                function delete_adv(id, iss_id, e) {
                    //alert(id);
                    e.preventDefault();

                    var url = '{{url(getLocal()."/admin/orders")}}/' + id;
                    var csrf_token = '{{csrf_token()}}';
                    $.ajax({
                        type: 'delete',
                        headers: {'X-CSRF-TOKEN': csrf_token},
                        url: url,
                        data: {_method: 'delete'},
                        success: function (response) {
                            console.log(response);
                            if (response === 'success') {
                                $('#tr-' + id).hide(500);
                                $('#myModal' + id).modal('toggle');

                            } else {
                                swal('Error', {icon: "error"});
                            }
                        },
                        error: function (e) {

                        }
                    });

                }
                
                function change_ordrSts(id, sts, e) {
                    e.preventDefault();

                    var url = '{{url(getLocal()."/admin/change_orderSts")}}/' + id;
                    var csrf_token = '{{csrf_token()}}';
                    $.ajax({
                        type: 'post',
                        headers: {'X-CSRF-TOKEN': csrf_token},
                        url: url,
                        data: {sts:sts, _token: csrf_token},
                        success: function (response) {
                            if (response === 'success') {
                                
                                $('#label-' + id).removeClass();
                                $("#actionId-" + id).html('');
                        
                                if(sts == 0) {
                                $('#label-' + id).html("{{__('cp.preparing')}}");
                                $('#label-' + id).addClass('label label-sm label-info');
                                $("#actionId-" + id).append('<a href="#" onclick="change_ordrSts('+id+',\'1\',event)" class="btn btn-xs blue tooltips" data-container="body" data-placement="top" data-original-title="{{__('cp.onDelivery')}}"><i class="fa fa-motorcycle"></i></a>');
                                } else if(sts == 1) {
                                $('#label-' + id).html("{{__('cp.onDelivery')}}");
                                $('#label-' + id).addClass('label label-sm label-warning');
                                $("#actionId-" + id).append('<a href="#" onclick="change_ordrSts('+id+',\'2\',event)" class="btn btn-xs blue tooltips" data-container="body" data-placement="top" data-original-title="{{__('cp.complete')}}"><i class="fa fa-lock"></i></a>');
                                }
                                else if(sts == 2) {
                                $('#label-' + id).html("{{__('cp.complete')}}");
                                $('#label-' + id).addClass('label label-sm label-success');
                                }

                            } else {
                                swal('Error', {icon: "error"});
                            }
                        },
                        error: function (e) {

                        }
                    });

                }
                
                function openWindow($url)
        {
            window.open($url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=200,width=800,height=700");
        }
                
                
                
                
                $(document).ready(function () {
                 setTimeout(function() {
                     window.location.reload();
                  }, 60000);
                });


            </script>
@endsection
