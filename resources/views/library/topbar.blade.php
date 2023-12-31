 <!-- TOP Nav Bar -->
 <div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-menu-bt d-flex align-items-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
             <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="{{'/'}}" class="header-logo">
                   <img src="{{ asset('assets/images/112-book-morph.gif')}}" class="img-fluid rounded-normal" alt="">
                   <div class="logo-title">
                      <span class="text-primary text-uppercase">Booksto</span>
                   </div>
                </a>
             </div>
          </div>
          @stack('breadcrumb')          
          @push('breadcrumb')
          <div class="navbar-breadcrumb">
            <h5 class="mb-0">Asosiy sahifa</h5>
            <nav aria-label="breadcrumb">
               <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Umumiy resurslar sahifasi</li>                     
               </ul>
            </nav>
            </div>          
          @endpush
          <div class="iq-search-bar">             
               <form action="{{ route('library.resurs-search') }}" method="POST"  class="searchbox">
                  @csrf
                  @method('POST')
               <input type="text" name="text" value="{{ request('text') ? request('text') : '' }}" class="text search-input" placeholder="Bu yerdan qidiring...">
                <a class="search-link" href="$"><i class="ri-search-line"></i></a>
             </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
          <i class="ri-menu-3-line"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto navbar-list">
                <li class="nav-item nav-icon search-content">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                      <i class="ri-search-line"></i>
                   </a>                   
                     <form action="{{ route('library.resurs-search') }}" method="POST" class="search-box p-0">
                        @csrf
                        @method('POST')
                      <input type="text" name="text" value="{{ request('text') ? request('text') : '' }}" class="text search-input" placeholder="Qidirish uchun bu yerga yozing...">
                      <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                   </form>
                </li>
                <li class="nav-item nav-icon">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                   <i class="ri-notification-2-line"></i>
                   <span class="bg-primary dots"></span>
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">Barcha bildirishnomalar<small class="badge  badge-light float-right pt-1">4</small></h5>
                            </div>

                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('assets/images/user/01.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Emma Watson Barry</h6>
                                     <small class="float-right font-size-12">Just Now</small>
                                     <p class="mb-0">95 MB</p>
                                  </div>
                               </div>
                            </a>
                           
                         </div>
                      </div>
                   </div>
                </li>
                <li class="nav-item nav-icon dropdown">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                   <i class="ri-mail-line"></i>
                   <span class="bg-primary dots"></span>
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">Barcha xabarlar<small class="badge  badge-light float-right pt-1">1</small></h5>
                            </div>
                            
                            <a href="#" class="iq-sub-card">
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('assets/images/user/01.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Barry Emma Watson</h6>
                                     <small class="float-left font-size-12">13 Jun</small>
                                  </div>
                               </div>
                            </a>
                        
                         </div>
                      </div>
                   </div>
                </li>
                <li class="nav-item nav-icon dropdown">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                   <i class="ri-shopping-cart-2-line"></i>
                   <span class="badge badge-danger count-cart rounded-circle">1</span>
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 toggle-cart-info">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">Sizdagi kitoblar<small class="badge  badge-light float-right pt-1">1</small></h5>
                            </div>
                            <a href="#" class="iq-sub-card">
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="rounded" src="{{ asset('assets/images/cart/01.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Night People book</h6>
                                     <p class="mb-0">$32</p>
                                  </div>
                                  <div class="float-right font-size-24 text-danger"><i class="ri-close-fill"></i></div>
                               </div>
                            </a>

                       
                            <div class="d-flex align-items-center text-center p-3">
                               <a class="btn btn-primary mr-2 iq-sign-btn" href="#" role="button">Olgan kitoblarim haqida</a>
                            
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="line-height pt-3">
                   <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                      <img src="{{ asset('assets/images/avatar.png')}}" class="img-fluid rounded-circle mr-3" alt="user">
                      <div class="caption">
                         <h6 class="mb-1 line-height">{{ Auth::user()->name }}</h6>
                         <p class="mb-0 text-primary">Online</p>
                      </div>
                   </a>
                   <div class="iq-sub-dropdown iq-user-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                              @php
                                 $firstName = explode(' ', Auth::user()->name)[0];
                              @endphp
                               <h5 class="mb-0 text-white line-height">Salom {{ $firstName }}</h5>
                               <span class="text-white font-size-12">Talaba: TSMG/12/3</span>
                            </div>
                            <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-file-user-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Mening profilim</h6>
                                     <p class="mb-0 font-size-12">Shaxsiy ma'lumotlarni ko'rish.</p>
                                  </div>
                               </div>
                            </a>
                            <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-profile-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Profilni tahrirlash</h6>
                                     <p class="mb-0 font-size-12">Shaxsiy ma'lumotlarni o'zgartirish.</p>
                                  </div>
                               </div>
                            </a>
                            <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-account-box-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Olingan kitoblar</h6>
                                     <p class="mb-0 font-size-12">Olgan kitoblaringiz haqida ma'lumotlar.</p>
                                  </div>
                               </div>
                            </a>
                            {{-- <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-lock-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Privacy Settings</h6>
                                     <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                  </div>
                               </div>
                            </a> --}}
                            <div class="d-inline-block w-100 text-center p-3">
                              <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-responsive-nav-link :href="route('logout')"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      <button class="bg-primary iq-sign-btn">Chiqish</button>
                  </x-responsive-nav-link>
              </form>
                               {{-- <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Chiqish<i class="ri-login-box-line ml-2"></i></a> --}}
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
             </ul>
          </div>
       </nav>
    </div>
 </div>
 <!-- TOP Nav Bar END -->