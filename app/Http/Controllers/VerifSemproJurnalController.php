<?php

namespace App\Http\Controllers;

use App\Models\PendaftaransSemproJurnal;
use App\Models\MasterDosen;
use App\Models\MasterLink;
use App\Models\MasterMahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PendaftaranSemproJurnalExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Routing\Controller;

class VerifSemproJurnalController extends Controller
{


    public function exportsemprojurnal()
    {
        return Excel::download(new PendaftaranSemproJurnalExport, 'pendaftaran_semprojurnal.xlsx');
    }

    public function index()
    {
        // Fetch seminar proposals with associated dosen and mahasiswa data
        $pendaftaranSemprosJurnal = PendaftaransSemproJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor', 'mahasiswa'])
            ->get();

        return view('pageadmin.semprojurnal.index', compact('pendaftaranSemprosJurnal'));
    }

    public function detail($id)
    {
        $pendaftaransemprojurnal = PendaftaransSemproJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->findOrFail($id);
        $link = MasterLink::all();
        $dosens = MasterDosen::all();
        return view('pageadmin.semprojurnal.detail', compact('pendaftaransemprojurnal', 'link', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'selesai' => 'nullable',
            'link_spredsheet' => 'nullable',
            'komentar' => 'nullable',
            'nilai' => 'nullable',
            'advisor_id' => 'nullable',
        ]);

        $pendaftaranSemproJurnal = PendaftaransSemproJurnal::findOrFail($id);



        // Update the rest of the data
        $pendaftaranSemproJurnal->update([
            'status' => $request->status,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'selesai' => $request->selesai,
            'link_spredsheet' => $request->link_spredsheet,
            'komentar' => $request->komentar,
            'nilai' => $request->nilai,
            'advisor_id' => $request->advisor_id,
        ]);

        // Success alert
        Alert::success('Sukses', 'Status pendaftaran seminar proposal jurnal berhasil diperbarui.');
        return redirect()->route('verifsemprojurnal.index');
    }
}
