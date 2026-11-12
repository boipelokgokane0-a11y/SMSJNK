<section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
    <h2 class="text-lg font-medium text-gray-900 mb-4">Administrator Details</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Name</span>
            <span class="text-sm font-bold text-gray-800">{{ $user->name }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Email</span>
            <span class="text-sm text-gray-800">{{ $user->email }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Role</span>
            <span class="text-sm text-gray-800">{{ ucfirst($user->role) }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Joined</span>
            <span class="text-sm text-gray-800">{{ $user->created_at->format('M d, Y') }}</span>
        </div>
    </div>
</section>