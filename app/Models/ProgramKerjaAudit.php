<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerjaAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function perencanaanAudit()
    {
        return $this->belongsTo(PerencanaanAudit::class);
    }

    public function susunanTim()
    {
        return $this->belongsTo(SusunanTim::class);
    }
    public function pustakaAudit()
    {
        return $this->belongsTo(PustakaAudit::class);
    }

    public function kertasKerjaAudit()
    {
        return $this->hasMany(KertasKerjaAudit::class);
    }

    



}
