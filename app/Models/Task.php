<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];

    // Relationship: A task belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cast due_date to date
    protected $casts = [
        'due_date' => 'date',
    ];
}

