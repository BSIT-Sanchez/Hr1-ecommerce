<?php
// Include the admin layout file
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Candidate Profiles</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Candidate Profiles</h2>
    </div>

    <!-- Profiles Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Candidate Card 1 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center mb-4">
                <img src="https://via.placeholder.com/50" alt="John Doe" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">John Doe</h3>
                    <p class="text-gray-500 text-sm">Software Engineer</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4">Status: <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Shortlisted</span></p>
            <div class="flex justify-end">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="openProfileModal(\'John Doe\', \'Software Engineer\', \'Shortlisted\', \'5 years experience, Strong portfolio\')">View Details</button>
            </div>
        </div>

        <!-- Candidate Card 2 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center mb-4">
                <img src="https://via.placeholder.com/50" alt="Jane Smith" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Jane Smith</h3>
                    <p class="text-gray-500 text-sm">UI/UX Designer</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4">Status: <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Pending</span></p>
            <div class="flex justify-end">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="openProfileModal(\'Jane Smith\', \'UI/UX Designer\', \'Pending\', \'3 years experience, Excellent portfolio\')">View Details</button>
            </div>
        </div>

        <!-- Candidate Card 3 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center mb-4">
                <img src="https://via.placeholder.com/50" alt="Michael Brown" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Michael Brown</h3>
                    <p class="text-gray-500 text-sm">Backend Developer</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4">Status: <span class="px-2 py-1 rounded-full bg-red-100 text-red-800 text-xs font-medium">Rejected</span></p>
            <div class="flex justify-end">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="openProfileModal(\'Michael Brown\', \'Backend Developer\', \'Rejected\', \'2 years experience, Needs more skills\')">View Details</button>
            </div>
        </div>

        <!-- Add more candidate cards dynamically -->

    </div>
</div>

<!-- Candidate Profile Modal -->
<div id="profileModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeProfileModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Candidate Details</h3>
        <div class="space-y-2 text-gray-700">
            <p id="profileName">Name: John Doe</p>
            <p id="profilePosition">Position: Software Engineer</p>
            <p id="profileStatus">Status: Shortlisted</p>
            <p id="profileNotes">Notes: 5 years experience, Strong portfolio</p>
        </div>
    </div>
</div>

<script>
function openProfileModal(name, position, status, notes) {
    document.getElementById("profileModal").classList.remove("hidden");
    document.getElementById("profileName").textContent = "Name: " + name;
    document.getElementById("profilePosition").textContent = "Position: " + position;
    document.getElementById("profileStatus").textContent = "Status: " + status;
    document.getElementById("profileNotes").textContent = "Notes: " + notes;
}

function closeProfileModal() {
    document.getElementById("profileModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
