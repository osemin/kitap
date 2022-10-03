@extends('layouts.admin')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                            {{session("status")}}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sipariş Detayı</h4>

                        </div>
                        <div class="card-content">


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label >ALICI :</label>
                                           {{\App\User::getField($data[0]['userid'],"name")}}

                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label >ADRES: </label>
                                        {{$data[0]['adres']}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label >TELEFON: </label>
                                        {{$data[0]['telefon']}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label >MESAJ: </label>
                                        {{$data[0]['mesaj']}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            @foreach(json_decode($data[0]['json'],true) as $key => $value)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label >KİTAP ADI: </label>
                                        {{$value['name']}}
                                        <br>
                                        <label >FİYATI: </label>
                                        {{$value['fiyat']}} TL
                                        <br>

                                    </div>
                                </div>
                            </div>
                            @endforeach


                                </div>


                                <div class="clearfix"></div>

                        </div>
                        <a href="{{route('admin.yayinevi.index')}}" class="btn btn-success">Geri Dön</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
