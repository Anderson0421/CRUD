<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugare extends Model
{
    use HasFactory;

    protected $table = 'Lugares';
    protected $fillable = ['nombre', 'categoria', 'oferta', 'imagen'];
    public $timestamps = false;

}
