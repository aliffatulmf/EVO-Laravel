<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\Admin\CandidateFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'position',
        'address',
        'education',
        'name',
        'image',
        'video',
        'description'
    ];
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        // 
    ];
    protected $timestamp = true;

    protected static function newFactory()
    {
        return CandidateFactory::new();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
