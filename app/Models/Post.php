<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'postPhoto',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    protected function setPostPhotoAttribute($value)
    {
        if ($value) {
            $path = $value->store('images/uploads', ['disk' => 'postPhoto']);
            return   $this->attributes['postPhoto'] = $path;
        }
    }
}
