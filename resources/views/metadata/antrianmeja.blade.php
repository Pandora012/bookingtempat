@extends('layouts.index')
@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Antrian Meja</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>No Meja</th>
                                                <th>Waktu</th>
                                                <th>Tanggal Booking</th>
                                                <th>Status</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            @foreach ($pesanan as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->meja}}</td>
                                                <td>{{$data->waktu}}</td>
                                                <td>{{$data->tanggal}}</td>
                                                <td>@switch($data->status)
                                                    @case(0)
                                                        <span class="badge bg-warning text-dark">Dipesan</span>
                                                        @break
                                                    @case(1)
                                                        <span class="badge bg-success">Selesai</span>
                                                        @break
                                                    @default
                                                        
                                                @endswitch</td>
                                            @endforeach       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <label for="notice" style="padding-left: 2%;"> *Dipesan = Meja telah dipesan <br> *Selesai = Waktu pemesanan meja telah selesai</label>
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
