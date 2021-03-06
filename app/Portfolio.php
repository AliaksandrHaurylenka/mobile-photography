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
     */
    public function removeImg()
    {
      if ($this->photo != null && $this->photo_after != null) {
        unlink(public_path(Portfolio::PATH . $this->photo));
        unlink(public_path(Portfolio::PATH . $this->photo_after));
      }
    }

    public function removePhoto($column)
    {
      if ($this->$column != null) {
        unlink(public_path(Portfolio::PATH . $this->$column));
      }
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в perma_del
     */
    public function remove()
    {
      $this->removeImg();
      $this->forceDelete();
    }

}
