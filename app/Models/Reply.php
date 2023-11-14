<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table ='reply';
    protected $fillable = [
      'comment_id',
      'user_comment',
      'reply_text',
      'name_reply'
    ];
}
