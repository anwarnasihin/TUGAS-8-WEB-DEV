<?php
session_start();
include '../template/koneksi.php'; 

// Pastikan variabel koneksi benar
$db = isset($koneksi) ? $koneksi : $conn; 

// --- 1. AMBIL DATA UTAMA (UNTUK CARD & AREA CHART) ---
$q_total = mysqli_query($db, "SELECT COUNT(*) as total FROM kelas");
$total_aset = mysqli_fetch_assoc($q_total)['total'] ?? 0;

$q_ruangan = mysqli_query($db, "SELECT COUNT(DISTINCT ruangan) as total FROM kelas");
$total_ruangan = mysqli_fetch_assoc($q_ruangan)['total'] ?? 0;

$q_rusak = mysqli_query($db, "SELECT COUNT(*) as total FROM kelas WHERE status != 'OK'");
$total_rusak = mysqli_fetch_assoc($q_rusak)['total'] ?? 0;

$persen_siap = ($total_aset > 0) ? round((($total_aset - $total_rusak) / $total_aset) * 100) : 0;

// Variabel JSON untuk Area Chart (Garis)
$labels_area = ["Total Aset", "Total Ruangan", "Kesiapan Lab (%)", "Aset Bermasalah"];
$data_area   = [(int)$total_aset, (int)$total_ruangan, (int)$persen_siap, (int)$total_rusak];

$json_labels_area = json_encode($labels_area);
$json_data_area   = json_encode($data_area);


// --- 2. AMBIL DATA TEKNISI (UNTUK PIE CHART) ---
$q_teknisi = mysqli_query($db, "SELECT teknisipengecekan, COUNT(*) as jumlah FROM kelas GROUP BY teknisipengecekan");

$labels_teknisi = [];
$data_teknisi = [];

while($row = mysqli_fetch_assoc($q_teknisi)) {
    $labels_teknisi[] = !empty($row['teknisipengecekan']) ? $row['teknisipengecekan'] : 'Belum Diisi';
    $data_teknisi[] = (int)$row['jumlah'];
}

$json_labels_pie = json_encode($labels_teknisi);
$json_data_pie = json_encode($data_teknisi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include '../template/link.php';
    include '../template/head.php';
    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include '../template/sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../template/topbar.php'; ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="../generate_report_dashboard.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Aset PC/TV</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_aset; ?> Unit</div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-desktop fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Ruangan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_ruangan; ?> Lab</div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-door-open fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kesiapan Lab</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $persen_siap; ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $persen_siap; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Aset Bermasalah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_rusak; ?> Item</div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Analisis Kondisi Aset</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengecekan per Teknisi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <?php 
                                        $colors = ['text-primary', 'text-success', 'text-info', 'text-warning', 'text-danger'];
                                        foreach($labels_teknisi as $index => $nama): 
                                            $warna = $colors[$index % count($colors)];
                                        ?>
                                        <span class="mr-2">
                                            <i class="fas fa-circle <?php echo $warna; ?>"></i> <?php echo $nama; ?>
                                        </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Anwar 2026</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php include '../template/footer.php'; ?>

    <script>
    // --- 1. AREA CHART (RINGKASAN ASET) ---
    var ctxArea = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctxArea, {
      type: 'line',
      data: {
        labels: <?php echo $json_labels_area; ?>, 
        datasets: [{
          label: "Jumlah/Nilai",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          data: <?php echo $json_data_area; ?>, 
        }],
      },
      options: {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: { beginAtZero: true }
          }]
        },
        legend: { display: false }
      }
    });

    // --- 2. PIE CHART (PEMBAGIAN TEKNISI) ---
    var ctxPie = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctxPie, {
      type: 'doughnut',
      data: {
        labels: <?php echo $json_labels_pie; ?>, 
        datasets: [{
          data: <?php echo $json_data_pie; ?>, 
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        legend: { display: false },
        cutoutPercentage: 80,
      },
    });
    </script>
</body>
</html>