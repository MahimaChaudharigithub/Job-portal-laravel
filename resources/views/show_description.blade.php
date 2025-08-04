@extends('layout.header')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-900 mb-4">Job Details</h1>
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-4">
        <!-- Job Details Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-3xl w-full">
            <div class="bg-gray-100 px-4 py-6">
                <!-- Job Header with Profile Image -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('public/storage/image/job.jpg') }}" alt="Company Logo" class="w-16 h-16 rounded-full border border-gray-300">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $job->title }}</h1>
                        <p class="text-gray-600 text-sm mt-1"><span class="font-semibold">{{ $job->company_name }}</span> • {{ $job->location }}</p>
                    </div>
                </div>

                <!-- Job Info (Salary, Type, etc.) -->
                <div class="flex justify-between items-center mt-4">
                    <span class="text-xs text-gray-500">{{ $job->type }} - {{ number_format($job->salary, 2) }}/month</span>
                    <span class="inline-flex items-center bg-blue-100 text-blue-600 text-xs font-medium px-3 py-1 rounded-full">
                        <i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location }}
                    </span>
                </div>
            </div>

            <!-- Job Details Tabs -->
            <div class="px-4 py-3 border-t border-gray-200">
                <div class="tabs flex space-x-6">
                    <a href="#description" class="tab-button text-lg font-semibold text-blue-600 py-2 px-4 hover:bg-blue-50 rounded-md transition-all duration-200">Description</a>
                    <a href="#requirements" class="tab-button text-lg font-semibold text-gray-700 py-2 px-4 hover:bg-gray-50 rounded-md transition-all duration-200">Requirements</a>
                    <a href="#additional" class="tab-button text-lg font-semibold text-gray-700 py-2 px-4 hover:bg-gray-50 rounded-md transition-all duration-200">Additional Info</a>
                </div>


                <!-- Tab Content -->
                <div class="tab-content mt-6">
                    <!-- Description Tab -->
                    <div id="description" class="tab-pane">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Job Description</h3>
                        <p class="text-gray-600 text-sm">{{ $job->description }}</p>
                    </div>

                    <!-- Requirements Tab -->
                    <div id="requirements" class="tab-pane hidden">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Job Requirements</h3>
                        <ul class="list-disc pl-5 text-gray-600 text-sm space-y-2">
                            <li>Minimum experience: 3 years</li>
                            <li>Strong communication skills</li>
                            <li>Proficient in required tools</li>
                        </ul>
                    </div>

                    <!-- Additional Info Tab -->
                    <div id="additional" class="tab-pane hidden">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Additional Information</h3>
                        <p class="text-gray-600 text-sm">This position offers a dynamic and collaborative environment. You'll work with a highly motivated team to deliver top-quality results.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="px-4 py-3 border-t border-gray-200 flex justify-between items-center">
                <a href="{{ route('edit_job', ['id' => $job->id]) }}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition-all duration-200 text-sm font-medium inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i> Edit Job
                </a>

                <a href="{{ route('deletejob', ['id' => $job->id]) }}" class="bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition-all duration-200 text-sm font-medium inline-flex items-center" onclick="return confirm('Are you sure you want to delete this job?');">
                    <i class="fas fa-trash mr-2"></i> Delete Job
                </a>
            </div>

            <!-- Back Button -->
            <div class="px-4 py-3 text-center">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-600 text-sm font-medium transition-all duration-200">← Back to Job Listings</a>
            </div>
        </div>
    </div>

    
    <!-- Script for Tabs Switching -->
    <script>
        document.querySelectorAll('.tab-button').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();

                // Hide all tabs
                document.querySelectorAll('.tab-pane').forEach(tabContent => {
                    tabContent.classList.add('hidden');
                });

                // Show the selected tab
                const tabId = e.target.getAttribute('href').substring(1);
                document.getElementById(tabId).classList.remove('hidden');

                // Active state for tabs
                document.querySelectorAll('.tab-button').forEach(tabBtn => {
                    tabBtn.classList.add('text-gray-700');
                    tabBtn.classList.remove('text-blue-600');
                });
                e.target.classList.add('text-blue-600');
                e.target.classList.remove('text-gray-700');
            });
        });
    </script>
@endsection
