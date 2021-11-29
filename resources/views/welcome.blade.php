<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                        	@auth
                        		<li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                </li>
                        	@else
                        	<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
	                            @if (Route::has('register'))
	                            <li class="nav-item">
	                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	                            </li>
	                            @endif
                        	@endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
			    <div class="row justify-content-center">
			        <div class="col-md-12">
			            <div class="card">
			            	@auth
				                <div class="col-lg-12">
				                    <div class="table-responsive p-3">
				                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                        <thead>
				                          <tr>
				                            <th>SL</th>
				                            <th>Title</th>
				                            <th>Description</th>
				                            <th>Creator</th>
				                            <th>Created At</th>
				                          </tr>
				                        </thead>
				                        <tbody>
				                            @foreach($notes as $key => $note)
				                            <tr>
				                                <td>{{ $key+1 }}</td>
				                                <td>{{ $note->title }}</td>
				                                <td>{!! $note->description !!}</td>
				                                <td>{{ $note['user']['name'] }}</td>
				                                <td>{{ date('d-M-Y', strtotime($note->created_at)) }}</td>
				                            </tr>
				                            @endforeach
				                        </tbody>
				                      </table>
				                    </div>
				                </div>
				            @else
			                	<div class="card-body text-center">
			                		<h1>Welcome to Nextgen Innovation LTD.</h1>
			                	</div>
				            @endauth
			            </div>
			        </div>
			    </div>
			</div>
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  	<script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
  	<script src="{{ asset('js/datatables-demo.js') }}"></script>
</body>
</html>
