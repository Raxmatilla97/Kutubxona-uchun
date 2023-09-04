<div class="col-lg-12">
   <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded d-flex align-items-center justify-content-center" style="max-height: 303px;">
         <div class="newrealease-contens" style="opacity: 0;">               
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
      <div class="loading-container"  style="position: absolute;">
         <img style="width: 220px; vertical-align: middle;" src="https://tonusestetic.ru/online-appointment/loading.gif" class="loading-indicator" alt="Loading">
      </div>   
   </div>
</div>

<script>
   var element = document.querySelector('.newrealease-contens');
   var loadingIndicator = document.querySelector('.loading-indicator');

   setTimeout(function() {
       element.style.opacity = '1';
       loadingIndicator.style.display = 'none';
   }, 2000);
</script>

<style>
   .loading-container {
       display: flex;
       justify-content: center;
       align-items: center;
       height: 100%;
   }
</style>