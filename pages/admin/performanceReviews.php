<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Performance Reviews</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Performance Reviews</h2>
    </div>

    <!-- Reviews Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Employee</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Position</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Review Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Rating</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">Jane Smith</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Project Manager</td>
                    <td class="px-6 py-4 text-sm text-gray-700">2025-08-10</td>
                    <td class="px-6 py-4 text-sm text-gray-700">4.5 / 5</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Completed</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <button class="text-indigo-600 hover:underline" 
                            onclick="openModal(\'Jane Smith\', \'Project Manager\', \'2025-08-10\', \'4.5 / 5\', \'Excellent leadership and project management skills.\')">View</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">John Doe</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Software Engineer</td>
                    <td class="px-6 py-4 text-sm text-gray-700">2025-08-12</td>
                    <td class="px-6 py-4 text-sm text-gray-700">4.0 / 5</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-medium">Pending</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <button class="text-indigo-600 hover:underline" 
                            onclick="openModal(\'John Doe\', \'Software Engineer\', \'2025-08-12\', \'4.0 / 5\', \'Solid coding skills but needs improvement in documentation.\')">View</button>
                    </td>
                </tr>
                <!-- Add more reviews dynamically -->
            </tbody>
        </table>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="reviewEmployee">Employee Name</h3>
        <div class="space-y-2 text-gray-700">
            <p id="reviewPosition">Position: </p>
            <p id="reviewDate">Review Date: </p>
            <p id="reviewRating">Rating: </p>
            <p id="reviewNotes">Notes: </p>
        </div>
    </div>
</div>

<script>
function openModal(employee, position, date, rating, notes) {
    document.getElementById("reviewModal").classList.remove("hidden");
    document.getElementById("reviewEmployee").textContent = employee;
    document.getElementById("reviewPosition").textContent = "Position: " + position;
    document.getElementById("reviewDate").textContent = "Review Date: " + date;
    document.getElementById("reviewRating").textContent = "Rating: " + rating;
    document.getElementById("reviewNotes").textContent = "Notes: " + notes;
}

function closeModal() {
    document.getElementById("reviewModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
