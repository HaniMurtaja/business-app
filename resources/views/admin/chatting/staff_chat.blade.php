@extends('layout.adminLayout')

@section('title')
    {{__('cp.staff_chat')}} 
@endsection


@section('page-style')
@endsection

@section('content-header')
@endsection


@section('content')

    
    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
           
                <div class="box-body">

                  
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('cp.name')}}</th>
                            <th>{{__('cp.unread_msg')}}</th>
                            <th>{{__('cp.date')}}</th>
                            <th>{{__('cp.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>


                        @isset($usersChat)
                        @foreach($usersChat as $one)
                            <tr id="issue-{{$one->id}}">
                                <td> {{ @$loop->iteration }} - </td>
                                <td> {{ @$one->emp->name }} </td>
                                <td><span class="badge badge-danger">{{ @$one->total_unread }} </span></td>
                                <td>
                                    @if(count($one->messages) > 0)
                                        <span class="badge badge-danger">{{ @$one->messages[0]->created_at->diffForHumans() }} </span>
                                    @endif
                                </td>
             
                                <td>
                                    <a href="{{url(app()->getLocale().'/admin/staff_chat_new_message/'. $one->id . '/response')}}"
                                        class="btn btn-primary" title="{{__('cp.start_chat')}}">
                                        <i class="fa fa-pencil"></i> <strong>{{__('cp.start_chat')}}</strong>
                                    </a>
                                </td>
                                
             
                            </tr>
                        @endforeach
                        @endisset
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')

    <script src="https://cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
@endsection

