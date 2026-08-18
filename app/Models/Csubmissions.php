<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csubmissions extends Model
{
    protected $table = 'submissions'; // <-- add this
    protected $fillable = [
        'name', 'email', 'company', 'designation',
        'phone', 'address', 'subject', 'message'
    ];
}

