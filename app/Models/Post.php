<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'img', 'user_id']; //nurodome, ka leidziame pildyti lenteleje

    public function user(){
        return $this->belongsTo(User::class); //rysys tarp modeliu, su User klase
    }

    public function comments(){
        return $this->hasMany(Comment::class); //useris gali tureti daug komentaru
    }
}
