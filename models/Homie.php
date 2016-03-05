<?php namespace BeEasy\DownForLife\Models;

use Model;

/**
 * Homie Model
 */
class Homie extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'beeasy_downforlife_homies';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'created_at',
    ];

    /**
     * @var array Relations
     */
    public $attachOne = [
        'image' => ['System\Models\File'],
    ];

    /**
     * Validation
     */
    public $rules = [
        'name'  => 'required',
        'image' => 'required',
    ];

    public function beforeSave()
    {
        if (!$this->created_at)
            $this->created_at = date('Y-m-d H:i:s', time());
    }

    public function afterDelete()
    {
        $this->image->delete();
    }

    public function getDownSinceAttribute()
    {
        return date('F Y', strtotime($this->created_at));
    }
}
