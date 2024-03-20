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



        </script>





        </div>

        </section>

    </main><!-- End #main -->
@endsection
