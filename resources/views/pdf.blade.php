<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Audit</title> <!-- Tambahkan judul audit di sini -->
    <style>
        /* CSS Internal (Inner CSS) */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .laporan-info {
            margin-top: 30px;
        }

        .laporan-info h2 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laporan Audit Divisi {{$audit->auditee->auditee}}</h1>
    </header>
    <div class="container">
        <div class="laporan-info">

            <p>
                Judul Audit : {{$audit->kegiatan->kegiatan}}<br>
                Tanggal Pelaksanaan : {{$audit->firstdate}} s/d {{$audit->enddate}}<br>
                Divisi : {{$audit->auditee->auditee}}<br>
                Jenis Audit : {{$audit->jenis_audit}}<br>
                Jenis Program Audit : {{$audit->jenis_program_audit}}<br>
                Tingkat Risiko : {{$audit->tingkat_resiko}}<br>
                Periode : {{$audit->periode}}
            </p>
        </div>

        <div class="laporan-info">
            <h3>Rincian Hasil Audit</h3>
            @foreach($audit->programKerjaAudit as $item)
            <p>
                {{$loop->iteration}}. {{$item->pustakaAudit->judul}}<br>
                Tanggal Pelaksanaan : {{$item->waktu}}<br>

                Berdasarkan hasil atas pelaksanaan kegiatan audit {{$item->pustakaAudit->judul}} ditemukan kondisi sebagai berikut:
                @foreach($item->kertasKerjaAudit as $temuan)
                <p>
                {{ chr($loop->iteration + 64) }}. {{$temuan->temuan}}
                </p>
                <p>Temuan<br>

                    {!! $temuan->kondisi !!}
                </p>
                <p>
                    Kriteria<br>
                    {!! $temuan->kriteria !!}
                </p>
                <p>
                    Sebab<br>
                    {!! $temuan->sebab !!}
                </p>
                <p>
                    Akibat<br>
                    {!! $temuan->akibat !!}
                </p>
                <p>
                    Rekomendasi<br>
                    {!! $temuan->rekomendasi !!}
                </p>
                <p>
                    Tanggapan Auditee<br>
                    {!! $temuan->tanggapanAudit()->latest()->first()->tanggapan ?? '' !!}

                </p>
                <p>
                    Tanggal Penyelesaian<br>
                    {!! $temuan->batas_waktu !!}
                </p>
                @endforeach
            </p>
            @endforeach
        </div>
    </div>
</body>

</html>
