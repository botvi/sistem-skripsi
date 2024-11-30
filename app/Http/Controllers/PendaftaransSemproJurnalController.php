<?php

namespace App\Http\Controllers;

use App\Models\PendaftaransSemproJurnal;
use App\Models\MasterDosen;
use App\Models\MasterMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Routing\Controller;

class PendaftaransSemproJurnalController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = auth()->user();

        $mahasiswa = MasterMahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa not found.');
        }

        $pendaftaranSemprosJurnal = PendaftaransSemproJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->where('mahasiswa_id', $user->id) // Filter berdasarkan mahasiswa_id
            ->get();



        return view('pagemahasiswa.semprojurnal.index', compact('pendaftaranSemprosJurnal', 'mahasiswa'));
    }



    public function create()
    {
        // Fetch the currently authenticated user's Mahasiswa
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        $dosens = MasterDosen::all(); // Fetch all dosen for select option

        return view('pagemahasiswa.semprojurnal.create', compact('dosens', 'mahasiswa'));
    }


    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'judul_proposal' => 'required|string|max:255',
            'dokumen_kartu_bimbingan' => 'required|file',
            'dokumen_kehadiran_seminar_proposal' => 'required|file',
            'dokumen_turnitin' => 'required|file',
            'dokumen_pendaftaran_seminar_proposal' => 'required|file',
            'draf_proposal' => 'required|file',
            'surat_keterangan_layak_etik' => 'nullable|file',
            'seminar_proposal' => 'nullable|file',
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'selesai' => 'nullable',
            'link_spredsheet' => 'nullable',
            'komentar' => 'nullable',
            'nilai' => 'nullable',
            'pembimbing_id' => 'required|exists:master_dosens,user_id',
            'advisor_id' => 'required|exists:master_dosens,user_id',
        ]);

        // Array of documents and their respective directories
        $documents = [
            'dokumen_kartu_bimbingan' => 'dokumen/kartu_bimbingan',
            'dokumen_kehadiran_seminar_proposal' => 'dokumen/kehadiran_seminar_proposal',
            'dokumen_turnitin' => 'dokumen/turnitin',
            'dokumen_pendaftaran_seminar_proposal' => 'dokumen/pendaftaran_seminar_proposal',
            'draf_proposal' => 'dokumen/draf_proposal',
            'surat_keterangan_layak_etik' => 'dokumen/surat_keterangan_layak_etik',
            'seminar_proposal' => 'dokumen/seminar_proposal',
        ];

        // Process document uploads
        $uploadedFiles = [];
        foreach ($documents as $inputName => $directory) {
            $uploadedFileName = time() . '_' . $request->file($inputName)->getClientOriginalName();
            $request->file($inputName)->move(public_path($directory), $uploadedFileName);
            $uploadedFiles[$inputName] = $directory . '/' . $uploadedFileName;
        }

        // Create new PendaftaranSempro record
        $pendaftaranSemproJurnal = new PendaftaransSemproJurnal();
        $pendaftaranSemproJurnal->mahasiswa_id = auth()->user()->id;
        $pendaftaranSemproJurnal->pembimbing_id = $request->pembimbing_id;
        $pendaftaranSemproJurnal->advisor_id = $request->advisor_id;
        $pendaftaranSemproJurnal->judul_proposal = $request->judul_proposal;
        $pendaftaranSemproJurnal->dokumen_kartu_bimbingan = $uploadedFiles['dokumen_kartu_bimbingan'];
        $pendaftaranSemproJurnal->dokumen_kehadiran_seminar_proposal = $uploadedFiles['dokumen_kehadiran_seminar_proposal'];
        $pendaftaranSemproJurnal->dokumen_turnitin = $uploadedFiles['dokumen_turnitin'];
        $pendaftaranSemproJurnal->dokumen_pendaftaran_seminar_proposal = $uploadedFiles['dokumen_pendaftaran_seminar_proposal'];
        $pendaftaranSemproJurnal->draf_proposal = $uploadedFiles['draf_proposal'];
        $pendaftaranSemproJurnal->surat_keterangan_layak_etik = $uploadedFiles['surat_keterangan_layak_etik'];
        $pendaftaranSemproJurnal->seminar_proposal = $uploadedFiles['seminar_proposal'];
        $pendaftaranSemproJurnal->tempat = $request->tempat;
        $pendaftaranSemproJurnal->tanggal = $request->tanggal;
        $pendaftaranSemproJurnal->waktu = $request->waktu;
        $pendaftaranSemproJurnal->selesai = $request->selesai;
        $pendaftaranSemproJurnal->link_spredsheet = $request->link_spredsheet;
        $pendaftaranSemproJurnal->komentar = $request->komentar;
        $pendaftaranSemproJurnal->nilai = $request->nilai;
        $pendaftaranSemproJurnal->status = 'pending'; // Default to pending

        // Save to database
        $pendaftaranSemproJurnal->save();

        // Success alert
        Alert::success('Sukses', 'Data pendaftaran seminar proposal jurnal berhasil ditambah.');
        return redirect()->route('pendaftaransemprojurnal.index');
    }


    public function show($id)
    {
        $pendaftaranSemproJurnal = PendaftaransSemproJurnal::findOrFail($id);
        return view('pagemahasiswa.semprojurnal.show', compact('pendaftaranSemproJurnal'));
    }

    public function edit($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        $pendaftaransemprojurnal = PendaftaransSemproJurnal::findOrFail($id);
        $dosens = MasterDosen::all();
        return view('pagemahasiswa.semprojurnal.edit', compact('pendaftaransemprojurnal', 'dosens', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_proposal' => 'required|string|max:255',
            'dokumen_kartu_bimbingan' => 'nullable|file',
            'dokumen_kehadiran_seminar_proposal' => 'nullable|file',
            'dokumen_turnitin' => 'nullable|file',
            'dokumen_pendaftaran_seminar_proposal' => 'nullable|file',
            'draf_proposal' => 'nullable|file',
            'surat_keterangan_layak_etik' => 'nullable|file',
            'seminar_proposal' => 'nullable|file',
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'selesai' => 'nullable',
            'link_spredsheet' => 'nullable',
            'komentar' => 'nullable',
            'nilai' => 'nullable',
            'pembimbing_id' => 'required|exists:master_dosens,user_id',
            'advisor_id' => 'required|exists:master_dosens,user_id',
        ]);

        $pendaftaranSemproJurnal = PendaftaransSemproJurnal::findOrFail($id);

        // Function to delete old file if new one is uploaded
        function updateFile($request, $fieldName, $directory, $pendaftaranSemproJurnal)
        {
            if ($request->hasFile($fieldName)) {
                // Delete the old file if it exists
                $oldFile = public_path($pendaftaranSemproJurnal->$fieldName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    unlink($oldFile);
                }

                // Save new file
                $newFileName = time() . '_' . $request->file($fieldName)->getClientOriginalName();
                $request->file($fieldName)->move(public_path($directory), $newFileName);

                // Update the path in the database
                $pendaftaranSemproJurnal->$fieldName = $directory . '/' . $newFileName;
            }
        }

        // Update files if present and delete old ones
        updateFile($request, 'dokumen_kartu_bimbingan', 'dokumen/kartu_bimbingan', $pendaftaranSemproJurnal);
        updateFile($request, 'dokumen_kehadiran_seminar_proposal', 'dokumen/kehadiran_seminar_proposal', $pendaftaranSemproJurnal);
        updateFile($request, 'dokumen_turnitin', 'dokumen/turnitin', $pendaftaranSemproJurnal);
        updateFile($request, 'dokumen_pendaftaran_seminar_proposal', 'dokumen/pendaftaran_seminar_proposal', $pendaftaranSemproJurnal);
        updateFile($request, 'draf_proposal', 'dokumen/draf_proposal', $pendaftaranSemproJurnal);
        updateFile($request, 'surat_keterangan_layak_etik', 'dokumen/surat_keterangan_layak_etik', $pendaftaranSemproJurnal);
        updateFile($request, 'seminar_proposal', 'dokumen/seminar_proposal', $pendaftaranSemproJurnal);

        // Update the rest of the data
        $pendaftaranSemproJurnal->update([
            'judul_proposal' => $request->judul_proposal,
            'pembimbing_id' => $request->pembimbing_id,
            'advisor_id' => $request->advisor_id,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'selesai' => $request->selesai,
            'link_spredsheet' => $request->link_spredsheet,
            'komentar' => $request->komentar,
            'nilai' => $request->nilai,
            'status' => 'pending',
        ]);

        // Success alert
        Alert::success('Sukses', 'Data pendaftaran seminar proposal jurnal berhasil diperbarui.');
        return redirect()->route('pendaftaransemprojurnal.index');
    }



    public function destroy($id)
    {
        $pendaftaranSemproJurnal = PendaftaransSemproJurnal::findOrFail($id);

        // Function to delete a file if it exists
        function deleteFile($filePath)
        {
            $fullPath = public_path($filePath);
            if (file_exists($fullPath) && is_file($fullPath)) {
                unlink($fullPath);
            }
        }

        // Delete all related files
        deleteFile($pendaftaranSemproJurnal->dokumen_kartu_bimbingan);
        deleteFile($pendaftaranSemproJurnal->dokumen_kehadiran_seminar_proposal);
        deleteFile($pendaftaranSemproJurnal->dokumen_turnitin);
        deleteFile($pendaftaranSemproJurnal->dokumen_pendaftaran_seminar_proposal);
        deleteFile($pendaftaranSemproJurnal->draf_proposal);
        deleteFile($pendaftaranSemproJurnal->surat_keterangan_layak_etik);
        deleteFile($pendaftaranSemproJurnal->seminar_proposal);

        // Delete the record from the database
        $pendaftaranSemproJurnal->delete();

        // Success alert
        Alert::success('Sukses', 'Data pendaftaran seminar proposal jurnal dan semua dokumen terkait berhasil dihapus.');
        return redirect()->route('pendaftaransemprojurnal.index');
    }



    // DOWNLOAD
    public function downloadc1($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        // Mengambil PendaftaransSemproJurnal beserta dosen-dosennya
        $pendaftaransemprojurnal = PendaftaransSemproJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->findOrFail($id);

        return view('pagemahasiswa.semprojurnal.filedownload.c1', compact('pendaftaransemprojurnal', 'mahasiswa'));
    }
    public function downloadc2($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        // Mengambil PendaftaransSemproJurnal beserta dosen-dosennya
        $pendaftaransemprojurnal = PendaftaransSemproJurnal::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->findOrFail($id);

        return view('pagemahasiswa.semprojurnal.filedownload.c2', compact('pendaftaransemprojurnal', 'mahasiswa'));
    }

    // DOWNLOAD
}
