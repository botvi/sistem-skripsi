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
                            <li class="breadcrumb-item active" aria-current="page">Detail Pendaftaran Skpi</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <!--breadcrumb-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <hr />
                    <div class="card border-primary border-4">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center mb-4">
                                <div><i class="bx bxs-user me-2 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-primary">Detail Pendaftaran Skpi</h5>
                            </div>
                            <hr />
                            <form action="{{ route('verifskpi.update', $pendaftaranskpi->id) }}" method="POST"
                                enctype="multipart/form-data" class="row g-4">
                                @csrf
                                @method('PUT')

                                <!-- Mahasiswa Details -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $pendaftaranskpi->mahasiswa->nama }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        value="{{ $pendaftaranskpi->mahasiswa->nim }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                        value="{{ $pendaftaranskpi->mahasiswa->telepon }}" readonly>
                                </div>

                                <!-- peminatan Details -->
                                <div class="col-md-6">
                                    <label for="peminatan" class="form-label">Peminatan</label>
                                    <input type="text" class="form-control" id="peminatan" name="peminatan"
                                        value="{{ $pendaftaranskpi->peminatan }}" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="tempat_tanggal_lahir" class="form-label">Tempat, Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                                        value="{{ $pendaftaranskpi->tempat_tanggal_lahir }}" readonly>
                                </div>

                                <!-- skors Details -->
                                <div class="col-md-6">
                                    @php
                                        // Decode the JSON string into an array
                                        $skors = json_decode($pendaftaranskpi->skors, true);
                                    @endphp

                                    @if ($skors && is_array($skors))
                                        <ul>
                                            <!-- Loop over skors array and add translation fields with unique names -->
                                            @foreach ($skors as $index => $skor)
                                                <li>
                                                    <strong>Judul Kegiatan:</strong> {{ $skor['judul_kegiatan'] ?? 'N/A' }} <br>
                                                    <div class="col-md-12 mb-4">
                                                        <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][judul_kegiatan_translate]"
                                                            placeholder="Judul Kegiatan Translate"
                                                            value="{{ $skors_translate[$index]['judul_kegiatan_translate'] ?? '' }}">
                                                    </div>
                                                    <strong>Kategori:</strong> {{ $skor['nama_kategori'] ?? 'N/A' }} <br>
                                                    <div class="col-md-12 mb-4">
                                                        <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][nama_kategori_translate]"
                                                            placeholder="Kategori Translate"
                                                            value="{{ $skors_translate[$index]['nama_kategori_translate'] ?? '' }}">
                                                    </div>

                                                    <strong>Unsur:</strong> {{ $skor['nama_unsur'] ?? 'N/A' }} <br>
                                                    <div class="col-md-12 mb-4">
                                                        <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][nama_unsur_translate]"
                                                            placeholder="Unsur Translate"
                                                            value="{{ $skors_translate[$index]['nama_unsur_translate'] ?? '' }}" hidden>
                                                    </div>

                                                    <strong>Sub Unsur:</strong> {{ $skor['nama_sub_unsur'] ?? 'N/A' }} <br>
                                                    <div class="col-md-12 mb-4">
                                                        <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][nama_sub_unsur_translate]"
                                                            placeholder="Sub Unsur Translate"
                                                            value="{{ $skors_translate[$index]['nama_sub_unsur_translate'] ?? '' }}" hidden>
                                                    </div>

                                                    <strong>Tingkat:</strong> {{ $skor['nama_tingkat'] ?? 'N/A' }} <br>
                                                    <div class="col-md-12 mb-4">
                                                        <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][nama_tingkat_translate]"
                                                            placeholder="Tingkat Translate"
                                                            value="{{ $skors_translate[$index]['nama_tingkat_translate'] ?? '' }}" hidden>
                                                    </div>

                                                    <strong>Skor:</strong> {{ $skor['skor'] ?? 'N/A' }}
                                                    <input type="text" class="form-control"
                                                            name="skors_translate[{{ $index }}][skor]"
                                                            value="{{ $skor['skor'] ?? 'N/A' }}" hidden>
                                                </li>
                                                <hr>
                                            @endforeach


                                        </ul>
                                    @else
                                        <p>No Skors Data Available</p>
                                    @endif

                                </div>


                                <!-- Document Links -->
                                <div class="col-12">
                                    <h6 class="text-primary">Dokumen Pendukung</h6>
                                    <hr />
                                </div>

                                <div class="col-md-6">
                                    <label for="dokumen_kegiatan" class="form-label">Persetujuan Pendaftaran SKPi</label>
                                    <a href="{{ asset('dokumen/dokumen_kegiatan/' . basename($pendaftaranskpi->dokumen_kegiatan)) }}"
                                        target="_blank" class="d-block">Lihat Persetujuan Pendaftaran SKPI</a>
                                </div>


                                <div class="col-12">
                                    <h6 class="text-primary">Verification</h6>
                                    <hr />
                                </div>

                                <div class="col-md-12 text-center">
                                    <!-- First Radio Button (Diterima) -->
                                    <input type="radio" class="btn-check" name="status" id="success-outlined"
                                        value="diterima" autocomplete="off"
                                        {{ $pendaftaranskpi->status == 'diterima' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success me-3" for="success-outlined">Diterima</label>

                                    <!-- Second Radio Button (Ditolak) -->
                                    <input type="radio" class="btn-check" name="status" id="danger-outlined"
                                        value="ditolak" autocomplete="off"
                                        {{ $pendaftaranskpi->status == 'ditolak' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="danger-outlined">Ditolak</label>
                                </div>

                                <!-- KETIKA DI TERIMA -->
                                <div id="form-diterima" class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tanggal_masuk"
                                            name="tanggal_masuk" value="{{ $pendaftaranskpi->tanggal_masuk }}"
                                            placeholder="Tanggal Masuk">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bulan_masuk" class="form-label">Bulan Masuk</label>
                                        <input type="month" class="form-control" id="bulan_masuk" name="bulan_masuk"
                                            value="{{ $pendaftaranskpi->bulan_masuk }}" placeholder="Bulan Masuk">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                        <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                            min="1900" max="2100" value="{{ $pendaftaranskpi->tahun_masuk }}"
                                            placeholder="Tahun Masuk">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_kelulusan" class="form-label">Tanggal Kelulusan</label>
                                        <input type="date" class="form-control" id="tanggal_kelulusan"
                                            name="tanggal_kelulusan" value="{{ $pendaftaranskpi->tanggal_kelulusan }}"
                                            placeholder="Tanggal Kelulusan">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bulan_kelulusan" class="form-label">Bulan Kelulusan</label>
                                        <input type="month" class="form-control" id="bulan_kelulusan"
                                            name="bulan_kelulusan" value="{{ $pendaftaranskpi->bulan_kelulusan }}"
                                            placeholder="Bulan Kelulusan">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun_kelulusan" class="form-label">Tahun Kelulusan</label>
                                        <input type="number" class="form-control" id="tahun_kelulusan"
                                            name="tahun_kelulusan" min="1900" max="2100"
                                            value="{{ $pendaftaranskpi->tahun_kelulusan }}"
                                            placeholder="Tahun Kelulusan">
                                    </div>


                                    <div class="col-md-6">
                                        <label for="nomor_ijazah_nasional" class="form-label">Nomor Ijazah
                                            Nasional</label>
                                        <input type="text" class="form-control" id="nomor_ijazah_nasional"
                                            name="nomor_ijazah_nasional"
                                            value="{{ $pendaftaranskpi->nomor_ijazah_nasional }}"
                                            placeholder="Nomor Ijazah Nasional">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status_akreditasi" class="form-label">Status Akreditasi</label>
                                        <input type="text" class="form-control" id="status_akreditasi"
                                            name="status_akreditasi" value="{{ $pendaftaranskpi->status_akreditasi }}"
                                            placeholder="Status Akreditasi">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nomor_akreditasi" class="form-label">Nomor Akreditasi</label>
                                        <input type="text" class="form-control" id="nomor_akreditasi"
                                            name="nomor_akreditasi" value="{{ $pendaftaranskpi->nomor_akreditasi }}"
                                            placeholder="Nomor Akreditasi">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jenis_program_pendidikan" class="form-label">Jenis Program
                                            Pendidikan</label>
                                        <input type="text" class="form-control" id="jenis_program_pendidikan"
                                            name="jenis_program_pendidikan"
                                            value="{{ $pendaftaranskpi->jenis_program_pendidikan }}"
                                            placeholder="Jenis Program Pendidikan">
                                    </div>
                                    <hr>
                                </div>

                                <!-- KETIKA DI TOLAK -->
                                <div id="form-ditolak" class="row mt-3" style="display: none;">
                                    <div class="col-md-6">
                                        <label for="komentar" class="form-label">Komentar</label>
                                        <textarea class="form-control" id="komentar" name="komentar" rows="3" placeholder="Komentar">{{ $pendaftaranskpi->komentar }}</textarea>

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
