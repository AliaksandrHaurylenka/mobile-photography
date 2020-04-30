<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class MainMenu
 *
 * @package App
 * @property string $title
 * @property string $link
*/
class MainMenu extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ['title', 'link'];
    protected $hidden = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
      return [
        'link' => [
          'source' => 'title',
        ],
      ];
    }

}
