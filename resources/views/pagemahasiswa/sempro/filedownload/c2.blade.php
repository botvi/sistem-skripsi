<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C2. FILE PERBAIKAN ADVISOR DAN PEMBIMBING</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            font-family: 'Times New Roman', Times, serif
        }
        /* Gaya untuk memastikan gambar di kiri dan teks di tengah */
        .header {
            display: flex;
            /* Menggunakan flexbox untuk tata letak */
            align-items: center;
            /* Mengatur agar elemen sejajar secara vertikal */
            justify-content: flex-start;
            /* Mengatur konten ke kiri */
            margin-bottom: 20px;
            /* Jarak bawah untuk pemisah */
        }

        .header img {
            max-width: 100px;
            /* Atur ukuran maksimum gambar */
            margin-right: 20px;
            /* Jarak antara gambar dan teks */
        }

        .header div {
            flex-grow: 1;
            /* Mengizinkan div teks untuk mengambil ruang yang tersisa */
            text-align: center;
            /* Mengatur teks di tengah */
        }

        .header h3,
        .header p {
            margin: 0;
            /* Menghapus margin default */
        }

        .info {
            margin-bottom: 20px;
            /* Jarak bawah untuk informasi */
        }

        .info p {
            margin: 0;
            /* Menghapus margin default */
        }

        .info span {
            display: inline-block;
            /* Menjaga span pada baris yang sama */
            width: 150px;
            /* Lebar span untuk penataan */
        }

        .table-container {
            margin-bottom: 20px;
            /* Jarak bawah untuk tabel */
        }

        .table-container table {
            width: 100%;
            /* Memastikan tabel mengambil lebar penuh */
            border-collapse: collapse;
            /* Menghapus jarak antara border tabel */
        }

        .table-container th,
        .table-container td {
            border: 1px solid black;
            /* Border untuk sel tabel */
            padding: 8px;
            /* Jarak dalam sel */
            text-align: left;
            /* Teks rata kiri */
        }

        .table-container th {
            background-color: #f2f2f2;
            /* Warna latar belakang untuk header tabel */
        }

        /* Styling for signature section */
        .signature {
            position: relative;
            /* Maintain relative positioning */
            text-align: center;
            /* Center the text within the section */
            margin-top: 50px;
            /* Space above the signature */
            margin-left: 500px;
            /* Adjust this value to move the signature to the right */
        }


        .signature p {
            margin: 0;
            /* Remove default margin */
        }

        .page-break {
            page-break-after: always;
            /* Ensures the content after this class starts on a new page */
        }
    </style>
</head>

<body>
    <div class="header">
        <img alt="University logo"
            src="{{ asset('env') }}/udinus.png" />
        <div>
            <h3>PERBAIKAN SKRIPSI KESEHATAN MASYARAKAT</h3>
            <h3>FAKULTAS KESEHATAN</h3>
            <h3>UNIVERSITAS DIAN NUSWANTORO</h3>
            <p>Jl. Nakula I No. 5-11 Semarang 50131, Telp. : (024) 70787373, Fax : (024) 3569684</p>
        </div>
    </div>

    <hr style="border: 2px solid black;">

    <div class="info mb-5">
        <p><span>Nama</span> : {{ $mahasiswa->nama }}</p>
        <p><span>NIM</span> : {{ $mahasiswa->nim }}</p>
        <p><span>Tahun Ajaran</span> : <span id="academic-year"></span></p>
        <p><span>Program Studi</span> : Kesehatan Masyarakat</p>
        <p><span>Judul Proposal</span> : {{ $pendaftaransempro->judul_proposal }}</p>
    </div>

    <p class="mb-5">
        Setelah mengadakan ujian proposal skripsi/tugas akhir Saudara tersebut diatas, maka kami menyarankan diadakan
        perbaikan skripsi/tugas akhir tersebut sebagaimana di bawah ini:
    </p>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Advisor</th>
                    <th>Saran Perbaikan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature">
        <p>Semarang,</p>
        <p style="margin-bottom: 100px;">Pembimbing</p>
        <p>{{ $pendaftaransempro->dosenpembimbing->nama }}</p>
    </div>

    <div class="page-break"></div> <!-- Page break for the second page -->

    <div class="header">
        <img alt="University logo"
            src="{{ asset('env') }}/udinus.png" />
        <div>
            <h3>PERBAIKAN SKRIPSI KESEHATAN MASYARAKAT</h3>
            <h3>FAKULTAS KESEHATAN</h3>
            <h3>UNIVERSITAS DIAN NUSWANTORO</h3>
            <p>Jl. Nakula I No. 5-11 Semarang 50131, Telp. : (024) 70787373, Fax : (024) 3569684</p>
        </div>
    </div>

    <hr style="border: 2px solid black;">

    <div class="info mb-5">
        <p><span>Nama</span> : {{ $mahasiswa->nama }}</p>
        <p><span>NIM</span> : {{ $mahasiswa->nim }}</p>
        <p><span>Tahun Ajaran</span> : <span id="academic-years"></span></p>
        <p><span>Program Studi</span> : Kesehatan Masyarakat</p>
        <p><span>Judul Proposal</span> : {{ $pendaftaransempro->judul_proposal }}</p>
    </div>

    <p class="mb-5">
        Setelah mengadakan ujian proposal skripsi/tugas akhir Saudara tersebut diatas, maka kami menyarankan diadakan
        perbaikan skripsi/tugas akhir tersebut sebagaimana di bawah ini:
    </p>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Advisor</th>
                    <th>Saran Perbaikan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature">
        <p>Semarang,</p>
        <p style="margin-bottom: 100px;">Advisor</p>
        <p>{{ $pendaftaransempro->dosenadvisor->nama }}</p>
    </div>
    <script>
        window.onload = function () {
            window.print(); /* Mencetak halaman saat dimuat */
        }
    </script>
   <script>
    // Get the current year
    const currentYear = new Date().getFullYear();
    // Set the next year
    const nextYear = currentYear + 1;
    
    // Display the academic year in the desired format
    document.getElementById('academic-year').innerText = `${currentYear} / ${nextYear}`;
</script>
   <script>
    // Get the current year
    const currentYears = new Date().getFullYear();
    // Set the next year
    const nextYears = currentYears + 1;
    
    // Display the academic year in the desired format
    document.getElementById('academic-years').innerText = `${currentYears} / ${nextYears}`;
</script>
</body>

</html>