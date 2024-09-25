<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ThinkWood Company Profile</title>
  <link href="src/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Custom CSS for additional styling */
    .gradient-bg {
      background: linear-gradient(90deg, rgba(16,185,129,1) 0%, rgba(5,150,105,1) 100%);
    }
    .hover-grow:hover {
      transform: scale(1.05);
      transition: all 0.3s ease-in-out;
    }
    .gradient-text {
      background: linear-gradient(90deg, rgba(16,185,129,1), rgba(5,150,105,1));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    /* Mobile menu styles */
    .mobile-menu {
      display: none;
      flex-direction: column;
      align-items: center;
      transition: max-height 0.3s ease-out;
      overflow: hidden;
    }
    @media (max-width: 768px) {
      .mobile-menu {
        display: flex;
        max-height: 0;
      }
      .mobile-menu.open {
        max-height: 200px; /* Adjust based on content */
      }
      .desktop-menu {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar Start -->
<nav class="bg-white shadow-md py-4">
  <div class="container mx-auto px-6 md:px-20 flex justify-between items-center">
    <a href="#home" class="text-2xl font-bold gradient-text text-gray-600 hover:text-gray-600">ThinkWood</a>
    <div class="desktop-menu hidden md:flex space-x-6 items-center">
      <a href="#home" class="text-[#00950F] text-sm hover:text-gray-600">Home</a>
      <a href="#about" class="text-[#00950F] text-sm hover:text-gray-600">About Us</a>
      <a href="#services" class="text-[#00950F] text-sm hover:text-gray-600">Services</a>
      <a href="#contact" class="text-[#00950F] text-sm hover:text-gray-600">Contact</a>
      
      <!-- Suppliers Dropdown Start -->
      <div class="relative">
        <button class="text-[#00950F] hover:text-gray-700 text-sm flex items-center focus:outline-none" onclick="toggleSupplierDropdownDesktop()">
          <span>Suppliers</span>
          <svg class="ml-2 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
          </svg>
        </button>
        <!-- Dropdown Menu -->
        <div id="desktop-supplier-dropdown" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg hidden z-10">
          <a href="#supplier-contributions" class="block px-4 py-2 text-sm text-gray-800 hover:bg-green-50 hover:text-green-700">Supplier Contributions</a>
          <a href="#supplier-registration" class="block px-4 py-2 text-sm text-gray-800 hover:bg-green-50 hover:text-green-700">Supplier Registration</a>
        </div>
      </div>
      <!-- Suppliers Dropdown End -->
    </div>
    
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="text-green-700 focus:outline-none md:hidden" onclick="toggleMobileMenu()">
      <img src="src/image/menu-icon.png" alt="Menu" class="h-6 w-6">
    </button>
  </div>

  <!-- Mobile Menu Links -->
  <div id="mobile-menu" class="mobile-menu hidden flex-col items-center mt-4">
    <a href="#home" class="text-green-700 hover:text-red-500 mb-2">Home</a>
    <a href="#about" class="text-green-700 hover:text-yellow-500 mb-2">About Us</a>
    <a href="#services" class="text-green-700 hover:text-blue-500 mb-2">Services</a>
    <a href="#contact" class="text-green-700 hover:text-purple-500 mb-2">Contact</a>
    
    <!-- Suppliers Dropdown Mobile -->
    <div class="relative w-full text-center">
      <button class="text-gray-800 hover:text-green-700 flex justify-center items-center w-full focus:outline-none" onclick="toggleSupplierDropdownMobile()">
        <span>Suppliers</span>
        <svg class="ml-2 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
      </button>
      <!-- Mobile Dropdown Menu -->
      <div id="mobile-supplier-dropdown" class="mobile-menu hidden flex-col mt-2">
        <span class="block text-gray-500 cursor-default">Please select:</span>
        <a href="#supplier-contributions" class="block px-4 py-2 text-gray-800 hover:bg-green-50 hover:text-green-700">Supplier Contributions</a>
        <a href="#supplier-registration" class="block px-4 py-2 text-gray-800 hover:bg-green-50 hover:text-green-700">Supplier Registration</a>
      </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->


  <!-- Hero Section Start -->
  <section id="home" class="h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('src/image/frame1.png');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto text-center z-10">
      <h1 class="text-5xl font-bold text-white mb-6 animate-fade-in" data-aos="fade-up">Welcome to <span class="gradient-text">ThinkWood</span></h1>
      <p class="text-xl text-gray-200 mb-8 animate-fade-in-delayed" data-aos="fade-up" data-aos-delay="100">Craftsmanship Meets Modern Technology</p>
      <a href="#services" class="bg-green-700 hover:bg-green-600 text-white py-3 px-8 rounded-full shadow-lg hover-grow animate-fade-in-slowest" data-aos="fade-up" data-aos-delay="200">Explore Our Services</a>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- About Section Start -->
  <section id="about" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12 text-center">
      <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">About Us</h2>
      <p class="text-lg text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">Tentang Thinkwood.</p>
      <div class="flex flex-wrap justify-center items-center">
        <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0" data-aos="fade-right">
          <p class="text-lg text-gray-700 leading-relaxed">
          ThinkWood adalah perusahaan yang berdedikasi untuk menggabungkan seni tradisional pertukangan kayu dengan teknologi modern. Kami menawarkan berbagai produk dan layanan berkualitas tinggi yang dirancang untuk memenuhi kebutuhan pelanggan kami.

            Dengan fokus pada keberlanjutan, ThinkWood menyediakan berbagai produk kayu ramah lingkungan yang terbuat dari bahan-bahan yang diperoleh secara bertanggung jawab. Kami percaya bahwa keindahan dan fungsionalitas dapat berjalan seiring, sehingga setiap potongan furnitur yang kami buat adalah karya seni yang unik, dibuat khusus untuk memenuhi keinginan dan kebutuhan Anda.

            Tim ahli kami terdiri dari para pengrajin berpengalaman yang memiliki keterampilan tinggi dan dedikasi untuk memberikan hasil yang terbaik. Dari pembuatan furnitur kustom hingga konstruksi kayu yang tahan lama, ThinkWood siap memberikan solusi yang estetis dan berkelanjutan untuk setiap proyek, besar atau kecil.

            Kami di ThinkWood tidak hanya menciptakan produk, tetapi juga pengalaman yang memuaskan bagi setiap pelanggan. Mari bergabung bersama kami dalam perjalanan untuk menciptakan karya-karya luar biasa yang akan bertahan sepanjang waktu.
          </p>
        </div>
        <div class="w-full md:w-1/2 px-4" data-aos="fade-left">
          <img src="https://via.placeholder.com/600x400" alt="About ThinkWood" class="rounded-lg shadow-md hover-grow transition duration-300">
        </div>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Services Section Start -->
  <section id="services" class="py-16 bg-white">
    <div class="container mx-auto px-6 md:px-12 text-center">
      <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">Our Services</h2>
      <p class="text-lg text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">Explore our range of services.</p>
      <div class="flex flex-wrap justify-around">
        <!-- Service 1 -->
        <div class="w-full md:w-1/3 px-4 mb-8 hover-grow transition duration-300" data-aos="fade-up" data-aos-delay="200">
          <div class="bg-gray-100 p-8 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Custom Furniture</h3>
            <p class="text-gray-600">
              We design and create bespoke wooden furniture that combines beauty and functionality. Each piece is crafted to meet your specific needs.
            </p>
          </div>
        </div>
        <!-- Service 2 -->
        <div class="w-full md:w-1/3 px-4 mb-8 hover-grow transition duration-300" data-aos="fade-up" data-aos-delay="300">
          <div class="bg-gray-100 p-8 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Sustainable Wood Products</h3>
            <p class="text-gray-600">
              Our sustainable wood products are environmentally friendly, using responsibly sourced materials without sacrificing quality or design.
            </p>
          </div>
        </div>
        <!-- Service 3 -->
        <div class="w-full md:w-1/3 px-4 mb-8 hover-grow transition duration-300" data-aos="fade-up" data-aos-delay="400">
          <div class="bg-gray-100 p-8 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Wooden Structures</h3>
            <p class="text-gray-600">
              From pergolas to wooden decks, we create durable wooden structures that enhance your outdoor space and provide lasting enjoyment.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services Section End -->

  <!-- Contact Section Start -->
  <section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12 text-center">
      <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">Get in Touch</h2>
      <p class="text-lg text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">We would love to hear from you!</p>
      <form action="#" method="POST" class="flex flex-col items-center">
        <input type="text" placeholder="Your Name" class="border border-gray-300 rounded-lg p-3 mb-4 w-64" required>
        <input type="email" placeholder="Your Email" class="border border-gray-300 rounded-lg p-3 mb-4 w-64" required>
        <textarea placeholder="Your Message" class="border border-gray-300 rounded-lg p-3 mb-4 w-64" required></textarea>
        <button type="submit" class="bg-green-700 hover:bg-green-600 text-white py-2 px-4 rounded-full">Send Message</button>
      </form>
    </div>
  </section>
  <!-- Contact Section End -->

  <!-- Supplier Contributions Section Start -->
<section id="supplier-contributions" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">Our Valued Suppliers</h2>
        <p class="text-lg text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">We proudly collaborate with top-tier suppliers who share our commitment to sustainability and quality craftsmanship.</p>
        
        <div class="flex flex-wrap justify-center items-center">
            <!-- Supplier 1 -->
            <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center transition transform hover:scale-105 hover:bg-green-100 duration-300 relative">
                    <img src="src/image/Contribute Supplier.png" alt="Supplier 1 Logo" class="mb-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">CV.Makna Consulting</h3>
                    <p class="text-sm text-gray-600 mt-2 opacity-0 hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center bg-black bg-opacity-70 text-white rounded-lg">Supplier 1 is a leading provider of sustainable wood materials, known for their high-quality eco-friendly products.</p>
                </div>
            </div>

            <!-- Supplier 2 -->
            <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center transition transform hover:scale-105 hover:bg-green-100 duration-300 relative">
                    <img src="https://via.placeholder.com/150x100" alt="Supplier 2 Logo" class="mb-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">Supplier 2</h3>
                    <p class="text-sm text-gray-600 mt-2 opacity-0 hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center bg-black bg-opacity-70 text-white rounded-lg">Supplier 2 specializes in innovative woodworking tools and technology to enhance the production process.</p>
                </div>
            </div>

            <!-- Supplier 3 -->
            <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center transition transform hover:scale-105 hover:bg-green-100 duration-300 relative">
                    <img src="https://via.placeholder.com/150x100" alt="Supplier 3 Logo" class="mb-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">Supplier 3</h3>
                    <p class="text-sm text-gray-600 mt-2 opacity-0 hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center bg-black bg-opacity-70 text-white rounded-lg">Supplier 3 provides premium wood finishes and treatments to ensure longevity and beauty in every product.</p>
                </div>
            </div>

            <!-- Supplier 4 -->
            <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="500">
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center transition transform hover:scale-105 hover:bg-green-100 duration-300 relative">
                    <img src="https://via.placeholder.com/150x100" alt="Supplier 4 Logo" class="mb-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">Supplier 4</h3>
                    <p class="text-sm text-gray-600 mt-2 opacity-0 hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center bg-black bg-opacity-70 text-white rounded-lg">Supplier 4 is a globally recognized supplier of sustainable construction timber and building solutions.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Supplier Contributions Section End -->



  <!-- Supplier Registration Section Start -->
<section id="supplier-registration" class="py-16 bg-white">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-up">Supplier Registration</h2>
        <p class="text-lg text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">Join us as a supplier and be a part of our sustainable journey.</p>
        <div class="flex justify-center">
            <div class="w-full md:w-1/2">
                <form action="supplier_registration_process.php" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md text-gray-800">
                    <div class="mb-4">
                        <label for="supplier_name" class="block text-gray-700">Supplier Name</label>
                        <input type="text" name="supplier_name" id="supplier_name" class="w-full px-4 py-2 mt-2 bg-white border rounded-md" placeholder="Your Company Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_person" class="block text-gray-700">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="w-full px-4 py-2 mt-2 bg-white border rounded-md" placeholder="Contact Person Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 mt-2 bg-white border rounded-md" placeholder="Your Email" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" class="w-full px-4 py-2 mt-2 bg-white border rounded-md" placeholder="Your Phone Number" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" class="w-full px-4 py-2 mt-2 bg-white border rounded-md" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="bg-green-700 hover:bg-green-600 text-white py-2 px-6 rounded-md">Register as Supplier</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Supplier Registration Section End -->


  <!-- Your previous sections here -->

 <!-- Footer Start -->
<footer class="py-4 bg-gray-800 text-white">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <div class="text-left">
            <h3 class="text-lg font-bold mb-1">Contact Person</h3>
            <p class="mb-1">Untuk info lebih lanjut hubungi:</p>
            <p class="font-semibold">Nafis Arrosyid</p>
            <p>Email: <a href="mailto:nafisarrosyid002@gmail.com" class="underline">nafisarrosyid002@gmail.com</a></p>
            <p>Phone: <a href="tel:+6285731599031" class="underline">+62 857 3159 9031</a></p>
        </div>
        
        <div class="mt-2">
            <h4 class="text-lg font-bold mb-1">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-linkedin-in fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
    <p class="mt-4 text-center">© 2024 ThinkWood. All Rights Reserved.</p>
</footer>
<!-- Footer End -->



<script>
  function toggleMobileMenu() {
  const mobileMenu = document.getElementById("mobile-menu");
  mobileMenu.classList.toggle("open");
}

function toggleSupplierDropdownMobile() {
  const mobileDropdown = document.getElementById("mobile-supplier-dropdown");
  mobileDropdown.classList.toggle("open");
}

function toggleSupplierDropdownDesktop() {
  const desktopDropdown = document.getElementById("desktop-supplier-dropdown");
  desktopDropdown.classList.toggle("hidden");
}

</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
  <script>
      AOS.init();
  </script>
</body>
</html>
