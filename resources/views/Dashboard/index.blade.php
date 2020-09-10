@extends('layout.back')

@section('content')
    <div class="row justify-content-center" style="margin-top:100px">
        <div class="col-md-7">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="card text-center" style="width: 18rem;">
                        <i class="card-img-top far fa-building fa-3x"></i>
                        <div class="card-body">
                            <h5 class="card-title"> <a href="{{ route('societe.index')}}">Societes</a> </h5>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card text-center" style="width: 18rem;">
                        <i class="card-img-top fas fa-users fa-3x"></i>
                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                            <a href="#" class="btn btn-link">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
@endsection