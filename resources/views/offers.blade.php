<!doctype html>
<html lang="ru">
<head>
    @include('templates.head')
    <title>Offers page</title>
</head>
<body class="page_offers">

<!--Header block for offers -->

<div class="header_block">
    <div class="container-fluid">

        @include('components.header')

        <div class="row">
            <div class="col-12 col-md-7 mt-4">
                <h1>Offers</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>Feel free to contact us if you need any further information</span>
            </div>
        </div>

    </div>
</div>

<!--Main block for offers -->

<div class="main_block">
    <div class="container-fluid">
        <div class="offers">
            <div class="row">
                <div class="col-12 col-md-4 pb-5">
                    <div class="offer_card">
                        <div class="image_wrap mb-4">
                            <img src="{{asset('build/img/offer1.jpg')}}" class="image img-fluid" alt="offer1">
                            <div class="caption">743$ / t</div>
                        </div>
                        <h2 class="title">Crude sunflower oil</h2>
                        <div class="description mb-2">
                            Crude oil is obtained through mechanical pressing only. In the practise, we use two
                            subsequent screw presses together with continuous heating and moisturizing coming from the
                            boilers.
                            We produce and sell oil
                        </div>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#offer1" class="more">Read
                            more</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 pb-5">
                    <div class="offer_card">
                        <div class="image_wrap mb-4">
                            <img src="{{asset('build/img/offer2.jpg')}}" class="image img-fluid" alt="offer2">
                            <div class="caption">743$ / t</div>
                        </div>
                        <h2 class="title">Refined sunflower oil</h2>
                        <div class="description mb-2">
                            results from the basic steps, namley : degumming, neutralising, bleaching, and dewaxing.
                            We produce refined oil and offer refining as the service
                        </div>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#offer2" class="more">Read
                            more</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 pb-5">
                    <div class="offer_card">
                        <div class="image_wrap mb-4">
                            <img src="{{asset('build/img/offer3.jpg')}}" class="image img-fluid" alt="offer3">
                            <div class="caption">743$ / t</div>
                        </div>
                        <h2 class="title">Sunflower press cake is</h2>
                        <div class="description mb-2">
                            the residuals of sunflower kernel after oil pressing has a positive impact on the metabolism
                            and immune system of young animals. It is a valuable high-protein additive for the
                            production of combined fodders.
                            We produce press cake and offer it as the service
                        </div>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#offer3" class="more">Read
                            more</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 pb-5">
                    <div class="offer_card">
                        <div class="image_wrap mb-4">
                            <img src="{{asset('build/img/offer4.jpg')}}" class="image img-fluid" alt="offer4">
                            <div class="caption">743$ / t</div>
                        </div>
                        <h2 class="title">Bottleing</h2>
                        <div class="description mb-2">
                            Crude oil is obtained through mechanical pressing only. In the practise, we use two
                            subsequent screw presses together with continuous heating and moisturizing coming from the
                            boilers.
                        </div>
                        <!--                        <a href="javascript:void(0);" data-toggle="modal" data-target="#offer4" class="more">Read-->
                        <!--                            more</a>-->
                    </div>
                </div>
                <div class="col-12 col-md-4 pb-5">
                    <div class="offer_card">
                        <div class="image_wrap mb-4">
                            <img src="{{asset('build/img/offer2.jpg')}}" class="image img-fluid" alt="offer5">
                            <div class="caption">743$ / t</div>
                        </div>
                        <h2 class="title">Logistics</h2>
                        <div class="description mb-2">
                            We offer logistis services for the clients
                        </div>
                        <!--                        <a href="javascript:void(0);" data-toggle="modal" data-target="#offer5" class="more">Read-->
                        <!--                            more</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('templates.footer_block')
@include('templates.footer')
@include('templates.modals')

</body>
</html>