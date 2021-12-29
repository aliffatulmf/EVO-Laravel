<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id'
    ];
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        // 
    ];
    protected $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
