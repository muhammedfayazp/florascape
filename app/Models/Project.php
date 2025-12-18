<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_category_id', 'title', 'description', 'image', 'sort_order'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
