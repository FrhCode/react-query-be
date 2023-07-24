<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumUser extends Model
{
    use HasFactory;

    protected $table = 'forum_user';
    protected $fillable = ['user_id', 'forum_id', 'approved'];
}
