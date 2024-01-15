@extends('layouts.admin.app')
@section('page_title') الاعدادات @endsection
<!-- INTERNAL  WYSIWYG EDITOR CSS -->
<script src="https://cdn.ckeditor.com/4.19.0/full-all/ckeditor.js"></script>

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
                                <div class="form-group">
                                    <label>اللوجو</label>
                                    <div class="input-group file-browser">
                                        <input type="text" class="form-control browse-file" placeholder="اختر" readonly>
                                        <label class="input-group-btn">
													<span class="btn btn-primary">
														اختر  <input accept="image/*" name="logo" id="imgInp1"
                                                                     type="file" style="display: none;">
													</span>
                                        </label>
                                    </div>
                                    {{--                                        <input accept="image/*" type='file'  name="logo"  class="form-control form-control-solid" />--}}
                                    <img width="100" height="100" id="blah1" src="{{$setting->logo}}" alt="your image"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>صورة المتصفح</label>
                                    <div class="input-group file-browser">
                                        <input type="text" class="form-control browse-file" placeholder="اختر" readonly>
                                        <label class="input-group-btn">
													<span class="btn btn-primary">
														اختر <input accept="image/*" id="imgInp2" name="fav_icon"
                                                                    type="file" style="display: none;">
													</span>
                                        </label>
                                    </div>
                                    {{--                                        <input accept="image/*" type='file' id="imgInp2" name="fav_icon"  class="form-control form-control-solid" />--}}
                                    <img width="100" height="100" id="blah2" src="{{$setting->fav_icon}}"
                                         alt="your image"/>
                                </div>
                            </div>
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
    <script>
        CKEDITOR.config.contentsLangDirection = 'rtl';
        // CKEDITOR.config.contentsLangDirection = 'ltr';
        CKEDITOR.replace('terms');
        CKEDITOR.replace('privacy');
        CKEDITOR.replace('about');
    </script>

@endpush
