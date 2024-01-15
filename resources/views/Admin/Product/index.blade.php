@extends('layouts.admin.app')
@section('page_title') الاعلانات @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الاعلانات</h3>
                    <div class="mr-auto pageheader-btn">
                        {{--                        @if(in_array(26,admin()->user()->permission_ids))--}}
                        {{--                            <a href="#"  id="addBtn" class="btn btn-primary btn-icon text-white">--}}
                        {{--                                            <span>--}}
                        {{--                                                <i class="fe fe-plus"></i>--}}
                        {{--                                            </span> منتج جديد--}}
                        {{--                            </a>--}}
                        {{--                        @endif--}}
                        {{--                        @if(in_array(25,admin()->user()->permission_ids))--}}
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
                        <table id="exportexample"
                               class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">الصورة</th>
                                <th class="text-white">الفيديو</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">الوصف</th>
                                <th class="text-white">المستخدم</th>
                                <th class="text-white">القسم</th>
                                <th class="text-white">القسم الفرعى</th>
                                <th class="text-white">المنطقة</th>
                                <th class="text-white">الحى</th>
                                <th class="text-white">النوع</th>
                                <th class="text-white">السعر</th>
                                <th class="text-white">العنوان</th>
                                <th class="text-white">رقم الهاتف</th>
                                <th class="text-white">واتساب</th>
                                <th class="text-white">نوع الناشر</th>
                                <th class="text-white">رقم الرخصة</th>
                                <th class="text-white">الشارع</th>
                                <th class="text-white">مساحة المحطة</th>
                                <th class="text-white">اطوالها</th>
                                <th class="text-white">عدد المضخات</th>
                                <th class="text-white">الواجهة</th>
                                {{--                                <th class="text-white" >يوجد 95</th>--}}
                                {{--                                <th class="text-white" >يوجد ديزل</th>--}}
                                <th class="text-white">عمر المحطة</th>
                                {{--                                <th class="text-white" >عدد حفر الزيت</th>--}}
                                {{--                                <th class="text-white" >كم المساحة بالمتر لغيار الزيت</th>--}}
                                {{--                                <th class="text-white" >مساحة البنشر</th>--}}
                                {{--                                <th class="text-white" >مساحة التموينات</th>--}}
                                {{--                                <th class="text-white" >عدد الاكشاك الدرايف ثرو</th>--}}
                                <th class="text-white">مرافق اخرى</th>
                                {{--                                <th class="text-white" >عدد الغرف السكنيه</th>--}}
                                {{--                                <th class="text-white" >عدد عدادات الكهرباء</th>--}}
                                {{--                                <th class="text-white" >عدد توانك المحروفات</th>--}}
                                {{--                                <th class="text-white" >كميه كل تانك</th>--}}
                                <th class="text-white"> المده المتوقع الاتفاق عليها</th>
                                {{--                                <th class="text-white" >اهم نقطه السوم</th>--}}
                                {{--                                <th class="text-white" >الحد</th>--}}
                                <th class="text-white">عرض السعر</th>
                                <th class="text-white">رخصة الدفاع المدني</th>
                                <th class="text-white">رخصة البلديه</th>
                                <th class="text-white">المحطة للايجار</th>
                                <th class="text-white">المحطة مطورة</th>
                                <th class="text-white">منتج مميز</th>
                                <th class="text-white">الكومنتات</th>
                                <th class="text-white">التقييمات</th>
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
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content" id="modalContent">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>الاعلانات</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer"
                         data-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-3" id="form-load">

                </div>
                <!--end::Modal body-->
                <div class="modal-footer">
                    <div class=" ">
                        <input form="form" value="حفظ" type="submit" id="submit" class="btn btn-primary "
                               style="width: 100px">
                        {{--                            <span class="indicator-label ">حفظ</span>--}}

                    </div>
                    <div class=" ">
                        <button class="btn btn-light me-3 close_model" style="width: 100px">غلق</button>
                    </div>
                </div>
            </div>

            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection
@push('admin_js')
    <script>
        var columns = [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'image', name: 'image'},
            {data: 'video', name: 'video'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'user', name: 'user'},
            {data: 'category', name: 'category'},
            {data: 'sub_category', name: 'sub_category'},
            {data: 'city', name: 'city'},
            {data: 'area', name: 'area'},
            {data: 'type', name: 'type'},
            {data: 'price', name: 'price'},
            {data: 'address', name: 'address'},
            {data: 'phone', name: 'phone'},
            {data: 'whatsapp', name: 'whatsapp'},
            {data: 'publisher_type', name: 'publisher_type'},
            {data: 'licence_number', name: 'licence_number'},
            {data: 'street', name: 'street'},
            {data: 'station_size', name: 'station_size'},
            {data: 'lenght', name: 'lenght'},
            {data: 'pumb_number', name: 'pumb_number'},
            {data: 'direction', name: 'direction'},
            // {data: 'is_95', name: 'is_95'},
            // {data: 'is_diesel', name: 'is_diesel'},
            {data: 'age', name: 'age'},
            // {data: 'oil_no', name: 'oil_no'},
            // {data: 'oil_size', name: 'oil_size'},
            // {data: 'bencher_size', name: 'bencher_size'},
            // {data: 'grocery_size', name: 'grocery_size'},
            // {data: 'stalls_no', name: 'stalls_no'},
            {data: 'others', name: 'others'},
            // {data: 'room_no', name: 'room_no'},
            // {data: 'electric_no', name: 'electric_no'},
            // {data: 'tank_no', name: 'tank_no'},
            // {data: 'tank_size', name: 'tank_size'},
            {data: 'time_period', name: 'time_period'},
            // {data: 'important_point', name: 'important_point'},
            // {data: 'limit', name: 'limit'},
            {data: 'show_price', name: 'show_price'},
            {data: 'civil_defense_license', name: 'civil_defense_license'},
            {data: 'municipal_license', name: 'municipal_license'},
            {data: 'for_rent', name: 'for_rent'},
            {data: 'developed', name: 'developed'},
            {data: 'favourite', name: 'favourite'},
            {data: 'comment', name: 'comment'},
            {data: 'product_rate', name: 'product_rate'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'products'])

    <script>
        $(document).on('click',".favourite",function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{route('favourite_product')}}?id="+id;
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
@endpush
