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
                                	<div class="row">
									    <div class="col-sm-6">
									    	<h5 class="card-title">Manage Note:</h5>
									    </div>
									    <div class="col-sm-6">
									      <a href="{{route('notes.index')}}" class="btn btn-primary float-right btn-sm"> View All</a>
									    </div>
									  </div><br>
                                    <div class="row">
						              <div class="col-lg-12">
						                <div class="p-2">
						                	<h5 class="text-center">Edit Note</h5>
						                  <form class="user" method="POST" action="{{ route('notes.update',$note->id) }}">
						                    @csrf
						                    @method('PUT')

						                   <div class="form-group row">
						                      <label class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
						                      <div class="col-sm-10">
						                      	<input type="text" name="title" class="form-control" value="{{ $note->title }}">
						                        <strong class="text-danger"> {{$errors->has('title') ? $errors->first('title') : '' }} </strong>
						                      </div>
						                    </div>

						                    <div class="form-group row">
						                      <label class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
						                      <div class="col-sm-10">
						                        <textarea name="description" class="form-control" rows="6">{{ $note->description }}</textarea>
						                        <strong class="text-danger"> {{$errors->has('description') ? $errors->first('description') : '' }} </strong>
						                      </div>
						                    </div>

						                    <div class="form-group row">
						                      <label class="col-sm-2 col-form-label"></label>
						                      <div class="col-sm-10">
						                        <input type="submit" name="btn" class="btn btn-primary" value="Update">
						                      </div>
						                    </div>
						                  </form>
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