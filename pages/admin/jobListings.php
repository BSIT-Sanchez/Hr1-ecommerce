<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>Job Listings</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Job Listings</h2>
        <button 
          class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700" 
          onclick="openCreateModal()">+ Add Job</button>
    </div>

   <!-- Job Listings Grid -->
   <div id="jobsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
       <!-- Jobs will be loaded here -->
   </div>

</div>

<!-- View Job Modal -->
<div id="jobModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg max-h-[90vh] overflow-y-auto">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Job Details</h3>
        <div class="space-y-2 text-gray-700">
            <p id="jobTitle">Title: </p>
            <p id="jobDept">Department: </p>
            <p id="jobOpenings">Openings: </p>
            <p id="jobStatus">Status: </p>
            <p id="jobDesc">Description: </p>
            <hr class="my-2">
            <p id="jobSalary">Salary: </p>
            <p id="jobLocation">Location: </p>
            <p id="jobType">Type: </p>
            <p id="jobPosted">Posted On: </p>
            <p id="jobDeadline">Deadline: </p>
        </div>
    </div>
</div>

<!-- Create Job Modal -->
<div id="createJobModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-lg p-6 relative shadow-lg max-h-[90vh] overflow-y-auto hide-scrollbar">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeCreateModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Add New Job</h3>
        <form id="createJobForm" class="space-y-4">
            
            <label class="block text-gray-700 font-medium">Job Title</label>
            <input type="text" name="title" placeholder="Job Title" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Department</label>
            <input type="text" name="department" placeholder="Department" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Openings</label>
            <input type="number" name="openings" placeholder="Openings" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="Open">Open</option>
                <option value="Pending">Pending</option>
                <option value="Closed">Closed</option>
            </select>

            <label class="block text-gray-700 font-medium">Salary</label>
            <input type="text" name="salary" placeholder="₱ Salary" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Location</label>
            <input type="text" name="location" placeholder="Location" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Job Type</label>
            <select name="job_type" class="w-full border rounded p-2">
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Contract">Contract</option>
            </select>

            <label class="block text-gray-700 font-medium">Job Description</label>
            <textarea name="description" placeholder="Job Description" class="w-full border rounded p-2"></textarea>

            <label class="block text-gray-700 font-medium">Posting Date</label>
            <input type="date" name="posting_date" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Deadline</label>
            <input type="date" name="deadline" class="w-full border rounded p-2">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Job Modal -->
<div id="updateJobModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-lg p-6 relative shadow-lg max-h-[90vh] overflow-y-auto hide-scrollbar">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeUpdateModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Update Job</h3>
        <form id="updateJobForm" class="space-y-4">
            <input type="hidden" name="id" id="updateId">

            <label class="block text-gray-700 font-medium">Job Title</label>
            <input type="text" name="title" id="updateTitle" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Department</label>
            <input type="text" name="department" id="updateDepartment" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Openings</label>
            <input type="number" name="openings" id="updateOpenings" class="w-full border rounded p-2" required>

            <label class="block text-gray-700 font-medium">Status</label>
            <select name="status" id="updateStatus" class="w-full border rounded p-2">
                <option value="Open">Open</option>
                <option value="Pending">Pending</option>
                <option value="Closed">Closed</option>
            </select>

            <label class="block text-gray-700 font-medium">Salary</label>
            <input type="text" name="salary" id="updateSalary" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Location</label>
            <input type="text" name="location" id="updateLocation" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Job Type</label>
            <select name="job_type" id="updateJobType" class="w-full border rounded p-2">
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Contract">Contract</option>
            </select>

            <label class="block text-gray-700 font-medium">Job Description</label>
            <textarea name="description" id="updateDescription" class="w-full border rounded p-2"></textarea>

            <label class="block text-gray-700 font-medium">Posting Date</label>
            <input type="date" name="posting_date" id="updatePostingDate" class="w-full border rounded p-2">

            <label class="block text-gray-700 font-medium">Deadline</label>
            <input type="date" name="deadline" id="updateDeadline" class="w-full border rounded p-2">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeUpdateModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Custom CSS -->
<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
const API_URL = "/hr1-ecommerce/api/jobs.php";

// Load all jobs
async function loadJobs() {
    const container = document.getElementById("jobsContainer");
    container.innerHTML = "<p>Loading jobs...</p>";

    try {
        const res = await fetch(API_URL);
        const jobs = await res.json();

        if (!jobs.length) {
            container.innerHTML = "<p class=\'text-gray-500\'>No jobs found.</p>";
            return;
        }

        container.innerHTML = jobs.map(job => `
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">${job.title}</h3>
                        <p class="text-gray-500 text-sm mt-1">${job.department}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full 
                        ${job.status === "Open" ? "bg-green-100 text-green-700" : job.status === "Pending" ? "bg-yellow-100 text-yellow-700" : "bg-red-100 text-red-700"} 
                        text-xs font-semibold">
                        ${job.status}
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Openings: <span class="font-medium text-gray-800">${job.openings}</span></p>
                <p class="text-gray-500 text-sm mb-6">${job.description.substring(0, 80)}...</p>
                <div class="flex items-center justify-between">
                    <button 
                        class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition" 
                        onclick="viewJob(\'${job.title}\', \'${job.department}\', ${job.openings}, \'${job.status}\', \'${job.description}\', \'${job.salary}\', \'${job.location}\', \'${job.job_type}\', \'${job.posting_date}\', \'${job.deadline}\')">
                        View Details
                    </button>
                    <div class="flex gap-2">
                        <button onclick=\'openUpdateModal(${JSON.stringify(job)})\' class="p-2 bg-yellow-500 text-white text-xs rounded-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteJob(${job.id})" class="p-2 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600 transition">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join("");
    } catch (err) {
        container.innerHTML = "<p class=\'text-red-500\'>Failed to load jobs.</p>";
        console.error(err);
    }
}

// View modal
function viewJob(title, dept, openings, status, desc, salary, location, type, posted, deadline) {
    document.getElementById("jobModal").classList.remove("hidden");
    document.getElementById("jobTitle").textContent = "Title: " + title;
    document.getElementById("jobDept").textContent = "Department: " + dept;
    document.getElementById("jobOpenings").textContent = "Openings: " + openings;
    document.getElementById("jobStatus").textContent = "Status: " + status;
    document.getElementById("jobDesc").textContent = "Description: " + desc;
    document.getElementById("jobSalary").textContent = "Salary: " + salary;
    document.getElementById("jobLocation").textContent = "Location: " + location;
    document.getElementById("jobType").textContent = "Type: " + type;
    document.getElementById("jobPosted").textContent = "Posted On: " + posted;
    document.getElementById("jobDeadline").textContent = "Deadline: " + deadline;
}
function closeModal() { document.getElementById("jobModal").classList.add("hidden"); }

// Create Job Modal
function openCreateModal() { document.getElementById("createJobModal").classList.remove("hidden"); }
function closeCreateModal() { document.getElementById("createJobModal").classList.add("hidden"); }

// Update Job Modal
function openUpdateModal(job) {
    document.getElementById("updateJobModal").classList.remove("hidden");
    document.getElementById("updateId").value = job.id;
    document.getElementById("updateTitle").value = job.title;
    document.getElementById("updateDepartment").value = job.department;
    document.getElementById("updateOpenings").value = job.openings;
    document.getElementById("updateStatus").value = job.status;
    document.getElementById("updateSalary").value = job.salary;
    document.getElementById("updateLocation").value = job.location;
    document.getElementById("updateJobType").value = job.job_type;
    document.getElementById("updateDescription").value = job.description;
    document.getElementById("updatePostingDate").value = job.posting_date;
    document.getElementById("updateDeadline").value = job.deadline;
}
function closeUpdateModal() { document.getElementById("updateJobModal").classList.add("hidden"); }

// Handle job create
document.getElementById("createJobForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const formData = Object.fromEntries(new FormData(this).entries());

    try {
        const res = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData)
        });
        const data = await res.json();
        alert(data.message);
        closeCreateModal();
        loadJobs();
    } catch (err) {
        console.error(err);
        alert("Failed to create job");
    }
});

// Handle job update
document.getElementById("updateJobForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const formData = Object.fromEntries(new FormData(this).entries());
    const id = formData.id;

    try {
        const res = await fetch(API_URL + "?id=" + id, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData)
        });
        const data = await res.json();
        alert(data.message);
        closeUpdateModal();
        loadJobs();
    } catch (err) {
        console.error(err);
        alert("Failed to update job");
    }
});

// Delete job
async function deleteJob(id) {
    if (!confirm("Are you sure you want to delete this job?")) return;
    try {
        const res = await fetch(API_URL + "?id=" + id, { method: "DELETE" });
        const data = await res.json();
        alert(data.message);
        loadJobs();
    } catch (err) {
        console.error(err);
        alert("Failed to delete job");
    }
}

// Load jobs on page load
window.onload = loadJobs;
</script>
';

adminLayout($children);
?>
