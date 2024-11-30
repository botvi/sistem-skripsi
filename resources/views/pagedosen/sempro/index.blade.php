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
                            <li class="breadcrumb-item active" aria-current="page">Data Sempro</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <h6 class="mb-0 text-uppercase">Data Sempro</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Judul Proposal</th>
                                    <th>Pembimbing</th>
                                    <th>Advisor</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Tempat</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSempro as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->mahasiswa->nama }}</td>
                                        <td>{{ $p->mahasiswa->nim }}</td>
                                        <td>{{ $p->judul_proposal }}</td>
                                        <td>{{ $p->dosenpembimbing->nama }}</td>
                                        <td>{{ $p->dosenadvisor->nama }}</td>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->waktu }}</td>
                                        <td>{{ $p->selesai }}</td>
                                        <td>{{ $p->tempat }}</td>
                                        <td><a href="{{ $p->link_spredsheet }}">{{ $p->link_spredsheet }}</a></td>
                                       
                                        <td>
                                            @if ($p->dokumen_kartu_bimbingan)
                                                <a href="{{ asset('dokumen/kartu_bimbingan/' . basename($p->dokumen_kartu_bimbingan)) }}"
                                                    target="_blank">Kartu Bimbingan</a><br>
                                            @endif
                                            @if ($p->dokumen_kehadiran_seminar_proposal)
                                                <a href="{{ asset('dokumen/kehadiran_seminar_proposal/' . basename($p->dokumen_kehadiran_seminar_proposal)) }}"
                                                    target="_blank">Kehadiran Seminar</a><br>
                                            @endif
                                            @if ($p->dokumen_turnitin)
                                                <a href="{{ asset('dokumen/turnitin/' . basename($p->dokumen_turnitin)) }}"
                                                    target="_blank">Turnitin</a><br>
                                            @endif
                                            @if ($p->dokumen_pendaftaran_seminar_proposal)
                                                <a href="{{ asset('dokumen/pendaftaran_seminar_proposal/' . basename($p->dokumen_pendaftaran_seminar_proposal)) }}"
                                                    target="_blank">Pendaftaran Seminar</a><br>
                                            @endif
                                            @if ($p->draf_proposal)
                                                <a href="{{ asset('dokumen/draf_proposal/' . basename($p->draf_proposal)) }}"
                                                    target="_blank">Draf Proposal</a><br>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Judul Proposal</th>
                                    <th>Pembimbing</th>
                                    <th>Advisor</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Tempat</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
