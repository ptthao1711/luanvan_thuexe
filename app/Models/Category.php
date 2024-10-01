<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'TEN_LOAI',
        
    ];
    protected $primaryKey = 'ID_LOAI';
    protected $table = 'LOAIXE';
    public function Motocycle() {
        return $this->hasMany('App\Models\Motocycle');
    }
}
