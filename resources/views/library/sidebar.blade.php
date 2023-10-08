  <!-- Sidebar  -->
  <div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="{{'/library'}}" class="header-logo">
          <img src="{{ asset('assets/images/112-book-morph.gif')}}" class="img-fluid rounded-normal" alt="">
          <div class="logo-title">
             <span class="text-primary text-uppercase">CSPU LIBRARY</span>
          </div>
       </a>
       <div class="iq-menu-bt-sidebar">
          <div class="iq-menu-bt align-self-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
          </div>
       </div>
    </div>
    @php
    $isActiveLibraryRoute = request()->routeIs([
        'library.library-books',
        'library.resurs-list',
        'library.library-articles',
        'library.library-authors'
    ]);
   @endphp
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="@if($isActiveLibraryRoute) active @endif">
                <a href="#library" class="iq-waves-effect collapsed" data-toggle="collapse"  @if($isActiveLibraryRoute) aria-expanded="true" @else aria-expanded="false" @endif><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Kutubxona</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="library" class="iq-submenu collapse  @if($isActiveLibraryRoute) show @endif" data-parent="#iq-sidebar-toggle">
                  <li class="@if(request()->routeIs('library.resurs-list')) active @endif"><a href="{{ route('library.resurs-list')}}"><i class="las la-house-damage"></i>Barcha resurslar</a></li>
                  <li class="elements">
                     <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-function-line"></i><span>Bo'limlar</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="sub-menu" class="iq-submenu collapse" data-parent="#library">
                        @foreach ($list_category as $item)
                           <li><a href="{{ route('library.library-books-category', $item->slug)}}" class="tag-list"><i class="las la-database"></i>{{$item->title}}</a></li>
                           <hr style="margin-top: 0px; margin-bottom: 0px">
                        @endforeach 
                     </ul>
                  </li>                 
                  <li class="@if(request()->routeIs('library.library-books')) active @endif"><a href="{{ route('library.library-books') }}"><i class="ri-book-line"></i>Kitoblar</a></li>
                  <li class="@if(request()->routeIs('library.library-articles')) active @endif"><a href="{{ route('library.library-articles')}}"><i class="ri-book-line"></i>Maqolalar</a></li>
                  <li class="@if(request()->routeIs('library.library-authors')) active @endif"><a href="{{ route('library.library-authors')}}"><i class="ri-file-pdf-line"></i>Mualiflar</a></li>  
                  <li class="elements">
                     <a href="#sub-menu1" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-pdf-line"></i><span>Kalit so'zlar</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="sub-menu1" class="iq-submenu collapse" data-parent="#library">                       
                        <li><a href="#" class="tag-list"><i class="las la-key"></i>Kalit so'zlar</a></li>     
                        <li><a href="#" class="tag-list"><i class="las la-key"></i>Kalit so'zlar2</a></li>                     
                     </ul>
                  </li> 
                  <li><a href="#"><i class="ri-heart-line"></i>Menga yoqqan</a></li>   
                  <style>
                    
                     .tag-list {
                        font-size: 14px!important;
                        padding-top: 7px!important;
                        padding-bottom: 7px!important;
                        text-wrap: wrap!important;
                     }
                  </style>
                </ul>
             </li>
             @php
             $isActiveDashboardRoute = request()->routeIs([
                 'dashboard.arm-resurslari.index',
                 'dashboard.arm-resurslari.create' 
             ]);
            @endphp
            <style>
               .active-menu2 {
                  color: var(--iq-primary)!important;
                  border-radius: 0;
               }
            </style>
            <li @if($isActiveDashboardRoute) active @endif>
               <a href="#dashboard" class="iq-waves-effect collapsed" data-toggle="collapse" @if($isActiveDashboardRoute) aria-expanded="true" @else aria-expanded="false" @endif><i class="lab la-elementor iq-arrow-left"></i><span>ARM Boshqaruv</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
               <ul id="dashboard" class="iq-submenu collapse  @if($isActiveDashboardRoute) show @endif" data-parent="#iq-sidebar-toggle"> 
                  <li class="form">
                     <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" @if($isActiveDashboardRoute) aria-expanded="true" @else aria-expanded="false" @endif><i class="lab la-wpforms"></i><span>ARM Resurslari</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>                  
                     <ul id="forms" class="iq-submenu collapse  @if($isActiveDashboardRoute) show @endif" data-parent="#dashboard">
                        <li><a class="@if(request()->routeIs('dashboard.arm-resurslari.create')) active-menu2 @endif "href="{{ route('dashboard.arm-resurslari.create')}}"><i class="ri-book-line"></i>Kitob yaratish</a></li>                        
                        <li><a class="@if(request()->routeIs('dashboard.arm-resurslari.index')) active-menu2 @endif" href="{{ route('dashboard.arm-resurslari.index')}}"><i class="las la-book"></i>Kitoblar ro'yxati</a></li>
                        <li><a href="#"><i class="ri-book-line"></i>Kitob nusxalar ro'yaxati</a></li>
                        <li><a href="#"><i class="ri-book-line"></i>Maqola yaratish</a></li>    
                        <li><a href="#"><i class="las la-edit"></i>maqolalar ro'yxati</a></li>                                        
                        <li><a href="#"><i class="las la-edit"></i>Resurslar bo'limlari</a></li>   
                        <li><a href="#"><i class="las la-edit"></i>Mualliflar ro'yxati</a></li>   
                     </ul>
                  </li>
                  <li>
                     <a href="#kirobOldiBerdi" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="ri-archive-drawer-line"></i>
                        <span>ARM Kitob oldi-berdisi</span><i class="ri-arrow-right-s-line iq-arrow-right">
                        </i>
                     </a>

                     <ul id="kirobOldiBerdi" class="iq-submenu collapse" data-parent="#dashboard">
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Talabaga kitob berish</a></li>
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Talabalar ro'yxati</a></li>                     
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Talabadan kitob olish</a></li>
                        <li><a href="form-wizard-validate.html"><i class="ri-clockwise-2-line"></i>ARMdan kitob olganlar</a></li>
                        <li><a href="form-wizard-vertical.html"><i class="ri-anticlockwise-line"></i>ARMga kitob qaytarganlar</a></li>
                        <li><a href="form-wizard-vertical.html"><i class="ri-anticlockwise-line"></i>Qaytarish vaqti o'tganlar</a></li>
                     </ul>
                  </li>

                  <li>
                     <a href="#arm-faoliyati" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="ri-archive-drawer-line"></i>
                        <span>ARM faoliyati</span><i class="ri-arrow-right-s-line iq-arrow-right">
                        </i>
                     </a>

                     <ul id="arm-faoliyati" class="iq-submenu collapse" data-parent="#dashboard">
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>ARMlar</a></li>
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Hodimlar</a></li>                     
                        <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Talabadan kitob olish</a></li>
                      
                     </ul>
                  </li>
               </ul>

            </li>


          </ul>
       </nav>
       <div id="sidebar-bottom" class="p-3 position-relative">
          <div class="iq-card">
             <div class="iq-card-body">
                <div class="sidebarbottom-content">
                   <div class="image"><img src="{{ asset('assets/images/02.gif')}}" alt=""></div>                           
                   <button type="submit" class="btn w-100 btn-primary mt-4 view-more">Become Membership</button>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>