<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>JobPortal - Find Your Dream Job</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        <head>
    <!-- Include Font Awesome (if not already included) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



</head>

        <style>
        body {
        font-family: 'Inter', sans-serif;
        }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-800">
        <!-- Navbar -->
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-blue-600">JobPortal</a>
               
                <div class="space-x-4  flex items-center">
                    @if(session('user_name'))
                    <!-- User Logged In -->
                    @if(session('user_role')!='EMPLOYEE')
                       <a href="{{ route('appliedjobs') }}" class="text-gray-600 hover:text-blue-600">
                            <i class="fas fa-briefcase mr-1"></i> Applied Jobs
                        </a>
                    @endif
                    <div class="relative group">
                        <button class="text-gray-600 hover:text-blue-600 flex items-center">
                        {{ session('user_name') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        </button>
                        <!-- Dropdown Menu (Visible on hover) -->
                        <div class="absolute right-0 mt-1 bg-white shadow-lg rounded-md w-32 hidden group-hover:block">
                            <a href="{{route('logout')}}" class="block text-gray-600 px-4 py-2 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                    @else
                    <!-- User Not Logged In -->
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600">Register</a>
                    @endif
                </div>
            </div>
        </nav>
        <!-- Content -->
        <main class="max-w-7xl mx-auto px-4 py-10" >
            @if(session('success'))
            <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-md mb-4 shadow-lg opacity-0 transition-opacity duration-1000 ease-in-out show-message">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-error bg-red-100 text-red-800 p-4 rounded-md mb-4 shadow-lg opacity-0 transition-opacity duration-1000 ease-in-out show-message">
                {{ session('error') }}
            </div>
            @endif
            @yield('content')
        </main>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
        const messages = document.querySelectorAll('.show-message');
        messages.forEach(message => {
        // Fade in the message
        setTimeout(() => {
        message.classList.remove('opacity-0');
        message.classList.add('opacity-100');
        }, 100);
        // Fade out and remove the message after 5 seconds
        setTimeout(() => {
        message.classList.remove('opacity-100');
        message.classList.add('opacity-0');
        setTimeout(() => message.remove(), 500);  // Remove the element after fading out
        }, 5000); // 5000ms = 5 seconds
        });
        });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>