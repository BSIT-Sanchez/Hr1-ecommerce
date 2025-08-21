<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// Simulate fetching interview data from a database
// You would replace this with a real database query
$upcomingInterviews = [
    [
        'title' => 'UX/UI Designer',
        'company' => 'Creative Hub Co.',
        'date' => 'August 25, 2025',
        'time' => '10:00 AM PST',
        'type' => 'Online Interview (Google Meet)',
        'link' => 'https://meet.google.com/xyz-abc-def',
    ],
];

$pastInterviews = [
    [
        'title' => 'Digital Marketing Specialist',
        'company' => 'Growth & Co.',
        'date' => 'August 10, 2025',
        'time' => '3:00 PM PST',
        'outcome' => 'Awaiting Feedback',
    ],
    [
        'title' => 'HR Manager',
        'company' => 'IMARKET',
        'date' => 'July 28, 2025',
        'time' => '11:00 AM PST',
        'outcome' => 'Rejected',
    ],
];

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>Interview Schedule</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Interview Schedule</h1>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upcoming Interviews</h2>
    <div class="space-y-4 mb-8">
    ';

if (empty($upcomingInterviews)) {
    $children .= '<div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-500">You have no upcoming interviews scheduled at this time.</div>';
} else {
    foreach ($upcomingInterviews as $interview) {
        $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">' . $interview['title'] . '</h3>
                <p class="text-gray-600 mb-2">' . $interview['company'] . '</p>
                <p class="text-gray-500 text-sm">
                    <i class="bx bx-calendar text-lg text-teal-600 mr-2"></i>Date: <span class="font-medium text-gray-700">' . $interview['date'] . '</span>
                </p>
                <p class="text-gray-500 text-sm">
                    <i class="bx bx-time-five text-lg text-teal-600 mr-2"></i>Time: <span class="font-medium text-gray-700">' . $interview['time'] . '</span>
                </p>
                <p class="text-gray-500 text-sm">
                    <i class="bx bx-video text-lg text-teal-600 mr-2"></i>Type: <span class="font-medium text-gray-700">' . $interview['type'] . '</span>
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="' . $interview['link'] . '" target="_blank" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">
                    <i class="bx bx-link mr-1"></i> Join Interview
                </a>
            </div>
        </div>
        ';
    }
}

$children .= '
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Past Interviews</h2>
    <div class="space-y-4">
    ';

if (empty($pastInterviews)) {
    $children .= '<div class="bg-white p-6 rounded-lg shadow-md text-center text-gray-500">You have not completed any interviews yet.</div>';
} else {
    foreach ($pastInterviews as $interview) {
        // Determine badge color for outcome
        $outcomeColor = '';
        if ($interview['outcome'] === 'Rejected') {
            $outcomeColor = 'bg-red-100 text-red-800';
        } elseif ($interview['outcome'] === 'Awaiting Feedback') {
            $outcomeColor = 'bg-yellow-100 text-yellow-800';
        } else {
            $outcomeColor = 'bg-gray-100 text-gray-800';
        }

        $children .= '
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">' . $interview['title'] . '</h3>
                <p class="text-gray-600 mb-2">' . $interview['company'] . '</p>
                <p class="text-gray-500 text-sm">
                    <i class="bx bx-calendar-check text-lg text-gray-600 mr-2"></i>Date: <span class="font-medium text-gray-700">' . $interview['date'] . '</span>
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="px-3 py-1 text-sm font-semibold rounded-full ' . $outcomeColor . '">
                    ' . $interview['outcome'] . '
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