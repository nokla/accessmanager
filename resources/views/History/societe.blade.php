@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">History Societe</h1>   
    <div class="d-flex align-items-center header-top-search">
        <div class="bloc-form-search">
                <div class="form-group row align-items-center">
                    <label class="col-sm-5 col-form-label">Societe :</label>
                    <div class="col-sm-7 text-right select-bloc">  
                        <select class="form-control" id="idSociete" onclick="setupPrint(this.value);">
                            <option value="">--------------</option>
                            @foreach($oSocietes as $societe)
                                <option value="{{$societe->id}}">{{$societe->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div> 
                <button id="LoadButton" class="btn btn-default"> <i class="fa fa-1x fa-search"></i></button>
                <a href="" id="lnkPrintSocieteHistory" class="btn btn-default add-btn top-btn-add"><i class="fa fa-1x fa-print"></i></a> 
        </div>
    </div>
    <table class="table table-striped table-defaults dt-responsive" id="tblHistorysociete">
        <thead>
            <tr>
                <th class="all">Nom</th>
                <th class="min-phone-l">CIN</th>
                <th class="min-phone-l">Societe</th>
                <th class="min-phone-l">Date Scan</th>
                <th class="min-phone-l">Retard</th>
            </tr>
        </thead>
    </table>
<div>

@endsection

@section("script")
    <script type="text/javascript">
        var strUrl = "{{route('getHistorySociete')}}";
        function LoadHistoryBySociete(){
            var aColumns = [
                { data: "name" },
                { data: "cin" },
                { data: "societe" },
                { data: "dScan" },
                { data: "retard" }
            ];
            var oSociete = document.getElementById('idSociete');
            initDataTable(strUrl,aColumns,"#tblHistorysociete",oSociete);
        }
        LoadHistoryBySociete();

        document.getElementById("LoadButton").addEventListener("click",function(){
            LoadBySociete(strUrl);
            console.log($("#idSociete").val());
        });
    </script>
@endsection