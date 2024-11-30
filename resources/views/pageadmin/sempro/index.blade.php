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
                            <li class="breadcrumb-item active" aria-current="page">Pendaftaran Sempro</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <h6 class="mb-0 text-uppercase">Data Pendaftaran Sempro</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('exportsempro.index') }}" class="btn btn-success mb-3"><i class='bx bxs-file-export ' ></i> EXPORT EXCEL</a>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM Mahasiswa</th>
                                    <th>Judul Proposal</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Dosen Advisor</th>
                                    <th>Tempat</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Nilai</th>

                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaranSempros as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->mahasiswa->nama }}</td>
                                        <td>{{ $p->mahasiswa->nim }}</td>
                                        <td>{{ $p->judul_proposal }}</td>
                                        <td>{{ $p->dosenpembimbing->nama }}</td>
                                        <td>{{ $p->dosenadvisor->nama }}</td>
                                        <td>{{ $p->tempat }}</td>
                                        <td>{{ $p->waktu }}</td>
                                        <td>{{ $p->selesai }}</td>
                                        <td>{{ $p->nilai }}</td>
                                        <td>
                                            @if ($p->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($p->status == 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                               
                                            @elseif($p->status == 'diterima')
                                                <span class="badge bg-success">Diterima</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown Status</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('verifsempro.detail', $p->id) }}"
                                                class="btn btn-sm btn-warning">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM Mahasiswa</th>
                                    <th>Judul Proposal</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Dosen Advisor</th>
                                    <th>Tempat</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Nilai</th>
                                    <th>Status</th>

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
