<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'date',
        'image',
        'text',
        'description',
        'posted',
        'type',
        'category_id'
    ];
    use HasFactory;

    //Creo las relaciones 
    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function tags()
    {

        return $this->morphToMany(Tag::class, 'taggables'); //El argumento 'taggables' es el nombre de la tabla
        //morphToMany: significa que es una relación polimórfica muchos a muchos.
    }
}
