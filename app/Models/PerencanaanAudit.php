<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class PerencanaanAudit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];




    // public function getFirstdateAttribute(){

    //     return Carbon::parse($this->attributes['firstdate'])->translatedFormat('l, j F Y');    }

    // public function getEnddateAttribute()
    // {
    //     return Carbon::parse($this->attributes['enddate'])->translatedFormat('l, j F Y');
    // }

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
    public function programKerjaAudit()
    {
        return $this->hasMany(ProgramKerjaAudit::class);
    }


}
