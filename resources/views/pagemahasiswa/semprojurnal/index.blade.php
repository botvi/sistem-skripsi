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
                            <li class="breadcrumb-item active" aria-current="page">Pendaftaran Sempro Jurnal</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <h6 class="mb-0 text-uppercase">Data Pendaftaran Sempro Jurnal</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pendaftaransemprojurnal.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Proposal</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Dosen Advisor</th>
                                    <th>Tempat</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaranSemprosJurnal as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->judul_proposal }}</td>
                                        <td>{{ $p->dosenpembimbing->nama }}</td>
                                        <td>{{ $p->dosenadvisor->nama }}</td>
                                        <td>{{ $p->tempat }}</td>
                                        <td>{{ $p->waktu }}</td>
                                        <td>{{ $p->selesai }}</td>
                                        <td>
                                            @if ($p->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($p->status == 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                                <!-- modal komentar -->
                                                <button type="button" class="btn-sm btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Lihat komentar</button>
                                                <!-- modal komentar -->
                                            @elseif($p->status == 'diterima')
                                                <span class="badge bg-success">Diterima</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown Status</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($p->status === 'pending')
                                                <a href="{{ route('pendaftaransemprojurnal.edit', $p->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                            @endif
                                            <form action="{{ route('pendaftaransemprojurnal.destroy', $p->id) }}" method="POST"
                                                style="display:inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                @if ($p->status !== 'diterima')
                                                    {{-- Check if the status is not "diterima" --}}
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                @endif
                                            </form>

                                            {{-- FILE DOWNLOAD --}}
                                            @if ($p->status === 'diterima')
                                                {{-- Check if the status is "diterima" --}}
                                                <a href="{{ route('downloadsemprojurnal.c1', $p->id) }}" target="_blank">C1. LAYOUT
                                                    SEMINAR PROPOSAL</a><br>
                                                <a href="{{ route('downloadsemprojurnal.c2', $p->id) }}" target="_blank">C2. FILE
                                                    PERBAIKAN ADVISOR DAN PEMBIMBING</a><br>
                                                    <a href="{{ asset('filedownload/C3_TATIB_SEMPRO.pdf') }}" target="_blank">C3. TATIB DOWNLOAD</a>

                                            @endif
                                            {{-- FILE DOWNLOAD --}}


                                        </td>
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
                                            @if ($p->surat_keterangan_layak_etik)
                                                <a href="{{ asset('dokumen/surat_keterangan_layak_etik/' . basename($p->surat_keterangan_layak_etik)) }}"
                                                    target="_blank">Surat Keterangan Layak Etik</a><br>
                                            @endif
                                            @if ($p->seminar_proposal)
                                                <a href="{{ asset('dokumen/seminar_proposal/' . basename($p->seminar_proposal)) }}"
                                                    target="_blank">Seminar Proposal</a><br>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Proposal</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Dosen Advisor</th>
                                    <th>Tempat</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal komentar -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Komentar
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @foreach ($pendaftaranSemprosJurnal as $index => $p)
                        <div class="modal-body">{{ $p->komentar }}</div>
                        <div class="modal-footer">
                            <a href="{{ route('pendaftaransemprojurnal.edit', $p->id) }}" class="btn btn-success">Revisi</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- modal komentar -->
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
