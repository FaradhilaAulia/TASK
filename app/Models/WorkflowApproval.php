<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkflowApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'modul',
        'type',
        'value',
        'nik',
        'name',
        'email',
        'position',
    ];

    // Relasi dengan Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'modul_id');
    }
}
