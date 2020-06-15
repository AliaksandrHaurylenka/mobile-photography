<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    const  PATH = 'img/comments/avatar/';

    protected $fillable = ['name', 'avatar', 'comment'];
    protected $hidden = [];

    public function allow() { 
        $this->status = 'active';
        $this->save();
    }

    public function disAllow() {
        $this->status = 'wait';
        $this->save();
    }

    public function toggleStatus() {
        if ($this->status == 'wait') {
            return $this->allow();
        }

        return $this->disAllow();
    }
}
