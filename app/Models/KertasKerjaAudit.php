<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KertasKerjaAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function programKerjaAudit()
    {
        return $this->belongsTo(ProgramKerjaAudit::class);
    }
    public function tanggapanAudit()
    {
        return $this->hasMany(TanggapanAudit::class);
    }
    public function tindakLanjutAudit()
    {
        return $this->hasMany(TindakLanjutAudit::class);
    }

}
