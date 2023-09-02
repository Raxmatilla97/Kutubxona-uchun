<div class="col-lg-6">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between mb-0">
          <div class="iq-header-title">
             <h4 class="card-title">O'qish tafsiya etiladigan kitob</h4>
          </div>        
       </div>
       @foreach($eng_kop_oqilgan_kitob as $item)
       <div class="iq-card-body">
          <div class="row align-items-center">
             <div class="col-sm-5 pr-0">
                <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('assets/images/book-test.webp')}}" alt=""></a>
             </div>
             <div class="col-sm-7 mt-3 mt-sm-0">
                <h4 class="mb-2">{{ $item->title }}</h4>
                <p class="mb-2">Muallif: {{ $item->mualif }}</p>
                <div class="mb-2 d-block">
                   <span class="font-size-12 text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                   </span>
                </div>
                <span class="text-dark mb-3 d-block">{{ substr($item->notes, 0,  180) }}...</span>
                <button type="submit" class="btn btn-primary learn-more">Learn More</button>
             </div>
          </div>
       </div>
       @endforeach
    </div>
 </div>
 <div class="col-lg-6">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
       <div class="iq-card-header d-flex justify-content-between mb-0">
          <div class="iq-header-title">
             <h4 class="card-title">Kitobxon talabalar</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">
             <button class="btn w-100 btn-primary mt-0 view-more" type="button">Barcha talabalar</button>
          </div>
       </div>
       <div class="iq-card-body">
          <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
            @foreach($sortedStudents as $item )
            <li class="col-sm-6 d-flex mb-3 align-items-center">
                <div class="icon iq-icon-box mr-3">
                   <a href="javascript:void();"><img class="img-fluid avatar-60 rounded-circle" src="{{ $item->img}}" alt=""></a>
                </div>
                <div class="mt-1">
                  @php
                     $fullName = $item->fish;
                     $words = explode(' ', $fullName);
                     $requiredWords = array_slice($words, 0, 2);
                     $remainingWords = implode(' ', array_slice($words, 2));
                  @endphp
                  <h6>{{ implode(' ', $requiredWords) }}</h6>
                  <p class="mb-0 text-primary">O'qigan kitoblar soni: <span class="text-body">{{ $item->bookCount }}</span></p>
                </div>
            </li>
            @endforeach
          </ul>
       </div>
    </div>
 </div>