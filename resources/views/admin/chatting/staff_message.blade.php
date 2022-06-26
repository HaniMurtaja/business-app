@extends('layout.adminLayout')

@section('title')
    {{__('cp.staff_chat')}}
@endsection


@section('page-style')
    <style>
        #myButton{
            width: 60px !important;
            font-size: 6px !important;
            height:33px !important
        }
    </style>
@endsection


@section('content')


    <h4>
        {{ __('cp.chatWith'). ": ". $chat->emp->name}}
    </h4>


    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                               
                            </div>
                            <div class="col-md-8 col-md-offset-2" style="background: #f1f1f1;padding: 30px 0;">
                                @if($all_chat_this_user)
                                
                            
                                    @foreach($all_chat_this_user as $chatter)

                                            
                                        @if($chatter and $chatter->sender_id == $chat->user1)
                                        
                                            <div class="col-md-12 text-left" style="margin-bottom: 20px;">
                                                <div style="margin-bottom: 10px;">
                                                    <img src="{{ $chatter->chat->manager->image }}" class="user-image" style="max-height: 30px;">
                                                    <strong> {{ $chatter->chat->manager->name }} </strong>
                                                </div>
                                                
                                                <span style="padding: 3px; margin-bottom: 5px;">{{$chatter->created_at->diffForHumans()}}</span><br><br>
                                                
                                                <span style="background-color: #b2b9bb;padding: 5px; margin-top: 5px; color: #fff;border-radius: 5px !important;" title="{{$chatter->created_at}}">
                                                    
                                                    @if($chatter->message)
                                                        {{$chatter->message}}
                                                    @endif


                                                    @if($chatter->image)
                                                       <img src=" {{$chatter->image}}" style="width:80%;">
                                                    @endif

                                                    </span>
                                            </div>

 
                                        @elseif($chatter->sender_id == $chat->user2)
                                            <div class="col-md-12 text-right" style="margin-bottom: 20px;">
                                                <div style="margin-bottom: 10px;">
                                                    <img src="{{ $chat->user->image_profile }}" class="user-image" style="max-height: 35;">
                                                    <strong> {{ @$chat->emp->name}} </strong>
                                                </div>
                                                
                                                <span style="padding: 3px; margin-bottom: 5px;">{{$chatter->created_at->diffForHumans()}}</span><br><br>

                                                
                                                <span style="background-color: #0084ff;padding: 5px;color: #fff;border-radius: 5px !important;"
                                                      title="{{$chatter->created_at}}">
        {{$chatter->message}}
      </span>
                                            </div>
                                        @endif

                                    @endforeach

                                @endif


                                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/staff_chat_new_message')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    
                                    
                                    <input type="hidden" name="user_id" value="{{$chat->user2}}">
                                    <input type="hidden" name="chat_id" value="{{$chat_id}}">

                                    
                                    <div class="box-body">

                                        <div class="col-sm-9">
                                            <input type="text" id="pw" name="response" value="" class="form-control" required="" placeholder="{{__('cp.write_msg')}}">
                                        </div>


                                    </div>
                                    <div class="col-sm-3 box-footer">
                                        <style>
                                            #myButton{
                                                width: 60px !important;
                                                font-size: 9px !important;
                                                height:33px !important;
                                                text-align: center !important;
                                                padding:0px;0px;0px;0px;
                                            }
                                        </style>
                                        <div class="col-md-6">
                                                <button type="submit" id="myButton" class="btn btn-primary pull-right">{{__('cp.send')}}</button></div>
                                        <div class="col-md-6">
                                            <button onclick="window.location.reload(1);" type="button" id="myButton" class="btn btn-warning pull-right">{{__('cp.reset')}}</button></div>




                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{admin_assets('/global/plugins/jquery.min.js')}}" type="text/javascript"></script>


@section('js-plugins')

    <script src="https://cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
@endsection
@section('page-script')
    <script type="text/javascript">
        //     $("#pw").keyup(function(event) {
        //     if (event.keyCode === 13) {
        //         $("#myButton").click();
        //     }
        // });
    </script>
@endsection
