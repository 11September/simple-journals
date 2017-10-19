<?php

namespace TCG\Voyager\Widgets;

use App\Journal;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;

class JournalsDimmer extends AbstractWidget
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
        $count = Journal::all()->count();
        $string = $count == 1 ? 'journal' : 'journals';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string}. Click to view all journals.",
            'button' => [
                'text' => 'View all Journals',
                'link' => route('voyager.journals.index'),
            ],
            'image' => asset('voyager/journals.jpg'),

        ]));
    }
}
