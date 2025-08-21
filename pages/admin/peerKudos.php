<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Peer-to-Peer Kudos</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Peer-to-Peer Kudos</h2>
    </div>

    <!-- Kudos Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Kudos Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Alice Brown</h3>
                    <p class="text-gray-500 text-sm">Software Engineer</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-indigo-100 text-indigo-800 text-xs font-medium">Kudos Given</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Kudos to Bob Smith for assisting in project delivery and teamwork.</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Alice Brown\', \'Software Engineer\', \'Bob Smith\', \'Assisting in project delivery and teamwork\', \'2025-08-15\')">View</button>
            </div>
        </div>

        <!-- Another Kudos Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">David Lee</h3>
                    <p class="text-gray-500 text-sm">HR Manager</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Kudos Received</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Kudos to Emily Clark for organizing the team event efficiently.</p>
            <div class="flex justify-end gap-2">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'David Lee\', \'HR Manager\', \'Emily Clark\', \'Organizing the team event efficiently\', \'2025-08-18\')">View</button>
            </div>
        </div>

        <!-- Add more kudos cards dynamically -->

    </div>
</div>

<!-- Kudos Modal -->
<div id="kudosModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="kudosFrom">From: </h3>
        <div class="space-y-2 text-gray-700">
            <p id="kudosFromPosition">Position: </p>
            <p id="kudosTo">Kudos To: </p>
            <p id="kudosMessage">Message: </p>
            <p id="kudosDate">Date: </p>
        </div>
    </div>
</div>

<script>
function openModal(from, fromPosition, to, message, date) {
    document.getElementById("kudosModal").classList.remove("hidden");
    document.getElementById("kudosFrom").textContent = "From: " + from;
    document.getElementById("kudosFromPosition").textContent = "Position: " + fromPosition;
    document.getElementById("kudosTo").textContent = "Kudos To: " + to;
    document.getElementById("kudosMessage").textContent = "Message: " + message;
    document.getElementById("kudosDate").textContent = "Date: " + date;
}

function closeModal() {
    document.getElementById("kudosModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
