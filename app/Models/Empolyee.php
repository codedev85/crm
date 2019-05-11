<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empolyee.
 *
 * @version May 6, 2019, 12:18 pm UTC
 *
 * @property int user_id
 */
class Empolyee extends Model
{
    use SoftDeletes;

    public $table = 'empolyees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }
}
