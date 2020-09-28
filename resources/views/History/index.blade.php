@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">History</h1>   
    <a href="{{ route('PrintHistory')}}" class="btn btn-default add-btn top-btn-add">Imprimer</a> 
    <div class="d-flex align-items-center header-top-search">
    </div>
    <table class="table table-striped table-defaults dt-responsive" id="tblHistory">
        <thead>
            <tr>
                <th class="all">Nom</th>
                <th class="min-phone-l">CIN</th>
                <th class="min-phone-l">Societe</th>
                <th class="min-phone-l">Date Scan</th>
            </tr>
        </thead>
    </table>
<div>

@endsection

@section("script")
    <script type="text/javascript">
        var strUrl = "{{route('getHistory')}}";
        var aColumns = [
            { data: "name" },
            { data: "cin" },
            { data: "societe" },
            { data: "dScan" }
        ];
        initDataTable(strUrl,aColumns,"#tblHistory");

    </script>
@endsection