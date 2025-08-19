@extends('layout.header')

@section('content')

<div class="container mt-4">
    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-2 py-2 rounded-md hover:bg-blue-600 transition duration-300 text-sm font-medium">Back</a>
    <h2 class="text-xl font-semibold text-gray-800 mb-4 mt-3">Applicants for the Job</h2>

    <!-- Single Card for All Applicants -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">List of Applicants</h3>
            
            <table class="w-full table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-left">Full Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Application Date</th>
                        <th class="px-4 py-2 text-left">Resume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewApplied as $applicant)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $applicant->name }}</td>
                            <td class="px-4 py-2">{{ $applicant->email }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($applicant->applied_date)->format('Y-m-d') }}</td>
                            <td class="px-4 py-2">
                                @if($applicant->resume)
                                    <a href="{{ asset('storage/app/public/' . $applicant->resume) }}" target="_blank" class="text-blue-600 hover:underline">
                                        View Resume
                                    </a>
                                @else
                                    <span class="text-gray-500">No Resume</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
