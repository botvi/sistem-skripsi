@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pendaftaran Skripsi</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <hr />
                    <div class="card border-primary border-4">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center mb-4">
                                <div><i class="bx bxs-user me-2 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-primary">Detail Pendaftaran Skripsi</h5>
                            </div>
                            <hr />
                            <form action="{{ route('verifskripsi.update', $pendaftaranskripsi->id) }}" method="POST"
                                enctype="multipart/form-data" class="row g-4">
                                @csrf
                                @method('PUT')

                                <!-- Mahasiswa Details -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $pendaftaranskripsi->mahasiswa->nama }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        value="{{ $pendaftaranskripsi->mahasiswa->nim }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                        value="{{ $pendaftaranskripsi->mahasiswa->telepon }}" readonly>
                                </div>

                                <!-- Proposal Details -->
                                <div class="col-md-6">
                                    <label for="judul_skripsi" class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi"
                                        value="{{ $pendaftaranskripsi->judul_skripsi }}" readonly>
                                </div>

                                <!-- Dosen Details -->
                                <div class="col-md-6">
                                    <label for="pembimbing_id" class="form-label">Dosen Pembimbing</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaranskripsi->dosenpembimbing->nama }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="advisor_id" class="form-label">Dosen Ketua Penguji</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaranskripsi->dosenketuapenguji->nama }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="penguji_id" class="form-label">Dosen Penguji</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaranskripsi->dosenpenguji->nama }}"
                                        readonly>
                                </div>

                                <!-- Document Links -->
                                <div class="col-12">
                                    <h6 class="text-primary">Dokumen Pendukung</h6>
                                    <hr />
                                </div>

                                <div class="col-md-6">
                                    <label for="file_persetujuan_pendaftaran_sidang_skripsi" class="form-label">Persetujuan Pendaftaran Sidang Skripsi</label>
                                    <a href="{{ asset('dokumen/persetujuan_pendaftaran_sidang_skripsi/' . basename($pendaftaranskripsi->file_persetujuan_pendaftaran_sidang_skripsi)) }}" target="_blank" class="d-block">Lihat Persetujuan Pendaftaran Sidang Skripsi</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_pendaftaran_ujian_skripsi" class="form-label">Pendaftaran Ujian Skripsi</label>
                                    <a href="{{ asset('dokumen/pendaftaran_ujian_skripsi/' . basename($pendaftaranskripsi->dokumen_pendaftaran_ujian_skripsi)) }}" target="_blank" class="d-block">Lihat Pendaftaran Ujian Skripsi</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="kartu_bimbingan" class="form-label">Kartu Bimbingan</label>
                                    <a href="{{ asset('dokumen/kartu_bimbingan/' . basename($pendaftaranskripsi->kartu_bimbingan)) }}" target="_blank" class="d-block">Lihat Kartu Bimbingan</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_kartu_rencana_studi" class="form-label">Kartu Rencana Studi</label>
                                    <a href="{{ asset('dokumen/kartu_rencana_studi/' . basename($pendaftaranskripsi->dokumen_kartu_rencana_studi)) }}" target="_blank" class="d-block">Lihat Kartu Rencana Studi</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_transkrip_nilai" class="form-label">Transkrip Nilai</label>
                                    <a href="{{ asset('dokumen/transkrip_nilai/' . basename($pendaftaranskripsi->dokumen_transkrip_nilai)) }}" target="_blank" class="d-block">Lihat Transkrip Nilai</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_bebas_biaya_administrasi" class="form-label">Bebas Biaya Administrasi</label>
                                    <a href="{{ asset('dokumen/bebas_biaya_administrasi/' . basename($pendaftaranskripsi->dokumen_bebas_biaya_administrasi)) }}" target="_blank" class="d-block">Lihat Bebas Biaya Administrasi</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_bebas_pinjaman_perpustakaan" class="form-label">Bebas Pinjaman Perpustakaan</label>
                                    <a href="{{ asset('dokumen/bebas_pinjaman_perpustakaan/' . basename($pendaftaranskripsi->dokumen_bebas_pinjaman_perpustakaan)) }}" target="_blank" class="d-block">Lihat Bebas Pinjaman Perpustakaan</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_ijazah_terakhir" class="form-label">Ijazah Terakhir</label>
                                    <a href="{{ asset('dokumen/ijazah_terakhir/' . basename($pendaftaranskripsi->dokumen_ijazah_terakhir)) }}" target="_blank" class="d-block">Lihat Ijazah Terakhir</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_fotocopy_toefl" class="form-label">Fotocopy TOEFL</label>
                                    <a href="{{ asset('dokumen/fotocopy_toefl/' . basename($pendaftaranskripsi->dokumen_fotocopy_toefl)) }}" target="_blank" class="d-block">Lihat Fotocopy TOEFL</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_input_skpi" class="form-label">Input SKPI</label>
                                    <a href="{{ asset('dokumen/input_skpi/' . basename($pendaftaranskripsi->dokumen_input_skpi)) }}" target="_blank" class="d-block">Lihat Input SKPI</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="draft_skripsi" class="form-label">Draft Skripsi</label>
                                    <a href="{{ asset('dokumen/draft_skripsi/' . basename($pendaftaranskripsi->draft_skripsi)) }}" target="_blank" class="d-block">Lihat Draft Skripsi</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dokumen_artikel_ilmiah" class="form-label">Artikel Ilmiah</label>
                                    <a href="{{ asset('dokumen/artikel_ilmiah/' . basename($pendaftaranskripsi->dokumen_artikel_ilmiah)) }}" target="_blank" class="d-block">Lihat Artikel Ilmiah</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="file_turnitin" class="form-label">Turnitin</label>
                                    <a href="{{ asset('dokumen/turnitin/' . basename($pendaftaranskripsi->file_turnitin)) }}" target="_blank" class="d-block">Lihat Turnitin</a>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="bukti_pendaftaran_siadin" class="form-label">Bukti Pendaftaran SIADIN</label>
                                    <a href="{{ asset('dokumen/bukti_pendaftaran_siadin/' . basename($pendaftaranskripsi->bukti_pendaftaran_siadin)) }}" target="_blank" class="d-block">Lihat Bukti Pendaftaran SIADIN</a>
                                </div>
                                

                                <div class="col-12">
                                    <h6 class="text-primary">Verification</h6>
                                    <hr />
                                </div>

                                <div class="col-md-12 text-center">
                                    <!-- First Radio Button (Diterima) -->
                                    <input type="radio" class="btn-check" name="status" id="success-outlined" value="diterima" 
                                    autocomplete="off" {{ $pendaftaranskripsi->status == 'diterima' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success me-3" for="success-outlined">Diterima</label>
                                
                                    <!-- Second Radio Button (Ditolak) -->
                                    <input type="radio" class="btn-check" name="status" id="danger-outlined" value="ditolak" 
                                    autocomplete="off" {{ $pendaftaranskripsi->status == 'ditolak' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="danger-outlined">Ditolak</label>
                                </div>
                                
                                <!-- KETIKA DI TERIMA -->
                                <div id="form-diterima" class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="tempat" class="form-label">Tempat</label>
                                        <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $pendaftaranskripsi->tempat }}"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pendaftaranskripsi->tanggal }}"
                                            placeholder="Tanggal">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" class="form-control" id="waktu" name="waktu" value="{{ $pendaftaranskripsi->waktu }}"
                                            placeholder="Waktu">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="link_spredsheet" class="form-label">Link Spredsheet</label>
                                        <input type="text" class="form-control" id="link_spredsheet"
                                            name="link_spredsheet" value="{{ $pendaftaranskripsi->link_spredsheet }}" placeholder="Link Spredsheet">
                                    </div>
                                </div>

                                <!-- KETIKA DI TOLAK -->
                                <div id="form-ditolak" class="row mt-3" style="display: none;">
                                    <div class="col-md-6">
                                        <label for="komentar" class="form-label">Komentar</label>
                                        <textarea class="form-control" id="komentar" name="komentar" rows="3" placeholder="Komentar">{{ $pendaftaranskripsi->komentar }}</textarea>

                                    </div>
                                </div>





                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 mt-3">Update Status</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the radio buttons and form sections
            const diterimaRadio = document.getElementById('success-outlined');
            const ditolakRadio = document.getElementById('danger-outlined');
            const formDiterima = document.getElementById('form-diterima');
            const formDitolak = document.getElementById('form-ditolak');

            // Function to toggle the visibility of the forms based on selected status
            function toggleForms() {
                if (diterimaRadio.checked) {
                    formDiterima.style.display = 'block';
                    formDitolak.style.display = 'none';
                } else if (ditolakRadio.checked) {
                    formDiterima.style.display = 'none';
                    formDitolak.style.display = 'block';
                }
            }

            // Add event listeners to the radio buttons
            diterimaRadio.addEventListener('change', toggleForms);
            ditolakRadio.addEventListener('change', toggleForms);

            // Initial call to set the correct form visibility
            toggleForms();
        });
    </script>
@endsection
