<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT KETERANGAN PENDAMPING IJAZAH</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
            margin-left: 90px;
        }

        .header div {
            flex-grow: 1;
            text-align: center;
        }

        .header h3,
        .header p {
            margin: 0;
        }


        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <img alt="University logo" src="https://upload.wikimedia.org/wikipedia/commons/9/98/Logo_udinus1.jpg" />
        <div>
            <h1 style="font-weight: 600;">UNIVERSITAS DIAN NUSWANTORO</h3>

        </div>
    </div>
    <div class="container" style="margin-left: 100px;">
        <div class="row">
            <div class="col-6">
                <h3 style="font-weight: 600;">
                    SURAT KETERANGAN PENDAMPING IJAZAH
                </h3>
                <h4 style="font-weight: 600; font-style: italic;">Diploma Supplement</h4>
            </div>
            <div class="col-6">
                <h4>Status akreditasi : {{ $pendaftaranskpi->status_akreditasi }}</h4>
                <h5>Nomor {{ $pendaftaranskpi->nomor_akreditasi }}</h5>
                <h5 style="font-style: italic;">Number</h5>
            </div>
            <br>
            <div class="col-12 mt-3">
                <h5>Surat Keterangan Pendamping ljazah sebagai dokumen pelengkap ijazah yang memuat informasi tentang
                    pemenuhan kompetensi lulusan pendidikan akademik dan vokasi.</h5>
            </div>
            <div class="col-12">
                <h5 style="font-style: italic;">Certificate of Complement to Diploma as a complementary document to the
                    diploma which contains information about the fulfillment of competencies of graduates of academic
                    and vocational education</h5>
            </div>
            <div class="col-8 mt-3">
                <h5 style="font-weight: 600;">
                    1. INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI
                </h5>
                <h5 style="font-style: italic; font-weight: 600;">
                    1. Information Identifying Diploma Supplement Holder
                </h5>
            </div>
            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    NAMA LENGKAP
                </h5>
                <h5 style="font-style: italic;">
                    Full Name
                </h5>
                <h5 style="font-style: italic;">
                    {{ $pendaftaranskpi->mahasiswa->nama }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    TEMPAT / TANGGAL LAHIR
                </h5>
                <h5 style="font-style: italic;">
                    Place/Date of Birth
                </h5>
                <h5 style="font-style: italic;">
                    {{ $pendaftaranskpi->tempat_tanggal_lahir }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    NOMOR INDUK MAHASISWA
                </h5>
                <h5 style="font-style: italic;">
                    Student Identification Number
                </h5>
                <h5 style="font-style: italic;">
                    {{ $pendaftaranskpi->mahasiswa->nim }}
                </h5>
            </div>
            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    TANGGAL, BULAN DAN TAHUN MASUK
                </h5>
                <h5 style="font-style: italic;">
                    Entrance Year
                </h5>
                <h5 style="font-style: italic;">
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->tanggal_masuk)->format('d') }}
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->bulan_masuk)->format('F') }}
                    {{ $pendaftaranskpi->tahun_masuk }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    TANGGAL, BULAN DAN TAHUN KELULUSAN
                </h5>
                <h5 style="font-style: italic;">
                    Graduation Year
                </h5>
                <h5 style="font-style: italic;">
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->tanggal_kelulusan)->format('d') }}
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->bulan_kelulusan)->format('F') }}
                    {{ $pendaftaranskpi->tahun_kelulusan }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    NOMOR IJAZAH NASIONAL
                </h5>
                <h5 style="font-style: italic;">
                    Diploma Number
                </h5>
                <h5 style="font-style: italic;">
                    {{ $pendaftaranskpi->nomor_ijazah_nasional }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    GELAR
                </h5>
                <h5 style="font-style: italic;">
                    Title
                </h5>
                <h5>
                    Sarjana Kesehatan Masyarakat
                </h5>
                <h5 style="font-style: italic;">
                    Bachelor Public Health
                </h5>
            </div>
            <div class="col-8 mt-3">
                <h5 style="font-weight: 600;">
                    2. INFORMASI TENTANG IDENTITAS PENYELENGGARAAN PROGRAM
                </h5>
                <h5 style="font-style: italic; font-weight: 600;">
                    2. Information Identifying the Awarding Institution
                </h5>
            </div>
            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    NAMA PERGURUAN TINGGI
                </h5>
                <h5 style="font-style: italic;">
                    Awarding institution
                </h5>
                <h5>
                    Universitas Dian Nuswantoro
                </h5>
                <h5 style="font-style: italic;">
                    Universitas Dian Nuswantoro
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    PROGRAM STUDI
                </h5>
                <h5 style="font-style: italic;">
                    Major
                </h5>
                <h5>
                    Kesehatan Masyarakat
                </h5>
                <h5 style="font-style: italic;">
                    Public Health
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    JENIS DAN PROGRAM PENDIDIKAN
                </h5>
                <h5 style="font-style: italic;">
                    Type and Program of Education {{ $pendaftaranskpi->jenis_program_pendidikan }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    LEVEL KERANGKA KUALIFIKASI NASIONAL INDONESIA
                </h5>
                <h5 style="font-style: italic;">
                    Level of Indonesian National Qualification Framework
                </h5>
                <h5 style="font-style: italic; font-weight: 500;">
                    Level 6
                </h5>
            </div>
            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    BAHASA PENGANTAR KULIAH
                </h5>
                <h5 style="font-style: italic;">
                    Language of instruction
                </h5>
                <h5>
                    Indonesia
                </h5>
                <h5 style="font-style: italic;">
                    Indonesian
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    STATUS AKREDITASI
                </h5>
                <h5 style="font-style: italic;">
                    Accreditation
                </h5>
                <h5 style="font-style: italic;">
                    {{ $pendaftaranskpi->status_akreditasi }}
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    SISTEM PENILAIAN
                </h5>
                <h5 style="font-style: italic;">
                    Grading system
                </h5>
                <h5>
                    Skala (Scale): 1- 4; A=4, B=3, C=2, D=1
                </h5>

                <h5 style="font-weight: 600;" class="mt-3">
                    JENIS & PROGRAM PENDIDIKAN LANJUTAN
                </h5>
                <h5 style="font-style: italic;">
                    Access to Further Stud
                </h5>
                <h5 style="font-style: italic; font-weight: 500;">
                    Program Magister & Doktoral
                </h5>
                <h5 style="font-style: italic; font-weight: 500;">
                    Master & Doctora
                </h5>
            </div>

            <div class="page-break"></div>

            <div class="col-8 mt-3">
                <h5 style="font-weight: 600;">
                    3. INFORMASI TENTANG KUALIFIKASI DAN HASIL YANG DICAPAI
                </h5>
                <h5 style="font-style: italic; font-weight: 600;">
                    3. Information Identifying the Qualification and Outcomes Obtained
                </h5>
            </div>
            <div class="col-12 mb-5">
                <table style="width:100%">
                    <tr>
                        <th>
                            <h5 style="font-weight: 600;">A. CAPAIAN PEMBELAJARAN</h5>
                        </th>
                        <th>
                            <h5 style="font-weight: 600; font-style: italic;">A. Leaming Outcomes</h5>
                        </th>
                    </tr>
                    <tr>
                        <td>1) Mampu melakukan kajian dan analisis situasi</td>
                        <td style="font-style: italic;">1) Analytic/assessment skills</td>
                    </tr>
                    <tr>
                        <td>2) Mampu mengembangkan kebijakan dan Perencanaan Program</td>
                        <td style="font-style: italic;">2) Policy development/program planning skills</td>
                    </tr>
                    <tr>
                        <td>3) Mampu Berkomunikasi Secara Eefektif </td>
                        <td style="font-style: italic;">3) Communication skills</td>
                    </tr>
                    <tr>
                        <td>4) Mampu memahami budaya setempat</td>
                        <td style="font-style: italic;">4) Cultural competency skills</td>
                    </tr>
                    <tr>
                        <td>5) Mampu melaksanakan pemberdayaan Masyarakat</td>
                        <td style="font-style: italic;">5) Community empowerment</td>
                    </tr>
                    <tr>
                        <td>6) Memiliki penguasaan ilmu kesehatan masyarakat</td>
                        <td style="font-style: italic;">6) Public health science skills</td>
                    </tr>
                    <tr>
                        <td>7) Mampu dalam merencanakan keuangan dan terampil dalam bidang manajemen</td>
                        <td style="font-style: italic;">7) Financial planning and management skills</td>
                    </tr>
                    <tr>
                        <td>8) Memiliki kemampuan kepemimpinan dan berfikir system</td>
                        <td style="font-style: italic;">8) Leadership and system thinking skills</td>
                    </tr>
                </table>
            </div>

            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    B. AKTIVITAS, PRESTASI DAN PENGHARGAAN
                </h5>
                @php
                    $groupedActivities = collect($skors_non_translate)->groupBy('nama_kategori');
                @endphp
                
                @foreach ($groupedActivities as $kategori => $activities)
                    <h5 style="font-weight: 600; font-style: italic;" class="mt-3">
                        {{ $kategori ?? 'N/A' }}
                    </h5>
                    <ul>
                        @foreach ($activities as $activity)
                            <li>
                                <h5 style="font-weight: 600;">
                                    {{ $activity['judul_kegiatan'] ?? 'Null' }}
                                </h5>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>

            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    B. Activities, Achievements and Awards
                </h5>
                
                @php
                    $groupedTranslatedActivities = collect($skors_translate)->groupBy('nama_kategori_translate');
                @endphp

                @foreach ($groupedTranslatedActivities as $kategori => $activities)
                    <h5 style="font-weight: 600; font-style: italic;" class="mt-3">
                        {{ $kategori ?? 'N/A' }}
                    </h5>
                    <ul>
                        @foreach ($activities as $activity)
                            <li>
                                <h5 style="font-weight: 600;">
                                    {{ $activity['judul_kegiatan_translate'] ?? 'Null' }}
                                </h5>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>

            <div class="col-6 mt-5">
                <h5>
                    Catatan:
                </h5>
                <h5 style="text-align: justify;">
                    Program-program tersebut di atas terdiri atas kegiatan untuk mengembangkan soft skills mahasiswa.
                    Daftar kegiatan ko-kurikuler dan ekstrakurikuler yang diikuti oleh pemegang SKPI ini terlampir
                </h5>
            </div>
            <div class="col-6 mt-5">
                <h5>
                    Note:
                </h5>
                <h5 style="text-align: justify;">
                    The above-mentioned programs comprise of activities that develop studenrs soft skills. A list of
                    co-curricular and extra curricular activities taken by the holder of this supplement is attached.
                </h5>
            </div>

            <div class="page-break"></div>

            <div class="col-12 mt-3">
                <h5 style="font-weight: 600;">
                    4. INFORMASI TENTANG SISTEM PENDIDIKAN TINGGI DI INDONESIA
                </h5>
                <h5 style="font-style: italic;">
                    4. Information on the Indonesian Higher Education System and the Indonesian National Qualifications
                    Framework
                </h5>
            </div>
            <div class="col-6 mt-5">
                <h5 style="font-weight: 600;">
                    SISTEM PENDIDIKAN TINGGI DI INDONESIA
                </h5>
                <h5 style="text-align: justify;">
                    Pendidikan tinggi terdiri dari (1) pendidikan akademik yang merupakan Pendidikan Tinggi program
                    sarjana dan/atau program pascasarjana yang diarahkan pada penguasaan dan pengembangan cabang llmu
                    Pengetahuan dan Teknologi, (2) pendidikan vokasi yang merupakan Pendidikan Tinggi program diploma
                    yang menyiapkan Mahasiswa untuk pekerjaan dengan keahlian terapan tertentu sampai program sarjana
                    terapan, serta pendidikan profesi merupakan Pendidikan Tinggi setelah program sarjana yang
                    menyiapkan Mahasiswa dalam pekerjaan yang memertukan persyaratan keahlian khusus.
                </h5>
                </h5>
                <h5 style="text-align: justify;">
                    Bentuk Perguruan Tinggi terdiri atas (a) universitas; (b) institut;
                </h5>
                <h5 style="text-align: justify;">
                    (c) sekolah tinggi; (d) politeknik; (e) akadem;i dan (f) akademi komunitas
                </h5>
                <h5 style="text-align: justify;">
                    Universitas merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat
                    menyelenggarakan pendidikan vokasi dalam berbagai rumpun llmu Pengetahuan dan/atau Teknologi dan
                    jika memenuhi syarat, universitas dapat menyelenggarakan pendidikan profesi.
                </h5>
                <h5 style="text-align: justify;">
                    lnstitut merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat
                    menyelenggarakan pendidikan vokasi dalam sejumlah rumpun llmu Pengetahuan dan/atau Teknologi
                    tertentu dan jika memenuhi syarat, institut dapat menyelenggarakan pendidikan profesi.
                </h5>
                <h5 style="text-align: justify;">
                    Sekolah Tinggi merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat
                    menyelenggarakan pendidikan vokasi dalam satu rumpun llmu Pengetahuan dan/atau Teknologi tertentu
                    dan jika memenuhi syarat, sekolah tinggi dapat menyelenggarakan pendidikan profesi
                </h5>
                <h5 style="text-align: justify;">
                    Politeknik merupakan Perguruan Tinggi yang menyelenggarakan pendidikan vokasi dalam berbagai rumpun
                    llmu Pengetahuan dan/atau Teknologi dan jika memenuhi syarat, politeknik dapat menyelenggarakan
                    pendidikan profesi
                </h5>
                <h5 style="text-align: justify;">
                    Akademi merupakan Perguruan Tinggi yang menyelenggarakan pendidikan vokasi dalam satu atau beberapa
                    cabang llmu Pengetahuan dan/atau Teknologi tertentu.
                </h5>
                <h5 style="text-align: justify;">
                    Akademi Komunitas merupakan Perguruan Tinggi yang menyelenggarakan pendidikan vokasi setingkat
                    diploma satu danlatau diploma dua dalam satu atau beberapa cabang llmu Pengetahuan dan/atau
                    Teknologi tertentu yang berbasis keunggulan lokal atau untuk memenuhi kebutuhan khusus
                </h5>
            </div>
            <div class="col-6 mt-5">
                <h5 style="font-weight: 600;">
                    HIGHER EDUCATION SYSTEM IN INDONESIA
                </h5>
                <h5 style="text-align: justify;">
                    Higher education consists of (1) academic education which is Higher Education undergraduate programs
                    and / or postgraduate programs directed at mastering and developing branches of science and
                    technology, (2) vocational education which is Higher Education diploma programs that prepare
                    students for jobs with certain applied expertise to applied undergraduate programs, and professional
                    education is Higher Education after undergraduate programs that prepare students in jobs that
                    require special expertise requirements
                </h5>
                </h5>
                <h5 style="text-align: justify;">
                    The form of Higher Education consists of (a) universities; (b) institutes;
                </h5>
                <h5 style="text-align: justify;">
                    (c) high school; (d) polytechnic; (e) academy; and (f) community academy
                </h5>
                <h5 style="text-align: justify;">
                    Universities are universities that organize academic education and can organize vocational education
                    in various clumps of science and/or technology and if qualified, universities can organize
                    professional education.
                    lnstitut is a Higher Education Institution that organizes academic education and can organize
                    vocational education in a number of specific clumps of Knowledge and/or Technology and if qualified,
                    the institute can organize professional education.
                </h5>
                <h5 style="text-align: justify;">
                    Colleges are universities that organize academic education and can organize vocational education in
                    one particular family of Sciences and/or Technology and if qualified, higher education can organize
                    professional education.
                </h5>
                <h5 style="text-align: justify;">
                    Sekolah Tinggi merupakan Perguruan Tinggi yang menyelenggarakan pendidikan akademik dan dapat
                    menyelenggarakan pendidikan vokasi dalam satu rumpun llmu Pengetahuan dan/atau Teknologi tertentu
                    dan jika memenuhi syarat, sekolah tinggi dapat menyelenggarakan pendidikan profesi
                </h5>
                <h5 style="text-align: justify;">
                    Polytechnic is a Higher Education Institution that organizes vocational education in various clumps
                    of Knowledge and/or Technology and if qualified, polytechnics can organize professional education.
                </h5>
                <h5 style="text-align: justify;">
                    Academy is a Higher Education Institution that organizes vocational education in one or several
                    branches of science and/or technology.
                </h5>
                <h5 style="text-align: justify;">
                    Community Academy is a Higher Education Institution that organizes vocational education at the level
                    of diploma one and / or diploma two in one or several branches of science and / or technology based
                    on local advantages or to meet special needs
                </h5>
            </div>

            <div class="page-break"></div>

            <div class="col-6 mt-5">
                <h5 style="font-weight: 600; margin-top: 10px;">
                    Jenis dan Program Pendidikan
                </h5>
                <h5 style="text-align: justify;">
                    lnstitusi pendidikan tinggi dapat menawarkan berbagai jenis pendidikan baik berupa pendidikan
                    akademik, pendidikan vokasi maupun pendidikan profesi. Perguruan tinggi yang memberikan pendidikan
                    akademik dapat menawarkan Program Sarjana, Program Magister dan Program Doktor. Pendidikan profesi
                    dapat menawarkan Program Profesi dan Program Spesialis. Sedangkan pendidikan vokasi menawarkan
                    Program Diploma Satu, Diploma Dua, Diploma Tiga, Diploma Empat atau Sarjana Terapan, Magister
                    Terapan dan Doktor Terapan
                </h5>
                <h5 style="font-weight: 600; margin-top: 10px;">
                    Satuan Kredi Semester dan Lama STUDI
                </h5>
                <h5 style="text-align: justify;">
                    Satuan kredit Semester yang selanjutnya disingkat sks adalah takaran waktu kegiatan belajar yang
                    dibebankan pada mahasiswa per minggu per semester dalam proses pembelajaran melalui berbagai bentuk
                    pembelajaran atau besamya pengakuan atas keberhasilan usaha mahasiswa dalam mengikuti kegiatan
                    kurikuler di suatu program studi
                </h5>
                <ul>
                    <li>
                        <h5 style="text-align: justify;">
                            Bentuk pembelajaran 1 (satu) sks pada proses pembelajaran berupa kuliah, responsi atau
                            tutorial
                            terdiri atas kegiatan proses belajar 50 (lima puluh) menit per minggu per semester kegiatan
                            penugasan terstruktur 60 (enam puluh) menit per minggu per semester dan kegiatan mandiri 60
                            (enam puluh) menit per minggu per semester</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            Bentuk pembelajaran 1 (satu) sks pada proses pembelajaran seminar atau bentuk lain yang
                            sejenis, terdiri atas kegiatan proses belajar 100 (seratus) menit per minggu per semester
                            dan
                            kegiatan mandiri 70 (tujuh puluh) menit per minggu per semester</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            Perhitungan beban belajar dalam sistem blok, modu,l atau
                            bentuk lain ditetapkan sesuai dengan kebutuhan dalam memenuhi capaian pembelajaran</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            Bentuk Pembelajaran 1 (satu) sks pada proses pembelajaran berupa praktikum, praktik studio,
                            praktik bengkel, praktik lapangan, praktek kerja, penelitian, perancangan, atau
                            pengembangan,
                            pelatihan militer, pertukaran mahasiswa, magang, wirausaha dan/atau pengabdian kepada
                            masyarakat
                            170 (seratus tujuh puluh)menit per minggu per semester.</h5>
                    </li>
                </ul>

            </div>
            <div class="col-6 mt-5">
                <h5 style="font-weight: 600; margin-top: 10px; font-style: italic;">
                    Types and Education Programs
                </h5>
                <h5 style="text-align: justify;font-style: italic;">
                    Higher education institutions can offer various types of education in the form of academic
                    education, vocational education and professional education. Universities that provide academic
                    education can offer Bachelor Programs, Master Programs and Doctoral Programs. Professional education
                    can offer Professional Programs and Specialist Programs. While vocational education offers Diploma
                    One, Diploma Two, Diploma Three, Diploma Four or Applied Bachelor, Applied Master and Applied
                    Doctoral Programs.
                </h5>
                <h5 style="font-weight: 600; margin-top: 10px;font-style: italic;">
                    Semester Credit Unit and Length of Study
                </h5>
                <h5 style="text-align: justify;font-style: italic;">
                    Semester credit units, hereinafter abbreviated as credits, are a measure of learning activity time
                    charged to students per week per semester in the learning process through various forms of learning
                    or the amount of recognition of the success of student efforts in participating in curricular
                    activities in a study program
                </h5>
                <ul>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            Form of learning 1 (one) credit in the learning process in the form of lectures, receptions
                            or tutorials consists of learning process activities of 50 (fifty) minutes per week per
                            semester, structured assignment activities of 60 (sixty) minutes per week per semester and
                            independent activities of 60 (sixty) minutes per week per semester.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            Form of learning 1 (one) credit in the seminar learning process or other similar forms,
                            consisting of learning process activities of 100 (one hundred) minutes per week per semester
                            and independent activities of 70 (seventy) minutes per week per semester.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            Calculation of learning load in the block system, modul or other forms are determined
                            according to the needs in meeting the learning outcomes.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            Form of Learning 1 (one) credit in the learning process in the form of practicum, studio
                            practice, workshop practice, field practice, work practice, research, design, or
                            development, military training, student exchange, internship, entrepreneurship, and/or
                            community service 170 (one hundred seventy) minutes per week per semester.</h5>
                    </li>
                </ul>

            </div>

            <div class="page-break"></div>
            <div class="col-6 mt-5">
                <h5 style="font-weight: 600; margin-top: 10px;">
                    Masa dan beban belajar penyelenggaraan program pendidikan :
                </h5>

                <ul>
                    <li>
                        <h5 style="text-align: justify;">
                            paling lama 5 (lima) tahun akademik untuk program diploma tiga dengan beban belajar
                            mahasiswa paling sedikit 108 (seratus delapan) sks;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            paling lama 7 (tujuh) tahun akademik untuk program sarjana, program dilploma empat/sarjana
                            terapan dengan beban belajar mahasiswa paling sedikit 144 (seratus empat puluh empat) sks
                        </h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            paling lama 3 (tiga) tahun akademik untuk program profesi setelah menyelesaikan program
                            sarjana atau program diploma empat/sarjana terapan, dengan beban belajar mahasiswa paling
                            sedikiy 24 (dua puluh empat) sks;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            paling lama 4 (empat) tahun akademik untuk program magister, program magister terapan, atau
                            program spesialis setelah menyelesaikan program sarjana, atau diploma empat/sarjana terapan.
                            Dengan beban belajar mahasiswa paling sedikit 36 (tiga puluh enam) sks;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            paling lama 7 (tujuh) tahun akademik untuk program doctor, program doctor terapan, atau
                            program subspesialis setelah menyelesaikan program magister, atau magister terapan, atau
                            program spesialis, dengan beban belajar mahasiswa paling sedikit 42 (empat puluh dua) sks.
                        </h5>
                    </li>
                </ul>
                <h5 style="font-weight: 600; margin-top: 10px;">
                    05 KERANGKA KUALIFIKASI NASIONAL INDONESIA
                </h5>
                <h5 style="font-style: italic;">
                    05 Indonesian Qualification Framework
                </h5>
                <h5 style="margin-top: 10px; text-align: justify;">
                    Kerangka Kualifikasi Nasional Indonesia (KKNI) adalah kerangka penjenjangan kualifikasi dan
                    kompetensi tenaga kerja Indonesia yang menyandingkan, menyetarakan, dan mengintegrasikan sektor
                    pendidikann dengan sektor pelatihan dan pengalaman kerja dalam suatu skema pengakuan kemampuan kerja
                    yang disesuaikan dengan struktur di berbagai sektor pekerjaan. KKNI merupakan perwujudan mutu dan
                    jati diri Bangsa Indonesia terkait dengan sistem pendidikan nasional, sistem pelatihan kerja
                    nasional serta sistem penilaian kesetaraan capaian pembelajaran (learning outcomes) nasional , yang
                    dimiliki Indonesia untuk menghasilkan sumberdaya manusia yang bermutu dan produktif
                </h5>
            </div>
            <div class="col-6 mt-5">
                <h5 style="font-weight: 600; margin-top: 10px;font-style: italic;">
                    Period and learning load of education program implementation:
                </h5>

                <ul>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            a maximum of 5 (five) academic years for diploma three programs with a student learning load
                            of at least 108 (one hundred eight) credits;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            a maximum of 7 (seven) academic years for undergraduate programs, four diploma/applied
                            degree programs with a student learning load of at least 144 (one hundred forty-four)
                            credits
                        </h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            a maximum of 3 (three) academic years for professional programs after completing an
                            undergraduate program, or diploma program four/applied degree program, with a student
                            learning load of at least 24 (twenty-four) credits;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            a maximum of 4 (four) academic years for master's programs, applied master's programs, or
                            specialist programs after completing an undergraduate program, or an applied master's
                            diploma, with a student learning load of at least 36 (thirty-six) credits;</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            a maximum of 7 (seven) academic years for doctoral programs, applied doctoral programs, or
                            subspecialist programs after completing a master's program, or applied master's program, or
                            specialist program, with a student learning load of at least 42 (forty-two) credits.

                        </h5>
                    </li>
                </ul>

                <h5 style="margin-top: 10px; text-align: justify;font-style: italic;">
                    The Indonesian National Qualification Framework is a framework denoting levels of Indonesian
                    workforce qualifications and competence, that compares, equalizes, and integrates the education and
                    training sectors and work experience in a scheme recognizing work competence based on the structures
                    of various work sectors. The
                    Framework is the manifestation of the quality and identity of the Indonesian people in relations to
                    the national education system, national workforce training system and national learning outcomes
                    equality evaluation system that Indonesia has in order to produce qualified and productive human
                    resources
                </h5>
            </div>

            <div class="page-break"></div>
            <div class="col-6 mt-3">
                <h5 style="font-weight: 600;">
                    6. PENGESAHAN SKPI
                </h5>
                <h5 style="font-style: italic;">
                    6. SKPI Legalization
                </h5>


                <h5 style="margin-top: 130px;">
                    SEMARANG,
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->tanggal_kelulusan)->format('d') }}
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->bulan_kelulusan)->format('F') }}
                    {{ $pendaftaranskpi->tahun_kelulusan }}
                </h5>
                <h5 style="font-style: italic;">
                    Semarang,  {{ \Carbon\Carbon::parse($pendaftaranskpi->tanggal_kelulusan)->format('d') }}
                    {{ \Carbon\Carbon::parse($pendaftaranskpi->bulan_kelulusan)->format('F') }}
                    {{ $pendaftaranskpi->tahun_kelulusan }}
                </h5>


                <h5 style="margin-top: 20px;">
                    Enny Rachmani, SKM, M.Kom, Ph.D
                </h5>
                <h5>
                    DEKAN FAKULTAS KESEHATAN
                </h5>
                <h5 style="font-style: italic;">
                    Dean Faculty of Health Sciense
                </h5>

                <h5 style="margin-top: 20px;">
                    NOMOR POKOK PEGAWAI : 0686.11.2000.219
                </h5>
                <h5 style="font-style: italic;">
                    Employee ID Number
                </h5>

                <h5 style="font-weight: 600; margin-top: 10px;">
                    CATATAN RESMI
                </h5>

                <ul>
                    <li>
                        <h5 style="text-align: justify;">
                            SKPI dikeluarkan oleh institusi pendidikan tinggi yang berwenang mengeluarkan ijazah sesuai
                            dengan paraturan perundang- undangan yang berlaku.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            SKPI hanya diterbitkan setelah mahasiswa dinyatakan lulus dari suatu program studi secara
                            resmi oleh Perguruan Tinggi.
                        </h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            SKPI diterbitkan dalam Bahasa Indonesia dan Bahasa lnggris.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            SKPI yang asli diterbitkan mengunakan kertas khusus (barcodelhalogram security paper)
                            berlogo Perguruan Tinggi, yang diterbitkan secara khusus oleh Perguruan Tinggi.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;">
                            Penerima SKPI dicantumkan dalam situs resmi Perguruan Tinggi

                        </h5>
                    </li>
                </ul>
                <h5 style="font-weight: 600; margin-top: 10px;font-style: italic;">
                    Official Notes
                </h5>

                <ul>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            This Diploma Supplement is issued by Universitas Dian Nuswantoro, a higher education
                            institution authorized to issue diplomas in accordance with the applicable Laws.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            This Diploma Supplement is issued after the student is officially declared a graduate of a
                            study program by the Universitas Dian Nuswantoro.
                        </h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            This Diploma Supplement is written in both Bahasa Indonesia and English.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            The original copy of this Diploma Supplement is on barcoded/halogram security paper, sealed
                            with the higher education institution's logo, and issued exclusively by Universitas Dian
                            Nuswantoro.</h5>
                    </li>
                    <li>
                        <h5 style="text-align: justify;font-style: italic;">
                            The awardee of this Diploma Supplement is officially listed in the University's official
                            website

                        </h5>
                    </li>
                </ul>
            </div>

            <div class="col-6 mt-3">

                <h5 style="margin-top: 400px;">
                    ALAMAT
                </h5>
                <h5 style="font-style: italic;">
                    Contact Detail
                </h5>
                <h5 style="margin-top: 80px; font-weight: 600;">
                    UNIVERSITAS DIAN NUSWANTORO
                </h5>
                <h5 style="margin-top: 20px;">
                    KAMPUS I
                </h5>
                <h5>
                    JI. Imam Bonjol No. 207 Semarang
                </h5>
                <h5>
                    Phone. : ( +62 024 3517261 )
                </h5>
                <h5>
                    Fax.: ( +62 024 3517261 )
                </h5>
                <h5 style="margin-top: 20px;">
                    KAMPUS II
                </h5>
                <h5>
                    JI. Nakula I NO. 5 - 7 Semarang
                </h5>
                <h5>
                    Phone. : ( +62 024 3517261)
                </h5>
                <h5>
                    Fax.: ( +62 024 3517261)
                </h5>
                <h5 style="margin-top: 20px;">
                    Website : www.dinus.ac.id
                </h5>
                <h5>
                    Email : skpi@dinus.ac.id
                </h5>

            </div>

        </div>
    </div>

</body>
<script>
    window.onload = function() {
        window.print(); /* Mencetak halaman saat dimuat */
    }
</script>

</html>
