<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Price
 *
 * @package App
 * @property string $flag
 * @property integer $price
 * @property string $currency
*/
class Price extends Model
{
    use SoftDeletes;

    const  PATH = 'img/';

    protected $fillable = ['flag', 'price', 'currency'];
    protected $hidden = [];



    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

}
