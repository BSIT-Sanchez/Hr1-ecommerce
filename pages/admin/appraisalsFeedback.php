<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Appraisals & Feedback</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Appraisals & Feedback</h2>
    </div>

    <!-- Appraisals Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Employee</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Position</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Appraisal Period</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Score</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Feedback</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">Jane Smith</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Project Manager</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Q2 2025</td>
                    <td class="px-6 py-4 text-sm text-gray-700">4.5 / 5</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Excellent leadership</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <button class="text-indigo-600 hover:underline" 
                            onclick="openModal(\'Jane Smith\', \'Project Manager\', \'Q2 2025\', \'4.5 / 5\', \'Excellent leadership and project management skills.\')">View</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">John Doe</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Software Engineer</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Q2 2025</td>
                    <td class="px-6 py-4 text-sm text-gray-700">4.0 / 5</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Good performance</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <button class="text-indigo-600 hover:underline" 
                            onclick="openModal(\'John Doe\', \'Software Engineer\', \'Q2 2025\', \'4.0 / 5\', \'Solid coding skills but needs improvement in documentation.\')">View</button>
                    </td>
                </tr>
                <!-- Add more appraisals dynamically -->
            </tbody>
        </table>
    </div>
</div>

<!-- Appraisal Modal -->
<div id="appraisalModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800" id="appraisalEmployee">Employee Name</h3>
        <div class="space-y-2 text-gray-700">
            <p id="appraisalPosition">Position: </p>
            <p id="appraisalPeriod">Appraisal Period: </p>
            <p id="appraisalScore">Score: </p>
            <p id="appraisalFeedback">Feedback: </p>
        </div>
    </div>
</div>

<script>
function openModal(employee, position, period, score, feedback) {
    document.getElementById("appraisalModal").classList.remove("hidden");
    document.getElementById("appraisalEmployee").textContent = employee;
    document.getElementById("appraisalPosition").textContent = "Position: " + position;
    document.getElementById("appraisalPeriod").textContent = "Appraisal Period: " + period;
    document.getElementById("appraisalScore").textContent = "Score: " + score;
    document.getElementById("appraisalFeedback").textContent = "Feedback: " + feedback;
}

function closeModal() {
    document.getElementById("appraisalModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
