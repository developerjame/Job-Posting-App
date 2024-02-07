<?php

namespace App\Models;

use DeepCopy\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship with User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
