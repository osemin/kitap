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
                            <h4 class="title">Yayın Evi Ekle</h4>
                            <p class="category">Yayın evi ekleme işlemleri </p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.yayinevi.create.post')}}" method="POST">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Yayın Evi Adı</label>
                                            <input type="text" name="name" class="form-control">
                                            <span class="material-input"></span></div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Kaydet</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <a href="{{route('admin.yayinevi.index')}}" class="btn btn-success">Geri Dön</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
