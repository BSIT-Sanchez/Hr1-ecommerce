<?php
session_start(); 

if (!isset($_SESSION['id'])) {
    header('Location:http://localhost/hr1-ecommerce/login.php');
    exit();
}
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-600 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; <span>HR Dashboard</span>
    </div>

    <!-- Dashboard Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">HR Dashboard</h1>
       
    </div>

    <!-- Modules Overview Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Talent Pool -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-user text-4xl text-indigo-600"></i>
                <span class="text-gray-500 text-sm">Applicants, Profiles</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Talent Pool</h2>
            <p class="text-gray-600 text-sm">Manage applicants, candidate profiles, and shortlist or reject candidates.</p>
        </div>

        <!-- Hiring Operations -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-briefcase-alt-2 text-4xl text-green-600"></i>
                <span class="text-gray-500 text-sm">Jobs, Interviews</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Hiring Operations</h2>
            <p class="text-gray-600 text-sm">Manage job listings, schedule interviews, and track recruitment analytics.</p>
        </div>

        <!-- Employee Onboarding -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-book text-4xl text-yellow-500"></i>
                <span class="text-gray-500 text-sm">Tasks, Docs</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Onboarding</h2>
            <p class="text-gray-600 text-sm">Handle onboarding tasks, documentation, and orientation programs.</p>
        </div>

        <!-- Employee Performance -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-line-chart text-4xl text-red-600"></i>
                <span class="text-gray-500 text-sm">Goals, Reviews</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Performance</h2>
            <p class="text-gray-600 text-sm">Track goals, performance reviews, and appraisals & feedback.</p>
        </div>

        <!-- Recognition & Rewards -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-gift text-4xl text-pink-500"></i>
                <span class="text-gray-500 text-sm">Achievements, Kudos</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Recognition & Rewards</h2>
            <p class="text-gray-600 text-sm">Track employee achievements, peer-to-peer recognition, and reward programs.</p>
        </div>

        <!-- Admin Settings -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <i class="bx bx-cog text-4xl text-gray-700"></i>
                <span class="text-gray-500 text-sm">Users, Permissions</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">Admin Settings</h2>
            <p class="text-gray-600 text-sm">Manage users, roles, permissions, and system configuration.</p>
        </div>

    </div>

</div>
';

adminLayout($children);
?>
