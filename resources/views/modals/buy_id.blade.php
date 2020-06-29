<div class="modal fade" id="buy_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="Buy ID" aria-hidden="true">
    <div class="modal-dialog modal_contact modal_market" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            <div class="modal_market_data">
                <div class="row">
                    <div class="col">
                        <h2 class="m-0">@lang('offers.market.operation.type.buy')</h2>
                    </div>
                    {{--                    <div class="col flex-grow-0">--}}
                    {{--                        <button class="btn btn-more">More</button>--}}
                    {{--                    </div>--}}
                </div>
                <div class="row">
                    <div class="col">
                        <div class="date">{{$data->create_at}}</div>
                    </div>
                </div>
                <div class="data_row">
                    <div class="data_label">@lang('offers.market.operation.crop.type')</div>
                    <div class="data_text">{{$data->culture}}</div>
                </div>
                <div class="data_row">
                    <div class="data_label">@lang('offers.market.operation.crop.volume')</div>
                    <div class="data_text">{{$data->volume}}</div>
                </div>
                <div class="data_row">
                    <div class="data_label">@lang('offers.market.operation.crop.vat')</div>
                    <div class="data_text">{{$data->vat}}</div>
                </div>
                <div class="data_row">
                    <div class="data_label">@lang('offers.market.terms')</div>
                    <div class="data_text">{{$data->delivery_terms}}</div>
                </div>
                <div class="data_row">
                    <div class="data_label">@lang('offers.market.city')</div>
                    <div class="data_text">{{$data->location}}</div>
                </div>
                <div class="row half_space">
                    <div class="col d-flex">
                        <div class="data_row">
                            <div class="data_label">@lang('offers.market.delivery.terms')</div>
                            <div class="data_text">{{$data->delivery}}</div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="data_row">
                            <div class="data_label">@lang('offers.market.delivery.month')</div>
                            <div class="data_text">{{$data->month_of_delivery}}</div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="data_row">
                            <div class="data_label">@lang('offers.market.valid.until')</div>
                            <div class="data_text">{{$data->valid_unitl}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal_footer">
                <div class="row">
                    <div class="col">{{$data->company_name}}</div>
                </div>
                <div class="row">
                    <div class="col">{{$data->company_contact}}, <a href="tel:{{$data->company_telephone}}">{{$data->company_telephone}}</a></div>
                </div>
                <div class="row">
                    <div class="col">{{$data->company_address}}</div>
                </div>
                <div class="row">
                    <div class="col text-nowrap flex-grow-0">
                        <a href="http://google.com" target="_blank" rel="noopener noreferrer">podiliyagold.com</a>
                    </div>
                    <div class="col">
                        <div class="copyright_market text-right">by <a href="http://graintrade.com.ua/" target="_blank" rel="noopener noreferrer">Graintrade.com.ua</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>