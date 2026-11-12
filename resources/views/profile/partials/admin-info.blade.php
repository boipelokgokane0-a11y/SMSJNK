<?php
/**
 * Admin Information Partial
 * Displays basic administrator details on the profile page.
 */
?>
<section class="p-4 sm:p-8 bg-[#081538] text-white shadow sm:rounded-lg mb-6">
    <h2 class="text-lg font-medium text-gray-100 mb-4">Administrator Information</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-300">Name</span>
            <span class="text-sm font-bold text-gray-100">{{ $user->name }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-300">Email</span>
            <span class="text-sm text-gray-100">{{ $user->email }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-300">Role</span>
            <span class="text-sm text-gray-100">{{ $user->role }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-300">Contact Number</span>
            <span class="text-sm text-gray-100">{{ $user->contact_number ?? 'N/A' }}</span>
        </div>
    </div>
</section>