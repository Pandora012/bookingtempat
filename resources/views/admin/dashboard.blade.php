@extends('layouts.index')
@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Beranda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Antrian Meja</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/antrian') }}">Lihat Disini Untuk Melihat Antrian</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Pesan Meja</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/booking') }}">Lihat Disini Untuk Melakukan Pemesanan Meja</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SI Warunk</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
@endsection