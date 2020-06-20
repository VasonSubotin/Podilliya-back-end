<!doctype html>
<html lang="ru">
<head>
    @include('templates.head')
    <title>Market page</title>
</head>
<body class="page_market">

<!--Header block for market -->

<div class="header_block">
    <div class="container-fluid">


        @include('components.header')
        <div class="row">
            <div class="col-12 col-lg-7 mt-4">
                <h1>@lang('offers.market.sunflower.market')</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>@lang('offers.market.check.price')</span>
            </div>
        </div>

    </div>
</div>

<!--Main block for market -->

<div class="main_block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 order-lg-2">

                @include('components.market_prices')
            </div>
            <div class="col-12 col-lg-9 order-lg-1">

                @include('components.market_table')
            </div>
        </div>
    </div>
</div>

@include('templates.footer')


@include('templates.modals')


</body>
</html>