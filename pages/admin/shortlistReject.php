<?php
// Include the admin layout file
include '../../layout/adminLayout.php';

// Simulate fetching a list of applicants from a database based on status
// In a real application, you would use $_GET['status'] to query the database
$status = isset($_GET['status']) ? $_GET['status'] : 'Shortlisted'; // Default to 'Shortlisted'

$allApplicants = [
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
        'status' => 'Shortlisted',
    ],
    [
        'id' => 6,
        'name' => 'Maria Fernandez',
        'position' => 'Human Resources Specialist',
        'date_applied' => '2025-08-12',
        'status' => 'Rejected',
    ],
];

// Filter the applicants based on the URL parameter
$applicants = array_filter($allApplicants, function($applicant) use ($status) {
    return $applicant['status'] == $status;
});

// Set page title dynamically
$pageTitle = $status . ' Candidates';

$children = '
<div class="p-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-600 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; <span>Talent Pool</span> &gt; <span>' . htmlspecialchars($pageTitle) . '</span>
    </div>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">' . htmlspecialchars($pageTitle) . '</h1>
        <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-lg hover:bg-indigo-700 transition">
            <i class="bx bx-plus-circle mr-2"></i>Export ' . htmlspecialchars($pageTitle) . '
        </a>
    </div>

    <!-- Applicants Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        ';

if (empty($applicants)) {
    $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-500 col-span-full">
            No ' . strtolower(htmlspecialchars($status)) . ' applicants found.
        </div>
        ';
} else {
    foreach ($applicants as $applicant) {
        $children .= '
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center text-gray-600 font-bold text-xl">
                    ' . strtoupper(substr($applicant['name'], 0, 1)) . '
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">' . htmlspecialchars($applicant['name']) . '</h3>
                    <p class="text-sm text-gray-600">' . htmlspecialchars($applicant['position']) . '</p>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-4 mt-4">
                <p class="text-sm text-gray-500 mb-2">Applied on: <span class="text-gray-700 font-medium">' . htmlspecialchars($applicant['date_applied']) . '</span></p>
                <div class="flex justify-end space-x-2">
                    <a href="candidateProfiles.php?id=' . htmlspecialchars($applicant['id']) . '" class="flex items-center justify-center p-2 rounded-full text-indigo-600 hover:bg-indigo-100 transition" title="View Profile">
                        <i class="bx bx-user-circle text-2xl"></i>
                    </a>
                    ';
        if ($status !== 'Shortlisted') {
            $children .= '
                    <button class="flex items-center justify-center p-2 rounded-full text-green-600 hover:bg-green-100 transition" title="Shortlist">
                        <i class="bx bx-check-circle text-2xl"></i>
                    </button>
                    ';
        }
        $children .= '
                    <button class="flex items-center justify-center p-2 rounded-full text-red-600 hover:bg-red-100 transition" title="Reject">
                        <i class="bx bx-x-circle text-2xl"></i>
                    </button>
                </div>
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
