<?php
session_start(); 

if (!isset($_SESSION['id'])) {
    header('Location:http://localhost/hr1-ecommerce/login.php');
    exit();
}
include '../../layout/applicantLayout.php';

$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>My Dashboard</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">My Dashboard</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-briefcase-alt-2 text-4xl text-teal-600"></i>
                <span class="text-gray-500 text-sm">Active Applications</span>
            </div>
            <h2 class="text-2xl font-semibold mb-2">5</h2>
            <p class="text-gray-600 text-sm">You have 5 active job applications. Click to view status.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-calendar text-4xl text-blue-600"></i>
                <span class="text-gray-500 text-sm">Upcoming Interviews</span>
            </div>
            <h2 class="text-2xl font-semibold mb-2">1</h2>
            <p class="text-gray-600 text-sm">You have 1 interview scheduled this week.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-bookmark text-4xl text-yellow-500"></i>
                <span class="text-gray-500 text-sm">Job Bookmarks</span>
            </div>
            <h2 class="text-2xl font-semibold mb-2">12</h2>
            <p class="text-gray-600 text-sm">You have 12 jobs saved for later consideration.</p>
        </div>

    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Application Updates</h2>
            <ul class="space-y-4">
                <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition">
                    <i class="bx bx-check-circle text-2xl text-green-500"></i>
                    <div>
                        <p class="font-medium text-gray-800">Software Engineer</p>
                        <p class="text-sm text-gray-500">Your application is now **Under Review**.</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-400">2 days ago</span>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition">
                    <i class="bx bx-briefcase text-2xl text-blue-500"></i>
                    <div>
                        <p class="font-medium text-gray-800">UX/UI Designer</p>
                        <p class="text-sm text-gray-500">Interview scheduled for next Monday.</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-400">4 days ago</span>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition">
                    <i class="bx bx-sync text-2xl text-gray-500"></i>
                    <div>
                        <p class="font-medium text-gray-800">Digital Marketing Specialist</p>
                        <p class="text-sm text-gray-500">Application submitted successfully.</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-400">1 week ago</span>
                </li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
            <div class="space-y-4">
                <a href="jobListings.php" class="flex items-center gap-4 p-4 rounded-lg bg-teal-50 hover:bg-teal-100 transition">
                    <i class="bx bx-search text-3xl text-teal-600"></i>
                    <p class="font-medium text-gray-800">Browse New Jobs</p>
                </a>
                <a href="profile.php" class="flex items-center gap-4 p-4 rounded-lg bg-blue-50 hover:bg-blue-100 transition">
                    <i class="bx bx-user-circle text-3xl text-blue-600"></i>
                    <p class="font-medium text-gray-800">Update My Profile & Resume</p>
                </a>
                <a href="interviewSchedule.php" class="flex items-center gap-4 p-4 rounded-lg bg-yellow-50 hover:bg-yellow-100 transition">
                    <i class="bx bx-calendar-check text-3xl text-yellow-600"></i>
                    <p class="font-medium text-gray-800">View Interview Schedule</p>
                </a>
            </div>
        </div>
    </div>
</div>
';

applicantLayout($children);
?>