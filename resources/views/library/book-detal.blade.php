@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Kutubxona resursi ID: {{ $book->id }}</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Bosh sahifa</li>
                <li class="breadcrumb-item" aria-current="page">Kitoblar ro'yxati</li>
                <li class="breadcrumb-item active" aria-current="page">Kitob sahifasi</li>                  
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
                       <h4 class="card-title mb-0">Resurs inventar raqami: {{ $book->book_inventar_number }}</h4>
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
                                 <div class="mt-4">
                                    <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">{{ $book->notes }}</span>                           
                                 </div> 
                                  
                             </div>
                          </div>

                          
                          @if($book->book_or_article == 'book')
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
                                        <td class="text-primary">
                                          @if (count($book->authors) == 1 && $book->authors[0]->status == '1')
                                          <a href="{{route('dashboard.library-author-books', $book->authors[0]->slug)}}">{{$book->authors[0]->fish}}</a>
                                          @else
                                                @foreach ($book->authors as $index=>$author)
                                                   @if ($author->status == '1')
                                                      <a href="{{ route('dashboard.library-author-books', $author->slug)}}">{{ $author->fish }}</a>@if ($index+1 != count($book->authors)), @endif
                                                   @endif
                                                @endforeach
                                          @endif
                                      
                                         </td>
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
                                        <td>{{ $book->users->name }}</td>
                                      </tr>
                                      {{-- <tr>
                                        <th scope="row">MAVZU NOMI:</th>
                                        <td>{{ $book->gmd_name }}</td>
                                      </tr> --}}
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

                                   <div class="mb-4 d-flex align-items-center">                                       
                                      <a href="#" class="btn btn-primary view-more mr-2">Kitob</a>
                                      <a href="#" class="btn btn-primary view-more mr-2">Ertak</a>
                                   </div>
                                   <div class="mb-3">
                                      <a href="book-page.html#" class="text-body text-center"><span class="avatar-30 rounded-circle bg-primary d-inline-block mr-2"><i class="ri-heart-fill"></i></span><span>Sevimli resurslar ro'yxatiga qo'shish</span></a>
                                   </div>
                                   <div class="iq-social d-flex align-items-center">
                                    <h5 class="mr-2">Share:</h5>
                                    <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                       <li>
                                          <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                       </li>
                                       <li>
                                          <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                       </li>
                                       <li>
                                          <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                       </li>
                                       <li>
                                          <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                                </div>
                             </div>
                          </div>
                          @else
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
                                      <th scope="row">NASHRIYOT:</th>
                                      <td>{{ $book->nashriyot_nomi }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">JOYLANGAN BO'LIMI:</th>
                                      <td>{{ $book->BookCategory->title }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">MUALLIF(LAR):</th>
                                      <td class="text-primary">
                                       @if (count($book->authors) == 1 && $book->authors[0]->status == '1')
                                       <a href="{{route('dashboard.library-author-books', $book->authors[0]->slug)}}">{{$book->authors[0]->fish}}</a>
                                       @else
                                             @foreach ($book->authors as $index=>$author)
                                                @if ($author->status == '1')
                                                   <a href="{{ route('dashboard.library-author-books', $author->slug)}}">{{ $author->fish }}</a>@if ($index+1 != count($book->authors)), @endif
                                                @endif
                                             @endforeach
                                       @endif
                                   
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">KITOB YOZILGAN TIL:</th>
                                      <td><span class="badge badge-pill border border-dark text-dark">{{ $book->yozilgan_tili }} (tilida yozilgan)</span></td>
                                    </tr>
                                   
                                    {{-- <tr>
                                      <th scope="row">MAVZU NOMI:</th>
                                      <td>{{ $book->gmd_name }}</td>
                                    </tr>                                   --}}
                                    <tr>
                                      <th scope="row">QAYSI KUTUBXONA:</th>
                                      <td>TVCHDPI ARM fondi</td>
                                    </tr>
                                  </tbody>
                                </table>     

                                 <div class="mb-4 d-flex align-items-center">                                       
                                    <a href="#" class="btn btn-primary view-more mr-2">Kitob</a>
                                    <a href="#" class="btn btn-primary view-more mr-2">Ertak</a>
                                 </div>
                                 <div class="mb-3">
                                    <a href="book-page.html#" class="text-body text-center"><span class="avatar-30 rounded-circle bg-primary d-inline-block mr-2"><i class="ri-heart-fill"></i></span><span>Sevimli resurslar ro'yxatiga qo'shish</span></a>
                                 </div>
                                 <div class="iq-social d-flex align-items-center">
                                  <h5 class="mr-2">Share:</h5>
                                  <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                     </li>
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                     </li>
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                     </li>
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true" style="margin-top: 30%;"></i></a>
                                     </li>
                                  </ul>
                               </div>
                              </div>
                           </div>
                        </div>
                        @endif


                         


                       </div>
                    </div>
                 </div>
              </div>

              {{-- Kitobni copyalari haqida ro'yxat --}}
              @if ($book->book_or_article == "book")
                  @include('library.components.book_copyes_in_book')
              @endif
             

              {{-- Mavzuga o'xshash resurslar ro'yxat --}}
              @include('library.components.oxshash_resurslar')

              {{-- Ko'p ko'rilgan resurslar ro'yxat --}}
              {{-- @include('library.components.mashxur_resurslar') --}}
             
              
           </div>
        </div>
     </div>
    @endsection