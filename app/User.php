<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'cao_usuario';

    protected $primaryKey = 'co_usuario';

    public $incrementing = false;

    public $timestamps = false;

    public function grants()
    {
        return $this->hasOne('App\Grants', 'co_usuario');
    }

}
