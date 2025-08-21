<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// Simulate fetching the applicant's job offers from a database
// You would replace this with a real database query
$pendingOffers = [
    [
        'title' => 'Senior Full Stack Developer',
        'company' => 'Innovate Corp.',
        'salary' => 'PHP 85,000 / month',
        'deadline' => 'October 1, 2025',
    ],
];

$acceptedOffers = [
    [
        'title' => 'Junior Front End Developer',
        'company' => 'WebCrafters LLC',
        'salary' => 'PHP 45,000 / month',
        'date_accepted' => 'August 15, 2025',
    ],
];

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>My Offers</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Job Offers</h1>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pending Offers</h2>
    <div class="space-y-4 mb-8">
    ';

if (empty($pendingOffers)) {
    $children .= '<div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-500">You have no pending job offers at the moment.</div>';
} else {
    foreach ($pendingOffers as $offer) {
        $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">' . $offer['title'] . '</h3>
                <p class="text-gray-600 mb-2">' . $offer['company'] . '</p>
                <p class="text-gray-500 text-sm">Salary: <span class="font-medium text-teal-600">' . $offer['salary'] . '</span></p>
                <p class="text-gray-500 text-sm">Deadline to Respond: <span class="font-medium text-red-500">' . $offer['deadline'] . '</span></p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-2">
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="bx bx-check-circle mr-1"></i> Accept Offer
                </button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    <i class="bx bx-x-circle mr-1"></i> Decline Offer
                </button>
            </div>
        </div>
        ';
    }
}

$children .= '
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Accepted Offers</h2>
    <div class="space-y-4">
    ';

if (empty($acceptedOffers)) {
    $children .= '<div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-500">No offers have been accepted yet.</div>';
} else {
    foreach ($acceptedOffers as $offer) {
        $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">' . $offer['title'] . '</h3>
                <p class="text-gray-600 mb-2">' . $offer['company'] . '</p>
                <p class="text-gray-500 text-sm">Salary: <span class="font-medium text-teal-600">' . $offer['salary'] . '</span></p>
                <p class="text-gray-500 text-sm">Date Accepted: <span class="font-medium text-gray-700">' . $offer['date_accepted'] . '</span></p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">
                    Accepted
                </span>
            </div>
        </div>
        ';
    }
}

$children .= '
    </div>

</div>';

// Pass the full HTML content to the applicant layout function
applicantLayout($children);
?>