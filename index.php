<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recruitment Management - HR Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">


  <nav class="bg-gray-900 text-white fixed top-0 left-0 w-full z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
       <div class="flex items-center">
          <img src="./images/logo.jpg" alt="iMarket Logo" class="h-12 w-auto">
        </div>

        <div class="flex space-x-6 items-center">
          <a href="index.php" class="text-yellow-300 font-semibold">Home</a>
          <a href="jobs.php" class="hover:text-yellow-300 transition">Jobs</a>
          <a href="login.php" class="hover:text-yellow-300 transition">Login</a>
        </div>
      </div>
    </div>
  </nav>


<section class="relative w-full h-[75vh] overflow-hidden mt-[64px]">
  <div id="slides" class="absolute w-full h-full transition-all duration-1000 ease-in-out bg-center bg-cover flex items-center justify-center text-white">
    <div class="bg-black bg-opacity-50 p-8 rounded-lg text-center max-w-2xl">
      <h1 id="hero-title" class="text-4xl md:text-5xl font-bold mb-4">Find the Right Talent, Faster</h1>
      <p id="hero-text" class="mb-6">Streamline recruitment from posting jobs to hiring top candidates.</p>
      
      
      <div class="flex flex-col sm:flex-row sm:justify-center sm:gap-4 gap-3">
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg text-lg flex items-center justify-center">
          <i class="fa-solid fa-briefcase mr-2"></i> View Open Positions
        </a>
        <a href="#" class="border border-white hover:bg-white hover:text-black px-6 py-3 rounded-lg text-lg flex items-center justify-center">
          <i class="fa-solid fa-user-plus mr-2"></i> Apply Now
        </a>
      </div>

    </div>
  </div>

  <div class="absolute bottom-5 w-full flex justify-center gap-3">
    <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" onclick="goToSlide(0)"></button>
    <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" onclick="goToSlide(1)"></button>
    <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" onclick="goToSlide(2)"></button>
  </div>
</section>




<section class="py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center mb-12">Our Recruitment Features</h2>
    <div class="grid md:grid-cols-3 gap-10">
      <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <i class="fa-solid fa-file-circle-plus text-blue-500 text-4xl mb-4"></i>
        <h5 class="text-xl font-semibold mb-2">Job Posting</h5>
        <p>Quickly create and publish job openings to attract qualified candidates.</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <i class="fa-solid fa-users text-blue-500 text-4xl mb-4"></i>
        <h5 class="text-xl font-semibold mb-2">Applicant Tracking</h5>
        <p>Manage applicants efficiently from application to interview.</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <i class="fa-solid fa-chart-line text-blue-500 text-4xl mb-4"></i>
        <h5 class="text-xl font-semibold mb-2">Data-Driven Insights</h5>
        <p>Use analytics to identify the best recruitment channels and improve hiring decisions.</p>
      </div>
    </div>
  </div>
</section>


<section class="bg-gray-50 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center mb-12">Latest Job Openings</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="text-xl font-semibold mb-2">Software Developer</h5>
        <p class="mb-4">Join our IT team and help build scalable applications.</p>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Apply Now</a>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="text-xl font-semibold mb-2">HR Assistant</h5>
        <p class="mb-4">Assist in recruitment processes and employee engagement.</p>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Apply Now</a>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="text-xl font-semibold mb-2">Marketing Specialist</h5>
        <p class="mb-4">Help promote our employer brand and engage top talent.</p>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Apply Now</a>
      </div>
    </div>
  </div>
</section>

<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold mb-4">About Us</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        At <span class="font-semibold text-yellow-500">iMarket HR1</span>, we bridge the gap between businesses and talent using cutting-edge recruitment technology.  
        Our AI-driven matching system ensures speed, fairness, and accuracy in every hire.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
      <!-- Image -->
      <div class="relative group">
        <img src="https://images.unsplash.com/photo-1556761175-129418cb2dfe" alt="Team working" class="rounded-lg shadow-lg transform group-hover:scale-105 transition duration-500 w-full object-cover">
        <div class="absolute inset-0 bg-yellow-500 opacity-0 group-hover:opacity-20 rounded-lg transition duration-500"></div>
      </div>

      <!-- Text Content -->
      <div>
        <h3 class="text-2xl font-bold mb-4">Who We Are</h3>
        <p class="mb-4 text-gray-700">
          We combine the power of E-Commerce and Human Resource solutions into a single streamlined platform. From posting job ads to onboarding, we make the hiring process effortless for both employers and job seekers.
        </p>
        <p class="text-gray-700 mb-4">
          Using predictive AI technology, we identify the best-fit candidates faster than ever before — giving companies a competitive hiring advantage.
        </p>

        <div class="grid grid-cols-2 gap-4 mt-6">
          <div class="bg-gray-100 p-4 rounded-lg text-center shadow">
            <i class="fa-solid fa-bullseye text-blue-500 text-3xl mb-2"></i>
            <h4 class="font-semibold">Mission</h4>
            <p class="text-sm text-gray-600">Revolutionize recruitment with speed, efficiency, and fairness.</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center shadow">
            <i class="fa-solid fa-eye text-blue-500 text-3xl mb-2"></i>
            <h4 class="font-semibold">Vision</h4>
            <p class="text-sm text-gray-600">Be the #1 AI-powered hiring platform in the e-commerce industry.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<footer class="bg-gray-900 text-white py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- About -->
      <div>
        <h3 class="text-lg font-semibold mb-4">About Us</h3>
        <p class="text-gray-400 text-sm leading-relaxed">
          HR Recruitment Portal connects top talents with leading companies. 
          Our platform simplifies the hiring process and promotes career growth.
        </p>
      </div>
      
      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li><a href="home.html" class="hover:text-white">Home</a></li>
          <li><a href="jobs.html" class="hover:text-white">Jobs</a></li>
          <li><a href="#" class="hover:text-white">About</a></li>
          <li><a href="#" class="hover:text-white">Contact</a></li>
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
        </ul>
      </div>
      
      <!-- Contact Info -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
        <ul class="text-gray-400 text-sm space-y-2">
          <li>Email: <a href="mailto:support@hrportal.com" class="hover:text-white">support@hrportal.com</a></li>
          <li>Phone: <a href="tel:+639123456789" class="hover:text-white">+63 912 345 6789</a></li>
          <li>Address: Makati City, Metro Manila, Philippines</li>
        </ul>
        <div class="flex space-x-4 mt-4">
          <a href="#" class="hover:text-white"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
      © 2025 HR Recruitment Portal. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
  const slides = [
    {
      image: "https://images.unsplash.com/photo-1556761175-4b46a572b786",
      title: "Find the Right Talent, Faster",
      text: "Streamline recruitment from posting jobs to hiring top candidates."
    },
    {
      image: "https://images.unsplash.com/photo-1560264280-88b68371db39",
      title: "Your Career Starts Here",
      text: "Discover opportunities and connect with top employers."
    },
    {
      image: "https://images.unsplash.com/photo-1521737604893-d14cc237f11d",
      title: "Empowering Your Recruitment Process",
      text: "Leverage technology to hire the best talent efficiently."
    }
  ];

  let currentSlide = 0;
  const slideDiv = document.getElementById("slides");
  const heroTitle = document.getElementById("hero-title");
  const heroText = document.getElementById("hero-text");

  function showSlide(index) {
    slideDiv.style.backgroundImage = `url(${slides[index].image})`;
    heroTitle.textContent = slides[index].title;
    heroText.textContent = slides[index].text;
    currentSlide = index;
  }

  function nextSlide() {
    let newIndex = (currentSlide + 1) % slides.length;
    showSlide(newIndex);
  }

  function goToSlide(index) {
    showSlide(index);
  }

  showSlide(currentSlide);

  setInterval(nextSlide, 4000);
</script>

</body>
</html>
