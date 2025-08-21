<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// Simulate fetching applicant profile data
$applicantProfile = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '+63 917 123 4567',
    'location' => 'Makati City, Philippines',
    'resume_file' => 'John_Doe_Resume_2024.pdf',
    'skills' => ['PHP', 'Laravel', 'JavaScript', 'Tailwind CSS', 'SQL', 'Git'],
];

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>My Profile</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">My Profile & Resume</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex flex-col md:flex-row items-center gap-6 mb-6">
            <img src="../../images/profile.jpg" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-teal-500">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">' . $applicantProfile['name'] . '</h2>
                <p class="text-gray-500 text-sm">' . $applicantProfile['location'] . '</p>
            </div>
        </div>

        <h3 class="text-xl font-semibold text-gray-700 mb-4">Contact Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" id="email" value="' . $applicantProfile['email'] . '" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-600">Phone Number</label>
                <input type="text" id="phone" value="' . $applicantProfile['phone'] . '" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-teal-500 focus:border-teal-500">
            </div>
        </div>
        <div class="mt-6 text-right">
            <button class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">Save Changes</button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Resume / CV</h3>
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
            <div>
                <p class="font-medium text-gray-800">Current Resume:</p>
                <a href="#" class="text-teal-600 hover:underline">' . $applicantProfile['resume_file'] . '</a>
            </div>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <i class="bx bx-cloud-upload mr-2"></i>Upload New File
            </button>
        </div>
        <p class="text-sm text-gray-500 mt-2">Accepted formats: .pdf, .doc, .docx. Maximum file size: 5MB.</p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Skills</h3>
        <div class="flex flex-wrap gap-2">
            ';

foreach ($applicantProfile['skills'] as $skill) {
    $children .= '<span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">' . $skill . '</span>';
}

$children .= '
        </div>
        <div class="mt-6 text-right">
            <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Edit Skills</button>
        </div>
    </div>

</div>';

// Pass the full HTML content to the applicant layout function
applicantLayout($children);
?>