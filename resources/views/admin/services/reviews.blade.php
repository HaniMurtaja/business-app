@extends('layout.adminLayout')
@section('title') {{__('cp.product_review')}}
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                  <div class="row">
                    <div class="col-sm-9">
                        <div class="btn-group">
                     <p> <strong>{{$product->name}} </strong></p>
                    </div>

                </div>
                </div>
                <br>
                <div class="portlet-body form">


                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                                <thead>
                                <tr>
                                  
                                    <th> </th>
                                    
                                    <th> {{ucwords(__('cp.user'))}}</th>
                                    
                                        
                                     <th> {{ucwords(__('cp.rate'))}}</th>               
                                     <th> {{ucwords(__('cp.comment'))}}</th>               
                                    <th> {{ucwords(__('cp.created'))}}</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                                

                                        @foreach ($reviews as $review) 
                                                                       
                                       
                                        <tr class="odd gradeX" id="tr-{{$review->id}}">

                                              <td>{{$loop->iteration}}</td>
                                              
                                
                                               <td>{{$review->user->name}}</td>
                                               <td> {{$review->rate}}</td>
                                               <td> {{$review->comment}}</td>
                                             
                                       
                                               <td class="center">{{$review->created_at}}</td>
                                     

                                            
                                            
                                             @endforeach

                                        
                                     </tr>
    
                                 </tbody>
                             </table>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                     
                                        <a href="{{url(getLocal().'/admin/products')}}" class="btn default">{{__('cp.cancel')}}</a>
                                    </div>
                                </div>
                            </div>
                       
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('script')
@endsection

