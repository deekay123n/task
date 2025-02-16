
@extends('layouts.main')

@section('content')
<div class="card">
            <div class="card-header d-flex align-items-center">
			    <h6 class="m-0 fw-bold">Contact List</h6>
			    <div class="ms-auto d-flex gap-2">
			        <a href="{{ route('contact.add') }}" class="btn btn-info btn-sm">Add Contact</a>
			        <a href="{{ route('contact.import-contacts') }}" class="btn btn-success btn-sm">Bulk Import</a>
			    </div>
			</div>
            <div class="card-body">
                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead class="text-uppercase">
										<tr>
											<th>SN.</th>
											<th scope="col">Name</th>
											<th scope="col">Phone</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($user) && count($user)>0)
											@foreach($user as $index=>$cm)
											<tr row_id="{{$cm->id}}" class="get_row_{{$cm->id}}">                                   
												<td scope="row">{{$index+1+(($user->currentPage()-1)*$user->perPage())}}</td>
                                               
												<td>{{$cm->name ?? ''}}</td>  
												<td>{{$cm->phone ?? ''}}</td>  
												<td class="text-right">
												  <div class="d-flex" style="gap: 4px">
												  	<a class="btn btn-secondary" href="{{route('contact.edit',$cm->id)}}">Edit Contact</a>
												  	<a class="btn btn-danger" href="{{route('contact.delete',$cm->id)}}">Delete Contact</a>
												  </div>
												</td>                                                      
												
											</tr>
											@endforeach
										@else
										<tr><td class="text-center" colspan="6">No data Found.</td></tr>
										
										@endif
									</tbody>
                                </table>
                                 {!! $user->links('pagination::bootstrap-5') !!}
							
                            </div>
							
                </div>

            </div>




@endsection
