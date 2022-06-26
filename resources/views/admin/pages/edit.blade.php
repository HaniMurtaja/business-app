@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.pages'))}} / {{ $item->title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.pages.update', $item->id) }}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}


                        <div class="form-body">



                             @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                                            {{__('cp.title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->title}}" id="order"
                                                    {{ old('title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                            @endforeach

                          
                


                            @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('cp.description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                                <textarea rows="5" class="ckeditor form-control" name="description_{{$locale->lang}}" id="order"
                                                          placeholder=" {{__('cp.description_'.$locale->lang)}}" {{ old('description_'.$locale->lang) }}>{{$item->translate($locale->lang)->description}}</textarea>

                                        </div>
                                    </div>
                            @endforeach


                                <legend>{{__('cp.image')}}</legend>
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <div class="col-md-8 col-md-offset-3">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="@if($item->image){{$item->image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif" id="editImage">
                                        </div>
                                        
                                        {{--<div class="btn btn-primary"--}}
                                             {{--onclick="document.getElementById('edit_image').click()">--}}
                                            {{--<i class="fa fa-pencil"></i>--}}
                                        {{--</div>--}}
                                        <input type="file" class="form-control" name="image"
                                               id="edit_image"
                                               style="display:none">
                                    </div>
                                </div>


<br>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                        <a href="{{ route('admin.pages.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });

    </script>
@endsection
