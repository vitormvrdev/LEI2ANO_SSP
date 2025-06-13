<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
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

    protected $casts = [
        'closed_at' => 'datetime',
    ];

    // Relação com Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relação com Level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // Relação com Priority
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    // Relação com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}