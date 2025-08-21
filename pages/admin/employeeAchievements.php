<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Employee Achievements</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Employee Achievements</h2>
    </div>

    <!-- Achievements Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Achievement Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Jane Smith</h3>
                    <p class="text-gray-500 text-sm">Project Manager</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Awarded</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Achievement: Best Project Leadership Q2 2025</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Jane Smith\', \'Project Manager\', \'Best Project Leadership Q2 2025\', \'Awarded for outstanding project management and team coordination.\')">View</button>
            </div>
        </div>

        <!-- Another Achievement Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">John Doe</h3>
                    <p class="text-gray-500 text-sm">Software Engineer</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Nominated</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Achievement: Employee of the Month July 2025</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'John Doe\', \'Software Engineer\', \'Employee of the Month July 2025\', \'Nominated for excellent performance and contributions to the team.\')">View</button>
            </div>
        </div>

        <!-- Add more achievement cards dynamically -->

    </div>
</div>

<!-- Achievement Modal -->
<div id="achievementModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="achievementEmployee">Employee Name</h3>
        <div class="space-y-2 text-gray-700">
            <p id="achievementPosition">Position: </p>
            <p id="achievementTitle">Achievement: </p>
            <p id="achievementDetails">Details: </p>
        </div>
    </div>
</div>

<script>
function openModal(employee, position, title, details) {
    document.getElementById("achievementModal").classList.remove("hidden");
    document.getElementById("achievementEmployee").textContent = employee;
    document.getElementById("achievementPosition").textContent = "Position: " + position;
    document.getElementById("achievementTitle").textContent = "Achievement: " + title;
    document.getElementById("achievementDetails").textContent = "Details: " + details;
}

function closeModal() {
    document.getElementById("achievementModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
