<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakLanjutAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function tanggapanAudit()
    {
        return $this->belongsTo(TanggapanAudit::class);
    }
}
