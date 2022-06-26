@extends('layout.adminLayout')
@section('title') {{__('cp.productoffers')}}
@endsection
@section('css')
@endsection

@section('content')

    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="btn-group">
                            <a href="{{url(getLocal().'/admin/products/'.$product->id .'/addOffer')}}" style="margin-right: 5px"
                               class="btn sbold green">{{__('cp.add')}}
                                <i class="fa fa-plus"></i>
                            </a>

                            <!--<button class="btn sbold blue btn--filter">{{__('cp.filter')}}-->
                            <!--    <i class="fa fa-search"></i>-->
                            <!--</button>-->

                        </div>
                    </div>

                </div>
                <div class="box-filter-collapse">
                    <form class="form-horizontal" method="get" action="{{url(getLocal().'/admin/productoffers')}}">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('cp.category')}}</label>

                                    <div class="col-md-9">
                                        <select id="multiple2" class="form-control select"
                                                name="categoryId">
                                            <option value="">{{__('cp.select')}}</option>
                                            @foreach(App\Models\Category::get() as $category)
                                                <option value="{{$category->id}}" {{(Request::get('categoryId') == $category->id) ? 'selected' : ''}}>
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('cp.status')}}</label>
                                    <div class="col-md-9">
                                        <select id="multiple2" class="form-control"
                                                name="statusUser">
                                            <option value="">{{__('cp.all')}}</option>
                                            <option value="active">
                                                {{__('cp.active')}}
                                            </option>
                                            <option value="not_active">
                                                {{__('cp.not_active')}}
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('cp.availability')}}</label>
                                    <div class="col-md-9">
                                        <select id="available" class="form-control"
                                                name="available">
                                            <option value="">{{__('cp.all')}}</option>
                                            <option value="1">{{__('cp.available')}}</option>
                                            <option value="2">{{__('cp.not_available')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn sbold blue">{{__('cp.search')}}
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{url('admin/products')}}" type="submit"
                                           class="btn sbold btn-default ">{{__('cp.reset')}}
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th> {{ucwords(__('cp.image'))}}</th>
                    <th> {{ucwords(__('cp.name_product'))}}</th>
                    <th> {{ucwords(__('cp.category'))}}</th>

                    <th> {{ucwords(__('cp.discount%'))}}</th>
                    <th> {{ucwords(__('cp.from_date'))}}</th>
                    <th> {{ucwords(__('cp.to_date'))}}</th>
                    <th> {{ucwords(__('cp.status'))}}</th>
                    {{-- <th> {{ucwords(__('cp.created'))}}</th> --}}
                    {{-- <th> {{ucwords(__('cp.action'))}}</th> --}}
                </tr>
                </thead>
                <tbody>
                @forelse(@$productoffers as $product)
                    <div class="odd gradeX" id="tr-{{$product->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$product->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>

                        <td><img src="{{$product->product->image}}" width="50px" height="50px"></td>
                        <td>{{$product->product->name}}</td>
                        <td>{{$product->product->category->name}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->offer_from}}</td>
                        <td>{{$product->offer_to}}</td>
                        {{-- <td class="center">{{$product->created_at}}</td> --}}

                        @if(@$product->offer_to < now()->toDateString())
                        <td> <span class="label label-danger">{{__('cp.expired')}}</span></td>
                       @else
                        <td><span class="label label-primary">{{__('cp.active')}}</span></td>
                       @endif

                      
                        {{-- <td>
                            <div class="btn-group btn-action">
                                <div class="btn-group btn-action">
                                    <a href="{{url(getLocal().'/admin/products/'.$product->id.'/edit')}}"
                                       class="btn btn-xs blue tooltips" data-container="body" data-placement="top"
                                       data-original-title="{{__('cp.edit')}}"><i class="fa fa-edit"></i></a>

                                    <!--<a href="#myModal{{$product->id}}" role="button"  data-toggle="modal" class="btn btn-xs red tooltips" data-placement="top"
                                       data-original-title="{{__('cp.delete')}}">
                                        &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" ></i>
                                    </a>--></div></div>

                                    <div id="myModal{{$product->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">{{__('cp.delete')}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{__('cp.confirm')}} </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                                                    <a href="#" onclick="delete_adv('{{$product->id}}','{{$product->id}}',event)"><button class="btn btn-danger">{{__('cp.delete')}}</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td> --}}
                    </tr>
                @empty
                @endforelse
                
                </tbody>
            </table>
            {{-- $products->appends($_GET)->links() --}}
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

            var url = '{{url(getLocal()."/admin/products")}}/' + id;
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


    </script>
@endsection
