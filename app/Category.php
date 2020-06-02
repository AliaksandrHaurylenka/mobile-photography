<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Category
 *
 * @package App
 * @property string $title
 * @property string $link
*/
class Category extends Model
{
    use SoftDeletes;
    use Sluggable;


    protected $fillable = ['title', 'link'];
    protected $hidden = [];


    public function sluggable()
    {
      return [
        'link' => [
          'source' => 'title',
        ],
      ];
    }

    public function portfolio()
    {
      return $this->hasMany(Portfolio::class);
    }



}
