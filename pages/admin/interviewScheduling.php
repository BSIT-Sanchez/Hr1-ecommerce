<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Interview Scheduling</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Interview Scheduling</h2>
        <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="alert(\'Schedule New Interview\')">+ Schedule Interview</button>
    </div>

    <!-- Interview Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Interview Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">John Doe</h3>
                    <p class="text-gray-500 text-sm">Software Engineer</p>
                </div>
                <span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">Scheduled</span>
            </div>
            <p class="text-gray-600 text-sm mb-2">Date: 2025-08-25</p>
            <p class="text-gray-600 text-sm mb-4">Time: 10:00 AM</p>
            <p class="text-gray-600 text-sm mb-4">Interviewer: Jane Smith</p>
            <div class="flex justify-between items-center">
                <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="viewInterview(\'John Doe\', \'Software Engineer\', \'2025-08-25\', \'10:00 AM\', \'Jane Smith\', \'Scheduled\')">View</button>
                <div class="flex gap-2">
                    <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" onclick="alert(\'Reschedule\')">Reschedule</button>
                    <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="alert(\'Cancel\')">Cancel</button>
                </div>
            </div>
        </div>

        <!-- Add more interview cards dynamically -->

    </div>
</div>

<!-- Interview Modal -->
<div id="interviewModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Interview Details</h3>
        <div class="space-y-2 text-gray-700">
            <p id="intApplicant">Applicant: John Doe</p>
            <p id="intPosition">Position: Software Engineer</p>
            <p id="intDate">Date: 2025-08-25</p>
            <p id="intTime">Time: 10:00 AM</p>
            <p id="intInterviewer">Interviewer: Jane Smith</p>
            <p id="intStatus">Status: Scheduled</p>
        </div>
    </div>
</div>

<script>
function viewInterview(applicant, position, date, time, interviewer, status) {
    document.getElementById("interviewModal").classList.remove("hidden");
    document.getElementById("intApplicant").textContent = "Applicant: " + applicant;
    document.getElementById("intPosition").textContent = "Position: " + position;
    document.getElementById("intDate").textContent = "Date: " + date;
    document.getElementById("intTime").textContent = "Time: " + time;
    document.getElementById("intInterviewer").textContent = "Interviewer: " + interviewer;
    document.getElementById("intStatus").textContent = "Status: " + status;
}

function closeModal() {
    document.getElementById("interviewModal").classList.add("hidden");
}
</script>
';

adminLayout($children);
?>
