<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PustakaAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function programKerjaAudit()
    {
        return $this->hasMany(ProgramKerjaAudit::class);
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
