@extends('layout.adminLayout')


@section('title')
    {{ ucwords(__('cp.payments_methods')) }}
@endsection

@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase" style="color: #e02222 !important;">
                            {{ __('cp.add') }}
                        </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.payments_methods.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_category">
                    {{ csrf_field() }}
                        <div class="form-body">
                       
                      

                            <fieldset>
                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="name_{{$locale->lang}}">
                                            {{ __('cp.name') }} {{ $locale->name }}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name_{{$locale->lang}}"
                                                placeholder="{{__('cp.name')}} {{$locale->name}}" id="name_{{$locale->lang}}"
                                                value="{{ old('name_'.$locale->lang) }}" required>
                                        </div>
                                    </div>
                                @endforeach
                            </fieldset>

                  
                <Br>
                <div class="img">
                    <legend>{{__('cp.logo')}}</legend>
                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="fileinput-new thumbnail"
                                 onclick="document.getElementById('edit_image').click()" style="cursor:pointer;">
                                <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage" style="max-width:600px;">
                            </div>
                            <div class="btn red" onclick="document.getElementById('edit_image').click()">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                        </div>
                    </div>
                </div>

                
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                        <a href="{{ route('admin.payments_methods.index') }}" class="btn btn-warning">
                                            {{__('cp.cancel')}}
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
