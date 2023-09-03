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
                <div class="col-lg-12">                    
                    <form action="#" >
                        <div class="iq-card-transparent mb-0">
                            <div class="d-block text-center">
                                <h2 class="mb-3">Kitob va maqolalar qidirish</h2>    
                                <div class="w-100 iq-search-filter">
                                    <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                            <div class="form-group mb-0">
                                                <select class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect1">
                                                    <option selected="">Barchasi</option>
                                                    <option>Kitoblar</option>
                                                    <option>Maqolalar</option>                                                   
                                                </select>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                            <div class="form-group mb-0">
                                                <select class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect2">
                                                    <option selected="">Bo'limni tanlang</option>
                                                    @foreach ($list_category as $item)
                                                    <option value="{{ $item->slug }}">{{ $item->title }}</option>   
                                                    @endforeach                                                                             
                                                </select>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                            <div class="form-group mb-0">
                                                @php
                                                    $currentYear = date('Y');
                                                    $startYear = 1991;
                                                    $endYear = $currentYear;
                                                @endphp
                                            
                                            <select class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect3">                                  
                                                @for ($year = $endYear; $year >= $startYear; $year--)
                                                    <option {{ $currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endfor
                                            </select>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                            <div class="form-group mb-0">
                                                <select class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect4">
                                                    <option selected="">Mualliflar A-Z</option>                                        
                                                </select>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-search-bar search-book d-flex align-items-center ">
                                                <div class="searchbox">
                                                    <input type="text" class="text search-input" placeholder="Bu yerdan qidiring...">
                                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>       
                                                </div>                  
                                            <button type="submit" class="btn btn-primary search-data ml-2">Qidirish</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </form>   

                 <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Barcha kutubxona resurslari (Kitoblar, Maqolalar)</h4>
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
                                                <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ $item->image }}" alt=""></a>
                                                <div class="view-book">
                                                <a href="book-page.html" class="btn btn-sm btn-white">
                                                    @if ($item->book_or_article == 'book')
                                                        Kitobni ko'rish
                                                    @else
                                                        Maqolani ko'rish
                                                    @endif
                                                </a>
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
                                                    <img id="animated-gif" style="width: 25px;" src="{{ asset('assets/images/eye.png')}}">
                                                    {{$item->korishlar_soni}} - ko'rilgan
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            @endforeach  
                       </div>
                       <hr>
                       <div class="mt-6 mb-6">
                            {!! $all_books->links() !!}
                       </div>                       
                    </div>                    
                 </div>                
              </div>
            
              
           </div>
        </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(document).ready(function() {
             var selectElement = $('#exampleFormControlSelect4');

             // AJAX so'rovini yuborish
             $.ajax({
                 url: '/get-authors', // Ma'lumotlar bazasiga murojaat qiladigan URL
                 type: 'GET',
                 dataType: 'json',
                 success: function(response) {
                     // Ma'lumotlar bazasidan qaytgan javobni qabul qilish
                     var authors = response.authors;

                     // Select elementiga avtor nomlarini qo'shish
                     $.each(authors, function(index, author) {
                         selectElement.append('<option>' + author + '</option>');
                     });
                 },
                 error: function(xhr, status, error) {
                     // Xatolik holatida xabar chiqarish
                     console.log(error);
                 }
             });
         });
     </script>
@endsection