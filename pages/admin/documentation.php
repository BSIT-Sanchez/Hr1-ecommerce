<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Documentation</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Documentation</h2>
    </div>

    <!-- Documents Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Document Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Employment Contract</h3>
                    <p class="text-gray-500 text-sm">Mandatory</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Submitted</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Signed employment contract must be uploaded before start date.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'Employment Contract\', \'Submitted\', \'Signed employment contract\', \'2025-08-15\')">View</button>
                <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Verified!\')">✓</button>
            </div>
        </div>

        <!-- Another Document Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">ID Proof</h3>
                    <p class="text-gray-500 text-sm">Mandatory</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Pending</span>
            </div>
            <p class="text-gray-600 text-sm mb-4">Upload a government-issued ID for verification.</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
                    onclick="openModal(\'ID Proof\', \'Pending\', \'Upload government ID\', \'Due: 2025-08-20\')">View</button>
                <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600" onclick="alert(\'Verified!\')">✓</button>
            </div>
        </div>

        <!-- Add more document cards dynamically -->

    </div>
</div>

<!-- Document Modal -->
<div id="documentModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="docTitle">Document Title</h3>
        <div class="space-y-2 text-gray-700">
            <p id="docStatus">Status: Pending</p>
            <p id="docDescription">Description: Upload document</p>
            <p id="docDue">Due Date: 2025-08-20</p>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" onclick="alert(\'Verified!\')">Verify</button>
        </div>
    </div>
</div>

<script>
function openModal(title, status, description, due) {
    document.getElementById("documentModal").classList.remove("hidden");
    document.getElementById("docTitle").textContent = title;
    document.getElementById("docStatus").textContent = "Status: " + status;
    document.getElementById("docDescription").textContent = "Description: " + description;
    document.getElementById("docDue").textContent = due;
}

function closeModal() {
    document.getElementById("documentModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
