<?php

namespace TCG\Voyager\Widgets;

use App\Sale;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;

class SalesDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Sale::all()->count();
        $string = $count == 1 ? 'purchase' : 'purchases';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string}. Click to view all purchases.",
            'button' => [
                'text' => 'View all Purchases',
                'link' => route('voyager.sales.index'),
            ],
            'image' => asset('voyager/sales.jpg'),
        ]));
    }
}
