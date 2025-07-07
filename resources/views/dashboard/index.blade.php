<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            margin-left: -260px;
        }
        .main-content {
            transition: all 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-slate-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 bg-slate-800 text-white shadow-lg">
            <div class="flex items-center justify-between p-4 border-b border-slate-700">
                <h1 class="text-xl font-bold">GYM ADMIN</h1>
                <button id="sidebar-toggle" class="md:hidden text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav class="p-4">
                <div id="dashboard-menu" class="menu-section active">
                    <div class="menu-header flex items-center justify-between py-2 px-3 rounded-lg hover:bg-slate-700 cursor-pointer bg-blue-800">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>

                <div id="checkin-menu" class="menu-section mt-2">
                    <div class="menu-header flex items-center justify-between py-2 px-3 rounded-lg hover:bg-slate-700 cursor-pointer" onclick="toggleMenu('checkin')">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>Checkin</span>
                        </div>
                    </div>
                </div>

                <div id="member-menu" class="menu-section mt-2">
                    <div class="menu-header flex items-center justify-between py-2 px-3 rounded-lg hover:bg-slate-700 cursor-pointer" onclick="toggleMenu('member')">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Member</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform" id="member-arrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div id="member-submenu" class="submenu pl-8 hidden">
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">Customers</a>
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">Transactions</a>
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">Checkin History</a>
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">User Memberships</a>
                    </div>
                </div>

                <div id="admin-menu" class="menu-section mt-2">
                    <div class="menu-header flex items-center justify-between py-2 px-3 rounded-lg hover:bg-slate-700 cursor-pointer" onclick="toggleMenu('admin')">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Admin</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform" id="admin-arrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div id="admin-submenu" class="submenu pl-8 hidden">
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">Memberships</a>
                        <a href="#" class="block py-2 px-3 rounded-lg hover:bg-slate-700 mt-1">Personal Trainers</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
                        <header class="bg-white dark:bg-slate-800 shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <button id="mobile-sidebar-toggle" class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium">AD</div>
                                <span class="hidden md:inline-block font-medium dark:text-white">Admin</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-slate-700 rounded-md shadow-lg py-1 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-600">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-600">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-slate-600">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 dark:bg-slate-900 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Overview</h2>
                        <p class="text-gray-600 dark:text-gray-400">Welcome back, Admin</p>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Total Members</p>
                                    <p class="text-2xl font-bold dark:text-white">1,248</p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+12% from last month</span>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Today Checkins</p>
                                    <p class="text-2xl font-bold dark:text-white">84</p>
                                </div>
                                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+5% from yesterday</span>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Active Memberships</p>
                                    <p class="text-2xl font-bold dark:text-white">892</p>
                                </div>
                                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-red-500 text-sm font-medium">-3% from last month</span>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Revenue</p>
                                    <p class="text-2xl font-bold dark:text-white">$24,560</p>
                                </div>
                                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+8% from last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Checkins Section -->
                    <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6 mb-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">Recent Checkins</h3>
                            <button class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View All</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Member</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Checkin Time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300 overflow-hidden">
                                                    <img src="https://placehold.co/100" alt="Portrait of a young man with short brown hair wearing gym clothes" class="h-full w-full object-cover">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">John Doe</div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">Gold Member</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            08:42 AM, Today
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Details</a>
                                        </td>
                                    </tr>
                                    <!-- Additional rows would go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Member Activity Chart -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Daily Checkins</h3>
                            <div id="checkin-chart" class="h-64"></div>
                        </div>
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-6">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Membership Types</h3>
                            <div id="membership-chart" class="h-64"></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        const mobileSidebarToggle = document.getElementById('mobile-sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');

        mobileSidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // User dropdown menu
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        userMenuButton.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });

        // Toggle menu sections
        function toggleMenu(menuId) {
            // Hide all menu sections except dashboard
            document.querySelectorAll('.menu-section').forEach(section => {
                if (section.id !== 'dashboard-menu') {
                    section.querySelector('.menu-header').classList.remove('bg-blue-800');
                }
            });

            // Hide all submenus except the one being clicked
            document.querySelectorAll('.submenu').forEach(submenu => {
                submenu.classList.add('hidden');
            });

            // Reset all arrows
            document.querySelectorAll('.transform').forEach(arrow => {
                arrow.classList.remove('rotate-180');
            });

            if (menuId !== 'dashboard-menu') {
                const menuHeader = document.getElementById(`${menuId}-menu`).querySelector('.menu-header');
                const submenu = document.getElementById(`${menuId}-submenu`);
                const arrow = document.getElementById(`${menuId}-arrow`);

                menuHeader.classList.add('bg-blue-800');
                submenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            }
        }

        // Charts would be implemented here with a library like Chart.js
        // This is a placeholder for the actual chart implementation
        function initCharts() {
            console.log('Charts would be initialized here');
        }

        // Initialize on DOM load
        document.addEventListener('DOMContentLoaded', initCharts);
    </script>
</body>
</html>

