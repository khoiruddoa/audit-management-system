@extends('dashboard.layouts.main')
@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="d-flex flex-row flex-wrap gap-2">






                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                <table class="table" id="data-table" style="display: none;">

                </table>


        </section>

        <script>
          const open = {{ $open }};
          const onProgress = {{ $onProgress }};
          const finish = {{ $finish }};

          const open_data = @json($open_data);
          const onProgress_data = @json($onProgress_data);
          const finish_data = @json($finish_data);

          var xValues = ["Open", "On Progress", "Finish"];
          var yValues = [open, onProgress, finish];
          var barColors = [
            "#ff0000",
              "#ffc107",
              "#198754"
          ];

          var chart = new Chart("myChart", {
              type: "pie",
              data: {
                  labels: xValues,
                  datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                  }]
              },
              options: {
                  title: {
                      display: true,
                      text: "Status Kegiatan Audit"
                  }
              }
          });

          // Menambahkan event listener untuk menangani klik pada sektor grafik
          document.getElementById("myChart").onclick = function(event) {
              var activePoints = chart.getElementsAtEventForMode(event, 'point', chart.options);
              if (activePoints.length > 0) {
                  // Mendapatkan indeks elemen yang diklik
                  var clickedIndex = activePoints[0]._index;
                  var result = xValues[clickedIndex];

                  // Menampilkan data yang sesuai berdasarkan pilihan
                  var table = document.getElementById("data-table");
                  var dataToDisplay = [];
                  if (result === "Open") {
                      dataToDisplay = open_data;
                  } else if (result === "On Progress") {
                      dataToDisplay = onProgress_data;
                  } else if (result === "Finish") {
                      dataToDisplay = finish_data;
                  }

                  // Membuat HTML untuk tabel data
                  var tableHTML =
                      '<thead><tr><th scope="col">#</th><th scope="col">Kegiatan</th><th scope="col">Detail</th></tr></thead><tbody>';
                  for (var i = 0; i < dataToDisplay.length; i++) {
                      var detailUrl = '/kegiatan_audit_dashboard/'+ dataToDisplay[i].id;
                      tableHTML += '<tr><th scope="row">' + (i + 1) + '</th><td>' + dataToDisplay[i].kegiatan + '</td>' +
                          '<td><a href="' + detailUrl + '">Lihat Detail</a></td></tr>';
                  }
                  tableHTML += '</tbody>';

                  table.innerHTML = tableHTML;

                  // Tampilkan tabel
                  table.style.display = 'table';

              } else {
                  // Sembunyikan tabel jika tidak ada sektor yang dipilih
                  var table = document.getElementById("data-table");
                  table.style.display = 'none';
              }
          };
      </script>









        </div>

        </section>

    </main><!-- End #main -->
@endsection
