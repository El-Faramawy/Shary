@extends('layouts.admin.app')
@section('page_title') المكافئات @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">المكافئات</h3>
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
                                <th class="text-white">رقم المنتج</th>
                                <th class="text-white">اسم المنتج</th>
                                <th class="text-white">السعر</th>
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
            {data: 'product_id', name: 'product_id'},
            {data: 'product_name', name: 'product_name'},
            {data: 'price', name: 'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'rewords'])


@endpush
