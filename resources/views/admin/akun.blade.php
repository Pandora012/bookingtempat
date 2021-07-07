@extends('layouts.index')
@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Akun</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                        <!-- Form input Mulai Disini -->
                        <div class="card mt-2">
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <div class="text-center">
                                            <img src="img/default-avatar.png" class="avatar img-circle" alt="avatar">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                      <label for="Username" class="col-sm-1 col-form-label">Username</label>
                                      <div class="col-sm-10">
                                        <label for="Username" class="col-sm-1 col-form-label">:</label>
                                        <input type="text" value="{{$user->name}}" disabled>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="Email" class="col-sm-1 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <label for="Username" class="col-sm-1 col-form-label">:</label>
                                        <input type="text" value="{{$user->email}}" disabled>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                 
                            </div>
                        </div>
                          <!-- Form input Stop Disini -->

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
