@extends('layout.adminLayout')
@section('title'){{__('cp.productoffers')}}
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
                              style="color: #e02222 !important;">{{__('cp.add_offer')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/products/'.$product->id .'/addOffer')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">


                            <fieldset>
                                <legend>{{__('cp.discount')}}</legend>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('cp.discount')}} %
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="discount" value="{{ old('discount',0) }}"
                                               placeholder=" {{__('cp.discount')}}"/>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >
                                        {{__('cp.offer_time')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <label class="col-sm-1 control-label">
                                        {{__('cp.from')}}
                                    </label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="offer_from"
                                               placeholder="  {{__('cp.from')}}" >
                                    </div>

                                    <label class="col-sm-1 control-label">
                                        {{__('cp.to')}}
                                    </label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="offer_to"
                                               placeholder="  {{__('cp.to')}}" >
                                    </div>
                                </div>
                            </fieldset> 


                            {{-- <div class="progress">
                                <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    0%
                                </div>
                            </div>
                            <br />
                            <div id="success" class="row">
        
                            </div> --}}

                            

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">{{__('cp.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/products/'.$product->id.'/offers')}}" class="btn default">{{__('cp.cancel')}}</a>
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
$(document).ready(function(){
    $('form').ajaxForm({
        beforeSend:function(){
            $('#success').empty();
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
        },
        uploadProgress:function(event, position, total, percentComplete){
            $('.progress-bar').text(percentComplete + '0%');
            $('.progress-bar').css('width', percentComplete + '0%');
        },
        success:function(data)
        {
            if(data.success)
            {
                $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                $('#success').append(data.image);
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width', '100%');
            }
        }
    });
});
</script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
    <script>

        $('#edit_image').on('change', function (e) {

            readURL(this, $('#editImage'));

        });



    </script>
@endsection

