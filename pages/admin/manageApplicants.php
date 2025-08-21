<?php
// Include the admin layout file
include '../../layout/adminLayout.php';

// Simulate fetching a list of job applicants from a database
// In a real application, this would be a database query
$applicants = [
    [
        'id' => 1,
        'name' => 'Michael Santos',
        'position' => 'Software Engineer',
        'date_applied' => '2025-08-18',
        'status' => 'Pending Review',
    ],
    [
        'id' => 2,
        'name' => 'Jessica Lim',
        'position' => 'UX/UI Designer',
        'date_applied' => '2025-08-17',
        'status' => 'Under Interview',
    ],
    [
        'id' => 3,
        'name' => 'Carlos Reyes',
        'position' => 'Digital Marketing Manager',
        'date_applied' => '2025-08-15',
        'status' => 'Shortlisted',
    ],
    [
        'id' => 4,
        'name' => 'Sarah Mendoza',
        'position' => 'Data Analyst',
        'date_applied' => '2025-08-14',
        'status' => 'Rejected',
    ],
    [
        'id' => 5,
        'name' => 'David Chen',
        'position' => 'Product Manager',
        'date_applied' => '2025-08-13',
        'status' => 'Pending Review',
    ],
    [
        'id' => 6,
        'name' => 'Maria Fernandez',
        'position' => 'Human Resources Specialist',
        'date_applied' => '2025-08-12',
        'status' => 'Under Interview',
    ],
];

// The HTML content for the page
$children = '
<div class="p-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-600 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; <span>Talent Pool</span> &gt; <span>Manage Applicants</span>
    </div>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Manage Applicants</h1>
        <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-lg hover:bg-indigo-700 transition">
            <i class="bx bx-plus-circle mr-2"></i>Export Applicants
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6 flex flex-col sm:flex-row gap-4">
        <input type="text" placeholder="Search by name or position..." class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <select class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All Statuses</option>
            <option value="Pending Review">Pending Review</option>
            <option value="Under Interview">Under Interview</option>
            <option value="Shortlisted">Shortlisted</option>
            <option value="Rejected">Rejected</option>
        </select>
        <button class="p-2 bg-gray-200 rounded-md hover:bg-gray-300 transition">
            <i class="bx bx-filter-alt"></i> Filter
        </button>
    </div>

    <!-- Applicants Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        ';

if (empty($applicants)) {
    $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md col-span-full text-center text-gray-500">
            No applicants found.
        </div>
        ';
} else {
    foreach ($applicants as $applicant) {
        $status_color_text = '';
        $status_color_bg = '';
        switch ($applicant['status']) {
            case 'Pending Review':
                $status_color_text = 'text-yellow-800';
                $status_color_bg = 'bg-yellow-100';
                break;
            case 'Under Interview':
                $status_color_text = 'text-blue-800';
                $status_color_bg = 'bg-blue-100';
                break;
            case 'Shortlisted':
                $status_color_text = 'text-green-800';
                $status_color_bg = 'bg-green-100';
                break;
            case 'Rejected':
                $status_color_text = 'text-red-800';
                $status_color_bg = 'bg-red-100';
                break;
        }

        $children .= '
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 text-sm font-semibold rounded-full ' . $status_color_bg . ' ' . $status_color_text . '">
                    ' . $applicant['status'] . '
                </span>
                <span class="text-sm text-gray-500">
                    ' . $applicant['date_applied'] . '
                </span>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-1">' . $applicant['name'] . '</h3>
            <p class="text-sm text-gray-600 mb-4">' . $applicant['position'] . '</p>

            <div class="flex justify-start space-x-2 mt-4">
                <a href="applicantProfile.php?id=' . $applicant['id'] . '" class="flex items-center justify-center p-2 rounded-full text-indigo-600 hover:bg-indigo-100 transition" title="View Profile">
                    <i class="bx bx-user-circle text-2xl"></i>
                </a>
                <button class="flex items-center justify-center p-2 rounded-full text-green-600 hover:bg-green-100 transition" title="Shortlist">
                    <i class="bx bx-check-circle text-2xl"></i>
                </button>
                <button class="flex items-center justify-center p-2 rounded-full text-red-600 hover:bg-red-100 transition" title="Reject">
                    <i class="bx bx-x-circle text-2xl"></i>
                </button>
            </div>
        </div>
        ';
    }
}

$children .= '
    </div>
</div>
';

// Pass the full HTML content to the admin layout function
adminLayout($children);
?>
