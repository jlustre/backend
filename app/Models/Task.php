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
        'priority_id', 
        'user_id',
        'assignBy_id',
        'completed_at',
        'due_date'
    ];

    public function assignTo() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignBy() {
        return $this->belongsTo(User::class, 'user_id', 'assignBy_id');
    }

    public function priority() {
        return $this->belongsTo(Priority::class, 'priority_id');
    }
}
