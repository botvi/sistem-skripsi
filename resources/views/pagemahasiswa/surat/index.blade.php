@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pendaftaran Surat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h6 class="mb-0 text-uppercase">Data Pendaftaran Surat</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pendaftaransurat.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tujuan Surat</th>
                                    <th>Judul Skripsi</th>
                                    <th>Surat</th>
                                    <th>Sub Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaranSurats as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->tujuan_surat }}</td>
                                        <td>{{ $p->judul_skripsi }}</td>
                                        <td>{{ $p->surat }}</td>
                                        <td>{{ $p->sub_surat }}</td>


                                        <td>
                                            @if ($p->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($p->status == 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                                <!-- modal komentar -->
                                                <button type="button" class="btn-sm btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modalKomentar-{{ $p->id }}">Lihat komentar</button>
                                                <!-- modal komentar -->
                                            @elseif($p->status == 'diterima')
                                                <span class="badge bg-success">Diterima</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown Status</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($p->status === 'pending')
                                                <a href="{{ route('pendaftaransurat.edit', $p->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                            @endif
                                            <form action="{{ route('pendaftaransurat.destroy', $p->id) }}" method="POST"
                                                style="display:inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                @if ($p->status !== 'diterima')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                @endif
                                            </form>
                                            {{-- FILE DOWNLOAD --}}
                                            @if ($p->status === 'diterima')
                                                {{-- Check if the status is "diterima" --}}

                                                @if ($p->surat == 'Surat Studi Pendahuluan' && $p->sub_surat == 'Non Payung')
                                                    <a href="{{ route('downloadsurat.suratpendahuluan_nonpayung', $p->id) }}" target="_blank">A1.2 SURAT STUDI PENDAHULUAN NON
                                                        PAYUNG</a><br>
                                                @elseif($p->surat == 'Surat Studi Pendahuluan' && $p->sub_surat == 'Payung')
                                                    <a href="{{ route('downloadsurat.suratpendahuluan_payung', $p->id) }}" target="_blank">A1.2 SURAT STUDI PENDAHULUAN
                                                        PAYUNG</a><br>
                                                @elseif($p->surat == 'Surat Penelitian' && $p->sub_surat == 'Non Payung')
                                                    <a href="{{ route('downloadsurat.suratpenelitian_nonpayung', $p->id) }}" target="_blank">A2.2 SURAT PENELITAN NON
                                                        PAYUNG</a><br>
                                                @elseif($p->surat == 'Surat Penelitian' && $p->sub_surat == 'Payung')
                                                    <a href="{{ route('downloadsurat.suratpenelitian_payung', $p->id) }}" target="_blank">A2.2 SURAT PENELITAN PAYUNG</a><br>
                                                @endif
                                            @endif
                                            {{-- FILE DOWNLOAD --}}
                                        </td>
                                        <td>
                                            @if ($p->surat == 'Surat Penelitian')
                                                <a href="{{ asset('dokumen/berita_acara/' . basename($p->berita_acara)) }}"
                                                    target="_blank">Lihat Berita Acara</a><br>
                                                <a href="{{ asset('dokumen/ethical_clearance/' . basename($p->ethical_clearance)) }}"
                                                    target="_blank">Lihat Ethical Clearance</a><br>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tujuan Surat</th>
                                    <th>Judul Skripsi</th>
                                    <th>Surat</th>
                                    <th>Sub Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal for Comments -->
            @foreach ($pendaftaranSurats as $p)
                <div class="modal fade" id="modalKomentar-{{ $p->id }}" tabindex="-1"
                    aria-labelledby="modalLabel-{{ $p->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel-{{ $p->id }}">Komentar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $p->komentar ?? 'Tidak ada komentar.' }}
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('pendaftaransurat.edit', $p->id) }}" class="btn btn-success">Revisi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Modal komentar -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Komentar
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @foreach ($pendaftaranSurats as $index => $p)
                            <div class="modal-body">{{ $p->komentar }}</div>
                            <div class="modal-footer">
                                <a href="{{ route('pendaftaransurat.edit', $p->id) }}" class="btn btn-success">Revisi</a>
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
