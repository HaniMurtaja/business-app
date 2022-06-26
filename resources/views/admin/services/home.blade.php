@extends('layout.adminLayout')
@section('title')
    {{__('cp.services')}}
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

                            <a href="{{ route('admin.services.create') }}" style="margin-right: 5px"
                               class="btn btn-primary">
                                {{ __('cp.add') }}
                                <i class="fa fa-plus"></i>
                            </a>

                            {{-- <button class="btn sbold blue btn--filter"> {{__('cp.filter')}}
                                <i class="fa fa-search"></i>
                            </button> --}}

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

                        </div>
                        <br><br>
                    </div>

                </div>

            </div>
          
         

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
          
                    <th>

                    </th>
                    <th> {{ ucwords(__('cp.image')) }} </th>
                    <th> {{ ucwords(__('cp.name')) }} </th>
                    <th> {{ ucwords(__('cp.status')) }} </th>
                    <th> {{ ucwords(__('cp.created')) }} </th>
                    <th> {{ ucwords(__('cp.action')) }} </th>
                </tr>
                </thead>
                
                
                <tbody>
                @forelse(@$one->services as $product)
                    <tr class="odd gradeX" id="tr-{{$product->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$product->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>

                        <td><img src="{{$product->image}}" width="50px" height="50px"></td>
                        <td> {{ @$product->title }} </td>

                        <td><span style="font-size: 12px;padding: 8px;"
                                  class="btn  {{ ($product->status == "active")? "btn-light-success" : "btn-light-danger"}} "
                                  id="label-{{$product->id}}">
                                {{ __('cp.'.$product->status) }}
                            </span>
                        </td>
                        
                        

                        <td> {{ substr($product->created_at, 0, 10) }} </td>
                        <td class="p-0">
                            <div class="btn-group btn-action">
                                <a href="{{ route('admin.services.show', $product->id) }}" class="btn btn-xs tooltips"
                                   data-container="body" data-placement="top" data-original-title="{{__('cp.show')}}">
                                    <i class="fa fa-eye text-success fs-2"></i>
                                </a>

                                <a href="{{ route('admin.services.edit', $product->id) }}" class="btn btn-xs tooltips"
                                   data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                                    <i class="fa fa-edit text-primary fs-2"></i>
                                </a>

                                <a data-id="{{$product->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
                                   data-original-title="{{__('cp.delete')}}"
                                   class="btn btn-delete tooltips"> <i class="fa fa-trash text-danger fs-2"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @empty
                    {{__('cp.no')}}
                @endforelse
                
                </tbody>
            </table>

                      
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
                
                
                


        </div>
    </div>
@endsection


@section('js')
@endsection


@section('script')
@endsection
