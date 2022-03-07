<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $filable = ['name'];

    protected $with = ['problem'];
    
    public function problem()
    {
        return $this->hasMany(Problem::class, 'service_id');
    }
}
