<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class RecentMessages extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id'=>0
    ];
    public $reloadTimeout = 5;
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        
        $firstmessage=\App\Models\contract::where('proposal_id',$this->config)->first();

             

        return view('widgets.recent_messages', [
            'config' => $this->config,
             'firstmessage' => $firstmessage,
        ]);
    }
}
