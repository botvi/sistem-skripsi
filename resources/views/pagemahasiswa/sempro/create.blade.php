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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pendaftaran Sempro</li>
                    </ol>
                </nav>
            </div>
        </div>
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
    
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Tambah Pendaftaran Sempro</h5>
                        </div>
                        <hr>
                        <form action="{{ route('pendaftaransempro.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" readonly required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" readonly required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $mahasiswa->telepon }}" readonly required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="judul_proposal" class="form-label">Judul Proposal</label>
                                <input type="text" class="form-control" id="judul_proposal" name="judul_proposal" required>
                            </div>

                            <div class="col-md-6">
                                <label for="pembimbing_id" class="form-label">Dosen Pembimbing</label>
                                <select class="form-select" id="pembimbing_id" name="pembimbing_id" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->user_id }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="advisor_id" class="form-label">Dosen Advisor</label>
                                <select class="form-select" id="advisor_id" name="advisor_id" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->user_id }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- File upload fields -->
                            <div class="col-md-6">
                                <label for="dokumen_kartu_bimbingan" class="form-label">Kartu Bimbingan</label>
                                <input type="file" class="form-control" id="dokumen_kartu_bimbingan" name="dokumen_kartu_bimbingan" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dokumen_kehadiran_seminar_proposal" class="form-label">Kehadiran Seminar</label>
                                <input type="file" class="form-control" id="dokumen_kehadiran_seminar_proposal" name="dokumen_kehadiran_seminar_proposal" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dokumen_pendaftaran_seminar_proposal" class="form-label">Pendaftaran Seminar</label>
                                <input type="file" class="form-control" id="dokumen_pendaftaran_seminar_proposal" name="dokumen_pendaftaran_seminar_proposal" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dokumen_turnitin" class="form-label">Turnitin</label>
                                <input type="file" class="form-control" id="dokumen_turnitin" name="dokumen_turnitin" required>
                            </div>
                            <div class="col-md-6">
                                <label for="draf_proposal" class="form-label">Draft Proposal</label>
                                <input type="file" class="form-control" id="draf_proposal" name="draf_proposal" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
