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
                      <h4 class="card-title">Mualiflar ro'yxati</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="admin-add-category.html" class="btn btn-primary">Yangi mualif qo'shish</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center" width="30%">Mualif F.I.SH</th>
                                <th class="text-center" width="61%">Mualif haqida ma'lumot</th>
                                <th width="6%">Amaliyot</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $i = 1;
                           @endphp
                           @foreach ($list_authors as $item)
                           <tr>
                              <td class="text-center">{{ $i++ }}</td>
                              <td><a href="{{ route('dashboard.library-author-books', $item->slug )}}"><img class="rounded img-fluid avatar-40 mr-3" style="display: inline-block;" src="{{ asset('assets/images/3432396.png')}}" alt="profile"> {{ $item->fish }}</a></td>
                              <td>
                                <p class="mb-0">{{  $item->desc }}</p>
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