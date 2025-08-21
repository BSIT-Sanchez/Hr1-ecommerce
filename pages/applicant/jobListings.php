<?php
include '../../layout/applicantLayout.php';

$children = '
<div class="p-6">
    <div class="text-sm text-gray-600 mb-6">
        <a href="dashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>Job Listings</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Explore Job Opportunities</h1>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm flex flex-col sm:flex-row items-center gap-4 mb-6">
        <div class="relative w-full sm:w-1/2">
            <input type="text" id="searchInput" placeholder="Search by job title or keyword..." 
                class="w-full pl-3 pr-10 py-2 border rounded focus:ring-2 focus:ring-teal-500">
            <i class="bx bx-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        <div class="w-full sm:w-1/4">
            <select id="typeFilter" class="w-full pl-3 pr-10 py-2 border rounded focus:ring-2 focus:ring-teal-500">
                <option value="">Job Type</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Remote">Remote</option>
            </select>
        </div>
        <div class="w-full sm:w-1/4">
            <select id="locationFilter" class="w-full pl-3 pr-10 py-2 border rounded focus:ring-2 focus:ring-teal-500">
                <option value="">Location</option>
                <option value="Makati City">Makati City</option>
                <option value="Cebu City">Cebu City</option>
                <option value="Remote">Remote</option>
            </select>
        </div>
    </div>

    <!-- Jobs Container -->
    <div id="jobsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <p class="text-gray-500">Loading jobs...</p>
    </div>
</div>


';
applicantLayout($children);
?>

<script>
async function fetchJobs() {
  try {
    const response = await fetch("http://localhost/hr1-ecommerce/api/jobs.php");
    const jobs = await response.json();

    const jobsContainer = document.getElementById("jobsContainer");
    jobsContainer.innerHTML = "";

    if (!Array.isArray(jobs) || jobs.length === 0) {
      jobsContainer.innerHTML = "<p class='text-gray-500'>No job openings available.</p>";
      return;
    }

    jobs.forEach(job => {
      const jobCard = `
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">${job.title}</h2>
            <span class="text-sm font-medium text-teal-600">${job.job_type}</span>
            </div>
            <p class="text-gray-600 mb-2">${job.department} - ${job.location}</p>
            <p class="text-gray-500 text-sm mb-4">${job.description}</p>
            <div class="flex items-center justify-between">
            <span class="text-xs text-gray-400">${job.posting_date}</span>
            <div class="flex gap-2">
                <a href="job_view.php?id=${job.id}" 
                class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-lg hover:bg-teal-700 transition">
                <i class="bx bx-check"></i> Apply
                </a>
                <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                <i class="bx bx-bookmark"></i> Save
                </button>
            </div>
            </div>
        </div>
        `;

      jobsContainer.innerHTML += jobCard;
    });
  } catch (error) {
    console.error("Error fetching jobs:", error);
    document.getElementById("jobsContainer").innerHTML =
      "<p class='text-red-500'>Failed to load jobs.</p>";
  }
}

// Fetch on page load
fetchJobs();

</script>
