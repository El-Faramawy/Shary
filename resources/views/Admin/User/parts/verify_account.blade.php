<div class="row mt-0" style="direction: rtl;text-align: right">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">  صور البطاقة </h5>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-2">
                        <div>
                            <div class="row img-gallery">
                                @if($verify_account->image1 != null)
                                    <div class="col-6 col-lg-6">
                                        <a href="{{$verify_account->image1}}" target="_blank" class="d-block link-overlay">
                                            <img class="d-block img-fluid rounded" src="{{$verify_account->image1}}" onclick="window.open(this.src)" alt="">
                                            <span class="link-overlay-bg rounded">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                                @if($verify_account->image2 != null)
                                    <div class="col-6 col-lg-6">
                                        <a href="{{$verify_account->image2}}" target="_blank" class="d-block link-overlay">
                                            <img class="d-block img-fluid rounded" src="{{$verify_account->image2}}" onclick="window.open(this.src)" alt="">
                                            <span class="link-overlay-bg rounded">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">  صور التوثيق </h5>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-2">
                        <div>
                            <div class="row img-gallery">
                                @if($verify_account_images)
                                    @foreach($verify_account_images as $verify_account_image)
                                        <div class="col-6 col-lg-4">
                                            <a href="{{$verify_account_image->image}}" target="_blank" class="d-block link-overlay">
                                                <img class="d-block img-fluid rounded" src="{{$verify_account_image->image}}" onclick="window.open(this.src)" alt="">
                                                <span class="link-overlay-bg rounded">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>




