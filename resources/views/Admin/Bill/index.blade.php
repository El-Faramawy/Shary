@extends('layouts.admin.app')
@section('page_title') الفواتير @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>
                    <div class="mr-auto pageheader-btn">
                        <a href="#"  id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                            <span>
                                <i class="fa fa-trash-o"></i>
                            </span> حذف المحدد
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">#</th>
                                <th class="text-white">المستخدم</th>
                                <th class="text-white">عدد الاعلانات</th>
                                <th class="text-white">اسم الباقة</th>
                                <th class="text-white">النوع</th>
                                <th class="text-white">الحالة</th>
                                <th class="text-white">السعر</th>
                                <th class="text-white">التاريخ</th>
                                <th class="text-white">حذف</th>
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

@endsection
@push('admin_js')

    <script>
        var  columns =[
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'user', name: 'user'},
            {data: 'ad_number', name: 'ad_number'},
            {data: 'package_name', name: 'package_name'},
            {data: 'type', name: 'type'},
            {data: 'status', name: 'status'},
            {data: 'price', name: 'price'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'bills'])


@endpush
