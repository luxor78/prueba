<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'doctores';
    public $fillable = [
        'nombre',
        'cmp',
        'rne',
        'firma'
    ];
    protected $dates = ['deleted_at'];
}
