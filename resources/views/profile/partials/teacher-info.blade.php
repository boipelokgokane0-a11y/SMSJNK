<section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
    <h2 class="text-lg font-medium text-gray-900 mb-4">Teacher Information</h2>
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
            <span class="text-xs font-semibold text-gray-600">Home Address</span>
            <span class="text-sm text-gray-800">{{ $user->address ?? 'Garankuwa' }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Age</span>
            <span class="text-sm text-gray-800">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->age : 'N/A' }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs font-semibold text-gray-600">Majoring Subject</span>
            <span class="text-sm text-gray-800">Tshwane University of Technology – {{ $user->subject_to_be_taught ?? 'N/A' }}</span>
        </div>
        <div class="flex flex-col sm:col-span-2">
            <span class="text-xs font-semibold text-gray-600">School</span>
            <span class="text-sm text-gray-800">{{ $user->school ?? 'N/A' }}</span>
        </div>
    </div>
</section>