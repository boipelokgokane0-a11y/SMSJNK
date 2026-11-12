<section class=\"p-4 sm:p-8 bg-[#081538] text-white shadow sm:rounded-lg mb-6\">
    <h2 class=\"text-lg font-medium text-gray-100 mb-4\">Student Information</h2>
    <div class=\"grid grid-cols-1 sm:grid-cols-2 gap-4\">
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Name</span>
            <span class=\"text-sm font-bold text-gray-100\">{{ $user->name }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Student Number</span>
            <span class=\"text-sm font-mono text-gray-100\">{{ $user->student_number }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Identity Number</span>
            <span class=\"text-sm font-bold text-gray-100\">{{ $user->id_number }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Class Allocation</span>
            <span class=\"text-sm text-gray-100\">{{ $user->class_allocation ?? 'N/A' }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Grade</span>
            <span class=\"text-sm text-gray-100\">{{ $user->grade ?? 'N/A' }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Email</span>
            <span class=\"text-sm text-gray-100\">{{ $user->email }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Address (Residence)</span>
            <span class=\"text-sm text-gray-100\">{{ $user->address }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Contact Number</span>
            <span class=\"text-sm text-gray-100\">{{ $user->contact_number }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Parent Name</span>
            <span class=\"text-sm text-gray-100\">{{ $user->parent_name }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Parent Contact</span>
            <span class=\"text-sm text-gray-100\">{{ $user->parent_contact }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-300\">Parent Email</span>
            <span class=\"text-sm text-gray-100\">{{ $user->parent_email }}</span>
        </div>
    </div>
</section>
    <h2 class=\"text-lg font-medium text-gray-900 mb-4\">Student Information</h2>
    <div class=\"grid grid-cols-1 sm:grid-cols-2 gap-4\">
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-600\">Name</span>
            <span class=\"text-sm font-bold text-gray-800\">{{ $user->name }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-600\">Student Number</span>
            <span class=\"text-sm font-mono text-gray-800\">{{ $user->student_number }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-600\">Class Allocation</span>
            <span class=\"text-sm text-gray-800\">{{ $user->class_allocation ?? 'N/A' }}</span>
        </div>
        <div class=\"flex flex-col\">
            <span class=\"text-xs font-semibold text-gray-600\">Grade</span>
            <span class=\"text-sm text-gray-800\">{{ $user->grade ?? 'N/A' }}</span>
        </div>
        <div class=\"flex flex-col sm:col-span-2\">
            <span class=\"text-xs font-semibold text-gray-600\">Email</span>
            <span class=\"text-sm text-gray-800\">{{ $user->email }}</span>
        </div>
    </div>
</section>