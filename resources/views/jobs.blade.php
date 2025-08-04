@extends('layout.header')

@section('content')

<!-- Hero Section -->
<div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Post a {{isset($old)?'Edit':'New'}}  Job</h1>
    <p class="text-gray-600 max-w-xl mx-auto">Let the world know about your exciting opportunity. Fill in the details below and post your job to reach thousands of candidates.</p>
</div>

<!-- Job Posting Form -->
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <!-- Job Title -->
        <input type="hidden" id="id" name="id" class="form-control" value="{{ isset($old) ? $old->id : '' }}">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Job Title</label>
            <input type="text" name="title" id="title" placeholder="Job Title" value="{{isset($old)? $old->title: '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Job Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Job Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Job Description" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" required>{{isset($old)? $old->description: '' }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label for="location" class="block text-gray-700 font-semibold mb-2">Location</label>
            <input type="text" name="location" id="location" placeholder="Location" value="{{isset($old)? $old->location: '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror" required>
            @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Job Type -->
        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold mb-2">Job Type</label>
            <select name="type" id="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('type') border-red-500 @enderror" required>
           <option value="full-time" {{ isset($old) && $old->type == 'full-time' ? 'selected' : '' }}>Full-Time</option>
            <option value="part-time" {{ isset($old) && $old->type == 'part-time' ? 'selected' : '' }}>Part-Time</option>
            <option value="remote" {{ isset($old) && $old->type == 'remote' ? 'selected' : '' }}>Remote</option>

            </select>
            @error('type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Salary -->
        <div class="mb-4">
            <label for="salary" class="block text-gray-700 font-semibold mb-2">Salary (Monthly)</label>
            <input type="text" name="salary" id="salary" placeholder="Salary" value="{{isset($old)? $old->salary: '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('salary') border-red-500 @enderror" required>
            @error('salary')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Company Name -->
        <div class="mb-4">
            <label for="company_name" class="block text-gray-700 font-semibold mb-2">Company Name</label>
            <input type="text" name="company_name" id="company_name" placeholder="Company Name" value="{{isset($old)? $old->company_name: '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('company_name') border-red-500 @enderror" required>
            @error('company_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Post Job</button>
        </div>
    </form>
</div>

@endsection
