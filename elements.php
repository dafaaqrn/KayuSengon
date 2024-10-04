
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan Sengon - PT. Keong Nusantara Abadi</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <!-- Header -->
                <header id="header">
                    <a href="index.html" class="logo"><strong>PT. Keong Nusantara Abadi</strong></a>
                </header>

                <!-- Main Content -->
                <section>
                    <header class="main">
                        <h1>Pemantauan Perkembangan Bibit Sengon</h1>
                    </header>

                    <!-- Grafik Pertumbuhan Bibit -->
                    <div>
                    <canvas id="growthChart" width="400" height="200"></canvas>

                    </div>

                    <!-- Tabel Data Mitra -->
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Mitra</th>
                                    <th>Alamat Lahan</th>
                                    <th>Ukuran Lahan</th>
                                    <th>Jumlah Bibit</th>
                                    <th>Perkembangan Tanaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Sambungkan ke database
                                    $conn = new mysqli('localhost', 'root', 'kaylaaurel20', 'mitra_db');

                                    // Periksa koneksi
                                    if ($conn->connect_error) {
                                        die("Koneksi gagal: " . $conn->connect_error);
                                    }

                                    // Query untuk mendapatkan data mitra
                                    $sql = "SELECT nama, alamat_lahan, ukuran_lahan, jumlah_bibit, tinggi_bibit, kesehatan_tanaman FROM mitra";
                                    $result = $conn->query($sql);

                                    $mitraData = [];
                                    if ($result->num_rows > 0) {
                                        // Menampilkan data mitra
                                        while($row = $result->fetch_assoc()) {
                                            $mitraData[] = $row;
                                            echo "<tr>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td>" . $row['alamat_lahan'] . "</td>";
                                            echo "<td>" . $row['ukuran_lahan'] . " m²</td>";
                                            echo "<td>" . $row['jumlah_bibit'] . "</td>";
                                            echo "<td>";
                                            echo "Tinggi: " . $row['tinggi_bibit'] . " cm<br>";
                                            echo "Kesehatan: " . $row['kesehatan_tanaman'];
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>Belum ada data mitra</td></tr>";
                                    }

                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">
                <!-- Search -->
        <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="profil_mitra.php">Mitra</a></li>
                        <li><a href="elements.php">Pemantauan</a></li>
                        <li><a href="forum_diskusi.php">Forum Diskusi</a></li>
                    </ul>
                </nav>
                 <!-- Section -->
								<section>
									<header class="major">
										<h2>Mitra Sengon</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>
                                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Kontak Kami</h2>
                    </header>
                    <p>Hubungi kami untuk informasi lebih lanjut. Ada pertanyaan? Kami siap membantu.</p>
                    <ul class="contact">
                        <li class="icon solid fa-envelope"><a href="#">www.wongcoco.id</a></li>
                        <li class="icon solid fa-phone">(0354) 526251</li>
                        <li class="icon solid fa-home">Jl. Raya Bogo - Kunjang, Kediri, Jawa Timur 64156</li>
                    </ul>
                </section>

                <!-- Footer -->
                <footer id="footer">
                    <p class="copyright">&copy; 2024 WoodConnect. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts untuk Grafik Chart.js -->
    <script>
    
    var ctx = document.getElementById('growthChart').getContext('2d');

    // Debug untuk memastikan data PHP diteruskan ke JavaScript
    console.log(<?php echo json_encode($mitraData); ?>);

    var labels = [
        <?php
            $labels = [];
            foreach ($mitraData as $data) {
                $labels[] = "'" . addslashes($data['nama']) . "'";
            }
            echo implode(', ', $labels);
        ?>
    ];

    var tinggiBibitData = [
        <?php
            $tinggiBibit = [];
            foreach ($mitraData as $data) {
                $tinggiBibit[] = $data['tinggi_bibit'];
            }
            echo implode(', ', $tinggiBibit);
        ?>
    ];

    var kesehatanTanamanData = [
        <?php
            $kesehatanTanaman = [];
            foreach ($mitraData as $data) {
                $kesehatanTanaman[] = $data['kesehatan_tanaman'];
            }
            echo implode(', ', $kesehatanTanaman);
        ?>
    ];

    var growthChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Tinggi Bibit (cm)',
                    data: tinggiBibitData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kesehatan Tanaman',
                    data: kesehatanTanamanData,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


</script>


</body>
</html>
