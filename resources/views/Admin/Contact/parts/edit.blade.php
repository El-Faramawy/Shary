<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('contacts.update',$contact->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السؤال ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السؤال ( بالعربية )"></i>
            </label>
            <textarea class="form-control form-control-solid" placeholder="السؤال ( بالعربية )" name="question_ar" >{{$contact->question_ar}}</textarea>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السؤال ( بالانجليزية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السؤال ( بالانجليزية )"></i>
            </label>
            <textarea class="form-control form-control-solid" placeholder="السؤال ( بالانجليزية )" name="question_en" >{{$contact->question_en}}</textarea>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الاجابة ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الاجابة ( بالعربية )"></i>
            </label>
            <textarea class="form-control form-control-solid" placeholder="الاجابة ( بالعربية )" name="answer_ar" >{{$contact->answer_ar}}</textarea>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الاجابة ( بالانجليزية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الاجابة ( بالانجليزية )"></i>
            </label>
            <textarea class="form-control form-control-solid" placeholder="الاجابة ( بالانجليزية )" name="answer_en" >{{$contact->answer_en}}</textarea>
        </div>
    </div>

</form>
<!--end::Form-->

