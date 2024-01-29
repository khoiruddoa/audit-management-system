<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\KertasKerjaAudit;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\TanggapanAudit;
use App\Models\TindakLanjutAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TemuanAuditController extends Controller
{
    public function index()
    {


        $user = Auth::user();

        // Check if the user has the admin, super admin, or lead auditor role
        if ($user->hasRole('admin') || $user->hasRole('super admin')) {
            // Get all program audit data
            $audit = ProgramKerjaAudit::where('status', 1)->get();
        } else {


            $auditeeIds = auth()->user()->auditees->pluck('id')->toArray();


            // Mengambil hanya kolom 'id' dari Auditee yang memenuhi kondisi



            $audit = ProgramKerjaAudit::where('status', 1)->whereHas('perencanaanAudit', function ($query) use ($auditeeIds) {
                $query->whereIn('auditee_id', $auditeeIds);
            })->get();

        }

        return view('dashboard.temuan.index', [
            'audits' => $audit
        ]);
    }


    public function detail($id)
    {

        return view('dashboard.temuan.detail', [
            'kertaskerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->get()
        ]);
    }

    public function sudahDitanggapi($id)
    {

        return view('dashboard.temuan.detail', [
            'kertaskerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->whereHas('tanggapanAudit')->get()
        ]);
    }


    public function tinjauUlang($id)
    {

        return view('dashboard.temuan.detail', [
            'kertaskerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->whereHas('tanggapanAudit', function ($query) {
                $query->where('status', 0);
            })->get()
        ]);
    }

    public function tindakLanjut($id)
    {

        return view('dashboard.temuan.detail', [
            'kertaskerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->whereHas('tanggapanAudit', function ($query) {
                $query->where('status', '1');
            })->get()
        ]);
    }
    public function detail_temuan($id)
    {

        return view('dashboard.temuan.detail_temuan', [
            'kertasKerja' => KertasKerjaAudit::find($id)
        ]);
    }


    public function store(Request $request)
    {
        if ($request->option == '1') {
            $validatedData = $request->validate([

                'kertas_kerja_audit_id' => 'required|string|max:255',

            ]);
            $validatedData['status'] = '1';
            $validatedData['tanggapan'] = 'Setuju dengan pendapat auditor';
            TanggapanAudit::create($validatedData);

            return redirect('/temuan')->with('success', 'Tanggapan diisi');
        } else {
            $validatedData = $request->validate([

                'kertas_kerja_audit_id' => 'required|string|max:255',
                'lampiran' => 'string|max:255',
                'tanggapan' => 'string|max:255'

            ]);
            $validatedData['status'] = '2';
            TanggapanAudit::create($validatedData);

            return redirect('/temuan')->with('success', 'Tanggapan diisi');
        }
    }

    public function restore(Request $request)
    {

        if ($request->option == '1') {

            $tanggapan = TanggapanAudit::find($request->id);


            $validatedData['status'] = '1';
            $validatedData['tanggapan'] = 'Setuju dengan pendapat auditor';
            $validatedData['komentar_auditee'] = $tanggapan->tanggapan;

            $tanggapan->update($validatedData);

            return back()->with('success', 'Sukses');
        }
    }


    public function tanggapan()
    {

        return view('dashboard.tanggapan_auditee.index', [
            'tanggapan' => TanggapanAudit::all()
        ]);
    }
}
