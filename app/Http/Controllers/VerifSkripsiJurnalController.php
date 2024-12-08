<?php

namespace App\Http\Controllers;

use App\Models\PendaftaransSkripsiJurnal;
use App\Models\MasterDosen;
use App\Models\MasterLink;
use App\Models\MasterMahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PendaftaranSkripsiJurnalExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Routing\Controller;

class VerifSkripsiJurnalController extends Controller
{
    public function exportskripsijurnal()
    {
        return Excel::download(new PendaftaranSkripsiJurnalExport, 'pendaftaran_skripsijurnal.xlsx');
    }
    public function index()
    {
        // Fetch seminar proposals with associated dosen and mahasiswa data
        $pendaftaranSkripsisJurnal = PendaftaransSkripsiJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenketuapenguji','mahasiswa'])
            ->get();

        return view('pageadmin.skripsijurnal.index', compact('pendaftaranSkripsisJurnal'));
    }

    public function detail($id)
    {
        $pendaftaranskripsijurnal = PendaftaransSkripsiJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenketuapenguji'])
        ->findOrFail($id);
        $link = MasterLink::all();
        $dosens = MasterDosen::all();

        return view('pageadmin.skripsijurnal.detail', compact('pendaftaranskripsijurnal','link', 'dosens'));
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
            'penguji_id' => 'nullable',
            'ketua_penguji_id' => 'nullable',
        ]);
        $pendaftaranSkripsiJurnal = PendaftaransSkripsiJurnal::findOrFail($id);

      

        // Update the rest of the data
        $pendaftaranSkripsiJurnal->update([
            'status' => $request->status,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'selesai' => $request->selesai,
            'link_spredsheet' => $request->link_spredsheet,
            'komentar' => $request->komentar,
            'nilai' => $request->nilai,
            'penguji_id' => $request->penguji_id,
            'ketua_penguji_id' => $request->ketua_penguji_id,
        ]);

        // Success alert
        Alert::success('Sukses', 'Status pendaftaran skripsi jurnal berhasil diperbarui.');
        return redirect()->route('verifskripsijurnal.index');
    }
}
