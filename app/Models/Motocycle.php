<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Motocycle extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
    
    'EMAIL',
    'ID_LOAI',
    'TENXE',
    'TINHTRANG',
    'NGAYMUA',
    'PHANKHOI',];
    protected $primaryKey = 'id_xe';
    protected $table = 'xe';

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
