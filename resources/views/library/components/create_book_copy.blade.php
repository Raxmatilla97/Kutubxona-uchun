<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Yangi kitob nusxasini qo'shish</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
         
          <div class="modal-body">     
             <form action="{{ route('library.library-author-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')                         
                <div class="form-group">
                   <label for="book_id">Qaysi kitobga nusxa sifatida belgilanganligi:</label>
                   <input type="text" class="form-control" id="book_id" disabled value="{{ $book->title}}">
                   <input type="hidden" name="book_id" value="{{ $book->id}}">
                  
               </div>                                  
         
             <div class="form-group">
                <label for="inventor_number">Inventar raqamini yozing:</label>
                <input type="text" class="form-control" id="inventor_number" name="inventor_number" placeholder="INV-123456" value="{{ old('inventor_number') }}">
                @error('inventor_number')
                <small class="error-text form-text">{{ $message }}</small>
                @enderror
             </div>              
             
             <div class="form-group">
                <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="isset_book"  value="1" checked  name="isset_book" {{ old('isset_book') ? 'checked' : '' }}>
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
            
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
             <button type="submit" class="btn btn-primary">Yaratish</button>
          </div>
       </form>
       </div>
    </div>
 </div>