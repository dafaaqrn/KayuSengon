
<?php 
// Konfigurasi koneksi ke database
$servername = "localhost";  
$username = "root";         
$password = "kaylaaurel20";             
$dbname = "mitra_db";       

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menambahkan postingan atau balasan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $isi = htmlspecialchars($_POST['isi']);
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : NULL;

    // Menyimpan postingan atau balasan ke database
    $sql = "INSERT INTO forum (nama, isi, parent_id) VALUES ('$nama', '$isi', ". ($parent_id ? "'$parent_id'" : "NULL") .")";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Postingan berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

// Mengambil data forum dari tabel (hanya postingan utama, bukan balasan)
$sql = "SELECT * FROM forum WHERE parent_id IS NULL ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - PT. Keong Nusantara Abadi</title>
    <link rel="stylesheet" href="assets/css/main.css" />
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
                        <h1>Forum Diskusi</h1>
                    </header>

                    <!-- Form untuk menambahkan postingan -->
                    <form method="post" action="">
                        <input type="text" name="nama" placeholder="Nama Anda" required>
                        <textarea name="isi" placeholder="Tulis pesan Anda..." required></textarea>
                        <button type="submit" name="submit">Kirim</button>
                    </form>

                    <div class="table-wrapper">
                        <h2>Postingan Diskusi</h2>
                        <div class="forum-posts">
                            <?php
                            if ($result->num_rows > 0) {
                                // Menampilkan setiap postingan
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='post'>";
                                    echo "<h3>" . htmlspecialchars($row["nama"]) . "</h3>";
                                    echo "<p>" . htmlspecialchars($row["isi"]) . "</p>";
                                    echo "<small>Ditambahkan pada: " . $row["tanggal"] . "</small>";

                                    // Form untuk balasan
                                    echo "<form method='post' action=''>";
                                    echo "<input type='hidden' name='parent_id' value='" . $row['id'] . "'>";
                                    echo "<input type='text' name='nama' placeholder='Nama Anda' required>";
                                    echo "<textarea name='isi' placeholder='Balas komentar ini...' required></textarea>";
                                    echo "<button type='submit' name='submit'>Balas</button>";
                                    echo "</form>";

                                    // Ambil balasan dari database
                                    $repliesSql = "SELECT * FROM forum WHERE parent_id=" . $row['id'] . " ORDER BY tanggal ASC";
                                    $repliesResult = $conn->query($repliesSql);
                                    if ($repliesResult->num_rows > 0) {
                                        echo "<div class='replies'>";
                                        while ($reply = $repliesResult->fetch_assoc()) {
                                            echo "<div class='reply'>";
                                            echo "<h4>" . htmlspecialchars($reply['nama']) . "</h4>";
                                            echo "<p>" . htmlspecialchars($reply['isi']) . "</p>";
                                            echo "<small>Ditambahkan pada: " . $reply['tanggal'] . "</small>";
                                            echo "</div>";
                                        }
                                        echo "</div>";
                                    }

                                    echo "</div>";
                                }
                            } else {
                                echo "<p>Tidak ada postingan.</p>";
                            }
                            ?>
                            </div>
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

            <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="profil_mitra.php">Mitra</a></li>
                        <li><a href="elements.php">Pemantauan</a></li>
                        <li><a href="forum_diskusi.php">Forum Diskusi</a></li>
                </nav>
                    <div class="inner">
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
                <!-- Kontak Kami -->
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


