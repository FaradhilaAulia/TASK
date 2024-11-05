<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'transactions'; // Ganti dengan nama tabel Anda jika berbeda

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'modul_id',  // Kolom yang ada di tabel
        'amount',
        'createdBy',
    ];

    // Relasi dengan WorkflowApproval
    public function workflowApproval()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id');
    }
}
