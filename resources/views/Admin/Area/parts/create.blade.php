<!--begin::Form-->
<link href="{{url('Admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('areas.store')}}">
    @csrf
    <div class="row mt-0">
        <div class="d-flex flex-column mb-2 fv-row  col-sm-12">
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">المدينة</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" المدينة "></i>
            </label>
            <select class="form-control form-control-solid select2" name="city_id">
                <option value="" selected disabled > المدينة ...</option>
                @foreach($cities as $city)
                    <option {{$city->id == $city_id?'selected':''}} value="{{$city->id}}"  >{{$city->name_ar}}</option>
                @endforeach
            </select>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم ( بالعربية )" name="name_ar" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم ( بالانجليزية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم ( بالانجليزية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم ( بالانجليزية )" name="name_en" value=""/>
        </div>
        <!--begin::Input group-->
    </div>
</form>
<!--end::Form-->

<script src="{{url('Admin')}}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{url('Admin')}}/assets/js/select2.js"></script>

