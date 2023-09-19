<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggapanAudit extends Model
{
  
    use HasFactory;
    protected $guarded = ['id'];
    public function kertasKerjaAudit()
    {
        return $this->belongsTo(KertasKerjaAudit::class);
    }
}
