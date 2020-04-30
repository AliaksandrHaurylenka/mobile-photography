<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuSocial
 *
 * @package App
 * @property string $title
 * @property string $link
*/
class MenuSocial extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'link'];
    protected $hidden = [];
    
    
    
}
