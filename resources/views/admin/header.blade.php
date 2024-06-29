<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ? $title->title : 'Korxona Nomi' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/style/style.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/jquery.js')}}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('adminhome')}}">Uy Sahifa</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('adminlogout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>-->
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
                            @if(auth()->user()->type == 'admin')
                            <a class="nav-link" href="{{route('admintitle')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Korxona Nomi
                            </a>
                            
                            <a class="nav-link" href="{{route('adminuser')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Foydalanuvchi
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kiritish
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminolcham')}}">O`lchamlar</a>
                                    <a class="nav-link" href="{{route('admintovar')}}">Tovar Kiritish</a>
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
                                Omborga Kiritish
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminkirim')}}">Kirim</a>
                                    <a class="nav-link" href="{{route('adminkirimscan')}}">Kirim Scan</a>
                                    <a class="nav-link" href="{{route('adminkirimbor')}}">Bor Tovarlar</a>
                                    <a class="nav-link" href="{{route('adminkirimtugagan')}}">Tugagan Tovarlar / Muddati tugagan Tovarlar</a>
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
                                Savdo
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminchiqim')}}">Savdo Scan</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugun')}}">Bugungi Savdo (Umumiy)</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunson')}}">Bugungi Savdo <br>(Maxsulot Soni)</a>
                                    <a class="nav-link" href="{{route('adminchiqimsana')}}">Sana Bilan Savdo</a>
                                    <a class="nav-link" href="{{route('adminchiqimsanason')}}">Sana Bilan Savdo <br>(Maxsulot Soni)</a>
                                </nav>
                            </div>
                            @endif

                            @if(auth()->user()->type == 'sotuvchi')
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Omborga Kiritish
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminkirim')}}">Kirim</a>
                                    <a class="nav-link" href="{{route('adminkirimscan')}}">Kirim Scan</a>
                                    <a class="nav-link" href="{{route('adminkirimbor')}}">Bor Tovarlar</a>
                                    <a class="nav-link" href="{{route('adminkirimtugagan')}}">Tugagan Tovarlar / Muddati tugagan Tovarlar</a>
                                </nav>
                            </div>
                            
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Savdo
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('adminchiqim')}}">Savdo Scan</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugun')}}">Bugungi Savdo (Umumiy)</a>
                                    <a class="nav-link" href="{{route('adminchiqimbugunson')}}">Bugungi Savdo <br>(Maxsulot Soni)</a>
                                    <a class="nav-link" href="{{route('adminchiqimsana')}}">Sana Bilan Savdo</a>
                                </nav>
                            </div>
                            @endif


                            <a class="nav-link" href="{{route('adminlogout')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                        
                    </div>
                 
                    <div class="sb-sidenav-footer">
                        <div class="small">Foydalanuvchi:</div>
                        {{ auth()->user()->name }}
                    </div>
                </nav>
            </div>
 