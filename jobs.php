<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jobs - iMarket HR Recruitment</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
   
    .hero-bg {
      position: relative;
      overflow: hidden;
      height: 350px;
    }
    .hero-bg img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .hero-bg img.active {
      opacity: 1;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  
  <nav class="bg-gray-900 text-white fixed top-0 left-0 w-full z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <img src="./images/logo.jpg" alt="iMarket Logo" class="h-12 w-auto">
        </div>
        <div class="flex space-x-6 items-center">
          <a href="index.php" class="hover:text-yellow-300 transition">Home</a>
          <a href="jobs.php" class="text-yellow-300 font-semibold">Jobs</a>
          <a href="login.php" class="hover:text-yellow-300 transition">Login</a>
        </div>
      </div>
    </div>
  </nav>


  <header class="relative mt-16">
    <div class="hero-bg">
      <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786" alt="Workplace" class="active">
      <img src="https://images.unsplash.com/photo-1560264280-88b68371db39" alt="Team Meeting">
      <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Career">
    </div>
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center px-4">
      <h2 class="text-4xl font-bold mb-4">Find Your Next Opportunity</h2>
      <p class="mb-6 text-lg">Search from hundreds of openings and land your dream job today.</p>
      <form class="max-w-xl w-full flex">
        <input type="text" placeholder="Search for jobs..."
               class="w-full p-3 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-gray-900">
        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-r-lg font-medium">
          Search
        </button>
      </form>
    </div>
  </header>

 
<section class="py-12 max-w-7xl mx-auto px-4">
  <!-- Header -->
  <div class="flex items-center justify-between mb-8">
    <h3 class="text-2xl font-bold">Latest Openings</h3>
  </div>

  <!-- Jobs Grid -->
  <div id="jobsContainer" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Dynamic job cards will be inserted here -->
  </div>
</section>




  <footer class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-lg font-semibold mb-4">About Us</h3>
          <p class="text-gray-400 text-sm leading-relaxed">
            HR Recruitment Portal connects top talents with leading companies.
            Our platform simplifies the hiring process and promotes career growth.
          </p>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2 text-gray-400 text-sm">
            <li><a href="home.html" class="hover:text-white">Home</a></li>
            <li><a href="jobs.php" class="hover:text-white">Jobs</a></li>
            <li><a href="#" class="hover:text-white">About</a></li>
            <li><a href="#" class="hover:text-white">Contact</a></li>
            <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          </ul>
        </div>
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
      <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
        © 2025 HR Recruitment Portal. All rights reserved.
      </div>
    </div>
  </footer>


  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


  <script>
    const slides = document.querySelectorAll('.hero-bg img');
    let currentSlide = 0;

    function changeSlide() {
      slides[currentSlide].classList.remove('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add('active');
    }

    setInterval(changeSlide, 4000);

     // Fetch jobs from API
  async function fetchJobs() {
    try {
      const response = await fetch("http://localhost/hr1-ecommerce/api/jobs.php"); // GET all jobs API
      const jobs = await response.json();

      const jobsContainer = document.getElementById("jobsContainer");
      jobsContainer.innerHTML = ""; // Clear before inserting

      if (jobs.length === 0) {
        jobsContainer.innerHTML = "<p class='text-gray-500'>No job openings available.</p>";
        return;
      }

      jobs.forEach(job => {
        const jobCard = `
          <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition border-l-4 border-blue-500">
            <h4 class="text-xl font-semibold mb-1">${job.title}</h4>
            <p class="text-gray-600 mb-2">${job.department} - ${job.location}</p>
            <p class="text-green-600 font-medium mb-4">₱${job.salary} / month</p>
            <a href="job_view.php?id=${job.id}" class="text-blue-600 hover:underline">View Details</a>
          </div>
        `;
        jobsContainer.innerHTML += jobCard;
      });
    } catch (error) {
      console.error("Error fetching jobs:", error);
    }
  }

  // Call fetch on load
  fetchJobs();
  </script>
</body>
</html>
