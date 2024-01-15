<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('ad_packages.update',$adPackage->id)}}">
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
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد الشهور" name="period" value="{{$adPackage->period}}"/>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السعر </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السعر"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="السعر" name="price" value="{{$adPackage->price}}"/>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد اعلانات البانر </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد اعلانات البانر"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد اعلانات البانر" name="panner_ads" value="{{$adPackage->panner_ads}}"/>
        </div>

    </div>

</form>
<!--end::Form-->

