@extends('layouts/library');
@section('content')   
    @push('breadcrumb')
        <div class="navbar-breadcrumb">
            <h5 class="mb-0">Kutubxona resurslari</h5>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Bosh sahifa</li>
                    <li class="breadcrumb-item" aria-current="page">ARM boshqaruvi</li>    
                    <li class="breadcrumb-item active" aria-current="page">Kitob yaratish</li>                
                </ul>
            </nav>
        </div>   
    @endpush

    @push('styles')
    <link
    href="https://unpkg.com/@yaireo/tagify/dist/tagify.css"
    rel="stylesheet"
    type="text/css"
  />
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
  var input = document.querySelector('input[name=tags]'),
    // init Tagify script on the above inputs
    tagify = new Tagify(input, {
        whitelist : [
         "Fantaziya",
         "Elm-fantaziya",
         "Detektiv",
         "Romantika",
         "Tarixiy",
         "O'zbek sonliniy",
         "Ilmiy",
         "Hayot uchun",
         "Siyosiy",
         "Iqtisod",
         "Filosofiya",
         "Diniy",
         "Xorijiy lug'at",
         "Lingvistika",
         "Psixologiya",
         "Pedagogika",
         "Menegement",
         "Marketing",
         "Kompyuter ilmi",
         "Raqamli tehnologi",
         "Dasturlash",
         "Ijtimoiy fanlar",
         "Geografiya",
         "Hujjatli adabiyot",
         "Shahar tarixi",
         "Tarixiy fuezalar",
         "Inson resurslari",
         "Bolalar adabiyoti",
         "Yoshlar uchun",
         "O'quv qo'llanmalar",
         "Fizika",
         "Himoya",
         "Ekologiya",
         "Biologiya",
         "Sog'liqni saqlash",
         "Meditsina",
         "Sayohat",
         "Tezkor hamkorlik",
         "She'riyat",
         "Dramaturgiya",
         "Kino senariylari",
         "Sinf komediyalari",
         "O'zbek klassiklari",
         "Jahon klassiklari",
         "Yengil adabiyot",
         "Teatrga mo'ljallangan asarlar",
         "Ma'muriy qo'llanmalar",
         "Yuridik",
         "Bank va moliya",
         "Microcontrollerlar",
         "Robototexnika",
         "So'z yasalish san'ati",
         "O'zbek tilining izohli lug'ati",
         "Yoqimliy qo'shiqlar",
         "Roston adabiyotlari",
         "Aforizmlar",
         "Xikmatli gaplar",
         "Rivoyatlari",
         "Qahramonlar",
         "O'YIN", 
         "To'ylar",
         "O'yin o'yin uchun",
         "Hayvonlar dunyosi",
         "Ilmiy maqolalar",
         "Mashhur insonlar",
         "O'zbekiston",
         "Beshtugun",
         "Notijorat",
         "Futbol",
         "Basketbol",
         "Yoshlar orasida sport",
         "Musiqa",
         "Koncertlar",
         "Festival",
         "Ko'rsatuvlar",
         "Madaniyat",
         "Rasm",
         "San'at",
         "Statistika",
         "Iqtisodiyot",
         "Maktab o'quv rejalari",
         "Universitet darsliklari",
         "Akademik maqolalar",
         "Oqituvchi uchun",
         "O'qituvchilar",
         "Maktabgacha ta'lim",
         "Maktab ta'limi",
         "Fanlar",
         "Oliy ta'lim",
         "Til o'rganish",
         "Ingliz tili",
         "Rus tili",
         "O'zbek tili",
         "Fransuz tili",
         "Jahon tili",

        ],
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0,
            classname: "customSuggestionsList"
        },
        templates: {
            dropdownItemNoMatch() {
                return `<div class='empty'>Nothing Found</div>`;
            }
        },
        enforceWhitelist: true
    })

    tagify.on("dropdown:show", onSuggestionsListUpdate)
          .on("dropdown:hide", onSuggestionsListHide)
          .on('dropdown:scroll', onDropdownScroll)

    renderSuggestionsList()  // defined down below

    // ES2015 argument destructuring
    function onSuggestionsListUpdate({ detail:suggestionsElm }){
        console.log(  suggestionsElm  )
    }

    function onSuggestionsListHide(){
        console.log("hide dropdown")
    }

    function onDropdownScroll(e){
        console.log(e.detail)
      }

    // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
    function renderSuggestionsList(){
        tagify.dropdown.show() // load the list
        tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown)
    }
    </script>
    @endpush

    <div id="content-page" class="content-page">
        <div class="container-fluid">
           <div class="row">
              <div class="col-sm-12 col-lg-12">
                 <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title">Kitob ma'lumotlarini yaratish sahifasi</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                       <div class="stepwizard mt-4">
                          <div class="stepwizard-row setup-panel">
                             <div id="user" class="wizard-step active">
                                <a href="#user-detail" class="active btn">
                                <i class="ri-book-open-fill text-primary"></i><span>Kitob ma'lumotlari</span>
                                </a>
                             </div>
                             <div id="document" class="wizard-step">
                                <a href="#document-detail" class="btn btn-default disabled  active">
                                <i class="ri-bookmark-fill text-danger"></i><span>ARM ma'lumotlari</span>
                                </a>
                             </div>
                             <div id="confirm" class="wizard-step">
                                <a href="#bank-detail" class="btn btn-default disabled  active">
                                <i class="ri-camera-fill text-warning"></i><span>Fayl yuklash</span>
                                </a>
                             </div>
                             <div id="bank" class="wizard-step">
                                <a href="#cpnfirm-data" class="btn btn-default   active">
                                <i class="ri-check-fill text-success"></i><span>Tugatish</span>
                                </a>
                             </div>
                          </div>
                       </div>
                       <form class="form" action="{{ route('dashboard.arm-resurslari.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf 
                        @method('post')   
                          <div class="row setup-content" id="user-detail" style="display: flex;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4">Asosiy ma'lumotlar:</h3>

                                    <div class="w-50 m-auto">
                                       <div class="alert alert-primary mb-4" role="alert">
                                          <div class="iq-alert-icon">
                                             <i class="ri-alert-line"></i>
                                          </div>
                                          <div class="iq-alert-text">
                                             <h5 class="alert-heading">Eslatma!</h5>
                                             <p>Formada <b class="text-red-600">*</b> belgisi uchragan joylarda albatta ma'lumot kiritilishi lozim!
                                                <br>
                                                Agarda ma'lumotga ega bo'lmasangiz u qismga <b>Yo'q</b> deb yozib qo'ying.
                                             </p>
                                            
                                                                                   
                                          </div>
                                       </div>
                                    </div>
                                    <hr>
                                   <div class="row">
                                      <div class="form-group col-md-6">
                                         <label for="title" class="control-label">Kitobning nomini yozing: <b class="text-red-600">*</b></label>
                                         <input maxlength="100" type="text" id="title" name="title" required="required" class="form-control" placeholder="O'tgan kunlar...">
                                      </div>
                                      <div class="form-group col-md-6">
                                         <label for="book_inventar_number"  class="control-label">Kitob inventar raqami: <b class="text-red-600">*</b></label>
                                         <input maxlength="100" type="text" id="book_inventar_number" required="required" name="book_inventar_number" class="form-control" placeholder="12345">
                                      </div>
                                     
                                      <div class="col-md-6 form-group">
                                         <label for="nashriyot_nomi" class="control-label">Nashriyot nomi: <b class="text-red-600">*</b></label>
                                         <input type="text" class="form-control" id="nashriyot_nomi" required="required" name="nashriyot_nomi"  value="{{ old('nashriyot_nomi')}}" placeholder="Sharq nashiryoti">
                                      </div>
                                      <div class="col-md-6 form-group">
                                         <label for="chiqarilgan_yili" class="control-label">Chiqarilgan yili: <b class="text-red-600">*</b></label>
                                         <input type="text" id="chiqarilgan_yili" class="form-control" required="required" name="chiqarilgan_yili" value="{{ old('chiqarilgan_yili')}}" placeholder="2023">
                                      </div>                                     
                                      <div class="col-md-6 form-group">
                                         <label for="isbn_issn" class="control-label">ISBN yoki ISSN: <b class="text-red-600">*</b></label>
                                         <input type="text" class="form-control" required="required" id="isbn_issn" name="isbn_issn" value="{{ old('isbn_issn')}}" placeholder="ISBN-123456">
                                      </div>
                                      <div class="col-md-6 form-group">
                                        <label for="sahifa_soni_va_olcham" class="control-label">Sahifa soni va o'lchami: <b class="text-red-600">*</b></label>
                                        <input type="text" class="form-control" required="required" id="sahifa_soni_va_olcham" name="sahifa_soni_va_olcham" value="{{old('sahifa_soni_va_olcham')}}" placeholder="200 varoq 30x20">
                                     </div>
                                     <div class="col-md-6 form-group">
                                        <label for="nechanchi_nashr" class="control-label">Nechanchi nashrligi: <b class="text-red-600">*</b></label>
                                        <input type="text" class="form-control" required="required" id="nechanchi_nashr" name="nechanchi_nashr" value="{{ old('nechanchi_nashr')}}" placeholder="1-chi nashr">
                                     </div>
                                     <div class="col-md-6 form-group">
                                        <label for="classificatsiya" class="control-label">Resurs klasifikatsiyasi: <b class="text-red-600">*</b></label>
                                        <input type="text" class="form-control" required="required" id="classificatsiya" name="classificatsiya" value="{{ old('classificatsiya')}}" placeholder="323(575.1)">
                                     </div>                                    
                                      <div class="col-md-12 mb-3 form-group">
                                         <label for="address" class="control-label">Resurs haqida qisqacha ma'lumotlar bo'lsa: </label>
                                         <textarea name="notes" class="form-control" id="address" rows="5">{{old('notes')}}</textarea>
                                      </div>
                                     
                                   </div>
                                   <button class="btn btn-primary nextBtn btn-lg pull-right mt-4" type="button">Keyingisi</button>
                                </div>
                             </div>
                          </div>
                          <div class="row setup-content" id="document-detail" style="display: none;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4">Qo'shimcha ARM ma'lumotlari:</h3>
                                   <div class="row">

                                    <div class="form-group col-sm-6">
                                        <label for="users">Resursga javobgar: <b class="text-red-600">*</b></label>
                                        <select class="form-control" name="kitobga_javobgar_id" id="users" required>
                                           <option selected="">Tanlang</option>
                                           @foreach($users as $user)
                                            <option value="{{$user->id}}" {{ old('kitobga_javobgar_id') === $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                           @endforeach 
                                        </select>
                                     </div>

                                     <div class="form-group col-sm-6">
                                        <label for="category">Resurs bo'limini tanlang: <b class="text-red-600">*</b></label>
                                        <select class="form-control" name="book_category_id" id="category" required>
                                           <option selected="">Tanlang</option>
                                           @foreach($categores as $category)
                                            <option value="{{$category->id}}" {{ old('book_category_id') === $category->id ? 'selected' : '' }}>{{$category->title}}</option>
                                           @endforeach 
                                        </select>
                                     </div>                                
                                        <div class="col-md-12 form-group">
                                         <div class="form-group">
                                            <label for="tags" class="control-label">Resurs mazmunidan kelib chiqib unga mos kalit so‘zlarni tanlang: <b class="text-red-600">*</b></label>
                                            <input type="tags" class="w-full px-4 py-6 text-md border border-gray-300 rounded outline-none" value="{{old('tags')}}" required="required" id="tags" name="tags" >
                                         </div>
                                      </div>
                                      <div class="col-md-12 form-group">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="1" {{ old('tafsiya_etiladi') ? 'checked' : '' }} name="tafsiya_etiladi" id="tafsiya_etiladi">
                                          <label class="form-check-label ml-2" for="tafsiya_etiladi" style="font-size: 18px"> 
                                             Tafsiya etiladigan resurs hisoblanadimi? 
                                          </label>
                                       </div>
                                    </div>

                                   </div>
                                   <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Keyingisi</button>
                                </div>
                             </div>
                          </div>
                          <div class="row setup-content" id="bank-detail" style="display: none;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-8">Resurs fayllarini yuklash:</h3>
                                   <div class="form-row flex justify-between">

                                    <div class="col-md-6 mb-3">
                                       <input type="file" class="custom-file-input" name="image" id="image" value="{{old('image')}}" accept="image/*">
                                       <label class="custom-file-label" for="image">Resurs muqova suratini yuklang...</label>
                                       <div class="invalid-feedback">Surat yuklanishi kerak</div>                                       

                                       <div class="alert text-white bg-primary mt-3" role="alert">
                                          <div class="iq-alert-icon">
                                             <i class="ri-alert-line"></i>
                                          </div>
                                          <div class="iq-alert-text">Etibor bering! <b>FAYL YUKLASHDA ADASHMANG</b> Bu qismni o'qib keyin fayllarni yuklang.
                                             <style>
                                                .whiteDot {
                                                  height: 10px;
                                                  width: 10px;
                                                  background-color: white;
                                                  border-radius: 50%;
                                                  display: inline-block;
                                                  margin-right: 8px;
                                                }
                                              </style>
                                              
                                              <p class="text-gray-500"> 
                                              <ul class="list-disc pl-5"> 
                                                <li class="py-1"><span class="whiteDot"></span>Birinchi yuklanadigan qism bu Resurs muqova qismi hisoblanadi! Unga faqat surat <span class="font-bold">(png, jpg)</span> yuklang, hajmi <span class="font-bold">[1mb dan oshmasin!]</span>. Muqava surati vertikal holatda bo'lishi lozim (yani o'ng tarafdagi namuna kabi!)</li>
                                                 <hr>
                                                <li class="py-1"><span class="whiteDot"></span>Ikkinchi yuklanadigan qism bu Resursni elektron ko'rinishi! Unga faqat <span class="font-bold">(pdf)</span> yuklang, hajmi <span class="font-bold">[5mb dan oshmasin!]</span>.</li> 
                                              </ul> 
                                              </p>
                                          </div>
                                         
                                       </div>
                                   </div>
                                   <style>
                                    .py-1 {
                                     list-style-type: none;
                                    }
                                   </style>
                                   
                                   
                                   <div id="image-preview" class="col-md-6 flex justify-center">
                                       <!-- Standart image ko'rinadi -->
                                       <img src="http://127.0.0.1:8000/assets/images/book-test.webp" id="preview-image"/>
                                   </div>
                                   
                                   <script>
                                       const imageUpload = document.getElementById('image');
                                       const imagePreview = document.getElementById('image-preview');
                                       const previewImage = document.getElementById('preview-image');
                                   
                                       imageUpload.addEventListener('change', function() {
                                           const file = imageUpload.files[0];
                                           const reader = new FileReader();
                                   
                                           reader.onload = function(e) {
                                               previewImage.src = e.target.result;
                                           }
                                   
                                           reader.readAsDataURL(file);
                                       });
                                   </script>
                                   
                                   <style>
                                       #image-preview {
                                          display: flex;
                                          justify-content: center;
                                          align-items: center;
                                          max-height: 30%;                                         
                                          padding: 5px;
                                       }
                                       
                                       #image-preview img, #preview-image {
                                          max-height: 332px;
                                          width: auto;
                                          border: 1px solid #ddd;
                                          border-radius: 4px;
                                          padding: 5px;
                                       }
                                   </style>
                                   <hr class="border border-gray-200 my-4" />
                                    @push('styles')
                                    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />      
                                    @endpush
                                 
                                       <div class="col-md-12 mt-8">
                                          <div class="flex items-center justify-center max-w-full mb-7">
                                             <div class="relative text-center hidden md:block">
                                               <h4 class="shadow-sm relative rounded-md text-md border  border-gray-200   rounded-t-lg  font-medium px-1 py-3 right-2 ">
                                                Elektron resursni yuklang!
                                               </h4>           
                                               
                                             </div>
                                             <svg class="w-8 mr-2 h-12 mt-2 hidden md:block text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                           </svg>
                                             
                                             <label for="document" class=" w-full h-57 border-2 @if($errors->has('pdf')) border-red-300 border-dashed rounded-lg cursor-pointer bg-red-50  hover:bg-red-100  @else border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100  @endif ">
                                                
                                   
                                               <input type="file" class="text-md" value="{{ old('pdf')}}" name="pdf"  data-max-file-size="5MB" />
                                                
                                             </label>           
                                         </div>  
                                       </div>
                                  

                                    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
                                    <script src="https://hostel.cspi.uz/file-size.js"></script>
                                    <script src="https://hostel.cspi.uz/filepond.js"></script>  
                                    <script>
                                      // Register the plugins
                                        FilePond.registerPlugin(FilePondPluginFileValidateSize, FilePondPluginFileValidateType);                                
                                        // Set options
                                        FilePond.setOptions({
                                            acceptedFileTypes: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/x-zip-compressed', 'application/x-rar-compressed'],
                                            server: {
                                                process: {
                                                    url: '/tmp-upload',
                                                    headers: {
                                                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                                                    }
                                                }
                                            },
                                            fileValidateTypeDetectType: (source, type) =>
                                                new Promise((resolve, reject) => {
                                                    // Do custom MIME type detection here and return with promise
                                                    resolve(type);
                                                }),
                                        });
                                
                                        // Get a reference to the file input element
                                        const inputElement = document.querySelector('input[name="pdf"]');
                                
                                        // Create the FilePond instance
                                        const pond = FilePond.create(inputElement);                                
                                    </script>
                                   

                                   </div>

                                   <div class="alert bg-white alert-secondary" role="alert">
                                    <div class="iq-alert-icon">
                                       <i class="ri-information-line"></i>
                                    </div>
                                    <div class="iq-alert-text">Agarda Fayl hajmi <b>katta</b> bo'lsa!
                                       <ol class="list-decimal list-inside space-y-2 px-5 py-4 bg-gray-100 rounded-md text-sm text-gray-700">
                                          <li>Suratlar uchun <b><a href="https://compresspng.com/" target="_blank" class="text-blue-500 underline">compresspng.com</a></b> dan foydalangan holda surat hajmini kichraytirishingiz mumkin!</li>
                                          <hr>
                                          <li>PDF fayl hajmi kotta bo'lganda <b><a href="https://shrinkpdf.com/" target="_blank" class="text-blue-500 underline">shrinkpdf.com</a></b> dan foydalangan holda fayl hajmini kichraytirishingiz mumkin!</li>
                                      </ol>
                                    </div>
                                 </div>
                                   <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Keyingisi</button>
                                </div>
                             </div>

                            
                          </div>
                          <div class="row setup-content" id="cpnfirm-data" style="display: none;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4 text-left">Jarayonni tugatish qismi:</h3>

                                   <div class="w-50 m-auto">
                                       <div class="alert bg-white alert-primary" role="alert">
                                          <div class="iq-alert-icon">
                                             <i class="ri-alert-line"></i>
                                          </div>
                                          <div class="iq-alert-text">Ma'lumotlarda xato bo'lmasligi uchun yana bir-bor <b>tekshirib</b> oling!</div>
                                       </div>
                                    </div>
                                <!-- Hata mesajlarını göstermek için -->
                                 @if ($errors->any())
                                 <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-50 m-auto" role="alert">
                                     <div class="iq-alert-icon">
                                             <i class="ri-alert-line"></i>
                                          </div>
                                    <ul>
                                       @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                       @endforeach
                                    </ul>
                                 </div>
                                 @endif
                                   <div class="row justify-content-center">                                    
                                      <div class="col-8 mt-5 mb-4"> <img src="{{asset('assets/images/confirm.gif')}}" class="fit-image" alt="img-success"> </div>
                                   </div>
                                   <div class="m-auto" style="width: 900px;">
                                       <div class="form-group col-sm-12 " style="font-size: 18px;">
                                          <label class="d-block">Kitob saytda ko'rsatish uchun tayyormi?:</label>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="ready" name="status" value="{{ old('status', 1)}}" class="custom-control-input" checked="">
                                             <label class="custom-control-label" for="ready"> Ha, Kitob maʼlumotlari to‘g‘ri va ko‘rsatish uchun tayyor! (Bu vaziyatda maʼlumotlar saqlanadi va saytda ko‘rinadi!)</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="noReady" name="status" value="{{ old('status', 0)}}" class="custom-control-input">
                                             <label class="custom-control-label" for="noReady"> Yoq, Kitob maʼlumotlari oxirigacha yetmagan! (Bu vaziyatda maʼlumotlar saqlanadi shunchaki saytda ko‘rinmay turadi!)</label>
                                          </div>
                                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Resurs yaratish</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection