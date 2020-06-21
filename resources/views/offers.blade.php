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
                <h1>@lang('proposals.prop')</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>@lang('proposals.prop.def')</span>
            </div>
        </div>

    </div>
</div>

<!--Main block for offers -->

<div class="main_block">
    <div class="container-fluid">
        <div class="offers">
            <div class="row">

                @foreach($offers as $offer)
                    <div class="col-12 col-md-4 pb-4 pb-md-0">
                        <div class="offer_card">
                            <div class="image_wrap mb-4">
                                <img src="{{$offer->image_path}}" class="image img-fluid" alt="offer1">
                                <div class="caption">{{$offer->price}}</div>
                            </div>
                            <h3 class="title">{{$offer->heading}}</h3>
                            <div class="description mb-2">
                                {{$offer->partial_description}}
                            </div>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#offer{{$offer->id}}" class="more">Read more</a>
                        </div>
                    </div>


                    <div class="modal fade" id="offer{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="Offer{{$offer->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <div class="modal-header">
                                    <span class="modal-title">Crude sunflower oil</span>
                                </div>
                                <div class="modal-body">
                                    <img src="{{asset($offer->image_path)}}" alt="" class="modal_image img-fluid">
                                    {!! $offer->full_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</div>

@include('templates.footer_block')
@include('templates.footer')
@include('templates.modals')

</body>
</html>