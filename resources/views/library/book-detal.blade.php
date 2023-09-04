@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Kutubxona resurslari</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Bosh sahifa</li>
                <li class="breadcrumb-item active" aria-current="page">Kitoblar ro'yxati</li>                  
            </ul>
        </nav>
    </div>          
    @endpush
     <!-- Page Content  -->
     <div id="content-page" class="content-page">
        <div class="container-fluid">
           <div class="row">
              <div class="col-sm-12">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                       <h4 class="card-title mb-0">Resurs sahifasi ID: 123412</h4>
                    </div>
                    <div class="iq-card-body pb-0">
                       <div class="description-contens align-items-top row">
                          <div class="col-md-6">
                             <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-body p-0">
                                   <div class="row align-items-center">
                                      <div class="col-3">
                                         <ul id="description-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid rounded w-100" alt="">
                                               </a>
                                            </li>
                                         </ul>
                                      </div>
                                      <div class="col-9">
                                         <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                            <li>
                                               <a href="javascript:void(0);">
                                               <img src="{{ $book->image }}" class="img-fluid w-100 rounded" alt="">
                                               </a>
                                            </li>
                                         </ul>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-body p-0">
                                   <h3 class="mb-3">{{ $book->title }}</h3>
                                   <div class="price d-flex align-items-center font-weight-500 mb-2">
                                      <span class="font-size-20 pr-2 new-price">Resursga berilgan baho: </span>
                                      <span class="font-size-20 ml-2 text-warning">
                                        <i class="fa fa-star mr-1"></i>
                                        {{-- <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star"></i> --}}
                                        </span>
                                   </div>
                                   
                                   <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <th scope="row">KITOB INVENTAR RAQAMI:</th>
                                        <td><span class="badge badge-pill border border-primary text-primary mr-4" style="font-size: 14px">{{ $book->book_inventar_number }}</span> | <span class="badge badge-pill text-dark mr-4">Class: {{ $book->classificatsiya }} </span></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">NASHRIYOT:</th>
                                        <td>{{ $book->nashriyot_nomi }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">JOYLANGAN BO'LIMI:</th>
                                        <td>{{ $book->BookCategory->title }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">MUALLIF(LAR):</th>
                                        <td class="text-primary">{{ $book->mualif }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">KITOB SAHIFASI VA O'LCHAMI:</th>
                                        <td>{{ $book->sahifa_soni_va_olcham }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">ISBN / ISSN:</th>
                                        <td class="text-primary"><b>{{ $book->isbn_issn }}</b></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">NASHR / YILI:</th>
                                        <td>{{ $book->nechanchi_nashr }} - nashr | <span class="badge badge-pill border border-secondary text-secondary">{{ $book->chiqarilgan_yili }} - yil chiqarilgan</span></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">KITOB YOZILGAN TIL:</th>
                                        <td><span class="badge badge-pill border border-dark text-dark">{{ $book->yozilgan_tili }} (tilida yozilgan)</span></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">KITOBGA JAVOBGAR:</th>
                                        <td>{{ $book->kitobga_javobgar }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">MAVZU NOMI:</th>
                                        <td>{{ $book->gmd_name }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">KITOBNING NUSXALAR SONI:</th>
                                        <td>                                          
                                          <button type="button" class="btn mb-1 btn-outline-success" style="cursor: auto;">
                                             Umumiy soni: <span class="badge badge-success ml-2">{{$book->uzgarmas_soni}}</span>
                                          </button>
                                          <button type="button" class="btn mb-1 btn-outline-primary" style="cursor: auto;">
                                             Kutubxonada qolgan soni: <span class="badge badge-primary ml-2">{{$book->uzgaruvchan_soni}}</span>
                                          </button>                                          
                                      </tr>
                                      <tr>
                                        <th scope="row">QAYSI KUTUBXONA:</th>
                                        <td>TVCHDPI ARM fondi</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                   
                                   <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">{{ $book->notes }}</span>
                                   <div class="text-primary mb-4">Muallif(lar): <span class="text-body">{{ $book->mualif }}</span></div>
                                   <div class="mb-4 d-flex align-items-center">                                       
                                      <a href="#" class="btn btn-primary view-more mr-2">Kitob</a>
                                      <a href="#" class="btn btn-primary view-more mr-2">Ertak</a>
                                   </div>
                                   <div class="mb-3">
                                      <a href="book-page.html#" class="text-body text-center"><span class="avatar-30 rounded-circle bg-primary d-inline-block mr-2"><i class="ri-heart-fill"></i></span><span>Add to Wishlist</span></a>
                                   </div>
                                   <div class="iq-social d-flex align-items-center">
                                      <h5 class="mr-2">Share:</h5>
                                      <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                         <li>
                                            <a href="book-page.html#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                         </li>
                                         <li>
                                            <a href="book-page.html#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                         </li>
                                         <li>
                                            <a href="book-page.html#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                         </li>
                                         <li >
                                            <a href="book-page.html#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                         </li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-lg-12">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                       <div class="iq-header-title">
                          <h4 class="card-title mb-0">Similar Books</h4>
                       </div>
                       <div class="iq-card-header-toolbar d-flex align-items-center">
                          <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                       </div>
                    </div>
                    <div class="iq-card-body single-similar-contens">
                       <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                          <li class="col-md-3">
                             <div class="row align-items-center">
                                <div class="col-5">
                                   <div class="position-relative image-overlap-shadow">
                                      <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/similar-books/01.jpg" alt=""></a>
                                      <div class="view-book">
                                         <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-7 pl-0">
                                   <h6 class="mb-2">The Book of treasure Island find...</h6>
                                   <p class="text-body">Author : Tara Zona</p>
                                   <a href="book-page.html#" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="row align-items-center">
                                <div class="col-5">
                                   <div class="position-relative image-overlap-shadow">
                                      <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/similar-books/02.jpg" alt=""></a>
                                      <div class="view-book">
                                         <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-7 pl-0">
                                   <h6 class="mb-2">Set For Lifr Being Scott Trench..</h6>
                                   <p class="text-body">Author : Anna Rexia</p>
                                   <a href="book-page.html#" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="row align-items-center">
                                <div class="col-5">
                                   <div class="position-relative image-overlap-shadow">
                                      <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/similar-books/03.jpg" alt=""></a>
                                      <div class="view-book">
                                         <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-7 pl-0">
                                   <h6 class="mb-2">A Birth and Evolutions of the Soul...</h6>
                                   <p class="text-body">Author : Bill Emia</p>
                                   <a href="book-page.html#" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="row align-items-center">
                                <div class="col-5">
                                   <div class="position-relative image-overlap-shadow">
                                      <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/similar-books/04.jpg" alt=""></a>
                                      <div class="view-book">
                                         <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-7 pl-0">
                                   <h6 class="mb-2">The Nature of world Beautiful Places.</h6>
                                   <p class="text-body">Author : Hal Appeno</p>
                                   <a href="book-page.html#" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="row align-items-center">
                                <div class="col-5">
                                   <div class="position-relative image-overlap-shadow">
                                      <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/similar-books/05.jpg" alt=""></a>
                                      <div class="view-book">
                                         <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-7 pl-0">
                                   <h6 class="mb-2">The mackup magazine find books..</h6>
                                   <p class="text-body">Author : Zack Lee</p>
                                   <a href="book-page.html#" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-lg-12">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                       <div class="iq-header-title">
                          <h4 class="card-title mb-0">Trendy Books</h4>
                       </div>
                       <div class="iq-card-header-toolbar d-flex align-items-center">
                          <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                       </div>
                    </div>
                    <div class="iq-card-body trendy-contens">
                       <ul id="trendy-slider" class="list-inline p-0 mb-0 row">
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/01.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">The Word Books Day..</h6>
                                      <p class="font-size-13 line-height mb-1">Paul Molive</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$99</span>
                                      <h6><b>$89</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/02.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">The catcher in the Rye</h6>
                                      <p class="font-size-13 line-height mb-1">Anna Sthesia</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$89</span>
                                      <h6><b>$79</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/03.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">Little Black Book</h6>
                                      <p class="font-size-13 line-height mb-1">Monty Carlo</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$100</span>
                                      <h6><b>$89</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/04.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">Take The Risk Book</h6>
                                      <p class="font-size-13 line-height mb-1">Smith goal</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$120</span>
                                      <h6><b>$99</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/05.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">The Raze Night Book </h6>
                                      <p class="font-size-13 line-height mb-1">Paige Turner</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$150</span>
                                      <h6><b>$129</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-3">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative image-overlap-shadow">
                                   <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/06.jpg" alt=""></a>
                                   <div class="view-book">
                                      <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                                   </div>
                                </div>
                                <div class="col-7">
                                   <div class="mb-2">
                                      <h6 class="mb-1">Find the Wave Book..</h6>
                                      <p class="font-size-13 line-height mb-1">Barb Ackue</p>
                                      <div class="d-block">
                                         <span class="font-size-13 text-warning">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         </span>
                                      </div>
                                   </div>
                                   <div class="price d-flex align-items-center">
                                      <span class="pr-1 old-price">$120</span>
                                      <h6><b>$100</b></h6>
                                   </div>
                                   <div class="iq-product-action">
                                      <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                      <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                   </div>
                                </div>
                             </div>
                          </li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-lg-12">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                       <div class="iq-header-title">
                          <h4 class="card-title mb-0">Favorite Reads</h4>
                       </div>
                       <div class="iq-card-header-toolbar d-flex align-items-center">
                          <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                       </div>
                    </div>                         
                    <div class="iq-card-body favorites-contens">
                       <ul id="favorites-slider" class="list-inline p-0 mb-0 row">
                          <li class="col-md-4">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative">
                                   <a href="javascript:void();">
                                      <img src="images/favorite/01.jpg" class="img-fluid rounded w-100" alt="">
                                   </a>                                
                                </div>
                                <div class="col-7">
                                   <h5 class="mb-2">Every Book is a new Wonderful Travel..</h5>
                                   <p class="mb-2">Author : Pedro Araez</p>                                          
                                   <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                      <span>Reading</span>
                                      <span class="mr-4">78%</span>
                                   </div>
                                   <div class="iq-progress-bar-linear d-inline-block w-100">
                                      <div class="iq-progress-bar iq-bg-primary">
                                         <span class="bg-primary" data-percent="78"></span>
                                      </div>
                                   </div>
                                   <a href="book-page.html#" class="text-dark">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-4">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative">
                                   <a href="javascript:void();">
                                      <img src="images/favorite/02.jpg" class="img-fluid rounded w-100" alt="">
                                   </a>                                
                                </div>
                                <div class="col-7">
                                   <h5 class="mb-2">Casey Christie night book into find...</h5>
                                   <p class="mb-2">Author : Michael klock</p>                                          
                                   <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                      <span>Reading</span>
                                      <span class="mr-4">78%</span>
                                   </div>
                                   <div class="iq-progress-bar-linear d-inline-block w-100">
                                      <div class="iq-progress-bar iq-bg-danger">
                                         <span class="bg-danger" data-percent="78"></span>
                                      </div>
                                   </div>
                                   <a href="book-page.html#" class="text-dark">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-4">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative">
                                   <a href="javascript:void();">
                                      <img src="images/favorite/03.jpg" class="img-fluid rounded w-100" alt="">
                                   </a>                                
                                </div>
                                <div class="col-7">
                                   <h5 class="mb-2">The Secret to English Busy People..</h5>
                                   <p class="mb-2">Author : Daniel Ace</p>                                          
                                   <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                      <span>Reading</span>
                                      <span class="mr-4">78%</span>
                                   </div>
                                   <div class="iq-progress-bar-linear d-inline-block w-100">
                                      <div class="iq-progress-bar iq-bg-info">
                                         <span class="bg-info" data-percent="78"></span>
                                      </div>
                                   </div>
                                   <a href="book-page.html#" class="text-dark">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                          <li class="col-md-4">
                             <div class="d-flex align-items-center">
                                <div class="col-5 p-0 position-relative">
                                   <a href="javascript:void();">
                                      <img src="images/favorite/04.jpg" class="img-fluid rounded w-100" alt="">
                                   </a>                                
                                </div>
                                <div class="col-7">
                                   <h5 class="mb-2">The adventures of Robins books...</h5>
                                   <p class="mb-2">Author : Luka Afton</p>                                          
                                   <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                      <span>Reading</span>
                                      <span class="mr-4">78%</span>
                                   </div>
                                   <div class="iq-progress-bar-linear d-inline-block w-100">
                                      <div class="iq-progress-bar iq-bg-success">
                                         <span class="bg-success" data-percent="78"></span>
                                      </div>
                                   </div>
                                   <a href="book-page.html#" class="text-dark">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                </div>
                             </div>
                          </li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    @endsection