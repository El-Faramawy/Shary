<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('packages.update',$package->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد الشهور </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد الشهور"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد الشهور" name="period" value="{{$package->period}}"/>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السعر </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السعر"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="السعر" name="price" value="{{$package->price}}"/>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد اعلانات اليوم </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد اعلانات اليوم"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد اعلانات اليوم" name="daily_ads" value="{{$package->daily_ads}}"/>
        </div>
        <!--begin::Input group-->
{{--        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">--}}
{{--            <!--begin::Label-->--}}
{{--            <label class="d-flex align-items-center fs-6 fw-bold form-label ">--}}
{{--                <span class="required">عدد اعلانات البانر </span>--}}
{{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد اعلانات البانر"></i>--}}
{{--            </label>--}}
{{--            <!--end::Label-->--}}
{{--            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد اعلانات البانر" name="panner_ads" value="{{$package->panner_ads}}"/>--}}
{{--        </div>--}}

        <div class="d-flex flex-column mb-2 fv-row  col-sm-12">
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">اغلاق الشات</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" اغلاق الشات "></i>
            </label>
            <select class="form-control form-control-solid select2" name="close_chat">
                <option value="" selected disabled > اغلاق الشات ...</option>
                <option {{$package->close_chat==1?'selected':''}} value="1"  >نعم</option>
                <option {{$package->close_chat==0?'selected':''}} value="0"  >لا</option>
            </select>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد الاشهر المجانية </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد الاشهر المجانية"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد الاشهر المجانية" name="free_months_number" value="{{$package->free_months_number}}"/>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد التصاميم المجانية </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد التصاميم المجانية"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد التصاميم المجانية" name="free_ads_number" value="{{$package->free_ads_number}}"/>
        </div>
        <div class="d-flex flex-column mb-2 fv-row  col-sm-12">
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">اظهار العضوية</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" اظهار العضوية "></i>
            </label>
            <select class="form-control form-control-solid select2" name="show_vip">
                <option value="" selected disabled > اظهار العضوية ...</option>
                <option {{$package->show_vip==1?'selected':''}} value="1"  >نعم</option>
                <option {{$package->show_vip==0?'selected':''}} value="0"  >لا</option>
            </select>
        </div>
    </div>

</form>
<!--end::Form-->

