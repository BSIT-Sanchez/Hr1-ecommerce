<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Reward Programs</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Reward Programs</h2>
    </div>

    <!-- Reward Programs Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Reward Program Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Employee of the Month</h3>
                    <p class="text-gray-500 text-sm">Recognizing outstanding performance each month</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-indigo-100 text-indigo-800 text-xs font-medium">Active</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Rewards include certificates, bonus, and recognition during company events.</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Employee of the Month\', \'Recognizing outstanding performance each month\', \'Certificates, bonus, and recognition\', \'Active\')">View</button>
            </div>
        </div>

        <!-- Another Reward Program Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Innovation Award</h3>
                    <p class="text-gray-500 text-sm">Rewarding employees for innovative solutions</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Active</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Includes monetary prizes, recognition, and opportunity to lead projects.</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Innovation Award\', \'Rewarding employees for innovative solutions\', \'Monetary prizes, recognition, and leadership opportunities\', \'Active\')">View</button>
            </div>
        </div>

        <!-- Add more reward program cards dynamically -->

    </div>
</div>

<!-- Reward Program Modal -->
<div id="rewardModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="rewardTitle">Title</h3>
        <div class="space-y-2 text-gray-700">
            <p id="rewardDescription">Description: </p>
            <p id="rewardBenefits">Benefits: </p>
            <p id="rewardStatus">Status: </p>
        </div>
    </div>
</div>

<script>
function openModal(title, description, benefits, status) {
    document.getElementById("rewardModal").classList.remove("hidden");
    document.getElementById("rewardTitle").textContent = title;
    document.getElementById("rewardDescription").textContent = "Description: " + description;
    document.getElementById("rewardBenefits").textContent = "Benefits: " + benefits;
    document.getElementById("rewardStatus").textContent = "Status: " + status;
}

function closeModal() {
    document.getElementById("rewardModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
