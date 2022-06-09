<?php

namespace App\Repositories;

use App\Models\Usuarios;
use App\Repositories\BaseRepository;

/**
 * Class UsuariosRepository
 * @package App\Repositories
 * @version August 28, 2021, 1:33 am UTC
*/

class UsuariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'email',
        'password',
        'direccion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Usuarios::class;
    }
}
