<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// Simulate fetching the applicant's job applications from a database
// Each application has a status that will determine the color of the badge
$myApplications = [
    [
        'title' => 'Full Stack Developer',
        'company' => 'Tech Solutions Inc.',
        'applied' => '2 days ago',
        'status' => 'Under Review', // Status: Applied, Under Review, Interview, Rejected, Hired
    ],
    [
        'title' => 'UX/UI Designer',
        'company' => 'Creative Hub Co.',
        'applied' => '5 days ago',
        'status' => 'Interview',
    ],
    [
        'title' => 'Digital Marketing Specialist',
        'company' => 'Growth & Co.',
        'applied' => '1 week ago',
        'status' => 'Applied',
    ],
    [
        'title' => 'HR Manager',
        'company' => 'IMARKET',
        'applied' => '3 weeks ago',
        'status' => 'Rejected',
    ],
    [
        'title' => 'Customer Support Representative',
        'company' => 'Global Connect',
        'applied' => '3 days ago',
        'status' => 'Hired',
    ],
];

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>My Applications</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">My Job Applications</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Job Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Applied
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                ';

// Loop through the simulated applications and create a table row for each
foreach ($myApplications as $app) {
    // Determine badge color based on status
    $statusColor = '';
    switch ($app['status']) {
        case 'Under Review':
            $statusColor = 'bg-blue-100 text-blue-800';
            break;
        case 'Interview':
            $statusColor = 'bg-yellow-100 text-yellow-800';
            break;
        case 'Rejected':
            $statusColor = 'bg-red-100 text-red-800';
            break;
        case 'Hired':
            $statusColor = 'bg-green-100 text-green-800';
            break;
        default:
            $statusColor = 'bg-gray-100 text-gray-800';
            break;
    }

    $children .= '
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            ' . $app['title'] . '
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ' . $app['company'] . '
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ' . $app['applied'] . '
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' . $statusColor . '">
                                ' . $app['status'] . '
                            </span>
                        </td>
                    </tr>
    ';
}

$children .= '
                </tbody>
            </table>
        </div>
    </div>
</div>
';

// Pass the full HTML content to the applicant layout function
applicantLayout($children);
?>