<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoImagePage extends Model
{
    use SoftDeletes;

    const  PATH = 'img/';

    protected $fillable = ['photo', 'section'];
    protected $hidden = [];
    /**
     * @var mixed
     */



    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPhotoImagePageAttribute($input)
    {
        $this->attributes['photo'] = $input ? $input : null;
    }


    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update
     * @param $column
     */
    public function removeFile($column)
    {
        if ($this->$column != null && file_exists(PhotoImagePage::PATH . $this->$column)) {
            unlink(public_path(PhotoImagePage::PATH . $this->$column));
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
