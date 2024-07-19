<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ? $title->title : 'Название компании' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/style/style.css')}}" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/jquery.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('adminhomeru')}}">Главная страница</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Выберите язык</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('adminhome')}}">Uzbek</a></li>
                        <li><a class="dropdown-item" href="{{route('adminhomeeng')}}">English</a></li>
                        <li><a class="dropdown-item" href="{{route('adminhomeru')}}">Русский</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!--
                            <a class="nav-link" href="{{route('adminhome')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Uy Sahifa
                            </a>
                            -->
                            @if(auth()->user()->type == 'superadmin')
                            <a class="nav-link" href="{{route('adminsuperuserru')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Пользователи
                            </a>
                            @endif
                            @if(auth()->user()->type == 'admin')
                            <a class="nav-link" href="{{route('admintitleru')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Название компании
                            </a>
                            
                            <a class="nav-link" href="{{route('adminuserru')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Пользователь
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ввод информации
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminolchamru')}}">Измерения</a>
                                    <a class="nav-link" href="{{route('admintovarru')}}">Ввод товара</a>
                                </nav>
                            </div>
                            <!--
                            <a class="nav-link" href="{{route('adminolcham')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                O`lchamlar
                            </a>
                            <a class="nav-link" href="{{route('admintovar')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Tovar Kiritish
                            </a>
                            -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ввод на склад
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminkirimru')}}">Поступление</a>
                                    <a class="nav-link" href="{{route('adminkirimscanru')}}">Сканирование поступления</a>
                                    <a class="nav-link" href="{{route('adminkirimborru')}}">Есть товары</a>
                                    <a class="nav-link" href="{{route('adminkirimtugaganru')}}">Продукция, которая была продана / Продукция, чье время истекло</a>
                                </nav>
                            </div>
                            
                            <!--
                            <a class="nav-link" href="{{route('adminkirim')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Kirim
                            </a>
                            <a class="nav-link" href="{{route('adminkirimscan')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Kirim Scan
                            </a>
                            -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tорговля
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminchiqimru')}}">Сканер торговли</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunru')}}">Сегодняшняя торговля (общая)</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunsonru')}}">Сегодняшняя торговля <br>(Количество товаров)</a>
                                    <a class="nav-link" href="{{route('adminchiqimsanaru')}}">Торговля с датой</a>
                                    <a class="nav-link" href="{{route('adminchiqimsanasonru')}}">Торговля по дате <br>(Количество товаров)</a>
                                </nav>
                            </div>
                            @endif

                            @if(auth()->user()->type == 'sotuvchi')
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Поставка на склад
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminkirimru')}}">Поступление</a>
                                    <a class="nav-link" href="{{route('adminkirimscanru')}}">Сканирование поступлений</a>
                                    <a class="nav-link" href="{{route('adminkirimborru')}}">Имеющиеся товары</a>
                                    <a class="nav-link" href="{{route('adminkirimtugaganru')}}">Проданные товары / Истекшие товары</a>
                                </nav>
                            </div>
                            
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tорговля
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminchiqimru')}}">Сканер торговли</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunru')}}">Сегодняшняя торговля (общая)</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunsonru')}}">Сегодняшняя торговля <br>(Количество товаров)</a>
                                    <a class="nav-link" href="{{route('adminchiqimsanaru')}}">Торговля с датой</a>
                                </nav>
                            </div>
                            @endif


                            <a class="nav-link" href="{{route('adminlogoutru')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Выход
                            </a>
                        </div>
                        
                    </div>
                 
                    <div class="sb-sidenav-footer">
                        <div class="small">Пользователь:</div>
                        {{ auth()->user()->name }}
                    </div>
                </nav>
            </div>
 