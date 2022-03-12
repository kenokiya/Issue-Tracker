<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Problem extends Model
{
    use HasFactory, Searchable;

    protected $table = 'problems';

    protected $fillable = ['problem_details', 'image', 'service_id', 'user_id', 'targeted_id', 'notification', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $with = ['user'];
    public function targetUser()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function solution()
    {
        return $this->hasMany(Solution::class);
    }

    public function toSearchableArray()
    {
        return [
            'created_at' => $this->created_at,
        ];
    }
}
