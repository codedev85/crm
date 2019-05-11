<?php

namespace App\Repositories;

use App\Models\Empolyee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmpolyeeRepository
 * @package App\Repositories
 * @version May 6, 2019, 12:18 pm UTC
 *
 * @method Empolyee findWithoutFail($id, $columns = ['*'])
 * @method Empolyee find($id, $columns = ['*'])
 * @method Empolyee first($columns = ['*'])
*/
class EmpolyeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empolyee::class;
    }
}
