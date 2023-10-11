@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
        <div class="navbar-breadcrumb">
            <h5 class="mb-0">Kutubxona resurslari</h5>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Bosh sahifa</li>
                    <li class="breadcrumb-item" aria-current="page">ARM boshqaruvi</li>    
                    <li class="breadcrumb-item active" aria-current="page">Kitobga nusxa qo'shish</li>                
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
                           <h4 class="card-title">Kitobga nusxa qo'shish sahifasi - <b class="text-blue-600">{{$book->title}}</b></h4>
                        </div>
                     </div>                  

                    @if (session('copySuccess'))      
                    <div class="alert text-white m-auto" role="alert" style="width: 700px; background-color: #0dd6b8; margin-top: 40px!important;">
                       <div class="iq-alert-icon">
                          <i class="ri-alert-line"></i>
                       </div>
                       <div class="iq-alert-text"><p class="text-sm" style="margin-bottom: 0.5rem; font-size: 16px;">{{ session('copySuccess') }}</p>
                             
                       </div>                                                               
                     </div>                     
                     @endif
                   
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
                            
                           </div>

                           @if ($errors->any())
                            <div class="alert text-white  w-50 m-auto" style="background-color: #e2634d" role="alert">
                               <div class="iq-alert-icon">
                                  <i class="ri-information-line"></i>
                               </div>
                               <div class="iq-alert-text">
                                  <h4 class="text-center text-lg mb-2 mt2 text-white">Muommolarni hal qilib qayta urunib ko'ring!</h4>
                                  <ol>
                                     @php
                                        $i = 1;
                                     @endphp
                                     @foreach ($errors->all() as $error)
                                           <li>{{$i++}} - {{ $error }}</li>
                                     @endforeach                                          
                                  </ol>
                               </div>
                            </div>
                            @endif

                           <div class="flex justify-between mb-4">
                            <a href="{{ route('dashboard.arm-resurslari.edit', $book->slug)}}"><button type="button" class="btn mb-3 btn-warning rounded-pill"><i class="ri-reply-line"></i>Kitobga qaytish</button></a>
                           
                            <button data-toggle="modal" data-target="#exampleModalCenteredScrollable" type="button" class="btn-lg mb-3 btn-primary "><i class="ri-bill-fill"></i>Kitobga nusxa yaratish</button>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>     
                                    <th>№</th>
                                    <th>Muqova</th>                            
                                    <th>Inventar raqam</th>
                                    <th>Aktivligi</th>  
                                    <th>Holati</th>
                                    <th>Amal</th>
                                 </tr>
                             </thead>
                             <tbody>
                              @php
                                  $i = 1;
                              @endphp
                                @foreach($book_copy as $copy)
                                  <tr>  
                                    <td>{{$i++}}</td>
                                    <td> <img src="{{'/storage'}}/{{$copy->book->image}}" alt="{{ $copy->book->title }}" style="width: 50px"></td>                               
                                    <td>{{ $copy->inventor_number }}</td>
                                    <td>
                                      @if($copy->status == 'aktive')
                                        <span class="badge iq-bg-primary">Aktiv!</span>
                                      @else
                                     <span class="badge iq-bg-danger">Aktiv emas!</span>
                                      @endif
                                    
                                    </td>   
                                    

                                    <td>                                      
                                       <div class="flex justify-center">
                                          @if($copy->isset_book == '1')
                                              <span class="badge iq-bg-success">Kitob kutubxonada!</span>
                                          @else
                                              <span class="badge iq-bg-primary"> 
                                                  @if($copy->bookStudents->count() > 0)
                                                      @foreach($copy->bookStudents as $bookStudent)
                                                      <img src="{{'/assets/images/1434240.png'}}" style="width: 50px; margin: auto;" class="mb-2">  {{$bookStudent->student->fish}}
                                                      @endforeach
                                                  @else
                                                      Noaniq!
                                                  @endif
                                              </span>
                                          @endif
                                      </div>
                                      
                                    </td>  
                                                         
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nusxa qo'shish" href="#"><i class="ri-user-add-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tahrirlash" href="#"><i class="ri-pencil-line"></i></a>
                                          <form action="{{route('dashboard.kitob-nusxalari.destroy', $copy->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')  
                                            <input type="hidden" name="book_copy_id" value="{{$copy->id}}">                                        
                                            <a class="iq-bg-primary mt-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="O'chirish" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="ri-delete-bin-line"></i></a>
                                        </form>
                                        
                                       </div>
                                    </td>
                                 </tr> 
                                @endforeach                        
                             </tbody>
                           </table>
                        </div>
                                           
                             <div class="mt-4">
                                {!! $book_copy->appends(Request::except('page'))->render() !!}
                             </div>
                                
                             
                      </div>
                  
                  </div>
            </div>
         </div>
      </div>
   </div>


   
   <div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Yangi muallif qo'shish formasi</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
           
            <div class="modal-body">     
               <form action="{{ route('dashboard.kitob-nusxalari.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')                         
                  <div class="form-group">
                     <label for="book_id">Qaysi kitobga nusxa sifatida belgilanganligi:</label>
                     <input type="text" class="form-control" id="book_id" disabled value="{{ $book->title}}">
                     <input type="hidden" name="book_id" value="{{ $book->id}}">
                  
                  </div>                                  
         
                  <div class="form-group">
                     <label for="inventor_number" class="block text-sm font-medium @if($errors->has('inventor_number')) text-red-700 @else text-gray-700 @endif">Bog'lanish uchun telefon raqamiz (shaxsiy)</label>
                     <div class="relative rounded-md shadow-sm mt-1">                      
                        <input type="text" id="inventor_number" name="inventor_number"  onkeydown="if (event.key === '-' || event.key === ',' || event.key === 'E' || event.key === 'e' || event.key === '.') event.preventDefault();"  class="w-full pl-10 rounded-md text-sm @if($errors->has('inventor_number')) border-red-300
                        focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="INV-123456" value="{{ old('inventor_number') }}">
                     </div>
                     @if($errors->has('inventor_number'))
                     <p class="mt-2 text-sm text-red-600">
                        @error('inventor_number'){{ $message }}@enderror
                     </p>
                     @endif
                  </div>                 
                  
                  <div class="form-group">
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="isset_book" autocomplete="off" value="1" checked  name="isset_book" {{ old('isset_book') ? 'checked' : '' }}>
                        <label class="form-check-label" for="isset_book">Kitob kutubxonada bormi?</label>
                        @error('isset_book')
                        <small class="error-text form-text">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="status">Resurs bo'limini tanlang: <b class="text-red-600">*</b></label>
                     <select class="form-control" name="status" id="status" required>                                                                                                    
                        <option value="aktive" {{ old('status') === 'aktive' ? 'selected' : '' }}>Aktiv resurs</option>
                        <option value="korinmas" {{ old('status') === 'korinmas' ? 'selected' : '' }}>Ko'rinmas resurs</option>
                     
                     </select>
                  </div>                                   
               
               
                  <div class="modal-footer">
                  
                     <button type="submit" class="btn btn-primary">Yaratish</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
 @endsection