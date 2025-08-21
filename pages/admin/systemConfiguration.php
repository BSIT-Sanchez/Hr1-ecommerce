<?php
include '../../layout/adminLayout.php';

$children = '
<div class="p-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt; 
        <span>System Configuration</span>
    </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">System Configuration</h2>
        <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="openModal()">Edit Configurations</button>
    </div>

    <!-- System Configuration Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Homepage Slider -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center gap-4 mb-3">
                <i class="bx bx-image text-3xl text-indigo-600"></i>
                <h3 class="text-lg font-semibold text-gray-800">Homepage Slider</h3>
            </div>
            <p class="text-gray-600">Manage images, titles, and links for your homepage slider.</p>
        </div>

        <!-- Contact Info -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center gap-4 mb-3">
                <i class="bx bx-phone text-3xl text-green-600"></i>
                <h3 class="text-lg font-semibold text-gray-800">Contact Info</h3>
            </div>
            <p class="text-gray-600">Update company phone, email, and address.</p>
        </div>

        <!-- Footer Settings -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center gap-4 mb-3">
                <i class="bx bx-football text-3xl text-yellow-600"></i>
                <h3 class="text-lg font-semibold text-gray-800">Footer Settings</h3>
            </div>
            <p class="text-gray-600">Edit footer text, links, and social media icons.</p>
        </div>

        <!-- Homepage Banner -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center gap-4 mb-3">
                <i class="bx bx-rocket text-3xl text-pink-600"></i>
                <h3 class="text-lg font-semibold text-gray-800">Homepage Banner</h3>
            </div>
            <p class="text-gray-600">Change homepage banner images and promotions.</p>
        </div>

        <!-- Other Configurations -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <div class="flex items-center gap-4 mb-3">
                <i class="bx bx-sliders text-3xl text-red-600"></i>
                <h3 class="text-lg font-semibold text-gray-800">Other Configurations</h3>
            </div>
            <p class="text-gray-600">Custom settings for HR system functionalities.</p>
        </div>

    </div>
</div>

<!-- Edit Configurations Modal -->
<div id="systemModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl w-96 p-6 shadow-2xl relative">
        <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl" onclick="closeModal()">✕</button>
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Edit Configurations</h3>
        <div class="space-y-4">

            <!-- Homepage Slider -->
            <div>
                <label class="block text-gray-700 text-sm mb-1">Homepage Slider Images</label>
                <input type="file" multiple class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Homepage Banner -->
            <div>
                <label class="block text-gray-700 text-sm mb-1">Homepage Banner Image</label>
                <input type="file" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Footer Text -->
            <div>
                <label class="block text-gray-700 text-sm mb-1">Footer Text</label>
                <input type="text" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" value="© 2025 BamboHr. All rights reserved.">
            </div>

            <!-- Other Configurations -->
            <div>
                <label class="block text-gray-700 text-sm mb-1">Custom Configuration</label>
                <textarea class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="3" placeholder="Enter custom settings..."></textarea>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700" onclick="saveSettings()">Save</button>
                <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById("systemModal").classList.remove("hidden");
}
function closeModal() {
    document.getElementById("systemModal").classList.add("hidden");
}
function saveSettings() {
    alert("Configurations saved! (Implement backend save)");
    closeModal();
}
</script>
';

adminLayout($children);
?>
