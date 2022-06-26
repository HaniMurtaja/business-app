<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link href="{{admin_assets('/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet"

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <style>
        body{
            font-family: Cairo;
            color: blue;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }


        table, th, td {
  border: 1px solid rgb(10, 10, 192);
}
    </style>


  </head>


  <body>



    

    <div class="row" style="margin-top: 150px;">

        <table class="table table-striped center" style="width:900px; direction: rtl; border:1px solid #666;">
            <tr class="active">
                <td valign="top" style="width: 35%;"> 
                    <i class="fab fa-instagram"></i> {{ @$setting->instagram }} <br>
                    <i class="fab fa-facebook-square"></i> {{ @$setting->facebook }} <br>
                    <i class="fas fa-envelope"></i> {{ @$setting->info_email }} <br>
                    التاريخ: {{ @$order->invoice->date }}  :Date
                </td>

                <td valign="top" style="text-align: center; width: 35%;"> 
                    <img src="{{ @$order->invoice->logo }}" style="max-width: 100px;">
                 </td>
                
                 <td valign="top" style="width: 30%;">
                    ص.ب: {{ @$setting->mail_box }}<br>
                    {{ @$setting->address }} <br>
                    <i class="fas fa-phone-square"></i> {{ @$setting->mobile }} <br>
                 </td>
            </tr>


            <tr class="active" style="color:white;">
                <td valign="top" style="width: 35%; background-color: rgb(10, 10, 192);"> 
                 المرسل / Sender
                </td>

                <td valign="top" style="text-align: right; width: 35%; background-color: rgb(10, 10, 192);"> 
                    المستلم/ Recipient
                 </td>
                
                 <td valign="top" style="width: 30%; background-color: rgb(10, 10, 192);">
                    المحتويات/ Contents
                 </td>
            </tr>


            <tr class="active" >
                <td valign="top" style="width: 35%;"> 
                    
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> الاسم: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->sender_name }} </div>                    
                        <div class="col-lg-3">:Name </div>
                    </div>
                    
                    <div class="row"  style="margin-bottom: 10px;">
                        <div class="col-lg-3"> الإمارة: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->sender_city }} </div>                    
                        <div class="col-lg-3">:City </div>
                    </div>

                    <div class="row"  style="margin-bottom: 10px;">
                        <div class="col-lg-3"> المنطقة: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->sender_area }} </div>                    
                        <div class="col-lg-3">:Area </div>
                    </div>

                    <div class="row"  style="margin-bottom: 10px;">
                        <div class="col-lg-3"> العنوان: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->sender_address }} </div>                    
                        <div class="col-lg-3">:Address </div>
                    </div>

                    <div class="row"  style="margin-bottom: 10px;">
                        <div class="col-lg-3"> متحرك: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->sender_mobile }} </div>                    
                        <div class="col-lg-3">:Mobile </div>
                    </div>

                   <hr style="border: 1px solid rgb(10, 10, 192);"> 

                   <div class="row"  style="margin-bottom: 10px;">
                    <div class="col-lg-3"> إسم المستلم: </div>
                    <div class="col-lg-5"> {{ @$order->invoice->recipient_name }} </div>                    
                    <div class="col-lg-3">:Recipient Name </div>
                    </div>

                    <div class="row"  style="margin-bottom: 10px;">
                        <div class="col-lg-3"> التوقيع : </div>
                        <div class="col-lg-5">  </div>                    
                        <div class="col-lg-3">:Signature </div>
                    </div>


                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> التاريخ : </div>
                        <div class="col-lg-5">  </div>                    
                        <div class="col-lg-3">:Date </div>
                    </div>

                </td>

                <td valign="top" style="text-align: right; width: 35%;"> 

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> الاسم: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->recipient_name }} </div>                    
                        <div class="col-lg-3">:Name </div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> الإمارة: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->recipient_city }} </div>                    
                        <div class="col-lg-3">:City </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> المنطقة: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->recipient_area }} </div>                    
                        <div class="col-lg-3">:Area </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-lg-3"> العنوان: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->recipient_address }} </div>                    
                        <div class="col-lg-3">:Address </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-3"> متحرك: </div>
                        <div class="col-lg-5"> {{ @$order->invoice->recipient_mobile }} </div>                    
                        <div class="col-lg-3">:Mobile </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-11"> ملاحظات/ Notes 
                            <br> {{ @$order->invoice->notes }}
                        </div>
                    </div>


                    <div class="row" style="margin-top: 10px;">
                        <div class="col-lg-5">
                            
                            @if($order->invoice->fragile == 'yes')
                                    <i class="far fa-check-square"></i>
                                @else
                                    <i class="far fa-square"></i>
                            @endif

                            قابل للكسر
                            <br>
                            Fragile
                        </div>
                        <div class="col-lg-5">

                            @if($order->invoice->cool_area == 'yes')
                                    <i class="far fa-check-square"></i>
                                @else
                                    <i class="far fa-square"></i>
                            @endif
                        
                            يحتاج تبريد
                            <br>
                            Cool Area  
                            
                            
                            
                        </div>                    
                    </div>


                 </td>
                
                 <td valign="top" style="width: 30%;">


                    
                    <table class="table table-striped" style="width:100%; direction: rtl; border:1px solid rgb(10, 10, 192);">
                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                            المحتويات
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->contents }}
                            </td>
                        </tr>

                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                            قيمة الطلبية
                            <br>
                            Order Value
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->order_value }}
                            </td>
                        </tr>

                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                             رسوم التوصيل
                            <br>
                            Delivery Charge
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->delviery_charge }}
                            </td>
                        </tr>

                        
                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                             رسوم إضافية
                            <br>
                            Extra Charge
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->extra_charge }}
                            </td>
                        </tr>


                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                              الوزن الزائد
                            <br>
                            Over Weight
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->over_weight }}
                            </td>
                        </tr>


                        <tr class="active" style="border:1px solid rgb(10, 10, 192);">
                            <td valign="top" style="width: 50%;"> 
                             الإجمالي
                            <br>
                            Subtotal
                            </td>

                            <td valign="top" style="width: 50%;"> 
                                {{ @$order->invoice->order_value + @$order->invoice->delviery_charge +  @$order->invoice->extra_charge  }}
                            </td>
                        </tr>

                    </table>



                 </td>
            </tr>



        </table>

    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

