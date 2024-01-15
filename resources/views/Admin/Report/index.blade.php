@extends('layouts.admin.app')
@section('page_title') الشكاوى @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الشكاوى</h3>
                    <div class="mr-auto pageheader-btn">
                        @if(in_array(21,admin()->user()->permission_ids))
                            <a href="#"  id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span> حذف المحدد
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">#</th>
                                <th class="text-white">نوع الشكوى</th>
                                <th class="text-white">مقدم الشكوى</th>
                                <th class="text-white">الشكوى</th>
                                <th class="text-white">المنتج</th>
                                <th class="text-white">المستخدم</th>
                                <th class="text-white">الكومنت</th>
                                <th class="text-white">الرد</th>
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
            {data: 'type', name: 'type'},
            {data: 'reporter_user', name: 'reporter_user'},
            {data: 'message', name: 'message'},
            {data: 'product', name: 'product'},
            {data: 'user', name: 'user'},
            {data: 'comment', name: 'comment'},
            {data: 'reply', name: 'reply'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'reports'])


@endpush
