<?php namespace BeEasy\DownForLife\Http;

use Illuminate\Routing\Controller;
use BeEasy\DownForLife\Models\Homie;

class HomiesController extends Controller
{

    /**
     * Fetch the homies
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Homie::select(['id', 'name', 'href', 'is_new_window', 'created_at'])
            ->with(['image' => function($image) {
                $image->select(['attachment_id', 'disk_name', 'file_name']);
            }])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
