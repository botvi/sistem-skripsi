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
                            <li class="breadcrumb-item active" aria-current="page">Detail Pendaftaran Sempro</li>
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
                                <h5 class="mb-0 text-primary">Detail Pendaftaran Sempro</h5>
                            </div>
                            <hr />
                            <form action="{{ route('verifsempro.update', $pendaftaransempro->id) }}" method="POST"
                                enctype="multipart/form-data" class="row g-4">
                                @csrf
                                @method('PUT')

                                <!-- Mahasiswa Details -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $pendaftaransempro->mahasiswa->nama }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        value="{{ $pendaftaransempro->mahasiswa->nim }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                        value="{{ $pendaftaransempro->mahasiswa->telepon }}" readonly>
                                </div>

                                <!-- Proposal Details -->
                                <div class="col-md-6">
                                    <label for="judul_proposal" class="form-label">Judul Proposal</label>
                                    <input type="text" class="form-control" id="judul_proposal" name="judul_proposal"
                                        value="{{ $pendaftaransempro->judul_proposal }}" readonly>
                                </div>

                                <!-- Dosen Details -->
                                <div class="col-md-6">
                                    <label for="pembimbing_id" class="form-label">Dosen Pembimbing</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaransempro->dosenpembimbing->nama }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="advisor_id" class="form-label">Dosen Advisor</label>
                                    <select class="form-select" id="advisor_id" name="advisor_id" required>
                                        @foreach($dosens as $dosen)
                                        <option value="{{ $dosen->user_id }}" {{ $pendaftaransempro->advisor_id == $dosen->user_id ? 'selected' : '' }}>
                                            {{ $dosen->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <!-- Document Links -->
                                <div class="col-12">
                                    <h6 class="text-primary">Dokumen Pendukung</h6>
                                    <hr />
                                </div>

                                <div class="col-md-6">
                                    <label for="dokumen_kartu_bimbingan" class="form-label">Kartu Bimbingan</label>
                                    <a href="{{ asset('dokumen/kartu_bimbingan/' . basename($pendaftaransempro->dokumen_kartu_bimbingan)) }}"
                                        target="_blank" class="d-block">Lihat Kartu Bimbingan</a>
                                </div>
                                <div class="col-md-6">
                                    <label for="dokumen_kehadiran_seminar_proposal" class="form-label">Kehadiran
                                        Seminar</label>
                                    <a href="{{ asset('dokumen/kehadiran_seminar_proposal/' . basename($pendaftaransempro->dokumen_kehadiran_seminar_proposal)) }}"
                                        target="_blank" class="d-block">Lihat Kehadiran Seminar</a>
                                </div>
                                <div class="col-md-6">
                                    <label for="dokumen_pendaftaran_seminar_proposal" class="form-label">Pendaftaran
                                        Seminar</label>
                                    <a href="{{ asset('dokumen/pendaftaran_seminar_proposal/' . basename($pendaftaransempro->dokumen_pendaftaran_seminar_proposal)) }}"
                                        target="_blank" class="d-block">Lihat Pendaftaran Seminar</a>
                                </div>
                                <div class="col-md-6">
                                    <label for="dokumen_turnitin" class="form-label">Turnitin</label>
                                    <a href="{{ asset('dokumen/turnitin/' . basename($pendaftaransempro->dokumen_turnitin)) }}"
                                        target="_blank" class="d-block">Lihat Turnitin</a>
                                </div>
                                <div class="col-md-6">
                                    <label for="draf_proposal" class="form-label">Draft Proposal</label>
                                    <a href="{{ asset('dokumen/draf_proposal/' . basename($pendaftaransempro->draf_proposal)) }}"
                                        target="_blank" class="d-block">Lihat Draf Proposal</a>
                                </div>

                                <div class="col-12">
                                    <h6 class="text-primary">Verification</h6>
                                    <hr />
                                </div>

                                <div class="col-md-12 text-center">
                                    <!-- First Radio Button (Diterima) -->
                                    <input type="radio" class="btn-check" name="status" id="success-outlined" value="diterima" 
                                    autocomplete="off" {{ $pendaftaransempro->status == 'diterima' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success me-3" for="success-outlined">Diterima</label>
                                
                                    <!-- Second Radio Button (Ditolak) -->
                                    <input type="radio" class="btn-check" name="status" id="danger-outlined" value="ditolak" 
                                    autocomplete="off" {{ $pendaftaransempro->status == 'ditolak' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="danger-outlined">Ditolak</label>
                                </div>
                                
                                <!-- KETIKA DI TERIMA -->
                                <div id="form-diterima" class="row mt-3">
                                    <!-- Tempat and Tanggal -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nilai" class="form-label">Nilai</label>
                                        <input type="number" class="form-control" id="nilai" name="nilai" 
                                            value="{{ $pendaftaransempro->nilai }}" placeholder="Nilai">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat" class="form-label">Tempat</label>
                                        <input type="text" class="form-control" id="tempat" name="tempat" 
                                            value="{{ $pendaftaransempro->tempat }}" placeholder="Tempat">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" 
                                            value="{{ $pendaftaransempro->tanggal }}" placeholder="Tanggal">
                                    </div>
                                
                                    <!-- Waktu and Selesai -->
                                    <div class="col-md-6 mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" class="form-control" id="waktu" name="waktu" 
                                            value="{{ $pendaftaransempro->waktu }}" placeholder="Waktu">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="selesai" class="form-label">Selesai</label>
                                        <input type="time" class="form-control" id="selesai" name="selesai" 
                                            value="{{ $pendaftaransempro->selesai }}" placeholder="Selesai">
                                    </div>
                                
                                    <!-- Link Spreadsheet -->
                                    <div class="col-12 mb-3">
                                        <label for="link_spredsheet" class="form-label">Link Spreadsheet</label>
                                        <input type="text" class="form-control" id="link_spredsheet" 
                                            name="link_spredsheet" value="{{ $pendaftaransempro->link_spredsheet }}" placeholder="Link Spreadsheet">
                                    </div>
                                <hr>
                                    <!-- Additional Links -->
                                    @foreach ($link as $index => $p)
                                    <div class="col-12 mb-3">
                                        <label for="link_{{ $index }}" class="form-label">{{ $p->nama }}</label>
                                        <a href="{{ $p->link }}" id="link_{{ $index }}" class="d-block">{{ $p->link }}</a>
                                    </div>
                                    @endforeach
                                </div>
                                
                                

                                <!-- KETIKA DI TOLAK -->
                                <div id="form-ditolak" class="row mt-3" style="display: none;">
                                    <div class="col-md-6">
                                        <label for="komentar" class="form-label">Komentar</label>
                                        <textarea class="form-control" id="komentar" name="komentar" rows="3" placeholder="Komentar">{{ $pendaftaransempro->komentar }}</textarea>

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
