<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    //Proteting solutions table
    protected $table = 'solutions';

    //protecting data filled in problems table
    protected $fillable = ['problem_details', 'image', 'user_id', 'status'];

    //Eloquent model defining the realtionship between problems table and solutions table
    
    protected $with = ['problem'];

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    //Eloquent model defining the realtionship between users table and solutions table

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
