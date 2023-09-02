<div class="col-lg-12">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
          <div class="iq-header-title">
             <h4 class="card-title mb-0">Kutubxona adabiyotlari</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">                              
             <a href="category.html" class="btn btn-sm btn-primary view-more">Barchasini ko'rish</a>
          </div>
       </div> 
       <div class="iq-card-body">  
          <div class="row">
            @foreach ($all_books as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                    <div class="iq-card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="col-6 p-0 position-relative image-overlap-shadow">
                                <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('assets/images/book-test.webp')}}" alt=""></a>
                                <div class="view-book">
                                <a href="book-page.html" class="btn btn-sm btn-white">Kitobni ko'rish</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                <h6 class="mb-1" style="-webkit-line-clamp: 3;">{{ $item->title }}</h6>
                                <p class="font-size-13 line-height mb-1">{{ $item->mualif}}</p>
                                <div class="d-block line-height">
                                    <span class="font-size-11 text-warning">
                                        <i class="fa fa-star"></i>
                                        {{-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> --}}
                                    </span>                                             
                                </div>
                                </div>
                                <div class="price d-flex align-items-center">
                                {{-- <span class="pr-1 old-price">$100</span> --}}
                                <h6><b>{{$item->chiqarilgan_yili}}</b></h6>
                                </div>
                                <div class="iq-product-action">
                                {{-- <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a> --}}
                                <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                </div>                                      
                            </div>
                        </div>
                    </div>
                    </div>
                </div>  
            @endforeach                       
          </div>
       </div>
    </div>
 </div>