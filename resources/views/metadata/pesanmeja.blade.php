@extends('layouts.index')
@section('content')
                <main>
                    <div class="container-fluid" style="padding-bottom:10%;">
                        <h1 class="mt-4">Pesan Meja</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <img src="../assets/img/tablelist.png" alt="Table List" class="img-fluid rounded mx-auto d-block" width = "50%" height="50%" style="position: center;">  
                        <!-- Form input Mulai Disini -->
                        <div class="card mt-2">
                            <div class="card-header">
                              <h3>Pesan Meja Kamu Disini!</h3>
                            </div>                            
                                <div class="card-body">
                                    <form method="POST" action="{{url('/booking')}}">
                                        @csrf
                                        <div class="form-group row">
                                        <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama"name="nama"class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNomerMeja" class="col-sm-2 col-form-label">Nomer Meja (1-10)</label>
                                            <input type="number" min="0" max="10" name="nomeja" style="width:10%;margin-left:12px;" class="form-control" id="nomeja">
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNomerMeja" class="col-sm-2 col-form-label">Waktu (10:00-22:00) </label>
                                            <input type="time" name="waktu" style="width:10%;margin-left:12px;" class="form-control" id="waktu">
                                        </div>
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-2 col-form-label">Tanggal Booking</label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" style="width:200px;" class="form-control" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" autocomplete="off" >
                                                </div>
                                            </div>
                                        </div>                                        
                                        <br>
                                            <button type="booking" class="btn btn-primary float-right">Booking</button>
                                    </form>
                                </div>  
                            </div> 
                             <!-- Form input Stop Disini -->                             
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <!-- <br><br><br><br>           -->
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