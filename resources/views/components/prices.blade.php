<div class="row">
    <div class="col-12">
        <div class="prices">
            <h2 class="title mt-3">@lang('home.header.our.price')</h2>

            @foreach($ourPrices as $ourPrice)
                <div class="prices_item row_info">
                    <div class="label">
                        <span>{{$ourPrice->culture}}</span>
                    </div>
                    <div class="caption">
                        <span>{{$ourPrice->price}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>