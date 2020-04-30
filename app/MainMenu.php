<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $fillable = ['title', 'link'];
    protected $hidden = [];
    
    
    
}
