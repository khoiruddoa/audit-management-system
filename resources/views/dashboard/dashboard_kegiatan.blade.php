@extends('dashboard.layouts.main')
@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="d-flex flex-row flex-wrap gap-2">





                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>



        </section>
        <!-- Tambahkan elemen tabel dengan id unik -->
<table id="detail-table" style="display: none;">
    <thead>
        <tr>
            <th>Nama Temuan</th>
            <th>Rekomendasi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Tempat untuk menampilkan detail temuan dan rekomendasi -->
    </tbody>
</table>




        <script>
        var xValues =   @json($divisi);
        var yValues = @json($temuan);
        var barColors = Array(xValues.length).fill("blue");
        const result = @json($result);
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: result
            }
          }
        });

        document.getElementById("myChart").onclick = function(event) {
    var activePoints = chart.getElementsAtEventForMode(event, 'point', chart.options);
    if (activePoints.length > 0) {
        // Mendapatkan indeks elemen yang diklik
        var clickedIndex = activePoints[0]._index;
        var selectedDivisi = xValues[clickedIndex];

        // Menampilkan data yang sesuai berdasarkan pilihan
        var table = document.getElementById("detail-table");
        var dataToDisplay = @json($detailData); // Misalkan ini adalah data detail temuan dan rekomendasi

        // Filter data berdasarkan divisi yang dipilih
        var filteredData = dataToDisplay.filter(function(item) {
            return item.divisi === selectedDivisi;
        });

        // Membuat HTML untuk tabel data
        var tableHTML = '';
        for (var i = 0; i < filteredData.length; i++) {
            tableHTML += '<tr><td>' + filteredData[i].nama_temuan + '</td><td>' + filteredData[i].rekomendasi + '</td></tr>';
        }

        // Mengupdate isi tabel dengan HTML yang baru
        table.getElementsByTagName('tbody')[0].innerHTML = tableHTML;

        // Menampilkan tabel
        table.style.display = 'table';

    } else {
        // Sembunyikan tabel jika tidak ada bar yang diklik
        var table = document.getElementById("detail-table");
        table.style.display = 'none';
    }
};

        </script>





        </div>

        </section>

    </main><!-- End #main -->
@endsection
