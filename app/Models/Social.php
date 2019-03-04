<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_logins';

    protected $fillable = [
        'user_id',
        'provider',
        'social_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
