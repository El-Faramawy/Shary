@extends('layouts.admin.app')
@section('page_title') المستخدمين @endsection
<link href="{{url('admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" >المستخدمين</h3>
                    <div class="mr-auto pageheader-btn">
{{--                        @if(in_array(7,admin()->user()->permission_ids))--}}
                            <a href="#" id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span> حذف المحدد
                            </a>
{{--                        @endif--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">#</th>
                                <th class="text-white">الصورة</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">رقم الهاتف</th>
                                <th class="text-white">المشاهدات</th>
                                <th class="text-white">التوثيق</th>
                                <th class="text-white">النوع</th>
                                <th class="text-white">التقييم</th>
                                <th class="text-white">التقييمات</th>
                                <th class="text-white">الباقات</th>
                                <th class="text-white">باقات الاعلانات</th>
                                <th class="text-white"> الاعلانات</th>
                                <th class="text-white">اسم الشركة</th>
                                <th class="text-white">الاسم التعريفى الشركة</th>
                                <th class="text-white">صورة الشركة</th>
                                <th class="text-white">بانر الشركة</th>
                                <th class="text-white">عنوان الشركة</th>
                                <th class="text-white">وصف الشركة</th>
                                <th class="text-white">واتساب الشركة</th>
                                <th class="text-white">رقم هاتف الشركة</th>
                                <th class="text-white">انستجرام الشركة</th>
                                <th class="text-white">فيسبوك الشركة</th>
                                <th class="text-white">تيكتوك الشركة</th>
                                <th class="text-white">حظر</th>
                                <th class="text-white">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h2>المستخدمين</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer" data-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-3" id="form-load">

                </div>
                <div class="modal-footer">
                    <div class=" ">
                        <button class="btn btn-light me-3 close_model" style="width: 100px">غلق</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('admin_js')
    <script>
        var  columns =[
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'views', name: 'views'},
            {data: 'verified', name: 'verified'},
            {data: 'type', name: 'type'},
            {data: 'rate', name: 'rate'},
            {data: 'user_rate', name: 'user_rate'},
            {data: 'packages', name: 'packages'},
            {data: 'ad_packages', name: 'ad_packages'},
            {data: 'products', name: 'products'},
            {data: 'company_name', name: 'company_name'},
            {data: 'company_username', name: 'company_username'},
            {data: 'company_image', name: 'company_image'},
            {data: 'company_panner', name: 'company_panner'},
            {data: 'address', name: 'address'},
            {data: 'company_description', name: 'company_description'},
            {data: 'company_whatsapp', name: 'company_whatsapp'},
            {data: 'company_phone', name: 'company_phone'},
            {data: 'company_insta', name: 'company_insta'},
            {data: 'company_facebook', name: 'company_facebook'},
            {data: 'company_tiktok', name: 'company_tiktok'},
            {data: 'block', name: 'block'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'users'])
    @include('Admin.User.parts.block',['url'=>'users'])

    <script>
        $(document).on('click',".verify_account",function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{route('verify_account')}}?id="+id;
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function () {
                    $('#global-loader').show()
                },
                success: function (data) {

                    window.setTimeout(function () {
                        $('#global-loader').hide()
                        if (data.code === 200) {
                            $('#Modal').modal('hide')
                            my_toaster(data.message)
                            $('#exportexample').DataTable().ajax.reload(null, false);
                        }
                    }, 100);

                },
                error: function (data) {
                    $('#global-loader').hide()
                    console.log(data)
                    if (data.status === 500) {
                        my_toaster('هناك خطأ','error')
                    }

                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    my_toaster(value,'error')
                                });

                            } else {

                            }
                        });
                    }
                    if (data.status == 421){
                        my_toaster(data.message,'error')
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

    <script>

        $(document).on('click', '.verify_images', function (e) {
            e.preventDefault();
            $('#form-load').html(loader)
            $('#Modal').modal('show')
            var id = $(this).data('id') ;
            setTimeout(function (){
                $('#form-load').load("{{route("verify_images")}}?id="+ id)
            },100)
        });
    </script>

@endpush
