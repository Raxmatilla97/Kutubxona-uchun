{{--  --}}
                          <div class="row setup-content" id="book_copy-detail" style="display: flex;">
                           <div class="col-sm-12">
                              <div class="col-md-12 p-0">
                                 <h3 class="mb-4">Bank Detail:</h3>
                                 <div class="row">
                                    <div class="col-md-6 form-group ">
                                       <div class="modal-body border ">     
                                          <form action="{{ route('dashboard.kitob-nusxalari.store')}}" method="POST" enctype="multipart/form-data">
                                             @csrf
                                             @method('POST')                         
                                             <div class="form-group">
                                                <label for="book_id">Qaysi kitobga nusxa sifatida belgilanganligi:</label>
                                                <input type="text" class="form-control" id="book_id" disabled value="{{ $book->title}}">
                                                <input type="hidden" name="book_id" value="{{ $book->id}}">
                                               
                                            </div>                                  
                                      
                                             <div class="form-group">
                                                <label for="inventor_number">Inventar raqamini yozing:</label>
                                                <input type="text" required class="form-control" id="inventor_number" name="inventor_number" placeholder="INV-123456" value="{{ old('inventor_number') }}">
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
                                          
                                           
                                             <div class="modal-footer">
                                              
                                                <button type="submit" class="btn btn-primary">Yaratish</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                       <table id="user-list-table" class="table table-striped table-bordered " role="grid" aria-describedby="user-list-page-info">
                                          <thead>
                                              <tr>
                                                
                                                 <th>ID</th>
                                                 <th>Inventar raqami</th>
                                                 <th>Kitob joylashuvi</th>                                                
                                                 <th>Kitob holati</th>                                                
                                                 <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>                                               
                                                 <td>Anna Sthesia</td>
                                                 <td>(760) 756 7568</td>
                                              
                                                 <td><span class="badge iq-bg-primary">Active</span></td>                                               
                                                 <td><span class="badge iq-bg-primary">Active</span></td>                                               
                                                 <td>
                                                    <div class="flex align-items-center list-user-action">
                                                       <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                                       <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                                       <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                 </td>
                                              </tr>
                                       
                                          </tbody>
                                        </table>
                                    </div>
                                    
                                 </div>
                                 <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                              </div>
                           </div>
                        </div>
                          {{--  --}}