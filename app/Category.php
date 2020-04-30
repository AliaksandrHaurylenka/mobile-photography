<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $fillable = ['title', 'link'];
    protected $hidden = [];
    
    
    
}
