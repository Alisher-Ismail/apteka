<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title ? $title->title : 'Название компании' }}</title>

    <!-- Styles -->
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />

    <!-- Font Awesome -->
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
                                <a  href="{{ route('register') }}" style="display: inline-block; margin-right: 10px;">O`zbek tili</a>
                                <a  href="{{ route('registereng') }}" style="display: inline-block; margin-right: 10px;">English</a>
                                <a  href="{{ route('registerru') }}" style="display: inline-block; margin-right: 10px;">Русский</a>
                                    </center>
                                <h3 class="text-center font-weight-light my-4">
                                        {{ $title ? $title->title : '' }} pегистрация в программе
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <!-- Error Messages -->
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Session Messages -->
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <!-- Registration Form -->
                                    <form method="post" action="{{ route('register.submitru') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="Ism">Имя</label>
                    <input type="text" class="form-control" id="ism" name="ism" placeholder="Введите имя" required>
                </div>
                <div class="mb-3">
                    <label for="Email">Логин</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Введите логин" required>
                </div>
                
                <div class="mb-3">
                    <label for="Password">Пароль</label>
                    <input type="text" class="form-control" id="parol" name="parol" placeholder="Введите пароль" required>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ route ('loginru') }}" >восстановление логина</a>
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Custom Scripts -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
</body>
</html>
