<?php

namespace TCG\Voyager\Widgets;

use App\Page;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;

class PageDimmer extends AbstractWidget
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
        $count = Page::all()->count();
        $string = $count == 1 ? 'page' : 'pages';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string}. Click to view all pages.",
            'button' => [
                'text' => 'View all Pages',
                'link' => route('voyager.pages.index'),
            ],
            'image' => asset('voyager/book_pages.jpg'),

        ]));
    }
}
