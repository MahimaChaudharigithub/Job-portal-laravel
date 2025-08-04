
@extends('layout.header')

@section('content')


<!-- Hero Section -->
<div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Find Your Dream Job</h1>
    <p class="text-gray-600 max-w-xl mx-auto">Search through thousands of listings from top companies and startups. Your future begins here.</p>
</div>

<!-- Search Section -->
<!-- Search Section -->
<form id="jobSearchForm">
    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row items-center gap-4 mb-10">
        <input type="text" name="keyword" placeholder="Job title, keywords..." class="w-full md:w-1/3 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
        <input type="text" name="location" placeholder="Location" class="w-full md:w-1/3 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
        <select name="type" class="w-full md:w-1/4 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            <option value="">Job Type</option>
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
            <option value="remote">Remote</option>
        </select>
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Search</button>
    </div>
</form>


<!-- Job Listings -->

<div id="jobResults">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @foreach($jobs as $job)

    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
        <!-- Delete Button with confirmation -->
        {{-- <div class="col-md-12">
             <a href="{{ route('deletejob', ['id' => $job->id]) }}"class="text-danger"style="float:right"title="Delete this job"onclick="return confirm('Are you sure you want to delete this job?');"> <i class="fa fa-trash"></i> </a> 
         </div> --}}
       
        <div class="flex justify-between items-start ">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-1">{{$job->title}}</h3>

                <p class="text-gray-500 text-sm mb-2">{{$job->company_name}} • {{$job->location}}</p>
                <p class="text-sm text-gray-600">{{$job->description}}</p>
            </div>
            <div class="text-right py-3" >
                <span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full mb-2">{{$job->type}}</span>
                <p class="text-green-600 font-semibold">{{$job->salary}}/month</p>
               <a href="javascript:void(0);" onclick="openModal('{{ $job->id }}')" class="text-sm text-blue-600 hover:underline block mt-2">
                    View Details →
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<div class="mt-4">
    {{ $jobs->links() }}
</div>
<!-- Call to Action -->

<div class="mt-12 bg-blue-100 text-center p-10 rounded-lg @if(session('user_role') != 'EMPLOYEE') hidden @endif">
    <h2 class="text-2xl font-semibold text-blue-800 mb-2">Looking to hire?</h2>
    <p class="text-blue-700 mb-4">Post your job and reach thousands of candidates in seconds.</p>
    <a href="{{route('job_post')}}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Post a Job</a>
</div>


  <script>
       
        function openModal(jobId) {
       
            $.ajax({
                url: "{{ url('showdetails') }}/"+ jobId , 
                method: 'GET',
                success: function (data) {
                    document.getElementById('modalJobId').value=jobId;
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

 $(document).ready(function () {
    //console.log("work");
    $('#jobSearchForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('filter.jobs') }}",
            method: 'GET',
            dataType:'json',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                $('#jobResults').html(response.html); // Replace only the listings section
            },
            error: function (xhr) {
                alert('Something went wrong.');
                console.log(xhr.responseText);
            }
        });
    });
});

    </script>
@endsection



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
                <div class="flex justify-center mt-6 @if(session('user_role') != 'SEEKER') hidden @endif">
                    <form method="POST" action="{{ route('applyjob') }}">
                        @csrf
                        
                        <input type="hidden" name="job_id" id="modalJobId">
                        <button type="submit"
                            class="bg-green-500 text-white px-8 py-3 rounded-md hover:bg-green-600 transition duration-300 text-sm font-medium">
                            <i class="fas fa-paper-plane mr-2"></i> Apply Now
                        </button>
                    </form>
                </div>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-600 text-sm font-medium transition-all duration-200">
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

