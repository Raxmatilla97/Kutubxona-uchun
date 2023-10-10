@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
        <div class="navbar-breadcrumb">
            <h5 class="mb-0">Kutubxona resurslari</h5>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Bosh sahifa</li>
                    <li class="breadcrumb-item" aria-current="page">ARM boshqaruvi</li>    
                    <li class="breadcrumb-item active" aria-current="page">Kitoblar ro'yxati</li>                
                </ul>
            </nav>
        </div>   
    @endpush


    <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">ARM kitoblar ro'yxati</h4>
                        </div>
                     </div>
                     @if(session()->has('success'))
                     <div class="flex items-center ml-5 mr-5 mt-4 p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 " role="alert">
                      <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                      </svg>
                      <span class="sr-only">Xabar</span>
                      <div>
                        <span class="font-medium">Bildirishnoma!</span> {{ session()->get('success') }}
                      </div>
                    </div>
                    @endif    
                    
                    {{-- @if(session()->has('error'))
                    <div class="flex items-center ml-5 mr-5 mt-4 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
                     <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                       <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                     </svg>
                     <span class="sr-only">Xabar</span>
                     <div>
                       <span class="font-medium">Bildirishnoma!</span> {{ session()->get('success') }}
                     </div>
                   </div>
                   @endif                   --}}
                 
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Qidirish" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              {{-- <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="iq-bg-primary" href="javascript:void();">
                                       Print
                                     </a>
                                    <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a>
                                   </div>
                              </div> --}}
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>     
                                    <th>Muqova</th>                            
                                    <th>Kitobni nomlanishi</th>
                                    <th>Aktivligi</th>       
                                    <th>Nashriyot</th>
                                    <th>ISBN</th>   
                                                             
                                    <th>Nashr yili</th>            
                                    <th>Amal</th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach($books as $book)
                                  <tr>   
                                    <td> <img src="{{'/storage'}}/{{$book->image}}" alt="{{ $book->title }}" style="width: 50px"></td>                               
                                    <td class="text-blue-600">{{ $book->title }}</td>
                                    <td>
                                      @if($book->status == '1')
                                        <span class="badge iq-bg-primary">Aktiv!</span>
                                      @else
                                     <span class="badge iq-bg-danger">Aktiv emas!</span>
                                      @endif
                                    
                                    </td>   
                                    <td>{{ $book->nashriyot_nomi }}</td>
                                    <td>{{ $book->isbn_issn }}</td>                                                              
                                    <td>{{ $book->chiqarilgan_yili }}</td>
                                  
                                            
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary"  data-toggle="modal" data-target="#exampleModalCenteredScrollable" data-placement="top" title="" data-original-title="Nusxa qo'shish" href="#"><i class="ri-user-add-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tahrirlash" href="{{ route('dashboard.arm-resurslari.edit', $book->slug ) }}"><i class="ri-pencil-line"></i></a>
                                          <form action="{{ route('dashboard.arm-resurslari.destroy', $book->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="book_id" value="{{$book->id}}">
                                            <a class="iq-bg-primary mt-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="O'chirish" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="ri-delete-bin-line"></i></a>
                                        </form>
                                        
                                       </div>
                                    </td>
                                 </tr> 

                                 @include('library.components.create_book_copy')
                                 
                                @endforeach                        
                             </tbody>
                           </table>
                        </div>
                                           
                             <div class="mt-4">
                                {!! $books->appends(Request::except('page'))->render() !!}
                             </div>
                                
                             
                      </div>
                  
                  </div>
            </div>
         </div>
      </div>
   </div>

 

 @endsection