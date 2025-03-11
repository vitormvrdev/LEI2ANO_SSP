<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'level_id',
        'priority_id',
        'user_id',
        'closed_at',
        'status'
    ];
}
