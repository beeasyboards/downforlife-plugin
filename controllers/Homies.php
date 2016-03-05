<?php namespace BeEasy\DownForLife\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use BeEasy\DownForLife\Models\Homie;
use Flash;

/**
 * Homies Back-end Controller
 */
class Homies extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('BeEasy.DownForLife', 'downforlife', 'homies');
    }

    /**
     * Deletes a collection of models
     *
     * @return  array
     */
    public function index_onDelete()
    {
        $checkedIds = input('checked');
        if ($checkedIds && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $id) {
                if (!$model = Homie::find($id)) continue;
                $model->reindex = false;
                $model->delete();
            }
            Flash::success("Homies successfully deleted.");
        }

        return $this->listRefresh();
    }
}
