<div class="col-lg-12">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
          <div class="iq-header-title">
             <h4 class="card-title mb-0">Ko'p o'qilgan kitoblar</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">
             <a href="category.html" class="btn btn-sm btn-primary view-more">Barchasini ko'rish</a>
          </div>
       </div>                         
       <div class="iq-card-body favorites-contens">
          <ul id="favorites-slider" class="list-inline p-0 mb-0 row">
            @foreach ($kitoblar as $item)
            <li class="col-md-4">
               <div class="d-flex align-items-center">
                  <div class="col-5 p-0 position-relative">
                     <a href="javascript:void();">
                        <img src="{{ asset('assets/images/book-test3.webp')}}" class="img-fluid rounded w-100" alt="">
                     </a>                                
                  </div>
                  <div class="col-7">
                     <h5 class="mb-2">{{ $item->title }}</h5>
                     <p class="mb-2">Muallif : {{ $item->mualif }}</p>                                          
                     <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                        <span>O'qilgan</span>
                        <span class="mr-4">{{$item->oqish_foizi }}%</span>
                     </div>
                     <div class="iq-progress-bar-linear d-inline-block w-100">
                        <div class="iq-progress-bar iq-bg-primary">
                           <span class="bg-primary" data-percent="{{$item->oqish_foizi }}"></span>
                          
                        </div>
                     </div>
                     <a href="#" class="text-dark">Kitobni ko'rish<i class="ri-arrow-right-s-line"></i></a>
                  </div>
               </div>
            </li> 
            @endforeach
            
           
          </ul>
       </div>
    </div>
 </div>