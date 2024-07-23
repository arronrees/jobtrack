<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_name', 'notes', 'contact_telephone', 'contact_email', 'website', 'logo'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
