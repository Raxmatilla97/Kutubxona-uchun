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
                                <a href="#document-detail" class="btn btn-default  active">
                                <i class="ri-bookmark-fill text-danger"></i><span>ARM ma'lumotlari</span>
                                </a>
                             </div>
                             <div id="bank" class="wizard-step">
                                <a href="#bank-detail" class="btn btn-default  active">
                                <i class="ri-camera-fill text-success"></i><span>Fayl yuklash</span>
                                </a>
                             </div>
                             <div id="confirm" class="wizard-step">
                                <a href="#cpnfirm-data" class="btn btn-default  active">
                                <i class="ri-check-fill text-warning"></i><span>Tugatish</span>
                                </a>
                             </div>
                          </div>
                       </div>
                       <form class="form">
                          <div class="row setup-content" id="user-detail" style="display: flex;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4">Asosiy ma'lumotlar:</h3>
                                   <div class="row">
                                      <div class="form-group col-md-6">
                                         <label for="title" class="control-label">Kitobning nomini yozing: *</label>
                                         <input maxlength="100" type="text" id="title" name="title" required="required" class="form-control" placeholder="O'tgan kunlar...">
                                      </div>
                                      <div class="form-group col-md-6">
                                         <label for="book_inventar_number"  class="control-label">Kitob inventar raqami: *</label>
                                         <input maxlength="100" type="text" id="book_inventar_number" required="required" name="book_inventar_number" class="form-control" placeholder="12345">
                                      </div>
                                     
                                      <div class="col-md-6 form-group">
                                         <label for="nashriyot_nomi" class="control-label">Nashriyot nomi: *</label>
                                         <input type="text" class="form-control" id="nashriyot_nomi" required="required" name="nashriyot_nomi"  value="{{ old('nashriyot_nomi')}}" placeholder="Sharq nashiryoti">
                                      </div>
                                      <div class="col-md-6 form-group">
                                         <label for="chiqarilgan_yili" class="control-label">Chiqarilgan yili: *</label>
                                         <input type="text" id="chiqarilgan_yili" class="form-control" required="required" name="chiqarilgan_yili" value="{{ old('chiqarilgan_yili')}}" placeholder="2023">
                                      </div>                                     
                                      <div class="col-md-6 form-group">
                                         <label for="isbn_issn" class="control-label">ISBN yoki ISSN: *</label>
                                         <input type="text" class="form-control" required="required" id="isbn_issn" name="isbn_issn" value="{{ old('isbn_issn')}}" placeholder="ISBN-123456">
                                      </div>
                                      <div class="col-md-6 form-group">
                                        <label for="sahifa_soni_va_olcham" class="control-label">Sahifa soni va o'lchami: *</label>
                                        <input type="text" class="form-control" required="required" id="sahifa_soni_va_olcham" name="sahifa_soni_va_olcham" value="{{old('sahifa_soni_va_olcham')}}" placeholder="200 varoq 30x20">
                                     </div>
                                     <div class="col-md-6 form-group">
                                        <label for="nechanchi_nashr" class="control-label">Nechanchi nashrligi: *</label>
                                        <input type="text" class="form-control" required="required" id="nechanchi_nashr" name="nechanchi_nashr" value="{{ old('nechanchi_nashr')}}" placeholder="1-chi nashr">
                                     </div>
                                     <div class="col-md-6 form-group">
                                        <label for="classificatsiya" class="control-label">Resurs klasifikatsiyasi: *</label>
                                        <input type="text" class="form-control" required="required" id="classificatsiya" name="classificatsiya" value="{{ old('classificatsiya')}}" placeholder="323(575.1)">
                                     </div>                                    
                                      <div class="col-md-12 mb-3 form-group">
                                         <label for="address" class="control-label">Resurs haqida qisqacha ma'lumotlar bo'lsa: </label>
                                         <textarea name="address" class="form-control" id="address" rows="5" required="required"></textarea>
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label class="d-block">Kitob katalogda ko'rsatish uchun tayyormi?:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                           <input type="radio" id="ready" name="status" value="{{ old('status', 1)}}" class="custom-control-input" checked="">
                                           <label class="custom-control-label" for="ready"> Ha, Kitob ma'lumotlari tog'ri va ko'rsatish uchun tayyor! </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                           <input type="radio" id="noReady" name="status" value="{{ old('status', 0)}}" class="custom-control-input">
                                           <label class="custom-control-label" for="noReady"> Yoq, Kitob ma'lumotlari ohirigacha yetmagan! </label>
                                        </div>
                                     </div>
                                   </div>
                                   <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Keyingisi</button>
                                </div>
                             </div>
                          </div>
                          <div class="row setup-content" id="document-detail" style="display: none;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4">Qo'shimcha ARM ma'lumotlari:</h3>
                                   <div class="row">

                                    <div class="form-group col-sm-6">
                                        <label for="users">Resursga javobgar:</label>
                                        <select class="form-control" name="kitobga_javobgar_id" id="users">
                                           <option selected="">Tanlang</option>
                                           @foreach($users as $user)
                                            <option class="{{$user->id}}">{{$user->name}}</option>
                                           @endforeach 
                                        </select>
                                     </div>

                                     <div class="form-group col-sm-6">
                                        <label for="category">Resurs bo'limini tanlang:</label>
                                        <select class="form-control" name="book_category_id" id="category">
                                           <option selected="">Tanlang</option>
                                           @foreach($categores as $category)
                                            <option class="{{$category->id}}">{{$category->title}}</option>
                                           @endforeach 
                                        </select>
                                     </div>                                
                                        <div class="col-md-12 form-group">
                                         <div class="form-group">
                                            <label for="tags" class="control-label">Taglarni kiriting: *</label>
                                            <input type="tags" class="w-full px-4 py-6 text-md border border-gray-300 rounded outline-none" value="Kitob" required="required" id="tags" name="tags" >
                                         </div>
                                      </div>
                                      <div class="col-md-12 form-group">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="1" name="tafsiya_etiladi" id="tafsiya_etiladi" required="">
                                          <label class="form-check-label" for="tafsiya_etiladi">
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
                                   <div class="form-row flex justify-around">
                                    <div class="col-md-5 mb-3 mx-5">                                     
                                       <input type="file" class="custom-file-input" id="image" required="">
                                       <label class="custom-file-label" for="image">Resurs muqova suratini yuklang...</label>
                                       <div class="invalid-feedback">Surat yuklanishi kerak</div>
                                    </div>
                                    @push('styles')
                                    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />      
                                    @endpush
                                 
                                       <div class="col-md-12 mt-8 mx-5">
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
                                                
                                   
                                               <input type="file" class="text-md" value="{{ old('pdf')}}" name="pdf" data-max-file-size="5MB" />
                                                
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
                                   <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                </div>
                             </div>

                            
                          </div>
                          <div class="row setup-content" id="cpnfirm-data" style="display: none;">
                             <div class="col-sm-12">
                                <div class="col-md-12 p-0">
                                   <h3 class="mb-4 text-left">Finish:</h3>
                                   <div class="row justify-content-center">
                                      <div class="col-3"> <img src="images/page-img/img-success.png" class="fit-image" alt="img-success"> </div>
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