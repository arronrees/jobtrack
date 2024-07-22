<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'amount', 'invoice_date', 'due_date', 'notes', 'private_notes'];

    public function job()
    {
        return  $this->belongsTo(Job::class);
    }
}
