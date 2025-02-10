<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'password',
        'section_id',
        'position_id',
        'role_id',
        'login_application',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
