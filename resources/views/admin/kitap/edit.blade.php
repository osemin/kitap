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
                            <h4 class="title">Kitap  Düzenle</h4>
                            <p class="category">Kitap Düzenleme işlemleri </p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" action="{{route('admin.kitap.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">

                                            <input type="text" name="name"  value="{{($data[0]['name'])}}" class="form-control">
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            @if($data[0]['image']!="")
                                                <img src="{{asset($data[0]['image'])}}" style="width: 120px; height: 120px;" alt="">
                                            @endif
                                            <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit;">
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">

                                            <input type="text" name="fiyat" class="form-control" value="{{$data[0]['fiyat']}}">
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">
                                                <select name="yazarid" id="" class="form-control">
                                                    @foreach($yazar as $key => $value)
                                                        <option @if($value['id'] == $data[0]['yazarid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">
                                                <select name="kategoriid" id="" class="form-control">
                                                    @foreach($kategori as $key => $value)
                                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">
                                                <select name="yayineviid" id="" class="form-control">
                                                    @foreach($yayinevi as $key => $value)
                                                        <option @if($value['id'] == $data[0]['yayineviid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">

                                                <textarea name="aciklama" id="" cols="30" rows="10"
                                                          class="form-control">{{$data[0]['aciklama']}}</textarea>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Düzenle</button>
                                <div class="clearfix"></div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
