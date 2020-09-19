<div class="market_prices">
    <div class="row">
        <div class="col mb-lg-4 d-flex flex-column justify-content-end order-lg-1">
            <div class="item">
                <h2 class="title">@lang('offers.market.our.price')</h2>
                <div class="table">
                    @foreach($prices as $price)
                        <div class="table_row">
                            <div class="label">
                                @if($price->{'culture_'.$locale} == 'Sunflower')
                                    Sunflower oil seeds
                                @elseif($price->{'culture_'.$locale} == 'Sunflower- oil')
                                    Sunflower oil
                                @else
                                    {{ $price->{'culture_'.$locale} }}
                                @endif

                            </div>
                            <div class="price_row">
                                <div class="price">{{$price->price}} UAH/@lang('offers.market.urk.market.prev.month')</div>
                                <div class="precent @if($price->priceChange >= 0) increase @else decrease @endif">{{$price->priceChange}}%</div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($ukrainePrices as $ukrainePrice)
                        <div class="table_row">
                            <div class="label">@lang('offers.market.urk.market.ukraine')</div>
                            <div class="price_row">
                                <div class="price">{{$ukrainePrice->price}} UAH/@lang('offers.market.urk.market.ukraine.weekly')</div>
                                <div class="precent">{{$ukrainePrice->{'offer_type_' . $locale} }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col mb-lg-4 d-flex flex-column justify-content-end order-lg-2">
            <div class="item">
                <h2 class="title">@lang('offers.market.world.price')</h2>
                <div class="table">
                    <div class="table_row">
                        <div class="label">@lang('offers.market.urk.market.europe')</div>
                        <div class="price_row">
                            <div class="price">831.95$</div>
                            <div class="precent increase">+7.75%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column justify-content-end order-lg-3">
            <div class="item">
                <h2 class="title">@lang('offers.market.world.price.futures')</h2>
                <div class="table">
                    {{--                    <div class="table_row">--}}
                    {{--                        <div class="label">Chicago market (refined oil)</div>--}}
                    {{--                        <div class="price_row">--}}
                    {{--                            <div class="price">745$</div>--}}
                    {{--                            <div class="precent increase">+1,2%</div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="table_row">
                        <div class="label">@lang('offers.market.urk.market.chicago')</div>
                        <div class="price_row">
                            <div class="price">843.00$</div>
                            <div class="precent">@lang('offers.october')</div>
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="label">@lang('offers.market.urk.market.chicago')</div>
                        <div class="price_row">
                            <div class="price">883.50$</div>
                            <div class="precent">@lang('offers.november')</div>
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="label">@lang('offers.market.urk.market.chicago')</div>
                        <div class="price_row">
                            <div class="price">876.50$</div>
                            <div class="precent">@lang('offers.december')</div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>