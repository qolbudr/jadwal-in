@extends('master')

@section('title', 'SIJaru - Dashboard')

@section('sidebar')
@include('sidebar')
@endsection

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="row my-1 align-items-center">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                        <div class="avatar avatar-xl">
                                            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-10 text-start">
                                        <div class="name mt-2">
                                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                            <h6 class="text-muted">{{ Auth::user()->nip }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 mt-1">
                                        <h6 class="text-muted font-semibold">Data Dosen</h6>
                                        <h6 class="font-extrabold mb-0">{{ $userCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Ruangan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $roomCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="height: 67vh;">
                            <div class="card-header">
                                <h4>Jadwal Hari Ini</h4>
                            </div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection