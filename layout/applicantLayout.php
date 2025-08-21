<?php
function applicantLayout($children) {
    $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


    <style>
        /* Scrollbar hidden for sidebar */
        .sidebar::-webkit-scrollbar { display: none; }

        /* Dropdown hidden by default */
        .has-dropdown > .dropdown { display: none; }
        .has-dropdown.active > .dropdown { display: flex; flex-direction: column; }

        /* Smooth transitions */
        .sidebar, .main-content { transition: all 0.3s ease; }

        /* Hide scrollbar for all browsers */
        .nav-list::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        .nav-list {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;     /* Firefox */
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">

    <div id="sidebar" class="sidebar fixed top-0 left-0 h-full bg-[#1b7c84] w-64 md:w-72 transform -translate-x-full md:translate-x-0 transition-transform border-r border-gray-200 flex flex-col z-50">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <div class="flex items-center gap-2">
                <img src="../../images/logo.jpg" class="h-10 w-10" alt="Logo">
                <span class="font-bold text-xl hidden md:inline text-white">IMARKET</span>
            </div>
            <button id="sidebarClose" class="md:hidden text-gray-200"><i class='bx bx-x text-3xl'></i></button>
        </div>

        <ul class="nav-list flex-1 mt-4 px-2 overflow-y-auto" style="max-height: 80vh;">
            <?php 
            $modules = [
                 ['title' => 'Dashboard', 'icon' => 'bx-grid-alt', 'link' => 'dashboard.php', 'subs' => []],
                ['title' => 'Job Listings', 'icon' => 'bx-search', 'link' => 'jobListings.php', 'subs' => []],
                ['title' => 'My Applications', 'icon' => 'bx-briefcase-alt-2', 'subs' => [
                    ['title' => 'All Applications', 'link' => 'myApplications.php'],
                    ['title' => 'Pending Review', 'link' => 'pendingReview.php'],
                    ['title' => 'Under Interview', 'link' => 'underInterview.php'],
                    ['title' => 'Offers', 'link' => 'offers.php'],
                ]],
                ['title' => 'Profile & Resume', 'icon' => 'bx-user', 'link' => 'profile.php', 'subs' => []],
                ['title' => 'Interview Schedule', 'icon' => 'bx-calendar', 'link' => 'interviewSchedule.php', 'subs' => []],
                ['title' => 'Saved Jobs', 'icon' => 'bx-bookmark', 'link' => 'savedJobs.php', 'subs' => []],
                ['title' => 'Account Settings', 'icon' => 'bx-cog', 'link' => 'accountSettings.php', 'subs' => []],
            ];

            foreach ($modules as $mod):
                if (empty($mod['subs'])): ?>
                    <li>
                        <a href="<?= $mod['link'] ?>" class="flex items-center gap-6 p-3 rounded-lg text-lg font-medium text-white hover:bg-[#2c9c9c] <?php if ($currentPage == $mod['link']) echo 'bg-[#3eb6b6] mb-2'; ?>">
                            <i class='bx <?= $mod['icon'] ?> text-2xl text-white'></i>
                            <span class="links_name md:inline text-[16px]"><?= $mod['title'] ?></span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="has-dropdown">
                        <button class="flex items-center gap-4 w-full p-3 rounded-lg text-lg font-medium text-white hover:bg-[#2c9c9c] <?php 
                        foreach ($mod['subs'] as $sub) { if ($currentPage == $sub['link']) echo 'bg-[#3eb6b6] mb-2'; } ?>">
                            <i class='bx <?= $mod['icon'] ?> text-2xl text-white'></i>
                            <span class="links_name md:inline text-[16px]"><?= $mod['title'] ?></span>
                            <i class='bx bx-chevron-down ml-auto text-xl'></i>
                        </button>
                        <div class="dropdown flex-col pl-12 space-y-2 mt-2">
                            <?php foreach ($mod['subs'] as $sub): ?>
                                <a href="<?= $sub['link'] ?>" class="flex items-center gap-3 p-2 rounded-lg text-gray-200 hover:bg-[#2c9c9c] <?php if ($currentPage == $sub['link']) echo 'bg-[#3eb6b6]'; ?>">
                                    <i class='bx bx-right-arrow-alt text-[12px]'></i><?= $sub['title'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                <?php endif;
            endforeach;
            ?>
        </ul>

<div class="p-4 border-t border-gray-200 flex items-center gap-2">
    <!-- Initials Circle -->
    <div class="h-12 w-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">
        <?php echo strtoupper(substr(preg_replace('/\s+/', '', htmlspecialchars($_SESSION['name'] ?? '')), 0, 2)); ?>
    </div>

    <div class="hidden md:flex flex-col">
        <span class="font-semibold text-lg text-white">
            <?php echo htmlspecialchars($_SESSION['name'] ?? 'Unknown'); ?>
        </span>
        <span class="text-sm text-gray-300">
            <?php echo htmlspecialchars(ucfirst($_SESSION['role'] ?? 'User')); ?>
        </span>
    </div>

    <button id="log_out" class="ml-auto text-gray-200 hover:text-red-300">
        <i class='bx bx-log-out text-3xl'></i>
    </button>
</div>


    </div>

    <div id="mainContent" class="main-content flex-1 ml-0 md:ml-72 p-4 transition-all">

        <header class="flex justify-between items-center p-4 mb-4 bg-white shadow rounded sticky top-0 -z-10">
            <button id="sidebarOpen" class="md:hidden text-gray-600"><i class='bx bx-menu text-3xl'></i></button>

            <div class="flex-1 flex justify-center">
                <div class="relative w-full max-w-md">
                    <input type="text" placeholder="Search jobs..." class="w-full pl-3 pr-10 py-2 border rounded focus:ring-2 focus:ring-indigo-500">
                    <i class='bx bx-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
                </div>
            </div>

            <div class="flex-1 flex justify-end gap-4 relative">
                <button id="notifBtn" class="relative text-gray-600 text-2xl">
                    <i class='bx bx-bell'></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">3</span>
                </button>
                <div id="notifModal" class="hidden absolute right-0 mt-2 w-64 bg-white shadow rounded border border-gray-200 z-50">
                    <div class="p-3 border-b font-semibold">Notifications</div>
                    <ul>
                        <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">You have an interview scheduled for tomorrow.</li>
                        <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">Your application for "UX Designer" has been updated.</li>
                        <li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">New jobs matching your skills are available.</li>
                    </ul>
                    <div class="text-center p-2 border-t text-sm text-gray-500 cursor-pointer hover:bg-gray-100">View All</div>
                </div>
            </div>
        </header>

        <div>
            <?php echo $children; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
    <script>
        // Sidebar open/close
        const sidebar = document.getElementById('sidebar');
        document.getElementById('sidebarOpen')?.addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
        document.getElementById('sidebarClose')?.addEventListener('click', () => sidebar.classList.add('-translate-x-full'));

        // Dropdowns
        document.querySelectorAll('.has-dropdown > button').forEach(btn => {
            btn.addEventListener('click', () => btn.parentElement.classList.toggle('active'));
        });

        // Notifications
        const notifBtn = document.getElementById('notifBtn');
        const notifModal = document.getElementById('notifModal');
        notifBtn?.addEventListener('click', () => notifModal.classList.toggle('hidden'));
        window.addEventListener('click', e => {
            if (!notifBtn.contains(e.target) && !notifModal.contains(e.target)) {
                notifModal.classList.add('hidden');
            }
        });

        async function logoutUser() {
    try {
        const res = await fetch('http://localhost/hr1-ecommerce/api/logout.php', { method: 'POST' });
        const data = await res.json();
        Toastify({ text: data.message || 'Logged out', duration: 3000 }).showToast();
        if (data.status === 'success') {
            setTimeout(() => {
                // Correctly navigate to the specified URL
                window.location.href = 'http://localhost/hr1-ecommerce/login.php';
            }, 1000);
        }
    } catch (e) {
        console.error(e);
    }
}
        document.getElementById('log_out')?.addEventListener('click', logoutUser);
    </script>
</body>
</html>
<?php
}
?>