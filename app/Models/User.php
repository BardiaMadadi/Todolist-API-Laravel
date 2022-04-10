<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    use HasFactory;

    protected $fillable = ['username','pwd','email'];

    public function column(){
        return $this->hasOne(Column::class);
    }

}
