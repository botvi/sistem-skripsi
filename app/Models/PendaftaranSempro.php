<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSempro extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahasiswa_id',
        'pembimbing_id',
        'advisor_id',
        'judul_proposal',
        'dokumen_kartu_bimbingan',
        'dokumen_kehadiran_seminar_proposal',
        'dokumen_turnitin',
        'dokumen_pendaftaran_seminar_proposal',
        'draf_proposal',
        'tempat',
        'tanggal',
        'waktu',
        'selesai',
        'link_spredsheet',
        'komentar',
        'nilai',
        'status',
    ];
    public function dosenpembimbing()
    {
        return $this->belongsTo(MasterDosen::class, 'pembimbing_id', 'user_id'); // Memastikan bahwa 'pembimbing_id' merujuk ke 'user_id' di MasterDosen
    }
    
    public function dosenpenguji()
    {
        return $this->belongsTo(MasterDosen::class, 'penguji_id', 'user_id'); // Memastikan bahwa 'penguji_id' merujuk ke 'user_id' di MasterDosen
    }
    
    public function dosenadvisor()
    {
        return $this->belongsTo(MasterDosen::class, 'advisor_id', 'user_id'); // Memastikan bahwa 'advisor_id' merujuk ke 'user_id' di MasterDosen
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MasterMahasiswa::class, 'mahasiswa_id', 'user_id');
    }
  
}
