<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'username',
        'password',
        'role_id'
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'password'
    ];
    protected $timestamp = true;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
