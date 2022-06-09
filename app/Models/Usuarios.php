<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Usuarios
 * @package App\Models
 * @version August 28, 2021, 1:33 am UTC
 *
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property string $email
 * @property string $password
 * @property string $direccion
 */
class Usuarios extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'usuarios';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'email',
        'password',
        'direccion',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'fecha_nacimiento' => 'string',
        'email' => 'string',
        'password' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required',
        'email' => 'required',
       // 'password' => 'required',
        'direccion' => 'required'
    ];


}
