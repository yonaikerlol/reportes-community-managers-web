<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "content", "user_id"];

    /**
     * Belongs to the User.
     */
    public function user()
    {
        return $this->belongsTo("App\\User");
    }
}
