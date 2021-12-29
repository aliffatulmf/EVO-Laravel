<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\Admin\RoleFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'default_point',
        'is_admin'
    ];
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        // 
    ];
    protected $attributes = [
        //
    ];
    protected $timestamp = true;

    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
