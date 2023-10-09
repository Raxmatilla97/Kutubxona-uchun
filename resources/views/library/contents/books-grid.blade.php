<div class="col-lg-12">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
          <div class="iq-header-title">
             <h4 class="card-title mb-0">Kutubxona adabiyotlari</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">                              
             <a href="{{ route('library.library-books')}}" class="btn btn-sm btn-primary view-more">Barchasini ko'rish</a>
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
                                <a href="{{ route('library.library-book-detal', $item->slug )}}"><img class="img-fluid rounded w-100" src="{{'/storage'}}/{{ $item->image }}" alt=""></a>
                                <div class="view-book">
                                <a href="{{ route('library.library-book-detal', $item->slug )}}" class="btn btn-sm btn-white">Kitobni ko'rish</a>
                                </div>
                            </div>
                            <div class="col-6" >
                                <div class="mb-1">                                          
                                <h6 class="mb-1" style="-webkit-line-clamp: 4;">{{ $item->title }}</h6>
                            
                                <p class="font-size-13 line-height mb-1">{{ $item->mualif}}</p>
                                <div class="d-block line-height mb-2 mt-2">
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
                                <h6 class="mb-2 mr-2">
                                    @if ($item->book_or_article == 'book')
                                    <span class="badge badge-pill border border-primary text-primary">KITOB</span>
                                    @else
                                    <span class="badge badge-pill border border-secondary text-secondary">MAQOLA</span>
                                    @endif
                                    -
                                    <b>{{$item->chiqarilgan_yili}}y</b>
                                </h6>
                                </div>
                                <div style="font-size: 14px">
                                    <img id="animated-gif" style="width: 25px; display: inline-block;" src="{{ asset('assets/images/eye.png')}}">
                                    {{$item->korishlar_soni}} - ko'rilgan
                                
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