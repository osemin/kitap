@extends('layouts.app')
@section('content')
    <div class="bnr" id="home">
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                @foreach(\App\Slider::all() as $key => $value)
                <li>
                    <img src="{{asset(\App\Helper\mHelper::largeImage($value['image']))}}" alt=""/>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--banner-ends-->
    <!--Slider-Starts-Here-->
    <script src="{{asset('js/responsiveslides.min.js')}}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                    @foreach(\App\Kitaplar::inRandomOrder()->limit(3)->get() as $key => $value)
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <a href="{{route('kitap.detay',['selflink'=>$value['selflink']])}}">  <img class="img-responsive" style="width: 350px; height: 300px;" src="{{asset(\App\Helper\mHelper::largeImage($value['image']))}}" alt=""/></a>
                        <figcaption>
                            <h2>{{$value['name']}}</h2>
                            <p>{{$value['aciklama']}}</p>
                        </figcaption>
                    </figure>
                </div>

                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--about-end-->
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                @foreach(\App\Kitaplar::all()->chunk(4) as $chunk)
                <div class="product-one">
                    @foreach($chunk as $key => $value)
                    <div class="col-md-3 product-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="{{route('kitap.detay',['selflink'=>$value['selflink']])}}" class="mask">
                                <img class="img-responsive zoom-img" src="{{asset($value['image'])}}"  style="height: 200px; width: 200px;" alt="" />
                            </a>
                            <div class="product-bottom">
                                <h3>{{$value['name']}}</h3>
                                <p>{{\App\Yazarlar::getField($value['yazarid'],"name")}}</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value['fiyat']}}</span></h4>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--product-end-->
@endsection
