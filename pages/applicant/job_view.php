<?php
include '../../layout/applicantLayout.php';
include '../../api/db.php'; // connect to DB

// Get job ID from URL
if (!isset($_GET['id'])) {
    die("❌ Job ID not provided.");
}
$job_id = intval($_GET['id']);

// Fetch job details from API
$apiUrl = "http://localhost/hr1-ecommerce/api/jobs.php?id=" . $job_id;
$response = file_get_contents($apiUrl);
$job = json_decode($response, true);

// If API did not return valid data
if (!$job || !is_array($job)) {
    die("❌ Job not found.");
}

// Helper function to safely get fields
function safeField($arr, $key, $default = "Not specified") {
    return isset($arr[$key]) && $arr[$key] !== "" ? htmlspecialchars($arr[$key]) : $default;
}

$children = '
<div class="max-w-5xl mx-auto mt-10 p-8 bg-white shadow-2xl rounded-xl">
    <!-- Header -->
    <div class="border-b pb-6 mb-6">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-2">' . safeField($job, 'title') . '</h1>
      <p class="text-gray-500">
        Posted on ' . safeField($job, 'date_posted', 'Unknown') . ' | Deadline: 
        <span class="text-red-500">' . safeField($job, 'deadline') . '</span>
      </p>
    </div>

    <!-- Job Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div class="p-4 bg-gray-50 rounded-lg shadow">
        <p class="text-gray-700"><strong>📂 Department:</strong> ' . safeField($job, 'department') . '</p>
        <p class="text-gray-700"><strong>📍 Location:</strong> ' . safeField($job, 'location') . '</p>
      </div>
      <div class="p-4 bg-gray-50 rounded-lg shadow">
        <p class="text-gray-700"><strong>💼 Type:</strong> ' . safeField($job, 'job_type') . '</p>
        <p class="text-gray-700"><strong>⚡ Status:</strong> 
          <span class="' . ((safeField($job, 'status') === 'Open') ? 'text-green-600 font-bold' : 'text-red-600 font-bold') . '">
            ' . safeField($job, 'status') . '
          </span>
        </p>
        <p class="text-gray-700"><strong>💰 Salary Range:</strong> ₱' . safeField($job, 'salary', 'N/A') . '</p>
      </div>
    </div>

    <!-- Description -->
    <div class="mb-8">
      <h2 class="text-2xl font-semibold mb-3">📝 Job Description</h2>
      <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg shadow">
        ' . nl2br(safeField($job, 'description', 'No description available.')) . '
      </p>
    </div>

    <!-- Buttons -->
    <div class="flex gap-4">
        <button 
            onclick="openModal()" 
            class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
             Apply Now
        </button>
    </div>
</div>

<!-- Modal -->
<div id="applyModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-xl shadow-xl w-[30rem]">
        <h2 class="text-xl font-bold mb-4">Submit Requirements</h2>
        <form id="applyForm" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

            <!-- Full Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" required 
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email Address</label>
                <input type="email" name="email" required 
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Phone Number</label>
                <input type="text" name="phone" required 
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Upload Resume -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Upload Resume (PDF)</label>
                <input type="file" name="resume" accept="application/pdf" required
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Upload Cover Letter -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Cover Letter (PDF)</label>
                <input type="file" name="cover_letter" accept="application/pdf"
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Portfolio Link -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Portfolio Link (Optional)</label>
                <input type="url" name="portfolio" placeholder="https://example.com"
                       class="w-full border rounded px-2 py-1">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-400 rounded text-white">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded text-white">Submit</button>
            </div>
        </form>
    </div>
</div>


<script>
function openModal() {
    document.getElementById("applyModal").classList.remove("hidden");
}
function closeModal() {
    document.getElementById("applyModal").classList.add("hidden");
}

document.getElementById("applyForm").addEventListener("submit", async function(event){
    event.preventDefault();
    const formData = new FormData(this);
    const response = await fetch("../../api/submit_application.php", {
        method: "POST",
        body: formData
    });
    const result = await response.json();
    alert(result.message);
    if(result.status === "success") closeModal();
});
</script>
';

applicantLayout($children);
?>
