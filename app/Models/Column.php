<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    protected $fillable = ['title','desc','user_id'];
    /**
     * @var mixed
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function column(){
        return $this->hasOne(Row::class);
    }

}
