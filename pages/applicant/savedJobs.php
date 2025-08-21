<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// Simulate fetching saved job listings from a database
// This would be replaced by a real database query for the logged-in user's saved jobs
$savedJobs = [
    [
        'title' => 'Product Manager',
        'company' => 'Innovate Hub',
        'location' => 'Makati City, Philippines',
        'type' => 'Full-time',
        'date_saved' => '2 days ago',
    ],
    [
        'title' => 'Data Analyst',
        'company' => 'Data Metrics Solutions',
        'location' => 'Remote',
        'type' => 'Full-time',
        'date_saved' => '1 week ago',
    ],
    [
        'title' => 'Graphic Designer',
        'company' => 'Creative Studios',
        'location' => 'Quezon City, Philippines',
        'type' => 'Part-time',
        'date_saved' => '2 weeks ago',
    ],
];

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>Saved Jobs</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Saved Job Listings</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    ';

// Check if there are any saved jobs to display
if (empty($savedJobs)) {
    $children .= '
    <div class="md:col-span-3 bg-white p-6 rounded-lg shadow-md text-center text-gray-500">
        <i class="bx bx-bookmark-alt-minus text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold mb-2">No Saved Jobs Found</h3>
        <p>You haven\'t saved any job listings yet. Browse our <a href="jobListings.php" class="text-teal-600 hover:underline">Job Listings</a> to get started!</p>
    </div>
    ';
} else {
    // Loop through the simulated saved jobs and create a card for each
    foreach ($savedJobs as $job) {
        $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">' . $job['title'] . '</h2>
                <span class="text-sm font-medium text-teal-600">' . $job['type'] . '</span>
            </div>
            <p class="text-gray-600 mb-2">' . $job['company'] . ' - ' . $job['location'] . '</p>
            
            <div class="flex items-center justify-between mt-4">
                <span class="text-xs text-gray-400">Saved ' . $job['date_saved'] . '</span>
                <div class="flex gap-2">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-lg hover:bg-teal-700 transition">
                        <i class="bx bx-check"></i> Apply Now
                    </button>
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        <i class="bx bx-x"></i> Remove
                    </button>
                </div>
            </div>
        </div>';
    }
}

$children .= '
    </div>
</div>';

// Pass the full HTML content to the applicant layout function
applicantLayout($children);
?>