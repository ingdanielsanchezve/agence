<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grants extends Model
{
    
    protected $table = 'permissao_sistema';

    protected $primaryKey = 'co_sistema';    

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'co_usuario', 'co_usuario');
    }

}
