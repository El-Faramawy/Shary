@extends('layouts.admin.app')
@section('page_title')التقييمات @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">التقييمات</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">المستخدم</th>
                                <th class="text-white">تقييم 1</th>
                                <th class="text-white">تقييم 2</th>
                                <th class="text-white">التعليق</th>
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
            {data: 'id', name: 'id'},
            {data: 'user', name: 'user'},
            {data: 'rate1', name: 'rate1'},
            {data: 'rate2', name: 'rate2'},
            {data: 'comment', name: 'comment'},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'product_rate'])

@endpush
