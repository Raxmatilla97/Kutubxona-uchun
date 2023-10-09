@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Mualiflar ro'yxati</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Bosh sahifa</li>              
                <li class="breadcrumb-item active" aria-current="page">Mualiflar ro'yxati</li>                  
            </ul>
        </nav>
    </div>          
    @endpush 
 <!-- Content -->
 <div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Mualliflar ro'yxati</h4>
                   </div>
                  @if (session('success'))                     
                     <div class="alert alert-success" role="alert">
                        <div class="iq-alert-icon">
                           <i class="ri-alert-line"></i>
                        </div>
                        <div class="iq-alert-text"> {{ session('success') }}</div>
                     </div>
                  @endif

                  @if (session('error'))
                     <div class="alert alert-danger">
                        {{ session('error') }}
                     </div>
                  @endif
             
                  @if ($errors->any())
                     <div class="alert alert-danger" role="alert">
                           <div class="iq-alert-icon">
                              <i class="ri-information-line"></i>
                           </div>
                           <div class="iq-alert-text">Formada xato mavjud! Iltimos, qayta urinib ko'ring.</div>
                     </div>
                  @endif
                   <div class="iq-card-header-toolbar d-flex align-items-center">             

                      <button type="button" class="btn btn-primary rmt-5" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                       Yangi muallif qo'shish
                        </button>

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
                                    <form action="{{ route('library.library-author-store')}}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       @method('POST')                         
                                       <div class="form-group">
                                          <label for="fish">F.I.SH:</label>
                                          <input type="text" class="form-control" id="fish" name="fish" placeholder="Muallifning F.I.SHni yozing." value="{{ old('fish') }}">
                                          @error('fish')
                                          <small class="error-text form-text">{{ $message }}</small>
                                          @enderror
                                      </div>                                  
                                    <div class="form-group">
                                       <label for="img">Surat:</label>
                                       <div class="custom-file">
                                       <input type="file" id="image-input" name="img" accept="image/*" class="custom-file-input" value="{{ old('img') }}" id="validatedCustomFile">
                                       <label class="custom-file-label" for="validatedCustomFile">Suratni tanlang...</label>
                                       @error('img')
                                       <small class="error-text form-text">{{ $message }}</small>
                                       @enderror
                                       {{-- <div class="invalid-feedback">Example invalid custom file feedback</div> --}}
                                    </div>
                                    <div class="preview-container">
                                       <img id="preview-image" src="#" alt="Preview" style="display: none;">
                                    </div>
                                       <script>
                                       const imageInput = document.getElementById('image-input');
                                       const previewImage = document.getElementById('preview-image');

                                       imageInput.addEventListener('change', function() {
                                       const file = this.files[0];

                                       if (file) {
                                          const reader = new FileReader();

                                          reader.addEventListener('load', function() {
                                             previewImage.src = reader.result;
                                             previewImage.style.display = 'block';
                                          });

                                          reader.readAsDataURL(file);
                                       } else {
                                          previewImage.src = '#';
                                          previewImage.style.display = 'none';
                                       }
                                       });
                                       </script>
                                       <style>
                                       .preview-container {
                                          width: 200px; /* O'zgartirishingiz mumkin */
                                          max-height: 200px; /* O'zgartirishingiz mumkin */
                                          border-radius: 50%;
                                          overflow: hidden;
                                          display: flex;
                                          justify-content: center;
                                          align-items: center;
                                          margin: auto;
                                          margin-top: 20px;
                                       }

                                       #preview-image {
                                          display: block;
                                          width: 100%;
                                          height: 100%;
                                          object-fit: cover;
                                       }
                                       .error-text {
                                          color: red;
                                       }
                                       </style>
                                    </div>
                                    <div class="form-group">
                                       <label for="desc">Muallif haqida:</label>
                                       <textarea class="form-control" id="desc" name="desc" placeholder="Muallif haqida yozishingiz mumkin.">{{ old('desc') }}</textarea>
                                       @error('desc')
                                       <small class="error-text form-text">{{ $message }}</small>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="telefon">Telefoni:</label>
                                       <input type="number" class="form-control" id="telefon" name="telefon" value="{{ old('telefon') }}" placeholder="Muallifning telefon raqamini yozishingiz mumkin." pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                                       
                                       @error('telefon')
                                       <small class="error-text form-text">{{ $message }}</small>
                                       @enderror
                                     </div>
                                    <div class="form-group">
                                       <label for="email">Email:</label>
                                       <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Muallifning email manzilini yozishingiz mumkin.">
                                       @error('email')
                                       <small class="error-text form-text">{{ $message }}</small>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input type="checkbox" class="form-check-input" id="univer_employee"  value="1"  name="univer_employee" {{ old('univer_employee') ? 'checked' : '' }}>
                                          <label class="form-check-label" for="univer_employee">OTM xodimi?</label>
                                          @error('univer_employee')
                                          <small class="error-text form-text">{{ $message }}</small>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input type="checkbox" class="form-check-input" value="1" id="status" name="status" {{ old('status') ? 'checked' : '' }}>
                                          <label class="form-check-label" for="status">Aktivlashtirish</label>
                                          @error('status')
                                          <small class="error-text form-text">{{ $message }}</small>
                                          @enderror
                                       </div>
                                    </div>                                    
                                   
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                    <button type="submit" class="btn btn-primary">Yaratish</button>
                                 </div>
                              </form>
                              </div>
                           </div>
                        </div>

                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center" width="30%">Muallif F.I.SH</th>
                                <th class="text-center" width="61%">Muallif haqida ma'lumot</th>
                                <th width="6%">Amaliyot</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $i = 1;
                           @endphp
                           
                        
                           @foreach ($list_authors as $item)
                          
                           <tr @if ($item->status == 0) style="opacity: 20%;" @endif>
                              <td class="text-center">{{ $i++ }}</td>
                              <td><a href="{{ route('library.library-author-books', $item->slug )}}" style="font-size: 20px;">
                                 <img style="display: inline-block!important; border-radius: 50%;" class="img-fluid avatar-60 mr-3 d-sm-none" src="{{ asset('assets/images/3432396.png') }}" alt="{{ $item->fish }}">
                                    {{ $item->fish }}
                                 </a>
                              </td>
                              <td>
                                <p class="mb-0">
                                 <div class="row">
                                    <div class="col-md-6" style="border-right: solid; border-style: outset;">
                                       <div class="iq-card-body" style="padding: 5px;">
                                          <ul class="list-inline p-0 mb-0">
                                             <li>
                                                <div class="row align-items-center justify-content-between mb-3">
                                                   <div class="col-sm-4">
                                                      <h6>OTM hodimi:</h6>                                       
                                                   </div>
                                                   <div class="col-sm-8">
                                                      <p class="mb-0">
                                                         @if ($item->univer_employee == 1)
                                                            <span class="badge badge-primary">HA</span>
                                                         @else
                                                            <span class="badge badge-primary">YO'Q</span>
                                                         @endif
                                                      </p>                                       
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="row align-items-center justify-content-between mb-3">
                                                   <div class="col-sm-4">
                                                      <h6>Telefon:</h6>                                       
                                                   </div>
                                                   <div class="col-sm-8">
                                                      <p class="mb-0">{{ $item->telefon }}</p>                                       
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="row align-items-center justify-content-between mb-3">
                                                   <div class="col-sm-4">
                                                      <h6>Email manzil:</h6>                                       
                                                   </div>
                                                   <div class="col-sm-8">
                                                      <p class="mb-0">{{ $item->email }}</p>                                       
                                                   </div>
                                                </div>
                                             </li>
                                          
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <p style="padding: 5px; height: 100%;">{{ Str::limit($item->desc, 250, '...') }}</p>
                                    </div>
                                 </div>
                                
                              </td>
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                   <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                   <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                              </td>
                          </tr>
                           @endforeach
                            
                      
                        </tbody>
                    </table>
                   </div>
                   <div class="mt-4 mb-5">
                     {!! $list_authors->appends(Request::except('page'))->render() !!}
                   </div>
                   
                </div>                
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- END -->
 @endsection