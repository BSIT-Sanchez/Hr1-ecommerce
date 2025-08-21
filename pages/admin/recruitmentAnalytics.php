<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Recruitment Analytics</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Recruitment Analytics</h2>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700">Total Applicants</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">120</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700">Interviews Scheduled</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">45</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700">Hired</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">30</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700">Rejected</h3>
            <p class="text-3xl font-bold text-red-600 mt-2">20</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Applicants Status Pie Chart -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Applicants Status</h3>
            <canvas id="statusChart"></canvas>
        </div>

        <!-- Monthly Applicants Line Chart -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Monthly Applicants</h3>
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const statusCtx = document.getElementById("statusChart").getContext("2d");
const statusChart = new Chart(statusCtx, {
    type: "doughnut",
    data: {
        labels: ["Shortlisted", "Hired", "Rejected", "Pending"],
        datasets: [{
            data: [35, 30, 20, 35],
            backgroundColor: ["#6366F1", "#3B82F6", "#EF4444", "#FBBF24"],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: "bottom" }
        }
    }
});

const monthlyCtx = document.getElementById("monthlyChart").getContext("2d");
const monthlyChart = new Chart(monthlyCtx, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
            label: "Applicants",
            data: [12, 19, 8, 15, 20, 18, 25, 30],
            backgroundColor: "rgba(59, 130, 246, 0.2)",
            borderColor: "#3B82F6",
            borderWidth: 2,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: "top" }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
';

adminLayout($children);
?>
