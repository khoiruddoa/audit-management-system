<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function perencanaanAudit()
    {
        return $this->hasMany(PerencanaanAudit::class);
    }

    public function pustakaAudit()
    {
        return $this->hasMany(PustakaAudit::class);
    }
}
