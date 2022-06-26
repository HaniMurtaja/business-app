@extends('layout.adminLayout')


@section('title')
    {{ __('cp.payments_methods') }}
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

                            <a href="{{ route('admin.payments_methods.create') }}" style="margin-right: 5px"
                               class="btn btn-primary"> {{ __('cp.add') }}
                               <i class="fa fa-plus"></i>
                            </a>
                            <button class="btn btn-success event" id="active"  style="margin-right: 5px" data-action="active"
                                    href="#activation" role="button" data-toggle="modal">
                                {{ __('cp.active') }}
                                <i class="fa fa-check"></i>
                            </button>

                            <button class="btn btn-danger event" id="not_active" style="margin-right: 5px" href="#cancel_activation"
                                    role="button" data-toggle="modal" data-action="not_active">
                                {{ __('cp.not_active') }}
                                <i class="fa fa-minus"></i>
                            </button>

                            <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                                {{__('cp.delete')}}
                                <i class="fa fa-times"></i>
                            </button>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                    <tr>
                        <th> </th>
                        <th> {{ __('cp.logo') }} </th>
                        <th> {{ __('cp.name') }} </th>
                        <th> {{ __('cp.status') }} </th>
                        <th> {{ __('cp.created') }} </th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody>
                @foreach($items as $item)
                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$item->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>
                        <td> <img src="{{ @$item->image }}" style="max-width:80px;"> </td>
                        <td> {{ @$item->name }} </td>
                        <td> 
                            <span class="label label-sm <?php echo ($item->status == "active")? "label-primary" : "label-warning"?>" id="label-{{$item->id}}">
                                {{ __('cp.' . $item->status) }}
                            </span>
                        </td>
                        <td class="center"> {{ $item->created_at->format('d-m-Y') }} </td>
                        <td>
                            <div class="btn-group btn-action">

                                {{-- <a href="{{ route('admin.payments_methods.show', $item->id) }}" class="btn btn-xs tooltips" data-container="body" data-placement="top" data-original-title="{{__('cp.view')}}">
                                    <img src="{{ url('uploads/icons/eye.png') }}">
                                </a> --}}

                                  <a href="{{ route('admin.payments_methods.edit', $item->id) }}" class="btn btn-xs tooltips"
                                   data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                                    <i class="fa fa-edit text-primary fs-2"></i>
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

            {{ $items->links() }}


        </div>
    </div>

@endsection

@section('js')
@endsection

@section('script')
@endsection
