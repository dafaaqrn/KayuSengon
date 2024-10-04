<?php 
// Konfigurasi koneksi ke database
$servername = "localhost";  // Sesuaikan dengan server database Anda
$username = "root";         // Username database
$password = "kaylaaurel20"; // Password database
$dbname = "mitra_db";       // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);

}

$sql = "SELECT nama, alamat_lahan, ukuran_lahan, jumlah_bibit, tinggi_bibit, kesehatan_tanaman FROM mitra";
$result = $conn->query($sql);

// Mengambil statistik jumlah mitra per tahun
$sql_stats = "SELECT YEAR(tanggal_masuk) as tahun, COUNT(*) as jumlah FROM mitra GROUP BY YEAR(tanggal_masuk)";
$result_stats = $conn->query($sql_stats);
$years = [];
$counts = [];

if ($result_stats->num_rows > 0) {
    while ($row = $result_stats->fetch_assoc()) {
        $years[] = $row['tahun'];
        $counts[] = $row['jumlah'];
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra - PT. Keong Nusantara Abadi</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <!-- Header -->
                <header id="header">
                    <a href="index.html" class="logo"><strong>PT. Keong Nusantara Abadi</strong> by Politeknik Negeri Jember</a>
                </header>

                <!-- Main Content -->
                <section>
                    <header class="main">
                        <h1>Profil Mitra Sengon</h1>
                    </header>

                    <div class="table-wrapper">
                        <table cellpadding="10" cellspacing="0" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid black;">Nama Mitra</th>
                                    <th style="border: 1px solid black;">Alamat Lahan</th>
                                    <th style="border: 1px solid black;">Ukuran Lahan</th>
                                    <th style="border: 1px solid black;">Jumlah Bibit</th>
                                    <th style="border: 1px solid black;">Tinggi Bibit (m)</th>
                                    <th style="border: 1px solid black;">Kesehatan Tanaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["alamat_lahan"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["ukuran_lahan"]) . " ha</td>";
                                        echo "<td>" . htmlspecialchars($row["jumlah_bibit"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["tinggi_bibit"]) . " m</td>";
                                        echo "<td>" . htmlspecialchars($row["kesehatan_tanaman"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>Tidak ada data mitra</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Grafik Statistik Mitra per Tahun -->
                    <h2>Statistik Jumlah Mitra per Tahun</h2>
                    <canvas id="mitraChart" width="400" height="200"></canvas>
                    <script>
                        const ctx = document.getElementById('mitraChart').getContext('2d');
                        const mitraChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($years); ?>,
                                datasets: [{
                                    label: 'Jumlah Mitra',
                                    data: <?php echo json_encode($counts); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
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
                </section>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">
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

                <footer id="footer">
                    <p class="copyright">&copy; 2024 WoodConnect. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>

