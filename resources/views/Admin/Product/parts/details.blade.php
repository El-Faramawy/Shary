<!--begin::Form-->

    <div class="row mt-0">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title">تفاصيل الاعلان</h5>
                </div>
                <div class="card-body">
                    <div class="mb-5">
                        <div class="row img-gallery">
                            <div class="text-center mb-5 col-12" style="margin:auto;text-align: center">
                                <span class="text-muted font-weight-bold">صور الاعلان</span>
                            </div>
                            @if($product->images)
                                @foreach($product->images as $image)
                                    <div class="col-6 col-lg-4">
                                        <a href="{{$image->image}}" target="_blank" class="d-block link-overlay">
                                            <img class="d-block img-fluid rounded" src="{{$image->image}}" onclick="window.open(this.src)" alt="">
                                            <span class="link-overlay-bg rounded">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class=" row mb-4">
                        <table class="col-12 table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>حصل على المكافئة</th>
                                    <td>{{$product->has_reword == 0 ? 'لا':'نعم'}}</td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>المكافئة</th>--}}
{{--                                    <td>{{$product->inactive_reason}}</td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>تاريخ انتهاء باقة المنتج</th>
                                    <td>{{$product->end_date}}</td>
                                </tr>
                                <tr>
                                    <th>تاريخ انتهاء باقة البانر</th>
                                    <td>{{$product->panner_end_date}}</td>
                                </tr>
                                <tr>
                                    <th>اظهار الردود</th>
                                    <td>{{$product->show_comments == 1 ? 'نعم' :'لا'}}</td>
                                </tr>
                                <tr>
                                    <th>نوع الاعلان</th>
                                    <td>{{$product->trye == 'car' ? 'سيارات' :'عقارات'}}</td>
                                </tr>

                                @if($product->type == 'car')
                                    <tr>
                                        <th>نوع السيارة</th>
                                        <td>{{$product->car_type?->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>تصنيف السيارة</th>
                                        <td>{{$product->car_category?->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>موديل السيارة</th>
                                        <td>{{$product->car_model?->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>لون السيارة</th>
                                        <td>{{$product->car_color?->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>حالة السيارة</th>
                                        <td>{{$product->car_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>السيارة مفحوصة</th>
                                        <td>{{$product->checked == 1 ? 'نعم' :'لا'}}</td>
                                    </tr>
                                    <tr>
                                        <th>يوجد رخصة</th>
                                        <td>{{$product->license == 1 ? 'نعم' :'لا'}}</td>
                                    </tr>
                                    <tr>
                                        <th>جسم السيارة</th>
                                        <td>{{$product->body == 1 ? 'سليم' :'غير سليم'}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <th>نوع الشارع</th>
                                        <td>{{$product->street_type == 'public'?'سكنى':'تجارى'}}</td>
                                    </tr>
                                    <tr>
                                        <th>اسم الناشر</th>
                                        <td>{{$product->publisher_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>رقم الناشر</th>
                                        <td>{{$product->publisher_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>تصنيف المبنى</th>
                                        <td>
                                            @if($product->building_category == 'home_for_rent')
                                                منزل للايجار
                                            @elseif($product->building_category == 'home_for_sell')
                                                منزل للبيع
                                            @elseif($product->building_category == 'land_for_sell')
                                               أرض للبيع
                                            @elseif($product->building_category == 'store_for_rent')
                                                متجر للايجار
                                            @else
                                                متجر للبيع
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>عدد الغرف</th>
                                        <td>{{$product->room_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>عدد الحمامات</th>
                                        <td>{{$product->bathroom_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>مساحة البناء</th>
                                        <td>{{$product->building_area}}</td>
                                    </tr>
                                    <tr>
                                        <th>رقم الطابق</th>
                                        <td>{{$product->floor_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>عمر البناء</th>
                                        <td>{{$product->building_age}}</td>
                                    </tr>
                                    <tr>
                                        <th>مفروشة</th>
                                        <td>{{$product->full_option}}</td>
                                    </tr>
                                    <tr>
                                        <th>حالة المبنى</th>
                                        <td>{{$product->building_status == 1 ? 'سليم' :'غير سليم'}}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="text-center pt-3">
        <div class="d-inline-block pt-3">
            <button class="btn btn-light me-3 close_model" style="width: 100px">غلق</button>
        </div>
    </div>
<!--end::Form-->




