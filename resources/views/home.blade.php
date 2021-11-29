@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} 
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
                                    <h5 class="card-title">Manage Profile:</h5>
                                    @php
                                     $user = Auth::user();
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <!-- Profile Image -->
                                            <div class="card card-primary card-outline">
                                              <div class="card-body box-profile">
                                                <div class="text-center">
                                                  <img class="profile-user-img img-fluid img-circle"
                                                       src="{{ asset('img/avatarr.jpg') }}"
                                                       alt="User profile picture" style="width: 100px; height: 100px;
                                                       border: 3px solid #adb5bd; border-radius: 50%; padding: 3px; margin-bottom: 10px;">
                                                </div>

                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th scope="row">Name</th>
                                                        <td>{{ $user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Userame</th>
                                                        <td>{{ $user->username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-Mail</th>
                                                        <td>{{ $user->email }}</td>
                                                    </tr>
                                                </table>
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
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
