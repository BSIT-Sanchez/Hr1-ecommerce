<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Onboarding Tasks</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Onboarding Tasks</h2>
    </div>

    <!-- Tasks Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Task Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Complete HR Documentation</h3>
                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Pending</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">New hires must submit all required HR documents.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Complete HR Documentation\', \'Pending\', \'Submit forms for all HR processes\', \'Due: 2025-08-25\')">View</button>
                <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Completed!\')">✓</button>
            </div>
        </div>

        <!-- Another Task Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Orientation Session</h3>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Completed</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Attend company orientation and meet the team.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Orientation Session\', \'Completed\', \'Attend the company introduction and team meet\', \'Date: 2025-08-18\')">View</button>
                <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Completed!\')">✓</button>
            </div>
        </div>

        <!-- Add more tasks dynamically -->

    </div>
</div>

<!-- Task Modal -->
<div id="taskModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="taskTitle">Task Title</h3>
        <div class="space-y-2 text-gray-700">
            <p id="taskStatus">Status: Pending</p>
            <p id="taskDescription">Description: Submit all HR documents</p>
            <p id="taskDue">Due Date: 2025-08-25</p>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" onclick="alert(\'Completed!\')">Mark Complete</button>
        </div>
    </div>
</div>

<script>
function openModal(title, status, description, due) {
    document.getElementById("taskModal").classList.remove("hidden");
    document.getElementById("taskTitle").textContent = title;
    document.getElementById("taskStatus").textContent = "Status: " + status;
    document.getElementById("taskDescription").textContent = "Description: " + description;
    document.getElementById("taskDue").textContent = due;
}

function closeModal() {
    document.getElementById("taskModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
