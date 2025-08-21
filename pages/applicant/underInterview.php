<?php
include '../../layout/applicantLayout.php';

$apiUrl = "http://localhost/hr1-ecommerce/api/jobs.php";
$response = file_get_contents($apiUrl);
$jobs = json_decode($response, true);

if (!$jobs) {
    $jobs = [];
}

$interviewJobs = array_filter($jobs, function($job) {
    return strtolower($job['status']) === 'under interview';
});

ob_start();
?>

<div class="max-w-6xl mx-auto mt-8 p-6 bg-white rounded-lg shadow">
    <h1 class="text-3xl font-bold text-center mb-6 text-green-600">Under Interview Jobs</h1>

    <?php if (count($interviewJobs) > 0): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
          <thead>
            <tr class="bg-green-200">
              <th class="border px-4 py-2 text-left">Title</th>
              <th class="border px-4 py-2 text-left">Company</th>
              <th class="border px-4 py-2 text-left">Department</th>
              <th class="border px-4 py-2 text-left">Location</th>
              <th class="border px-4 py-2 text-left">Job Type</th>
              <th class="border px-4 py-2 text-left">Interview Date</th>
              <th class="border px-4 py-2 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($interviewJobs as $job): ?>
              <tr class="hover:bg-gray-100 transition">
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['title']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['company'] ?? 'N/A'); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['department']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['location']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['job_type']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($job['interview_date'] ?? 'TBA'); ?></td>
                <td class="border px-4 py-2 text-center">
                  <a href="job_view.php?id=<?php echo $job['id']; ?>" 
                     class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    View
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-center text-gray-500">No jobs are currently under interview.</p>
    <?php endif; ?>
</div>

<?php
$children = ob_get_clean();
applicantLayout($children);
