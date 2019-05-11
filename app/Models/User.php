<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User.
 *
 * @version May 7, 2019, 9:31 pm UTC
 *
 * @property string name
 * @property string first_name
 * @property string last_name
 * @property int role_id
 * @property int company_id
 * @property string email
 * @property string password
 * @property string remember_token
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'first_name',
        'last_name',
        'role_id',
        'company_id',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'role_id' => 'integer',
        'company_id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        // 'role_id' => 'required',
        // 'company_id' => 'required',
        'email' => 'required',
        // 'password' => 'required',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function company()
    {
        return $this->belongTo('App\Models\Company');
    }
}
