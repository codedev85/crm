<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company.
 *
 * @version May 6, 2019, 1:23 pm UTC
 *
 * @property string name
 * @property string website
 * @property string email
 * @property string logo_path
 * @property int user_id
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'website',
        'email',
        'logo_path',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'website' => 'string',
        'email' => 'string',
        'logo_path' => 'string',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'website' => 'required',
        'email' => 'required',
        // 'logo_path' => 'required',
        'user_id' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
