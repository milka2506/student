<!DOCTYPE html>
<html>
<head>
    <title>Larevel - Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body class="bg-dark">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.index') }}">{{ __('Students') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('studentdetails.index') }}">{{ __('Student-Marks ') }}</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<div class="container">
    <div class="row">
    	<div class="col-md-12">
    		@yield('content')
    	</div>
    </div>
</div>
   
</body>
</html>