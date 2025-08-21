<?php
// job_view.php
include './api/db.php'; // adjust path if needed

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Details - <?php echo safeField($job, 'title'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="max-w-5xl mx-auto mt-10 p-8 bg-white shadow-2xl rounded-xl">
    <!-- Header -->
    <div class="border-b pb-6 mb-6">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-2">
        <?php echo safeField($job, 'title'); ?>
      </h1>
      <p class="text-gray-500">
        Posted on <?php echo safeField($job, 'date_posted', 'Unknown'); ?> | Deadline: 
        <span class="text-red-500"><?php echo safeField($job, 'deadline'); ?></span>
      </p>
    </div>

    <!-- Job Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div class="p-4 bg-gray-50 rounded-lg shadow">
        <p class="text-gray-700"><strong>📂 Department:</strong> <?php echo safeField($job, 'department'); ?></p>
        <p class="text-gray-700"><strong>📍 Location:</strong> <?php echo safeField($job, 'location'); ?></p>
      </div>
      <div class="p-4 bg-gray-50 rounded-lg shadow">
        <p class="text-gray-700"><strong>💼 Type:</strong> <?php echo safeField($job, 'job_type'); ?></p>
        <p class="text-gray-700"><strong>⚡ Status:</strong> 
          <span class="<?php echo (safeField($job, 'status') === 'Open') ? 'text-green-600 font-bold' : 'text-red-600 font-bold'; ?>">
            <?php echo safeField($job, 'status'); ?>
          </span>
        </p>
        <p class="text-gray-700"><strong>💰 Salary Range:</strong> ₱<?php echo safeField($job, 'salary', 'N/A'); ?> </p>
      </div>
    </div>

    <!-- Description -->
    <div class="mb-8">
      <h2 class="text-2xl font-semibold mb-3">📝 Job Description</h2>
      <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg shadow">
        <?php echo nl2br(safeField($job, 'description', 'No description available.')); ?>
      </p>
    </div>

   <!-- Buttons -->
<div class="flex gap-4">
  <button 
    onclick="window.location.href='http://localhost/hr1-ecommerce/jobs.php'" 
    class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition">
    ⬅ Back to Jobs
  </button>

  <button 
    onclick="window.location.href='http://localhost/hr1-ecommerce/login.php'" 
    class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
    🚀 Apply Now
  </button>
</div>

  </div>

</body>
</html>
