<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between" style="padding-top: 17px; padding-bottom: 15px;">
                   <div class="iq-header-title">
                      <h4 class="card-title">Kitobning kutubxonadagi mavjud nusxalari soni: <span class="badge badge-primary">{{ $result_count }}</span></h4>
                   </div>
                   <div class="col-sm-16 col-md-4">
                    <div id="user_list_datatable_info" class="dataTables_filter">
                       <form class="mr-3 position-relative">
                          <div class="form-group mb-0">
                             <input type="search" class="form-control" id="exampleInputSearch" placeholder="Qidirish..." aria-controls="user-list-table">
                          </div>
                       </form>
                    </div>
                 </div>
                </div>
                
                <div class="iq-card-body">
                   <div class="table-responsive">                    
                      <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                            <tr>
                               <th>№</th>
                               <th>Kitob inventar raqami</th>
                               <th>Holati</th>
                               <th>Talaba F.I</th>
                               <th>Kitob olingan vaqt</th>  
                               <th>Qaytarish vaqti</th>
                               <th>Qaytarilgan vaqt</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                              $i = 1;    
                           @endphp
                           @foreach ($bookCopies as $item)
                           <tr>
                             
                              <td class="text-center">{{$i++}}</td>
                              <td class="text-center">{{ $item['inventor_number'] }}</td>                            
                              <td class="text-center">
                                 @if ($item['isset_book'] == 0)
                                 <span class="badge badge-danger">Kitob o'quvchida</span>
                                 @else
                                    <span class="badge iq-bg-primary">Kitob kutubxonada</span>
                                 @endif                                
                              </td>
                              <td @if($item['isset_book'] == 1) style="opacity: 30%; text-decoration: line-through;" @endif><img class="rounded img-fluid avatar-40 mr-3" src="{{ asset('assets/images/user/01.jpg')}}" alt="profile">{{ $item['student_name'] }}</td>                              
                              <td @if($item['isset_book'] == 1) style="opacity: 30%; text-decoration: line-through;" @endif class="text-center">{{ $item['kitob_olingan_vaqt'] }}</td>              
                              <td @if($item['isset_book'] == 1) style="opacity: 30%; text-decoration: line-through;" @endif class="text-center">{{ $item['kitob_qaytarilgan_vaqt'] }}</td>                              
                              <td class="text-center">{{ $item['kitob_qaytarish_kerak_bolgan_vaqt'] }}</td>
                           </tr>
                           @endforeach
                            
                       
                        </tbody>
                      </table>
                   </div>
                   <div class="row justify-content-between mt-3">
                     <div class="col-md-6" id="user-list-page-info">
                         <span> {{ $bookCopies->total() }} ta natijadan {{ $bookCopies->firstItem() }} dan {{ $bookCopies->lastItem() }} gacha ko'rsatilmoqda</span>
                     </div>
                     <div class="col-md-6">
                         <nav aria-label="Page navigation example">
                             <ul class="pagination justify-content-end mb-0">
                                 <li class="page-item {{ $bookCopies->previousPageUrl() ? '' : 'disabled' }}">
                                     <a class="page-link" href="{{ $bookCopies->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ !$bookCopies->previousPageUrl() }}">Oldingisi</a>
                                 </li>
                                 @foreach ($bookCopies->getUrlRange(1, $bookCopies->lastPage()) as $page => $url)
                                     <li class="page-item {{ $page == $bookCopies->currentPage() ? 'active' : '' }}">
                                         <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                     </li>
                                 @endforeach
                                 <li class="page-item {{ $bookCopies->nextPageUrl() ? '' : 'disabled' }}">
                                     <a class="page-link" href="{{ $bookCopies->nextPageUrl() }}">Keyingisi</a>
                                 </li>
                             </ul>
                         </nav>
                     </div>
                  </div>
               </div>
            </div>
       </div>
    </div>
 </div>