@extends('layout.back')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center bloc-items-dashbord" style="margin-top:100px">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    @if(Auth::user()->super==1)
                        <div class="col-4 item-dashbord">
                            <div class="card text-center">
                                <a href="{{ route('societe.index')}}">
                                    <div class="bloc-img-item-dash">
                                        <img class="img-item-def" src="/images/icon-societe.svg" />
                                        <img class="img-item-hover" src="/images/icon-societe-bleu.svg" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> Societes </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 item-dashbord">
                            <div class="card text-center">
                                <a href="{{ route('user.index')}}">
                                    <div class="bloc-img-item-dash">
                                        <img class="img-item-def" src="/images/icon-utilisateurs.svg" />
                                        <img class="img-item-hover" src="/images/icon-utilisateurs-bleu.svg" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Utilisateurs </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="col-4 item-dashbord">
                        <div class="card text-center">
                            <a href="{{ route('employe.index')}}">
                                <div class="bloc-img-item-dash">
                                    <img class="img-item-def" src="/images/icon-personels.svg" />
                                    <img class="img-item-hover" src="/images/icon-personels-bleu.svg" />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Personels </h5>
                                </div>
                            </a>
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
    </div>
@endsection