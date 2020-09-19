<?php


namespace App\BusinessLogic;


use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MarketPriceAggregator
{
    public function getPrices()
    {

        $thisMonth   = (new Carbon('first day of this month'))->toDateString(); // current values
        $previousMonth = (new Carbon('first day of previous month')); //current
        $prevPrevMonth = $previousMonth->subMonth()->toDateString(); //current
        $previousMonth = $previousMonth->addMonth()->toDateString();

        $prices = DB::select(DB::raw(
        "select monthRangeValues.culture_en,
                        ANY_VALUE(monthRangeValues.culture_uk) as culture_uk,
                        ROUND(AVG(SUBSTRING_INDEX(monthRangeValues.price_en, ' ', 1))) price,
                        ROUND(AVG(SUBSTRING_INDEX(prevMonthPrice, ' ', 1))) pricePrev
                from (select market_data.culture_en, market_data.price_en, market_data.culture_uk, prevMonthSs.price_en as prevMonthPrice
                      from market_data
                        left join (select culture_en, price_en, culture_uk
                                   from market_data
                                   where published_sort between ? and ?) as prevMonthSs on market_data.culture_en = prevMonthSs.culture_en
                      where published_sort between ? and ?) as monthRangeValues
                where monthRangeValues.price_en like ?
                group by monthRangeValues.culture_en;"
        ), [$prevPrevMonth, $previousMonth, $previousMonth, $thisMonth,'%UAH/t%']);

        foreach($prices as $index => $price) {
            $changeValue = $price->price - $price->pricePrev;
            $changeValue = ($changeValue / $price->price) * 100;

            $prices[$index]->priceChange = round($changeValue,1);
        }
        return $prices;
    }

    public function getPriceUkraine()
    {
        $thisWeek   = (new Carbon('this week'))->toDateString();
        $nextWeek = (new Carbon('next week'));

        return $prices = DB::select(DB::raw(
            "select ROUND(AVG(SUBSTRING_INDEX(price_en, ' ', 1))) as price, offer_type_en, ANY_VALUE(offer_type_uk) offer_type_uk
                    from market_data
                    where published_sort between ? and ? and culture_en like 'Sunflower- oil' 
                    group by offer_type_en"
        ), [$thisWeek, $nextWeek]);

//        foreach($prices as $index => $price) {
//            $changeValue = $price->price - $price->pricePrev;
//            $changeValue = ($changeValue / $price->price) * 100;
//
//            $prices[$index]->priceChange = round($changeValue,1);
//        }
//        return $prices;
    }
}