<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    const STATUS_WAIT = 'wait';
    const STATUS_ACTIVE = 'active';

    const  PATH = 'img/comments/avatar/';

    protected $fillable = ['name', 'avatar', 'comment'];
    protected $hidden = [];

    public function allow() { 
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }

    public function disAllow() {
        $this->status = self::STATUS_WAIT;
        $this->save();
    }

    public function toggleStatus() {
        if ($this->status == self::STATUS_WAIT) {
            return $this->allow();
        }

        return $this->disAllow();
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update
     */
    public function removeImg()
    {
      if ($this->avatar != null) {
        unlink(public_path(Comment::PATH . $this->avatar));
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
