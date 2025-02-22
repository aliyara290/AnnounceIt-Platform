<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'announce_id',
        'user_id',
        'content',
    ];
    public function announce() {
        return $this->belongsTo(Announcements::class);
    }
}
