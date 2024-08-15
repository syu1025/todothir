<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'byDate', "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
