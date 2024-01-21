@extends('layouts.admin.app')
@section('page_title') الاعدادات @endsection
<!-- INTERNAL  WYSIWYG EDITOR CSS -->
<script src="https://cdn.ckeditor.com/4.19.0/full-all/ckeditor.js"></script>
<link href="{{url('Admin')}}/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الاعدادات</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('settings.update',$setting->id)}}" id="Form" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>رقم الهاتف</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="phone" value="{{$setting->phone}}"
                                               placeholder="رقم الهاتف ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>رقم واتساب</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-whatsapp tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="whatsapp"
                                               value="{{$setting->whatsapp}}"
                                               placeholder="رقم واتساب ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>تويتر</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-twitter tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control " name="twitter"
                                               value="{{$setting->twitter}}"
                                               placeholder="تويتر ... " type="url" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>سناب شات</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-snapchat tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control " name="snapchat"
                                               value="{{$setting->snapchat}}"
                                               placeholder="سناب شات ... " type="url" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>انستجرام</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-instagram tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control " name="insta"
                                               value="{{$setting->insta}}"
                                               placeholder="انستجرام ... " type="url" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>تيكتوك</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-tiktok tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control " name="tiktok"
                                               value="{{$setting->tiktok}}"
                                               placeholder="تيكتوك ... " type="url" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label> عمولة التطبيق</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-coins tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="commission" value="{{$setting->commission}}"
                                               placeholder=" عمولة التطبيق ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> عدد لايكات المكافئة</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-thumbs-up tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="like_reword" value="{{$setting->like_reword}}"
                                               placeholder=" عدد لايكات المكافئة ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> عدد متابعات المكافئة</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-hand-point-up tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="follow_reword" value="{{$setting->follow_reword}}"
                                               placeholder=" عدد متابعات المكافئة ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> نسبة اقل تقييم للحصول على المكافئة</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-star tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="min_reward_rate" value="{{$setting->min_reward_rate}}"
                                               placeholder=" مثال 80 ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> قيمة المكافئة</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-money-check tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control numbersOnly" name="reword" value="{{$setting->reword}}"
                                               placeholder=" قيمة المكافئة ... " type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label> شرح المكافئة</label>
                                <div class="wd-150 mg-b-30">
                                    <div class="input-group">
                                        <textarea class="form-control " name="reward_definition" placeholder=" شرح المكافئة ... " >{{$setting->reward_definition}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">الشروط و الاحكام</div>
                                    </div>
                                    <div class="card-body">
                                        <textarea name="terms" id="terms">{!! $setting->terms !!}</textarea>
                                        {{--                                        <textarea class="content" name="terms">{!! $setting->terms !!}</textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">السياسة و الخصوصية</div>
                                    </div>
                                    <div class="card-body">
                                        <textarea name="privacy" id="privacy">{!! $setting->privacy !!}</textarea>
                                        {{--                                        <textarea class="content" name="terms">{!! $setting->terms !!}</textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">معلومات عنا</div>
                                    </div>
                                    <div class="card-body">
                                        <textarea name="about" id="about">{!! $setting->about !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">اللوجو</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="logo" data-default-file="{{$setting->logo}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">صورة المتصفح</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="fav_icon" data-default-file="{{$setting->fav_icon}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">تصنيف السيارات</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="car_image" data-default-file="{{$setting->car_image}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">تصنيف العقارات</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="building_image" data-default-file="{{$setting->building_image}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">ما هو توثيق العضوية</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="what_verification" data-default-file="{{$setting->what_verification}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">كيف احصل على درع التوثيق</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="how_verification" data-default-file="{{$setting->how_verification}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">عند حذف الحساب ماذا يحدث</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="deleted_action" data-default-file="{{$setting->deleted_action}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">هل توثيق عضويتى يعفينى من العمولة</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="no_commission" data-default-file="{{$setting->no_commission}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">لدى عضوية موثقة و خالفت الأنظمة ماذا يحدث</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="break_low" data-default-file="{{$setting->break_low}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">ما فائدة توثيق عضويتى</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="verification_important" data-default-file="{{$setting->verification_important}}" data-height="300" />
                                    </div>
                                </div>
                            </div><!-- COL END -->

                        </div>

                        <!-- ROW-2 CLOSED -->
                        <div class="card-footer ">
                            <input type="submit" class="btn btn-success mt-1" value="حفظ">
                            <input type="reset" class="btn btn-danger mt-1" value="الغاء">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@push('admin_js')
    <script>
        imgInp1.onchange = evt => {
            $('#blah1').show()
            const [file] = imgInp1.files
            if (file) {
                blah1.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            $('#blah2').show()
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
    </script>

    <script>
        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var form_data = new FormData(document.getElementById("Form"));
            var url = $('#Form').attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#global-loader').show()
                },
                success: function (data) {
                    window.setTimeout(function () {
                        $('#global-loader').hide()
                        if (data.success == 'true') {
                            var messages = Object.values(data.messages);
                            $(messages).each(function (index, message) {
                                my_toaster(message)
                            });
                        }
                    }, 1000);
                }, error: function (data) {
                    $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $(error).each(function (index, message) {
                        my_toaster(message, 'error')
                    });
                }
            });
        });
    </script>

    <!-- INTERNAL   WYSIWYG Editor JS -->
    <script src="{{url('Admin')}}/assets/plugins/wysiwyag/jquery.richtext.js"></script>
    <script src="{{url('Admin')}}/assets/plugins/wysiwyag/wysiwyag.js"></script>

    <!-- INTERNAL  FILE UPLOADES JS -->
    <script src="{{url('Admin')}}/assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="{{url('Admin')}}/assets/plugins/fileuploads/js/file-upload.js"></script>

    <script>
        CKEDITOR.config.contentsLangDirection = 'rtl';
        // CKEDITOR.config.contentsLangDirection = 'ltr';
        CKEDITOR.replace('terms');
        CKEDITOR.replace('privacy');
        CKEDITOR.replace('about');
    </script>

@endpush
