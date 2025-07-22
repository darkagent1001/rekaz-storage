<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blob extends Model
{
    //
    protected $fillable = ['name', 'data', 'path', 'size'];


    public function User() :BelongsTo
    {

        return $this->belongsTo(User::class);

    }

}
