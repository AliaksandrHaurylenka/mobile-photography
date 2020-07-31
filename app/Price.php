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


    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update и perma_del
     * @param $column
     */
//    public function removeImg()
//    {
//      if ($this->flag != null) {
//        // Storage::delete(Price::PATH . $this->flag);
//        unlink(public_path(Price::PATH . $this->flag));
//      }
//    }


    public function removeFile($column)
    {
        if ($this->$column != null) {
            unlink(public_path(Price::PATH . $this->$column));
        }
    }

}
