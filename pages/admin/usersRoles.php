<?php
include '../../layout/adminLayout.php';

// The HTML content
$children = '
<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">

        <div class="text-sm text-gray-500 mb-6">
            <a href="dashboard.php" class="text-indigo-600 hover:underline">Home</a> &gt;
            <span>Users & Roles</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h2 class="text-3xl font-bold text-gray-800">Users & Roles</h2>
                <p class="text-gray-600 mt-1">Manage all system users, including applicants and administrators.</p>
            </div>
            <button class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition" onclick="openModal()">
                <i class="bx bx-user-plus text-lg"></i>
                Add New User
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="userTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="userModal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-300">
    <div class="bg-white rounded-xl w-full max-w-md p-8 relative shadow-xl transform transition-transform duration-300 scale-95">
        <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl transition" onclick="closeModal()">
            <i class="bx bx-x"></i>
        </button>
        <h3 class="text-2xl font-bold mb-6 text-gray-800" id="modalTitle">Add User</h3>
        <div class="space-y-5">
            <input type="hidden" id="userId">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                <input type="text" id="userName" placeholder="Enter full name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="userEmail" placeholder="Enter email address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="userPassword" placeholder="Enter password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition pr-10">
                    <span id="togglePassword" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer">
                        <i class="bx bx-show"></i>
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2">Role</label>
                <select id="userRole" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    <option value="admin">Admin</option>
                    <option value="applicant">Applicant</option>
                </select>
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition" onclick="closeModal()">Cancel</button>
                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition" onclick="saveUser()">Save</button>
            </div>
        </div>
    </div>
</div>



';

adminLayout($children);
?>

<script>
const API_URL = "http://localhost/hr1-ecommerce/api/users.php";

// Toast helper (keep this as-is)
function showToast(message, type) {
  Toastify({
    text: message,
    style: {
      background: type === 'success' ?
        "linear-gradient(to right, #00b09b, #96c93d)" : "linear-gradient(to right, #ff5f6d, #ffc371)"
    },
    duration: 3000,
    close: true
  }).showToast();
}

// Fetch and display users
async function loadUsers() {
    const tbody = document.getElementById("userTableBody");
    tbody.innerHTML = "<tr><td colspan=4 class=text-center>Loading...</td></tr>";
    try {
        const res = await fetch(API_URL);
        const users = await res.json();
        tbody.innerHTML = users.length === 0 ? "<tr><td colspan=4 class=text-center>No users found</td></tr>" : "";
        users.forEach(user => {
            const tr = document.createElement("tr");
            tr.classList.add("hover:bg-gray-50", "transition");
            tr.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${user.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${user.email}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${user.role}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
                    <button class="text-indigo-600 hover:text-indigo-900" onclick="editUser('${user.id}', '${user.name}', '${user.email}', '${user.role}')">
                        <i class="bx bx-edit text-xl"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900" onclick="deleteUser('${user.id}')">
                        <i class="bx bx-trash text-xl"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    } catch(err) {
        tbody.innerHTML = "<tr><td colspan=4 class=text-center>Error loading users</td></tr>";
        showToast("Failed to load users", "error");
        console.error(err);
    }
}

function openModal() {
    document.getElementById("userModal").classList.remove("hidden");
    document.getElementById("modalTitle").textContent = "Add New User";
    document.getElementById("userId").value = "";
    document.getElementById("userName").value = "";
    document.getElementById("userEmail").value = "";
    document.getElementById("userRole").value = "applicant";
}

function editUser(id, name, email, role) {
    document.getElementById("userModal").classList.remove("hidden");
    document.getElementById("modalTitle").textContent = "Edit User";
    document.getElementById("userId").value = id;
    document.getElementById("userName").value = name;
    document.getElementById("userEmail").value = email;
    document.getElementById("userRole").value = role;
}

function closeModal() {
    document.getElementById("userModal").classList.add("hidden");
}

// Add or update user
async function saveUser() {
    const id = document.getElementById("userId").value;
    const name = document.getElementById("userName").value.trim();
    const email = document.getElementById("userEmail").value.trim();
    const role = document.getElementById("userRole").value;
    const password = document.getElementById("userPassword").value; // <- password

    if (!name || !email) {
        showToast("Name and Email are required", "error");
        return;
    }

    if (!id && !password) { // require password for new user
        showToast("Password is required for new user", "error");
        return;
    }

    try {
        const method = id ? "PUT" : "POST";
        const url = id ? `${API_URL}?id=${id}` : API_URL;
        const bodyData = { name, email, role };
        if(password) bodyData.password = password; // include password if provided

        const res = await fetch(url, {
            method,
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(bodyData)
        });

        const data = await res.json();
        showToast(data.message, data.status === 'success' ? 'success' : 'error');
        closeModal();
        loadUsers();
    } catch (err) {
        console.error(err);
        showToast("Failed to save user", "error");
    }
}

// Password eye toggle
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('userPassword');
    const icon = this.querySelector('i');
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    icon.classList.toggle('bx-show', !isPassword);
    icon.classList.toggle('bx-hide', isPassword);
});

// Delete user
async function deleteUser(id) {
    if(!confirm("Are you sure you want to delete this user?")) return;
    try {
        const res = await fetch(`${API_URL}?id=${id}`, { method: "DELETE" });
        const data = await res.json();
        showToast(data.message, data.status === 'success' ? 'success' : 'error');
        loadUsers();
    } catch(err) {
        console.error(err);
        showToast("Failed to delete user", "error");
    }
}

// Load users on page load
loadUsers();
</script>

