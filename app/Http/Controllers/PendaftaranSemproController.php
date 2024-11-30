<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSempro;
use App\Models\MasterDosen;
use App\Models\MasterMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Routing\Controller;

class PendaftaranSemproController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = auth()->user();

        $mahasiswa = MasterMahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa not found.');
        }

        $pendaftaranSempros = PendaftaranSempro::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->where('mahasiswa_id', $user->id) // Filter berdasarkan mahasiswa_id
            ->get();



        return view('pagemahasiswa.sempro.index', compact('pendaftaranSempros', 'mahasiswa'));
    }



    public function create()
    {
        // Fetch the currently authenticated user's Mahasiswa
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        $dosens = MasterDosen::all(); // Fetch all dosen for select option

        return view('pagemahasiswa.sempro.create', compact('dosens', 'mahasiswa'));
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
        ];

        // Process document uploads
        $uploadedFiles = [];
        foreach ($documents as $inputName => $directory) {
            $uploadedFileName = time() . '_' . $request->file($inputName)->getClientOriginalName();
            $request->file($inputName)->move(public_path($directory), $uploadedFileName);
            $uploadedFiles[$inputName] = $directory . '/' . $uploadedFileName;
        }

        // Create new PendaftaranSempro record
        $pendaftaranSempro = new PendaftaranSempro();
        $pendaftaranSempro->mahasiswa_id = auth()->user()->id;
        $pendaftaranSempro->pembimbing_id = $request->pembimbing_id;
        $pendaftaranSempro->advisor_id = $request->advisor_id;
        $pendaftaranSempro->judul_proposal = $request->judul_proposal;
        $pendaftaranSempro->dokumen_kartu_bimbingan = $uploadedFiles['dokumen_kartu_bimbingan'];
        $pendaftaranSempro->dokumen_kehadiran_seminar_proposal = $uploadedFiles['dokumen_kehadiran_seminar_proposal'];
        $pendaftaranSempro->dokumen_turnitin = $uploadedFiles['dokumen_turnitin'];
        $pendaftaranSempro->dokumen_pendaftaran_seminar_proposal = $uploadedFiles['dokumen_pendaftaran_seminar_proposal'];
        $pendaftaranSempro->draf_proposal = $uploadedFiles['draf_proposal'];
        $pendaftaranSempro->tempat = $request->tempat;
        $pendaftaranSempro->tanggal = $request->tanggal;
        $pendaftaranSempro->waktu = $request->waktu;
        $pendaftaranSempro->selesai = $request->selesai;
        $pendaftaranSempro->link_spredsheet = $request->link_spredsheet;
        $pendaftaranSempro->komentar = $request->komentar;
        $pendaftaranSempro->nilai = $request->nilai;
        $pendaftaranSempro->status = 'pending'; // Default to pending

        // Save to database
        $pendaftaranSempro->save();

        // Success alert
        Alert::success('Sukses', 'Data pendaftaran seminar proposal berhasil ditambah.');
        return redirect()->route('pendaftaransempro.index');
    }


    public function show($id)
    {
        $pendaftaranSempro = PendaftaranSempro::findOrFail($id);
        return view('pagemahasiswa.sempro.show', compact('pendaftaranSempro'));
    }

    public function edit($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        $pendaftaransempro = PendaftaranSempro::findOrFail($id);
        $dosens = MasterDosen::all();
        return view('pagemahasiswa.sempro.edit', compact('pendaftaransempro', 'dosens', 'mahasiswa'));
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

        $pendaftaranSempro = PendaftaranSempro::findOrFail($id);

        // Function to delete old file if new one is uploaded
        function updateFile($request, $fieldName, $directory, $pendaftaranSempro)
        {
            if ($request->hasFile($fieldName)) {
                // Delete the old file if it exists
                $oldFile = public_path($pendaftaranSempro->$fieldName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    unlink($oldFile);
                }

                // Save new file
                $newFileName = time() . '_' . $request->file($fieldName)->getClientOriginalName();
                $request->file($fieldName)->move(public_path($directory), $newFileName);

                // Update the path in the database
                $pendaftaranSempro->$fieldName = $directory . '/' . $newFileName;
            }
        }

        // Update files if present and delete old ones
        updateFile($request, 'dokumen_kartu_bimbingan', 'dokumen/kartu_bimbingan', $pendaftaranSempro);
        updateFile($request, 'dokumen_kehadiran_seminar_proposal', 'dokumen/kehadiran_seminar_proposal', $pendaftaranSempro);
        updateFile($request, 'dokumen_turnitin', 'dokumen/turnitin', $pendaftaranSempro);
        updateFile($request, 'dokumen_pendaftaran_seminar_proposal', 'dokumen/pendaftaran_seminar_proposal', $pendaftaranSempro);
        updateFile($request, 'draf_proposal', 'dokumen/draf_proposal', $pendaftaranSempro);

        // Update the rest of the data
        $pendaftaranSempro->update([
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
        Alert::success('Sukses', 'Data pendaftaran seminar proposal berhasil diperbarui.');
        return redirect()->route('pendaftaransempro.index');
    }



    public function destroy($id)
    {
        $pendaftaranSempro = PendaftaranSempro::findOrFail($id);

        // Function to delete a file if it exists
        function deleteFile($filePath)
        {
            $fullPath = public_path($filePath);
            if (file_exists($fullPath) && is_file($fullPath)) {
                unlink($fullPath);
            }
        }

        // Delete all related files
        deleteFile($pendaftaranSempro->dokumen_kartu_bimbingan);
        deleteFile($pendaftaranSempro->dokumen_kehadiran_seminar_proposal);
        deleteFile($pendaftaranSempro->dokumen_turnitin);
        deleteFile($pendaftaranSempro->dokumen_pendaftaran_seminar_proposal);
        deleteFile($pendaftaranSempro->draf_proposal);

        // Delete the record from the database
        $pendaftaranSempro->delete();

        // Success alert
        Alert::success('Sukses', 'Data pendaftaran seminar proposal dan semua dokumen terkait berhasil dihapus.');
        return redirect()->route('pendaftaransempro.index');
    }



    // DOWNLOAD
    public function downloadc1($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        // Mengambil PendaftaranSempro beserta dosen-dosennya
        $pendaftaransempro = PendaftaranSempro::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->findOrFail($id);

        return view('pagemahasiswa.sempro.filedownload.c1', compact('pendaftaransempro', 'mahasiswa'));
    }
    public function downloadc2($id)
    {
        $mahasiswa = MasterMahasiswa::where('user_id', auth()->id())->first();

        // Mengambil PendaftaranSempro beserta dosen-dosennya
        $pendaftaransempro = PendaftaranSempro::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor'])
            ->findOrFail($id);

        return view('pagemahasiswa.sempro.filedownload.c2', compact('pendaftaransempro', 'mahasiswa'));
    }

    // DOWNLOAD
}
