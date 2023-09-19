<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SusunanTim extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function perencanaanAudit()
    {
        return $this->belongsTo(PerencanaanAudit::class);
    }
    public function auditor()
    {
        return $this->belongsTo(Auditor::class);
    }

    public function programKerjaAudit()
    {
        return $this->hasMany(ProgramKerjaAudit::class);
    }
}
