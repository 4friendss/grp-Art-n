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
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">ویرایش دسته بندی محصول</h2>
                </div>
                <div id="change">
                </div>
                <div class="col-md-12 margin-1 margin-bot-1">
                    <div class="col-md-9 col-sm-6 col-xs-9 margin-1">
                        <select id="categories" class="form-control col-md-12 margin-1"
                                name="categories">
                        </select>
                    </div>
                    <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="title"> دسته ی اصلی :
                        <span class="required star" title=" فیلد دسته بندی الزامی است"></span>
                    </label>
                </div>
                <div class="col-md-12 margin-1" id="subCategoriesDiv"
                     style="display: none;">
                    <div class="col-md-9 col-sm-6 col-xs-9">
                        <select id="subCategories" class="form-control col-md-12 margin-1" name="subCategories">
                        </select>
                    </div>
                    <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="title"> زیردسته های
                        دسته
                        فوق :
                        <span class="required star" title=" فیلد دسته بندی الزامی است"></span>
                    </label>
                </div>
                <div class="col-md-12 margin-1" id="BrandsDiv" style="display: none;">
                    <div class="col-md-9 col-sm-6 col-xs-9">
                        <select id="brands" class="form-control col-md-12 margin-1" name="brands">
                        </select>
                    </div>
                    <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="title"> زیردسته های
                        دسته
                        فوق :
                        <span class="required star" title=" فیلد دسته بندی الزامی است"></span>
                    </label>
                </div>
                <div class="modal-footer margin-1">
                    <button type="button" id="submitCategory" class="btn btn-dark col-md-6 col-md-offset-3"
                            data-dismiss="modal">بستن
                    </button>
                </div>
            </div>

        </div>
    </div>

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
            {{csrf_field()}}
            <!-- SmartWizard 1 html -->
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">اطلاعات اصلی محصول<br/>
                                <small><!-- This is step description --></small>
                            </a></li>
                        <li><a href="#step-2">تصاویر / ویدئوی محصول<br/>
                                <small></small>
                            </a></li>
                    </ul>
                    @if(!empty($products))
                        <input type="hidden" value="{{$products[0]->id}}" name="id"/>
                        <div>
                            <div id="step-1" class="">
                                <br>
                                <div class="container">
                                    <br>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                            <div class="col-md-2">
                                                <a type="button" name="editCategory" id="editCategory"
                                                   content="{{$products[0]->projectType->id}}"
                                                   class="glyphicon glyphicon-edit btn btn-success"
                                                   title="ویرایش "></a>
                                            </div>
                                            <div class="col-md-10">
                                                <input disabled id="lastCategoryName" class="form-control col-md-12"
                                                       value="{{$products[0]->projectType->title}}">
                                                <input type="hidden" disabled id="lastCategory" name="lastCategory"
                                                       value="">
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> آخرین دسته
                                            مربوطه :
                                        </label>
                                    </div>

                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                    <input disabled id="editable"
                                                           class="form-control col-md-10 col-xs-12 editable"
                                                           name="title"
                                                           type="text" value="{{$products[0]->title}}">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> عنوان
                                                محصول :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                <textarea style="text-align: right; direction: ltr;" disabled
                                                          id="editable"
                                                          class="form-control col-md-12 col-xs-12 overflow-x editable"
                                                          name="description" required="required">
                                                @if($products[0]->description != null)
                                                        {{$products[0]->description}}
                                                    @endif
                                                    @if($products[0]->description == null)
                                                        توضیحی وجود ندارد
                                                    @endif
                                            </textarea>
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description">
                                                توضیح
                                                محصول :
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2" class="">
                                <div class="container">
                                    <div id="addPic" class="grandparent">
                                        @php $picCount = count($products[0]->ProjectImage); @endphp
                                        @if($picCount)
                                            @foreach($products[0]->projectImage as $image)
                                                <div class="parent" name="parent">
                                                    <div class="col-md-10 margin-1">
                                                        <div class="col-md-2 col-md-offset-3">
                                                            <a class="glyphicon glyphicon-edit btn btn-success editPic"
                                                               title="ویرایش "></a>
                                                        </div>
                                                        <div class="col-md-5 col-sm-6 col-xs-9 newFile" id="newFile"
                                                             style="display: none;">
                                                            <input class="form-control col-md-7 col-xs-12 editable"
                                                                   id="editable" name="file[]" type="file" disabled>
                                                        </div>
                                                        <div class="col-md-5 col-sm-6 col-xs-9 showPic" id="showPic"
                                                             style="display: block;">
                                                            <img class="image" id="editable" imageId="{{$image->id}}"
                                                                 style="height: 100px; width: 100px; margin-left: 80%;"
                                                                 src="{{url('public/dashboard/upload_files/projects')}}/{{$image->src}}">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                               for="pic">
                                                            <span class="required star"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($picCount<6)
                                            <div id="addPicture" counter="{{$picCount}}">
                                                <div class="col-md-10 margin-1">
                                                    <div class="col-md-2 col-sm-1 col-xs-1 col-md-offset-3">
                                                        <a id="addInput"
                                                           class="glyphicon glyphicon-plus btn btn-success"
                                                           data-toggle=""
                                                           title="افزودن تصویر"></a>
                                                    </div>
                                                    <div class="col-md-5 col-sm-6 col-xs-9 ">
                                                        <input class="form-control col-md-12 col-xs-12"
                                                               type="file" name="file[]" id="pic"/>
                                                    </div>
                                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">
                                                        تصویر محصول :
                                                        <span class="required star"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-10 ">
                                        <hr>
                                    </div>
                                    <div class="grandparent" id="grandparent">
                                        <div class="col-md-10 margin-bot-1 parent">
                                            <div class="col-md-2 col-md-offset-3">

                                                <a type="button" name="editVideo" @if($products[0]->video_src != null)id="editVideo"@endif
                                                   class="glyphicon glyphicon-edit btn btn-success edit"
                                                   content="{{$products[0]->id}}"
                                                   title="ویرایش "></a>
                                                @if($products[0]->video_src != null)
                                                    <a type="button" id="playVideo"
                                                       class="glyphicon glyphicon-play btn btn-success"
                                                       content="{{$products[0]->id}}"
                                                       title="پخش ویدئو "></a>
                                                    <a type="button" id="pauseVideo"
                                                       class="glyphicon glyphicon-pause btn btn-success edit"
                                                       content="{{$products[0]->id}}"
                                                       title="توقف پخش ویدئو " style="display: none;"></a>
                                                @endif
                                            </div>
                                            <div class="col-md-5 col-sm-6 col-xs-9 " id="videoContent">
                                                @if($products[0]->video_src != null)
                                                    <video class="video" style="width: 200px; height: 200px;"
                                                           id="video" name="video_src">
                                                        <source id="playingVideo"
                                                                src="{{url('public/dashboard/upload_files/projects/video')}}/{{$products[0]->video_src}}">
                                                    </video>
                                                    <input
                                                            class="form-control col-md-7 col-xs-12 editable"
                                                            id="newVideo" src="" name="video_src" type="file"
                                                            style="display: none;">
                                                @endif
                                                @if($products[0]->video_src == null)
                                                    <input disabled="disabled"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           id="editable" src="" name="video_src" type="file">
                                                @endif
                                            </div>

                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="video_src">
                                                ویدئوی
                                                محصول :
                                                <span class="required star"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <br/>
            </form>
        </div>
        <!-- 1-Include SmartWizard JavaScript source -->
        <script type="text/javascript"
                src="{{url('public/dashboard/stepWizard/js/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#productForm").submit(function (e) {
                    e.preventDefault();
                });

                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('ویرایش')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        var formData = new FormData($("#productForm")[0]);
                        $.ajax({
                            url: '{{url('admin/updateProject')}}',
                            type: 'post',
                            cashe: false,
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                var x = '';
                                $.each(data, function (key, val) {
                                    x += val + '\n'
                                });
                                swal({
                                    title: '',
                                    text: x,
                                    type: "info",
                                })
                                setTimeout(function () {
                                    location.reload();
                                },3000)
                            },
                            error: function (xhr) {
                                console.log(xhr)
                                swal({
                                    title: '',
                                    text: xhr,
                                    type: "info",
                                })
                            }
                        })
                    });
                var btnCancel = $('<button></button>').text('شروع مجدد')
                    .addClass('btn btn-danger').css("display", "none")
                    .on('click', function () {
                        $('#smartwizard').smartWizard("reset");
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
        <!-- 2-send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0;
                var c = $("#addPicture").attr('counter');
                counter += c;
                $('#addInput').on('click', function () {
                    if (counter < 6) {
                        $('#addPicture').append
                        (
                            '<div class="col-md-10 margin-1">' +
                            '<div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-5">' +
                            '<input class="form-control col-md-12 col-xs-12" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic"> تصویر محصول :' +
                            '<span class="required star"></span>' +
                            '</label></div>'
                        );
                        counter++;
                    }
                    else {
                    }
                })
            });
        </script>
        <!-- 3-below script is to zoom in/out picture  -->
        <script>
            $(document).ready(function () {
                $('.image').hover(
                    function () {
                        $(this).animate({'zoom': 1.4}, 400);
                    },
                    function () {
                        $(this).animate({'zoom': 1}, 400);
                    });
            });
        </script>
        <!-- 4-below script is to make inputs editable -->
        <script>
            function appendItem(divId, inputName, myUrl) {
                $.ajax({
                    url: myUrl,
                    dataType: "json",
                    cache: false,
                    type: "get",
                    success: function (response) {
                        var item = $(divId);
                        item.empty();
                        $.each(response, function (key, value) {
                            item.append(
                                '<div class="col-md-4 col-sm-6 col-xs-3 float-right">' +
                                '<label class="myLabel">' +
                                '<input class="form-control myColor" type="checkbox" name="' + inputName + '[]" value="' + value.id + '"/>'
                                + value.title + '</label></div>')
                        });
                    }
                })
            }

            $(function () {
                $('.edit').each(function () {
                    $(this).click(function () {
                        var DOM = $(this).parentsUntil('#grandparent');
                        var editable = $(DOM).find('#editable');
                        $(editable).prop('disabled', false);
                    })
                })
            })
        </script>
        <!-- 5-below script is to make picture hidden and display7 an another input type file -->
        <script>
            $(function () {
                $('.editPic').each(function () {

                    $(this).click(function () {
                        var DOM = $(this).parentsUntil('.grandparent');
                        var showPic = $(DOM).find('.showPic');
                        var imageId = $(showPic).find("img").attr("imageId");
                        swal({
                                title: '',
                                text: 'قبل از ویرایش تصویر باید تصویر فعلی حذف شود، آیا از حذف تصویر اطمینان دارید؟',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "  #5cb85c",
                                cancelButtonText: "خیر",
                                confirmButtonText: "آری",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //load all subCategory in select box in addProductForm
                                    $.ajax({
                                        url: "{{url('admin/deleteProjectPicture')}}/" + imageId,
                                        type: 'get',
                                        dataType: "json",
                                        success: function (response) {
                                            console.log(response)
                                            if (response == true) {
                                                $(showPic).css('display', 'none');
                                                var newFile = $(DOM).find('.newFile');
                                                $(newFile).find('input').attr('disabled', false);
                                                $(newFile).css('display', 'block');
                                            }
                                        }
                                    });
                                }
                                else {
                                }
                            });
                    })
                })
            })
        </script>
        <!-- 6-below script is to handle category management -->
        <script>
            $(document).on('click', '#editCategory', function () {
                //var categoryId = $(this).attr('content');
                //alert(categoryId);
                $('#myModal').modal('show');
            })
        </script>
        <script>
            //9-load item in select box
            function loadItems(responses, selectBoxId, msgOption1, msgOption2, valueOption2) {
                var item = $(selectBoxId);
                item.empty();
                item.append("<option selected='true' disabled='disabled'>" + msgOption1 + "</option>")
                item.append("<option value='" + valueOption2 + "'>" + msgOption2 + "</option>")
                $.each(responses, function (key, value) {
                    item.append
                    ("<option value='" + value.id + "' depth='" + value.depth + "'>" + value.title + "</option>");
                });
            }
            //10-load all main category in select box in addProductForm
            $.ajax({
                cache: false,
                url: "{{url('admin/projectType')}}",
                type: 'get',
                dataType: "json",
                success: function (response) {
                    if (response != 0) {
                        var responses = response;
                        var selectBoxId = "#categories";
                        var msgOpt1 = "لطفا دسته مورد نظر خود را انتخاب نمایید";
                        var msgOpt2 = "اگر دسته مورد نظر در این لیست وجود ندارد این گزینه را انتخاب نمایید";
                        var valueOption2 = "000";
                        loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                    }
                    else {
                        location.href = '{{url("admin/addCategory")}}';
                    }
                }
            })
            //11-load subCategories after ask do you want load it's sub Categories or no then load product title related selected category
            $('#categories').on("change", function () {
                var id = $(this).val();
                var depth = $(this).find("option:selected ").attr('depth');
                var selectedText = $(this).find("option:selected").text();
                $("#lastCategory").val(id);
                $("#lastCategoryName").attr('name', selectedText)
                $("#lastCategoryName").val(selectedText)
                console.log(selectedText);
            })
        </script>
        <script>
            $(document).on('click', '#editVideo', function () {
                var productId = $(this).attr('content');
                var editable = $('#videoContent');
                var me = $(this);
                if (editable.children().length > 0) {
                    swal({
                            title: '',
                            text: 'قبل از ویرایش فیلم پروژه ابتدا باید آن را حذف نمائید  ، آیا مایل به انجام این کار هستید؟',
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "  #5cb85c",
                            cancelButtonText: "خیر",
                            confirmButtonText: "آری",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax
                                ({
                                    url: "{{url('admin/deleteVideo')}}/" + productId,
                                    type: "post",
                                    dataType: "json",
                                    context: {'me': me},
                                    success: function (response) {
                                        if (response.message == 'success') {
                                            $('#video').css('display', 'none');
                                            $('#pauseVideo').css('display', 'none');
                                            $('#playVideo').css('display', 'none');
                                            $('#newVideo').css('display', 'block');
                                            $(me).attr('id', 'edit');
                                            $(me).attr('name', 'edit');
                                        } else {
                                            swal({
                                                title: '',
                                                text: 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید',
                                                type: "warning",
                                            })
                                        }
                                    }, error: function (error) {
                                        console.log(error);
                                    }
                                })
                            }
                        }
                    );
                } else {

                }
            })
        </script>
        <script>
            $(document).on('click', '#playVideo', function () {

                var video = document.getElementById('video');
                if (video != null) {
                    video.play();
                    $(this).hide();
                    $('#pauseVideo').show();
                }

            })
            $(document).on('click', '#pauseVideo', function () {
                $(this).hide();
                $('#playVideo').show();
                var video = document.getElementById('video');
                video.pause();
            })
        </script>
@endsection