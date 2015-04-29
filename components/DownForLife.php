<?php namespace Bedard\DownForLife\Components;

use Bedard\DownForLife\Models\Homie;
use Cms\Classes\ComponentBase;

class DownForLife extends ComponentBase
{

    /**
     * @var Collection
     */
    public $homies;

    public function componentDetails()
    {
        return [
            'name'        => 'Down For Life',
            'description' => 'Homies who are down for life!'
        ];
    }

    public function onRun()
    {
        $this->homies = Homie::with('image')->orderBy('created_at', 'desc')->get();
    }

}
