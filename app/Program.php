<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Program
 *
 * @package App
 * @property string $lessons
*/
class Program extends Model
{
    use SoftDeletes;

    protected $fillable = ['lessons'];
    protected $hidden = [];
    
    
    
}
