@extends('layout.header') {{-- Use your layout --}}

@section('content')
<nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
    <ol class="list-reset flex items-center space-x-2">
        <li>
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline">Home</a>
        </li>
        <li>
            <svg class="w-3 h-3 fill-current text-gray-400 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M7.05 4.05a.5.5 0 0 1 .7 0L13 9.29a.5.5 0 0 1 0 .7l-5.24 5.24a.5.5 0 1 1-.7-.7L11.79 10 7.05 5.35a.5.5 0 0 1 0-.7z"/>
            </svg>
        </li>
        <li class="text-gray-500">Applied Jobs</li>
    </ol>
</nav>

<h2 class="text-2xl font-bold mb-6">Applied Jobs</h2>

@if($appliedJobs->isEmpty())
    <p class="text-gray-500">You haven't applied for any jobs yet.</p>
@else
   <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($appliedJobs as $job)
        <div class="bg-white p-6 shadow rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800">{{ $job->title }}</h3>
            <p class="text-gray-600">{{ $job->company_name }} • {{ $job->location }}</p>
            <p class="text-sm text-gray-500 mt-2">{{ $job->description }}</p>
            <div class="text-sm text-gray-400 mt-2">
                Applied on: {{ \Carbon\Carbon::parse($job->applied_date)->format('d M Y') }}
            </div>
            <p class="text-green-700 font-semibold mt-1">Salary: ₹{{ $job->salary }}/month</p>
            <a href="javascript:void(0);" onclick="openModal('{{ $job->id }}')" class="text-sm text-blue-600 hover:underline block mt-2">
                    View Details →
            </a>
        </div>
    @endforeach
</div>

@endif
<script>
       
        function openModal(jobId) {
       
            $.ajax({
                url: "{{ url('showdetails') }}/"+ jobId , 
                method: 'GET',
                success: function (data) {
                
                    // Populate modal with the returned job details
                    document.getElementById('modalTitle').innerText = data.title;
                    document.getElementById('modalCompanyLocation').innerText = data.company_name + " • " + data.location;
                    document.getElementById('modalType').innerText = data.type;
                    document.getElementById('modalSalary').innerText = data.salary + "/month";
                    document.getElementById('modalDescription').innerText = data.description;
                    // document.getElementById('modalRequirements').innerHTML = data.requirements.map(requirement => `<li>${requirement}</li>`).join('');

                    document.getElementById('modalAdditionalInfo').innerText = data.additional_info;

                    // Set Edit and Delete links dynamically (if needed)
                    document.getElementById('modalEditLink').setAttribute('href',"{{url('edit_details')}}/"+ data.id); 
                    document.getElementById('modalDeleteLink').setAttribute('href', "{{url('deleteJob')}}/" + data.id); // Update the delete link

                    // Show the modal
                    document.getElementById('jobDetailsModal').classList.remove('hidden');
                },
                error: function () {
                    alert('Error fetching job details'+error);
                }
            });
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('jobDetailsModal').classList.add('hidden');
        }
    </script>




<!------------modal------------->
<div id="jobDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-10 rounded-lg shadow-xl max-w-4xl w-full relative">
            <!-- Job Title and Company -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900 mb-2" id="modalTitle"></h1>
                    <p class="text-gray-500 text-sm">
                        <span class="font-medium" id="modalCompanyLocation"></span>
                    </p>
                </div>
                <div class="text-right py-1">
                    <span class="inline-block bg-blue-200 text-blue-700 text-xs font-medium px-3 py-1 rounded-full mb-1" id="modalType"></span>
                    <p class="text-green-600 font-semibold text-lg" id="modalSalary"></p>
                </div>
            </div>

            <!-- Job Description -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Job Description</h3>
                <p class="text-gray-600 text-sm mt-2" id="modalDescription"></p>
            </div>

            <!-- Job Requirements and Additional Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Job Requirements -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800">Job Requirements</h3>
                    <ul class="list-disc pl-5 mt-2 text-gray-600 text-sm space-y-2" id="modalRequirements">
                        <li>Minimum experience: 3 years</li>
                        <li>Strong communication skills</li>
                        <li>Proficient in required tools</li>
                    </ul>
                </div>

                <!-- Additional Information -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800">Additional Information</h3>
                    <p class="mt-2 text-gray-600 text-sm" id="modalAdditionalInfo">
                        This position offers a dynamic and collaborative environment. You'll work with a highly motivated team to deliver top-quality results.
                    </p>
                </div>
            </div>

            <!-- Edit and Delete Buttons -->

         
            <div class="flex justify-between items-center mt-6 @if(session('user_role')!='EMPLOYEE') hidden @endif"  >
                <a href="" id="modalEditLink" class="inline-flex items-center bg-blue-500 text-white px-8 py-3 rounded-md hover:bg-blue-600 transition duration-300 text-sm font-medium">
                    <i class="fas fa-edit mr-2"></i> Edit Job
                </a>
                <a href="" id="modalDeleteLink"
                   class="inline-flex items-center bg-red-500 text-white px-8 py-3 rounded-md hover:bg-red-600 transition duration-300 text-sm font-medium"
                   onclick="return confirm('Are you sure you want to delete this job?');">
                    <i class="fas fa-trash mr-2"></i> Delete Job
                </a>
            </div>
            
            
                            <!-- Apply Button (visible only for seekers) -->
          
            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('appliedjobs') }}" class="text-blue-500 hover:text-blue-600 text-sm font-medium transition-all duration-200">
                    ← Back to Job Listings
                </a>
            </div>

            <!-- Close Button (Top-right corner) -->
            <button onclick="closeModal()" class="absolute top-1 right-3 w-8 h-8 text-black rounded-full flex items-center justify-center text-xl  hover:bg-gray-800 hover:text-white focus:outline-none">
                &times;
            </button>
        </div>
    </div>
</div>

@endsection
