<div class="col-lg-12">
    <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
       <div class="newrealease-contens">
          <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">             
            @foreach ($books_defined as $item)
               <li class="item">
                  <a href="javascript:void(0);">
                     <img src="{{ asset('assets/images/book-test2.webp')}}" class="img-fluid w-100 rounded" alt="">
                  </a>
                  <div class="d-flex justify-content-center">
                     <button class="btn btn-default">Ko'rish</button>
                   </div>
               </li>
            @endforeach
          </ul>
       </div>
    </div>
 </div>

