<div class="market_table">
    <h2 class="title d-none d-lg-block">@lang('offers.market.our.price')</h2>
    <div class="table_wrap d-flex">
        <div class="table_inner w-auto w-md-100">
            <table data-toggle="table" data-classes="table">
                <thead class="thead-dark">
                <tr>
                    <th data-field="id">@lang('offers.market.table.type')</th>
                    <th data-field="price" data-sortable="true">@lang('offers.market.table.price')</th>
                    <th data-field="weight">@lang('offers.market.table.mass')</th>
                    <th data-field="type2">@lang('offers.market.table.culture')</th>
                    <th data-field="basis">@lang('offers.market.table.company.name')</th>
                    <th data-field="time">@lang('offers.market.table.data')</th>
                </tr>
                </thead>
                <tbody>

                @foreach($marketData as $data)
                    @php
                        if ($data->offer_type_en == 'sell') {
                            $buttonType = 'btn btn-sm btn-sell btn-primary w-100';
                        } else {
                            $buttonType = 'btn btn-sm btn-buy btn-primary w-100';
                        }
                    @endphp
                    <tr data-toggle="modal" data-target="#buy_id">
                        <td>
                            <button class="{{$buttonType}}">{{$data->offer_type_en}}</button>
                        </td>
                        <td>{{$data->price_en}}</td>
                        <td>{{$data->volume_en}}</td>
                        <td>{{$data->culture_en}}</td>
                        <td>{{$data->company_name_en}}</td>
                        <td>{{\Carbon\Carbon::parse($data->create_at)->toDateTimeString()}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$marketData->links()}}
        </div>
    </div>

</div>