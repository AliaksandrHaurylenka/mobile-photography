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
class Portfolio extends Model
{
    use SoftDeletes;

    const PATH = 'img/portfolio/';

    protected $fillable = ['photo', 'photo_after', 'category_id'];
    protected $hidden = [];



    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update
     * @param $column
     */
    public function removeFile($column)
    {
      if ($this->$column != null && file_exists(Portfolio::PATH . $this->$column)) {
        unlink(public_path(Portfolio::PATH . $this->$column));
      }
    }

}
