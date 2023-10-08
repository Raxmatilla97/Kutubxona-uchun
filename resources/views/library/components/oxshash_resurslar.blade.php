<div class="col-lg-12">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
          <div class="iq-header-title">
             <h4 class="card-title mb-0">O'xshash resurslar</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">
             <a href="{{ route('library.resurs-list') }}" class="btn btn-sm btn-primary view-more">Barchasini ko'rish</a>
          </div>
       </div>
       <div class="iq-card-body single-similar-contens">
          <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
            @foreach($oxshashResurslar as $item)
            <li class="col-md-3">
                <div class="row align-items-center">
                   <div class="col-5">
                      <div class="position-relative image-overlap-shadow">
                         <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{$item->image}}" alt=""></a>
                         <div class="view-book">
                            <a href="{{ route('library.library-book-detal', $item->slug )}}" class="btn btn-sm btn-white">Resursni ko'rish</a>
                         </div>
                      </div>
                   </div>
                   <div class="col-7 pl-0">
                    <div class="mb-1">                                          
                        <h6 class="mb-1" style="-webkit-line-clamp: 4;">{{ $item->title }}</h6>
                
                        <p class="font-size-13 line-height mb-1">{{ $item->mualif}}</p>
           
                    </div>
                    <div class="price d-flex align-items-center mt-3">                     
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
             </li>
            @endforeach   
          </ul>
       </div>
    </div>
 </div>