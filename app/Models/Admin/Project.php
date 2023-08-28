<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "image",
        "content"
    ];

    public function Types(){
        return $this->belongsTo(Project::class);
    }

    public function technology(){
        return $this->belongsToMany(Technology::class);
    }
}
