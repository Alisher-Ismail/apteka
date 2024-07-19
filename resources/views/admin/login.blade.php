<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ? $title->title : 'Korxona Nomi' }}</title>

        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <center>
                                <a  href="{{ route('login') }}" style="display: inline-block; margin-right: 10px;">O`zbek tili</a>
                                <a  href="{{ route('logineng') }}" style="display: inline-block; margin-right: 10px;">English</a>
                                <a  href="{{ route('loginru') }}" style="display: inline-block; margin-right: 10px;">Русский</a>
                                    </center>
                                        <h3 class="text-center font-weight-light my-4">
                                        {{ $title ? $title->title : '' }} dasturiga Kirish
                                        </h3>
                                    </div>
                                    <div class="mt-5">
                                        @if($errors->any())
                                            <div class="col-12">
                                                @foreach($errors->all() as $err)
                                                    <div class="alert alert-danger">
                                                        {{$err}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{session('error')}}
                                            </div>
                                        @endif

                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('adminlogin.post')}}" id="add-form">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="email" type="text" placeholder="Email" />
                                                <label for="inputEmail">Login</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Password" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Parol</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                                <a href="{{ route ('register') }}" class="btn btn-success">Registratsiyadan O`tish</a>

                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
    </body>
</html>
