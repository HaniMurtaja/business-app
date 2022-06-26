<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title> Dkan </title>
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


        <style>
            body {
                direction: rtl;
                font-family: cairo
            }
            p {
                margin: 0;
                padding: 0;
                font-size: 14px
            }
            span {
                margin:0 15px
            }
            li {
                text-align: right;
                font-size: 15px;
            }
            .span1 {
                margin-right: 0
            }
            .container {
                width: 1170px;
                margin: auto;
            }
            .text-center {
                text-align: center !important
            }
            .boxHeader {
                display: flex;
                flex-wrap: wrap;
				padding-top: 50px;
            }
            .logo {
                float: right;
                width: 20%;
                overflow: hidden;
				justify-content: flex-end;
    			display: flex;
            }
            .logo img {
                width: 120px;
            }
            .secBody .container {
                display: flex;
                flex-wrap: wrap;
				padding: 50px 0
            }
            .secHead {
                float: left;
                width: 80%
            }
			.secHead h2 {
				margin: 0;
			}
			.data-pr {
				margin: 70px 0 30px;
			}
			.name-per p {
				color: #000;
				font-size: 17px;
				font-weight: 600;
			}
			.name-per span {
				margin: 0;
				font-size: 11px;
			}
			.flex50 {
				display: flex;
                flex-wrap: wrap;
			}
			.flex50 .data-sent, .flex50 .numb-sent {
				width: 50%
			}
			.flex50 .data-sent {
				font-size: 13px
			}
			.numb-sent p {
				font-weight: bold
			}
			.numb-sent span {
				font-weight: 300
			}
			.numb-sent {
				justify-content: flex-end;
				display: flex;
			}
            .clearfix {
                clear: both
            }
			#customers {
			  border-collapse: collapse;
			  width: 100%;
			}
			#customers td, #customers th {
			  border-bottom: 1px solid #ddd;
			  padding: 8px;
			}
			#customers td p {
				font-size: 14px;
				color: #000;
				font-weight: 500;
				margin-bottom: 0px;
			}
			#customers td span {
				font-size: 10px;
				margin: 0;
				opacity: 0.7
			}
			#customers th {
			  	padding-top: 12px;
			  	padding-bottom: 12px;
				font-size: 13px;
			  	text-align: right;
			  	background-color: transparent;
			  	color: #333;
			}
			.box-det {
				margin-top: 100px;
				border: 1px solid #e1e1e2;
				display: flex;
			}
			.box-det div {
				width: 33.33334%;
				padding: 20px 15px 0;
			}
			.box-det div h1 {
				font-weight: bold;
			}
			.box-det div p {
				margin-bottom: -30px;
				opacity: 0.7
			}
			.final-pri {
				background: #000;
				color: #fff;
				text-align: left
			}
			.noti-pri {
				font-size: 12px;
				opacity: 0.7;
				margin-top: 20px;
				border-top: 1px solid #e1e1e2;
				padding: 10px 0 20px;
			}
			.footer {
				padding: 20px 0;
				overflow: hidden;

			}
			.footer  .container{
				padding-top: 20px;
				border-top: 1px solid #e1e1e2;
			}
			.footer .logo {
				float: right;
				width: auto;
				overflow: hidden;
				justify-content: flex-end;
				display: flex;
			}
			.footer span{
				color: #2c2d2f !important;
				font-size: 13px;
				margin-right: 50px;
			}



        </style>
    </head>

    <body>


        <div class="header">
            <div class="container">
              <div class="boxHeader">
                <div class="secHead">
                    {{$item->replay}}
                </div>
              </div>
            </div>
        </div>




    </body>

</html>
