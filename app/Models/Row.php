<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','column_id'];


    public function column()
    {
        return $this->belongsTo(User::class);
    }

}
