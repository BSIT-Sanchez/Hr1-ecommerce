<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Goal Tracking</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Goal Tracking</h2>
    </div>

    <!-- Goals Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Goal Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Complete Project Alpha</h3>
                    <p class="text-gray-500 text-sm">Due: 2025-08-30</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">In Progress</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Develop and deliver the initial version of Project Alpha according to requirements.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Complete Project Alpha\', \'In Progress\', \'Develop and deliver the initial version of Project Alpha.\', \'2025-08-30\')">View</button>
                <div class="flex gap-2">
                    <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Marked as Completed!\')">✓</button>
                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="alert(\'Reset Goal\')">✕</button>
                </div>
            </div>
        </div>

        <!-- Another Goal Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Improve Team Collaboration</h3>
                    <p class="text-gray-500 text-sm">Due: 2025-09-10</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Completed</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Enhance communication and coordination among team members for better project outcomes.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Improve Team Collaboration\', \'Completed\', \'Enhance communication and coordination among team members.\', \'2025-09-10\')">View</button>
                <div class="flex gap-2">
                    <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Marked as Completed!\')">✓</button>
                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="alert(\'Reset Goal\')">✕</button>
                </div>
            </div>
        </div>

        <!-- Add more goal cards dynamically -->

    </div>
</div>

<!-- Goal Modal -->
<div id="goalModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="goalTitle">Goal Title</h3>
        <div class="space-y-2 text-gray-700">
            <p id="goalStatus">Status: In Progress</p>
            <p id="goalDescription">Description: Goal details</p>
            <p id="goalDue">Due Date: 2025-08-30</p>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" onclick="alert(\'Marked as Completed!\')">Mark Completed</button>
            <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700" onclick="alert(\'Reset Goal\')">Reset</button>
        </div>
    </div>
</div>

<script>
function openModal(title, status, description, due) {
    document.getElementById("goalModal").classList.remove("hidden");
    document.getElementById("goalTitle").textContent = title;
    document.getElementById("goalStatus").textContent = "Status: " + status;
    document.getElementById("goalDescription").textContent = "Description: " + description;
    document.getElementById("goalDue").textContent = "Due Date: " + due;
}

function closeModal() {
    document.getElementById("goalModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
