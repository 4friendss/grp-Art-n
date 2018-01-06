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

        .margin-2 {
            margin-top: 2%;
        }

        .margin-bot-1 {
            margin-bottom: 1%;
        }

        .overflow-x {
            overflow-x: hidden;
        }

        .myColor {
            width: 13px;
            height: 13px;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: bottom;
            position: relative;
            top: 6px;
            float: right;
            left: 21px;
            *overflow: hidden;
        }

        .myLabel {
            display: block;
            padding-left: 15px;
            text-indent: -15px;
            float: right;
        }

        .float-right {
            float: right;
        }

        .padding-right-2 {
            padding-right: 2%;
        }
    </style>
    <!-- Include SmartWizard CSS -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optional SmartWizard theme -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet"
          type="text/css"/>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal form-label-left" id="productForm" enctype="multipart/form-data"
                  style="direction: rtl !important;">
            {{ csrf_field() }}
            <!-- SmartWizard 1 html -->
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">اطلاعات اصلی پروژه<br/>
                                <small><!-- This is step description --></small>
                            </a></li>
                        <li><a href="#step-4"> تصاویر / ویدئو <br/>
                                <small></small>
                            </a></li>
                    </ul>
                    <div>
                        <div id="step-1" class="">
                            <br>
                            <div class="container">
                                <br>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="projectType" class="form-control col-md-12" name="projectType">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> نوع پروژه :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="title" class="form-control col-md-12 col-xs-12" name="title">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> نام پروژه :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    {{--<div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;"></div>--}}
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <textarea id="description" class="form-control col-md-12 col-xs-12 overflow-x"
                                                  name="description"></textarea>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description"> توضیح
                                        پروژه :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="container">
                                {{--<div class="col-md-10 col-md-offset-1 margin-1">--}}
                                    {{--<div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">--}}
                                        {{--<input id="produce_date" class="form-control col-md-12 col-xs-12"--}}
                                               {{--name="produce_date" type="text">--}}
                                    {{--</div>--}}
                                    {{--<label class="control-label col-md-2 col-sm-4 col-xs-3" for=""> تاریخ--}}
                                        {{--تولید :--}}
                                        {{--<span class="required star" title="پر کردن این فیلد الزامی است"></span>--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div id="step-4" class="">
                            <div class="container">
                                <div id="addPic">
                                    <div class="col-md-12 margin-1">
                                        <div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-2">
                                            <a id="addInput" class="glyphicon glyphicon-plus btn btn-success"
                                               data-toggle=""
                                               title="افزودن تصویر"></a>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-9 ">
                                            <input class="form-control col-md-12 col-xs-12"
                                                   type="file" name="file[]" id="pic"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file"> تصویر پروژه
                                            :
                                            <span class="required star"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10 ">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">
                                        <input class="form-control col-md-12 col-xs-12"
                                               type="file" name="video_src" id="video_src"/>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="video_src"> ویدئوی
                                        پروژه :
                                        <span class="required star"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </form>
        </div>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript"
                src="{{url('public/dashboard/stepWizard/js/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#productForm").submit(function (e) {
                    e.preventDefault();
                });
                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('ثبت پروژه')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        var formData = new FormData($("#productForm")[0])
                        $.ajax({
                            url: '{{url('admin/projectCreatePost')}}',
                            type: 'post',
                            cache: false,
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                console.log(data)
                                var x = '';
                                $.each(data, function (key, val) {
                                    x += val + '\n'
                                });
                                console.log(data.responseText)
                                swal({
                                    title: '',
                                    text: x,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                                if(data.data == 'پروژه شما با مؤفقیت درج شد')
                                {
                                    setTimeout(function () {
                                        window.location.reload(true);
                                    }, 3000);
                                }


                            },
                            error: function (xhr) {
                                var x;
                                $.each(xhr, function (key, val) {
                                    x += val + '\n'
                                });
                                swal({
                                    title: '',
                                    text: xhr,
                                    type: "info",
                                })
                            }//error
                        })//ajax
                    });//onclick
                var btnCancel = $('<button></button>').text('شروع مجدد')
                    .addClass('btn btn-danger')
                    .on('click', function () {
//                        $('#smartwizard').smartWizard("reset");
                        $('#productForm')[0].reset();
                    });
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect: 'fade',
                    showStepURLhash: false,
                    toolbarSettings: {
                        toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish, btnCancel]
                    }
                });
                // External Button Events
                $("#reset-btn").on("click", function () {
                    // Reset wizard
                    $('#smartwizard').smartWizard("reset");
                    return true;
                });
                $("#prev-btn").on("click", function () {
                    // Navigate previous
                    $('#smartwizard').smartWizard("قبلی");
                    return true;
                });
                $("#next-btn").on("click", function () {
                    // Navigate next
                    $('#smartwizard').smartWizard("بعدی");
                    return true;
                });
                $(".sw-btn-next").text('بعدی');
                $(".sw-btn-prev").text('قبلی');
//
            });
        </script>
        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0
                $('#addInput').on('click', function () {
                    if (counter < 3) {
                        $('#addPic').append
                        (
                            '<div class="col-md-12 margin-1">' +
                            '<div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">' +
                            '<input class="form-control col-md-12 col-xs-12" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic"> تصویر پروژه :' +
                            '<span class="required star"></span>' +
                            '</label></div>'
                        );
                        counter++;
                    }
                    else {
                    }
                })
                //load all main category in select box in addProductForm
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    cache: false,
                    url: "{{url('admin/projectType')}}",
                    type: 'get',
                    dataType: "json",
                    success: function (response) {
                            var responses = response;
                            var selectBoxId = "#projectType";
                            var msgOpt1 = "لطفا نوع پروژه مورد نظر خود را انتخاب نمایید";
                            loadItems(responses, selectBoxId, msgOpt1)
                    }
                })
                //load item in select box
                function loadItems(responses, selectBoxId, msgOption1) {
                    var item = $(selectBoxId);
                    item.empty();
                    item.append("<option selected='true' disabled='disabled'>" + msgOption1 + "</option>")
                    $.each(responses, function (key, value) {
                        item.append
                        ("<option value='" + value.id + "'>" + value.title + "</option>");
                    });
                }
            });
        </script>
@endsection