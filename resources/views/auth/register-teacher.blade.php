<x-guest-layout maxWidth="sm:max-w-3xl">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Teacher Registration</h2>
        <p class="text-sm text-center text-gray-600 mt-1">Please fill in your educator credentials and details</p>

        <!-- Role Selector Tabs -->
        <div class="flex justify-center mt-4 gap-2 border-b pb-3 flex-wrap">
            <a href="{{ route('register.student') }}"
               class="inline-block px-5 py-1.5 border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] text-sm font-semibold rounded-sm leading-normal transition">
                Student Registration
            </a>
            <a href="{{ route('register.teacher') }}"
               class="inline-block px-5 py-1.5 border border-[#1b1b18] text-sm font-semibold rounded-sm leading-normal transition bg-[#1b1b18] text-white">
                Teacher Registration
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('register.teacher.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="role" value="teacher">

        <!-- 1. Personal Information -->
        <div class="mb-6">
            <h3 class="text-md font-semibold text-gray-700 border-b pb-1 mb-3">1. Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Names -->
                <div>
                    <x-input-label for="first_name" :value="__('Names / First Names')" />
                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- Surname -->
                <div>
                    <x-input-label for="surname" :value="__('Surname')" />
                    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                </div>

                <!-- Date of Birth -->
                <div>
                    <x-input-label for="dob" :value="__('Date of Birth (DOB)')" />
                    <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                </div>

                <!-- Gender -->
                <div>
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                        <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

                <!-- Ethnicity -->
                <div>
                    <x-input-label for="ethnicity" :value="__('Ethnicity')" />
                    <select id="ethnicity" name="ethnicity" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="" disabled {{ old('ethnicity') ? '' : 'selected' }}>Select Ethnicity</option>
                        <option value="African / Black" {{ old('ethnicity') === 'African / Black' ? 'selected' : '' }}>African / Black</option>
                        <option value="Coloured" {{ old('ethnicity') === 'Coloured' ? 'selected' : '' }}>Coloured</option>
                        <option value="Indian / Asian" {{ old('ethnicity') === 'Indian / Asian' ? 'selected' : '' }}>Indian / Asian</option>
                        <option value="White" {{ old('ethnicity') === 'White' ? 'selected' : '' }}>White</option>
                        <option value="Other" {{ old('ethnicity') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <x-input-error :messages="$errors->get('ethnicity')" class="mt-2" />
                </div>

                <!-- Marital Status -->
                <div>
                    <x-input-label for="marital_status" :value="__('Marital Status')" />
                    <select id="marital_status" name="marital_status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="" disabled {{ old('marital_status') ? '' : 'selected' }}>Select Marital Status</option>
                        <option value="Single" {{ old('marital_status') === 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status') === 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Divorced" {{ old('marital_status') === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="Widowed" {{ old('marital_status') === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                    <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                </div>

                <!-- ID Number -->
                <div>
                    <x-input-label for="id_number" :value="__('ID Number')" />
                    <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" :value="old('id_number')" placeholder="National ID (if applicable)" />
                    <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                </div>

                <!-- Passport -->
                <div>
                    <x-input-label for="passport" :value="__('Passport Number')" />
                    <x-text-input id="passport" class="block mt-1 w-full" type="text" name="passport" :value="old('passport')" placeholder="Passport # (if applicable)" />
                    <x-input-error :messages="$errors->get('passport')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- 2. Professional & School Details -->
        <div class="mb-6">
            <h3 class="text-md font-semibold text-gray-700 border-b pb-1 mb-3">2. Teaching & Professional Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Percel Number -->
                <div>
                    <x-input-label for="percel_number" :value="__('Percel Number')" />
                    <x-text-input id="percel_number" class="block mt-1 w-full" type="text" name="percel_number" :value="old('percel_number')" placeholder="e.g. PRCL-12345" required />
                    <x-input-error :messages="$errors->get('percel_number')" class="mt-2" />
                </div>

                <!-- Subject to be Taught -->
                <div>
                    <x-input-label for="subject_to_be_taught" :value="__('Subject to be Taught')" />
                    <x-text-input id="subject_to_be_taught" class="block mt-1 w-full" type="text" name="subject_to_be_taught" :value="old('subject_to_be_taught')" placeholder="e.g. Mathematics, Physical Sciences" required />
                    <x-input-error :messages="$errors->get('subject_to_be_taught')" class="mt-2" />
                </div>

                <!-- School You're Teaching At -->
                <div>
                    <x-input-label for="school" :value="__('School You\'re Teaching At')" />
                    <x-text-input id="school" class="block mt-1 w-full" type="text" name="school" :value="old('school')" placeholder="School Name" required />
                    <x-input-error :messages="$errors->get('school')" class="mt-2" />
                </div>

                <!-- Qualifications Document -->
                <div>
                    <x-input-label for="qualifications_document" :value="__('Qualifications Document [PDF CV, Matric, Diploma/Degree]')" />
                    <input id="qualifications_document" name="qualifications_document" type="file" accept=".pdf,.doc,.docx,.zip" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-md" />
                    <p class="text-xs text-gray-500 mt-1">Upload combined PDF, CV, Matric or Diploma/Degree certificate (max 10MB)</p>
                    <x-input-error :messages="$errors->get('qualifications_document')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- 3. Contact & Address Details -->
        <div class="mb-6">
            <h3 class="text-md font-semibold text-gray-700 border-b pb-1 mb-3">3. Contact & Address Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Contact Number -->
                <div>
                    <x-input-label for="contact_number" :value="__('Contact #')" />
                    <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" placeholder="e.g. 0812345678" required />
                    <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                </div>

                <!-- Physical Address -->
                <div class="md:col-span-2">
                    <x-input-label for="address" :value="__('Physical Address')" />
                    <textarea id="address" name="address" rows="2" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required placeholder="Full physical/residential address">{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- 4. Next of Kin Information -->
        <div class="mb-6">
            <h3 class="text-md font-semibold text-gray-700 border-b pb-1 mb-3">4. Next of Kin Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Next of Kin Names -->
                <div>
                    <x-input-label for="next_of_kin_name" :value="__('Next of Kin Names')" />
                    <x-text-input id="next_of_kin_name" class="block mt-1 w-full" type="text" name="next_of_kin_name" :value="old('next_of_kin_name')" placeholder="Full name of next of kin" required />
                    <x-input-error :messages="$errors->get('next_of_kin_name')" class="mt-2" />
                </div>

                <!-- Relationship to Next of Kin -->
                <div>
                    <x-input-label for="next_of_kin_relationship" :value="__('Relationship to Next of Kin')" />
                    <select id="next_of_kin_relationship" name="next_of_kin_relationship" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="" disabled {{ old('next_of_kin_relationship') ? '' : 'selected' }}>Select Relationship</option>
                        <option value="Spouse" {{ old('next_of_kin_relationship') === 'Spouse' ? 'selected' : '' }}>Spouse</option>
                        <option value="Parent" {{ old('next_of_kin_relationship') === 'Parent' ? 'selected' : '' }}>Parent</option>
                        <option value="Sibling" {{ old('next_of_kin_relationship') === 'Sibling' ? 'selected' : '' }}>Sibling</option>
                        <option value="Child" {{ old('next_of_kin_relationship') === 'Child' ? 'selected' : '' }}>Child</option>
                        <option value="Relative" {{ old('next_of_kin_relationship') === 'Relative' ? 'selected' : '' }}>Relative</option>
                        <option value="Other" {{ old('next_of_kin_relationship') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <x-input-error :messages="$errors->get('next_of_kin_relationship')" class="mt-2" />
                </div>

                <!-- Contact of Next of Kin -->
                <div>
                    <x-input-label for="next_of_kin_contact" :value="__('Contact of Next of Kin')" />
                    <x-text-input id="next_of_kin_contact" class="block mt-1 w-full" type="text" name="next_of_kin_contact" :value="old('next_of_kin_contact')" placeholder="Phone number" required />
                    <x-input-error :messages="$errors->get('next_of_kin_contact')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- 5. Password -->
        <div class="mb-6">
            <h3 class="text-md font-semibold text-gray-700 border-b pb-1 mb-3">5. Account Password</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Submit and Login Link -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-3 pt-4 border-t">
            <a class="underline underline-offset-4 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center sm:text-left" href="{{ route('login') }}">
                {{ __('Already registered? Log in') }}
            </a>

            <x-primary-button class="w-full sm:w-auto justify-center px-6 py-2">
                {{ __('Register as Teacher') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
