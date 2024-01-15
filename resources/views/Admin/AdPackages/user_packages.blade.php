@extends('layouts.admin.app')
@section('page_title')باقات المستخدم @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">باقات المستخدم</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">الباقة</th>
                                <th class="text-white">من</th>
                                <th class="text-white">الى</th>
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
            {data: 'package', name: 'package'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
        ];
        //======================== addBtn =============================

    </script>
{{--    @include('layouts.admin.inc.ajax',['url'=>'user_ad_packages'])--}}
</script>
    <script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js?{{time()}}"></script>
    <script type="text/javascript" src="https://fastly.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js?{{time()}}"></script>
    <script type="text/javascript" src="https://fastly.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js?{{time()}}"></script>
    <script src="https://fastly.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script src="//fastly.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;
        $(function () {
            var table = $("#exportexample").DataTable({
                bLengthChange: true,
                serverSide: true,
                ajax: window.location.href,
                columns: columns,
                order: [
                    [0, "desc"]
                ],
                "language": {
                    paginate: {
                        previous: "<i class='simple-icon-arrow-left'></i>",
                        next: "<i class='simple-icon-arrow-right'></i>"
                    },
                    "sProcessing": "جاري التحميل ..",
                    "sLengthMenu": "اظهار _MENU_ سجل",
                    "sZeroRecords": "لا يوجد نتائج",
                    "sInfo": "اظهار _START_ الى  _END_ من _TOTAL_ سجل",
                    "sInfoEmpty": "لا نتائج",
                    "sInfoFiltered": "للبحث",
                    "sSearch": "بحث :    ",
                    "oPaginate": {
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                    }
                },
                dom: 'lBfrtip',
                buttons: [
                    'colvis',
                    'excel',
                    'print',
                    'copy',
                    'csv',
                ],
                searching: true,
                destroy: true,
                info: false,
                lengthChange: true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
                pageLength: 10,

            });

            table.buttons().container().appendTo( '#exportexample_wrapper .col-md-6:eq(0)' );

        });
    </script>

@endpush
