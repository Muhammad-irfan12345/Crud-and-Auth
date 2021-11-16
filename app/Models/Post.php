<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
           'name',
           'description',
           'file',
        ];
         public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
