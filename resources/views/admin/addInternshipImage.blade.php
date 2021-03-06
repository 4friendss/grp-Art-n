@extends('layouts.adminLayout')
@section('content')
    <style>
        .star {
            color: #ff0000;
            float: right;
            padding-right: 4px;
            padding-left: 4px;
        }

        input, label {
            font-size: 15px;
        }

        .margin-1 {
            margin-top: 1%;
        }
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal form-label-left" id="sliderForm" enctype="multipart/form-data" style="direction: rtl !important;">
                {{ csrf_field() }}
                <div class="container">
                    <div id="addPic">
                        <div class="col-md-12 margin-1">
                            <div class="col-md-1 col-sm-1 col-xs-1 ">
                                <a id="addInput" class="glyphicon glyphicon-plus btn btn-success"
                                   data-toggle=""
                                   title="افزودن فیلد"></a>
                            </div>
                            {{--<div class="col-md-1 col-sm-1 col-xs-1">--}}
                                {{--<a id="removeInput" class="glyphicon glyphicon-minus btn btn-danger" data-toggle="" title="کاستن فیلد"></a>--}}
                            {{--</div>--}}
                            <div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-1 ">
                                <input class="form-control col-md-12 col-xs-12 required"
                                       type="file" name="file[]" id="pic"/>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-9 ">
                                <input class="form-control col-md-12 col-xs-12 required"
                                       name="title[]" id="title"/>
                            </div>
                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر
                                :
                                <span class="star"></span>
                            </label>
                        </div>
                    </div>
                    <br/>
                    <div class="col-md-12 ">
                        <button type="button" class="btn btn-dark col-md-6 col-md-offset-3" style="margin-top: 3%; margin-bottom: 3%;" id="reg"> ثبت تصویر یا تصاویر کارآموزی</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0
                $('#addInput').on('click', function () {
                    if (counter < 20) {
                        $('#addPic').append
                        (
                        '<div class="col-md-12 margin-1">' +
                            '<div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-2">' +
                            '<input class="form-control col-md-12 col-xs-12 required" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<div class="col-md-4 col-sm-6 col-xs-9">'+
                            '<input class="form-control col-md-12 col-xs-12 required" name="title[]" id="title"/>'+
                            '</div>'+
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر:'+
                            '<span class="star"></span>'+
                            '</label>'+
                        '</div>'
                    );
                        counter++;
                    }
                    else
                        {
                            swal
                            ({
                                title: '',
                                text: 'در هر بار بیش از 20 تصویر را نمیتوانید ثبت نمائید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }
                });
            });
        </script>

        <script>
            $(document).on('click','#reg',function () {
                var data = new FormData($('#sliderForm')[0]);
                    $.ajax
                    ({
                        cache       : false,
                        url         : "{{url('admin/addInternshipImagePost')}}",
                        type        : "post",
                        dataType    : "JSON",
                        contentType : false,
                        processData : false,
                        data        : data,
                        beforeSend  : function()
                        {
                            var counter = 0;
                            $(".required").each(function() {
                                    if ($(this).val() == "") {
                                        $(this).css("border-color" , "red");
                                        counter++;
                                    }
                                });
                                if(counter > 0)
                                {
                                    swal
                                    ({
                                        title: '',
                                        text: 'لطفا تمامی فیلدها را پر نمایید سپس دکمه ثبت تصاویر را بزنید',
                                        type:'warning',
                                        confirmButtonText: "بستن"
                                    });
                                    return false;
                                }
                        },
                        success    : function(response)
                        {
                                if(response.code == 'success')
                                {
                                    swal
                                    ({
                                        title: '',
                                        text: response.message,
                                        type:'success',
                                        confirmButtonText: "بستن"
                                    });
                                    setTimeout(function(){window.location.reload(true);},3000);
                                }else
                                    {
                                        swal
                                        ({
                                            title: '',
                                            text: response.message,
                                            type:'warning',
                                            confirmButtonText: "بستن"
                                        });
                                    }
                        },
                        error      : function(error)
                        {
                          console.log(error);
                            swal
                            ({
                                title: '',
                                text: 'خطایی رخ داده است لطفا با بخش پشتیبانی تماس بگیرید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }
                    });
            })
        </script>
@endsection