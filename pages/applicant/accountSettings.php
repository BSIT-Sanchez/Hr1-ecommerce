<?php
// Include the applicant layout file
include '../../layout/applicantLayout.php';

// The HTML content for the page
$children = '
<div class="p-6">

    <div class="text-sm text-gray-600 mb-6">
        <a href="applicantDashboard.php" class="text-teal-600 hover:underline">Home</a> &gt; <span>Account Settings</span>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Account Settings</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Change Password</h2>
        <form action="#" method="POST">
            <div class="space-y-4">
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">Update Password</button>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Notification Preferences</h2>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">New Job Alerts</span>
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="sr-only" checked>
                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-full"></div>
                    </div>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Application Status Updates</span>
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="sr-only" checked>
                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-full"></div>
                    </div>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Interview Reminders</span>
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="sr-only" checked>
                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-full"></div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
        <h2 class="text-2xl font-semibold text-red-700 mb-4">Delete Account</h2>
        <p class="text-gray-600 mb-4">Permanently delete your account and all associated data. This action cannot be undone.</p>
        <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Delete Account</button>
    </div>

</div>';

// Pass the full HTML content to the applicant layout function
applicantLayout($children);
?>