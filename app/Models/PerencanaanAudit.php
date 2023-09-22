<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function auditee()
    {
        return $this->belongsTo(Auditee::class);
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
    public function pustakaAudit()
    {
        return $this->belongsTo(PustakaAudit::class);
    }
    public function susunanTim()
    {
        return $this->hasMany(SusunanTim::class);
    }
   


}
