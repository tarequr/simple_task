@extends('layouts.app')

@push('css')
	<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Note') }}
                	<a href="{{ url('/') }}" class="btn btn-primary float-right btn-sm"> Home</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @include('layouts.partials.sidebar')
                        </div>
                        <div class="col-md-9">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Manage Note:</h5>

                                    <div class="row">
						              <div class="col-lg-12">
						                <div class="p-2">
						                	<h5 class="text-center">Create Note</h5>
						                  <form class="user" method="POST" action="{{ route('notes.store') }}">
						                    @csrf

						                   <div class="form-group row">
						                      <label class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
						                      <div class="col-sm-10">
						                      	<input type="text" name="title" class="form-control">
						                        <strong class="text-danger"> {{$errors->has('title') ? $errors->first('title') : '' }} </strong>
						                      </div>
						                    </div>

						                    <div class="form-group row">
						                      <label class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
						                      <div class="col-sm-10">
						                        <textarea name="description" class="form-control" rows="6"></textarea>
						                        <strong class="text-danger"> {{$errors->has('description') ? $errors->first('description') : '' }} </strong>
						                      </div>
						                    </div>

						                    <div class="form-group row">
						                      <label class="col-sm-2 col-form-label"></label>
						                      <div class="col-sm-10">
						                        <input type="submit" name="btn" class="btn btn-primary" value="Save">
						                      </div>
						                    </div>
						                  </form>
						                </div>
						              </div>

						              <div class="col-lg-12">
						              	<div class="table-responsive">
									      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									        <thead>
									          <tr>
									            <th>SL</th>
									            <th>Title</th>
									            <th>Description</th>
									            <th>Created At</th>
									            <th>Action</th>
									          </tr>
									        </thead>
									        <tbody>
									        	@foreach($notes as $key => $note)
									        	<tr>
									        		<td>{{ $key+1 }}</td>
									        		<td>{{ $note->title }}</td>
									        		<td>{!! $note->description !!}</td>
									        		<td>{{ date('d-M-Y', strtotime($note->created_at)) }}</td>
									        		<td>
									        			<a href="{{ route('notes.edit',$note->id) }}" class="btn btn-success btn-sm" title="Edit">Edit</a>

									              		<button type="button" onclick="deleteData({{ $note->id }})" class="btn btn-danger btn-sm" title="Delete" >Delete
									              		</button>
									              		<form id="delete-form-{{ $note->id }}" method="POST" action="{{ route('notes.destroy',$note->id)}}" class="delete-form">
									                        @csrf
									                        @method('DELETE')
									                    </form>

									        		</td>
									        	</tr>
									        	@endforeach
									        </tbody>
									      </table>
									    </div>
						              </div>
						            </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/datatables-demo.js') }}"></script>
@endpush