<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'text',
        'thumb'
    ];

    public function scopeFilter($query)
    {
        $query->join('users', 'articles.user_id', '=', 'users.id')
              ->join('categories', 'articles.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . request('search') . '%')
                ->orWhere('title', 'LIKE', '%' . request('search') . '%')  
                ->orWhere('users.name', 'LIKE', '%' . request('search') . '%')
                ->get();  
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
