<div class="market_prices">
    <div class="row">
        <div class="col d-flex flex-column justify-content-end order-lg-2">
            <div class="item">
                <h2 class="title">@lang('offers.market.world.price')</h2>
                <div class="table">
{{--                    <div class="table_row">--}}
{{--                        <div class="label">Chicago market (refined oil)</div>--}}
{{--                        <div class="price_row">--}}
{{--                            <div class="price">745$</div>--}}
{{--                            <div class="precent increase">+1,2%</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="table_row">
                        <div class="label">European market (refined oil)</div>
                        <div class="price_row">
                            <div class="price">831.95$</div>
                            <div class="precent increase">+7.75%</div>
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="label">Ukrainian market (refined oil)</div>
                        <div class="price_row">
                            <div class="price">34$</div>
                            <div class="precent decrease">-3,6%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-lg-4 d-flex flex-column justify-content-end order-lg-1">
            <div class="item">
                <h2 class="title">@lang('offers.market.our.price')</h2>
                <div class="table">
                    @foreach($prices as $price)
                        <div class="table_row">
                            <div class="label">{{$price->{'culture_'.$locale} }}</div>
                            <div class="price_row">
                                <div class="price">{{$price->price}} UAH</div>
                                <div class="precent @if($price->priceChange >= 0) increase @else decrease @endif">{{$price->priceChange}}%</div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="table_row">--}}
{{--                        <div class="label">Refined Oil</div>--}}
{{--                        <div class="price_row">--}}
{{--                            <div class="price">745$</div>--}}
{{--                            <div class="precent increase">+1,2%</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table_row">--}}
{{--                        <div class="label">Crude Oil</div>--}}
{{--                        <div class="price_row">--}}
{{--                            <div class="price">435$</div>--}}
{{--                            <div class="precent increase">+1,2%</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table_row">--}}
{{--                        <div class="label">Oil press cake</div>--}}
{{--                        <div class="price_row">--}}
{{--                            <div class="price">34$</div>--}}
{{--                            <div class="precent decrease">-3,6%</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>