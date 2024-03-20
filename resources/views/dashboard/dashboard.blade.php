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

        <section class="section dashboard">
            <div class="d-flex flex-row flex-wrap gap-2">






                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
  <!-- Sales Card -->
  <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Temuan dan Tindak Lanjut</h5>

                        <div class="d-flex align-items-center">

                        <div class="ps-3">
    <h6>{{ $tindak ?? '0' }} / {{ $temuan ?? '0' }}</h6>
    <span class="text-success small pt-1 fw-bold">{{$persen}}%</span> <span class="text-muted small pt-2 ps-1">increase</span>
</div>

                        </div>
                    </div>

                </div>


            </div><!-- End Sales Card -->
                <table class="table" id="data-table" style="display: none;">

                </table>

                <div class="col-lg-6">

<!-- Recent Activity -->
<div class="card">
  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">Rencana Audit Selanjutnya<span> | Today</span></h5>

    <div class="activity">
@foreach($rencanaAudit as $data)
      <div class="activity-item d-flex">
        <div class="activite-label">{{$data->firstdate}}</div>
        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
        <div class="activity-content">
          Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
        </div>
      </div><!-- End activity item-->

      @endforeach

    </div>

  </div>
</div><!-- End Recent Activity -->
                </div>


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
