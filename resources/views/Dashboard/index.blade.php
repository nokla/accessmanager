@extends('layout.back')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center bloc-items-dashbord" style="margin-top:100px">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    @if(Auth::user()->super==1)
                        <div class="col-2 item-dashbord">
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
                        <div class="col-2 item-dashbord">
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
                        <div class="col-2 item-dashbord">
                            <div class="card text-center">
                                <a href="{{ route('historysociete')}}">
                                    <div class="bloc-img-item-dash">
                                        <img class="img-item-def" src="/images/Calendar_white.png" />
                                        <img class="img-item-hover" src="/images/Calendar_blue.png" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">history societe</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="col-2 item-dashbord">
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
                    <div class="col-2 item-dashbord">
                        <div class="card text-center">
                            <a href="{{ route('history.index')}}">
                                <div class="bloc-img-item-dash">
                                    <img class="img-item-def" src="/images/Calendar_white.png" />
                                    <img class="img-item-hover" src="/images/Calendar_blue.png" />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">History </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection