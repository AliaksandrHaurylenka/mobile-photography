<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Portfolio
 *
 * @package App
 * @property string $photo
 * @property string $category
*/
class Subprogramme extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'program_id'];
    protected $hidden = [];



    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['program_id'] = $input ? $input : null;
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id')->withTrashed();
    }



}
