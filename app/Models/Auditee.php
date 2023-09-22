<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perencanaanAudit()
    {
        return $this->hasMany(PerencanaanAudit::class);
    }
 public function programKerjaAudit()
    {
        return $this->hasMany(ProgramKerjaAudit::class);
    }

    public function pustakaAudit()
    {
        return $this->hasMany(PustakaAudit::class);
    }

}
