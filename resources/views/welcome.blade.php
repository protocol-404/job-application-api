<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application API - Documentation</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF2D20',
                        secondary: '#1a202c',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
</head>
<body class="antialiased font-sans bg-gray-50 text-gray-900">
    <div class="relative min-h-screen bg-dots-darker">
        <!-- Header -->
        <header class="sticky top-0 bg-white shadow-sm z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <svg class="h-8 w-auto text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200">
                                <circle cx="100" cy="100" r="96" fill="currentColor" opacity="0.1"/>
                                <circle cx="100" cy="100" r="84" fill="currentColor" opacity="0.2"/>
                                <rect x="50" y="40" width="100" height="130" rx="6" fill="white" stroke="currentColor" stroke-width="4"/>
                                <path d="M75 20 L125 20 L125 45 L75 45 Z" fill="currentColor"/>
                                <path d="M75 45 L125 45 L125 45 C125 55, 115 60, 100 60 C85 60, 75 55, 75 45 Z" fill="currentColor"/>
                                <line x1="65" y1="80" x2="135" y2="80" stroke="currentColor" stroke-width="3"/>
                                <line x1="65" y1="100" x2="135" y2="100" stroke="currentColor" stroke-width="3"/>
                                <line x1="65" y1="120" x2="110" y2="120" stroke="currentColor" stroke-width="3"/>
                                <circle cx="135" cy="145" r="25" fill="currentColor"/>
                                <path d="M120 145 L130 155 L150 135" fill="none" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="ml-2 text-xl font-semibold text-gray-900">Job Application API</span>
                        </div>
                        <nav class="hidden md:ml-6 md:flex md:space-x-8" aria-label="Global">
                            <a href="#overview" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Overview</a>
                            <a href="#authentication" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Authentication</a>
                            <a href="#endpoints" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Endpoints</a>
                            <a href="#examples" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Examples</a>
                        </nav>
                    </div>
                    <div class="flex items-center">
                        <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                            <a href="https://github.com/protocol-404/job-application-api" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <!-- Hero section -->
            <div class="relative py-12 sm:py-16 lg:py-20 overflow-hidden bg-white">
                <div class="absolute inset-0 z-0">
                    <div class="absolute inset-y-0 right-0 w-1/2 bg-primary opacity-10"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                            <h1>
                                <span class="block text-base font-semibold text-primary">API Documentation</span>
                                <span class="mt-1 block text-4xl tracking-tight font-extrabold sm:text-5xl xl:text-6xl">
                                    Job Application API
                                </span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                A modern, secure API for job applications platform with authentication, user roles, job listing management, and CV handling. Built on Laravel 11 with Sanctum authentication.
                            </p>
                            <div class="mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a href="#endpoints" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-red-700 md:py-4 md:text-lg md:px-10">
                                        API Endpoints
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="#examples" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-gray-100 hover:bg-gray-200 md:py-4 md:text-lg md:px-10">
                                        View Examples
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6">
                            <div class="relative">
                                <div class="absolute inset-0 flex flex-col">
                                    <div class="flex-1"></div>
                                    <div class="flex-1 w-full bg-gradient-to-r from-primary to-red-500 opacity-10"></div>
                                </div>
                                <div class="relative max-w-md mx-auto lg:max-w-none">
                                    <div class="overflow-hidden rounded-xl shadow-xl">
                                        <div class="bg-white p-2 sm:p-4 border border-gray-200 rounded-xl">
                                            <div class="flex items-center space-x-2 p-1">
                                                <div class="h-3 w-3 rounded-full bg-red-500"></div>
                                                <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                                                <div class="h-3 w-3 rounded-full bg-green-500"></div>
                                                <div class="ml-2 text-sm font-mono text-gray-500">POST /api/login</div>
                                            </div>
                                            <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                                <pre class="language-json">{
  "email": "recruiter@example.com",
  "password": "password123"
}</pre>
                                            </div>
                                            <div class="mt-3 bg-gray-50 rounded-lg p-4 text-sm font-mono text-gray-800 overflow-x-auto">
                                                <pre class="language-json">{
  "message": "Login successful",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "recruiter@example.com",
    "role": "recruiter"
  },
  "token": "1|laravel_sanctum_token..."
}</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature section -->
            <div class="py-12 bg-white" id="overview">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Overview</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            A complete job application platform
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Our API provides everything you need to build a modern job application platform.
                        </p>
                    </div>

                    <div class="mt-10">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Authentication & Authorization</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Secure authentication with Laravel Sanctum. Role-based access control for candidates and recruiters.
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Job Management</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Full CRUD operations for job listings. Recruiters can create, update, and manage job offers.
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">CV Management</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Upload and manage CVs. Support for PDF and DOCX formats with size validation (max 5MB).
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Application Tracking</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Apply for jobs using existing CVs. Track application status and history.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Authentication section -->
            <div class="py-12 bg-gray-50" id="authentication">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Authentication</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Secure authentication with Sanctum
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            The API uses Laravel Sanctum for token-based authentication.
                        </p>
                    </div>

                    <div class="mt-10">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Authentication Flow</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">How to authenticate with the API.</p>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">1. Registration</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <code class="px-2 py-1 bg-gray-100 rounded">POST /api/register</code> with name, email, password, and role.
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">2. Login</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <code class="px-2 py-1 bg-gray-100 rounded">POST /api/login</code> with email and password to receive a token.
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">3. Using the token</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            Include the token in all authenticated requests in the Authorization header:
                                            <pre class="mt-2 px-2 py-1 bg-gray-100 rounded">Authorization: Bearer YOUR_TOKEN</pre>
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">4. Logout</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <code class="px-2 py-1 bg-gray-100 rounded">POST /api/logout</code> to invalidate the current token.
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- API Endpoints Section -->
            <div class="py-12 bg-white" id="endpoints">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-primary font-semibold tracking-wide uppercase">API Reference</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Available Endpoints
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Complete reference of all available API endpoints.
                        </p>
                    </div>

                    <div class="mt-10" x-data="{ activeTab: 'auth' }">
                        <div class="sm:hidden">
                            <label for="endpoint-tabs" class="sr-only">Select a tab</label>
                            <select
                                id="endpoint-tabs"
                                name="tabs"
                                class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary"
                                @change="activeTab = $event.target.value"
                                x-model="activeTab"
                            >
                                <option value="auth">Authentication</option>
                                <option value="users">User Management</option>
                                <option value="jobs">Job Offers</option>
                                <option value="cvs">CV Management</option>
                                <option value="applications">Applications</option>
                            </select>
                        </div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                    <button
                                        @click="activeTab = 'auth'"
                                        :class="{ 'border-primary text-primary': activeTab === 'auth', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'auth' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        Authentication
                                    </button>
                                    <button
                                        @click="activeTab = 'users'"
                                        :class="{ 'border-primary text-primary': activeTab === 'users', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'users' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        User Management
                                    </button>
                                    <button
                                        @click="activeTab = 'jobs'"
                                        :class="{ 'border-primary text-primary': activeTab === 'jobs', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'jobs' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        Job Offers
                                    </button>
                                    <button
                                        @click="activeTab = 'cvs'"
                                        :class="{ 'border-primary text-primary': activeTab === 'cvs', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'cvs' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        CV Management
                                    </button>
                                    <button
                                        @click="activeTab = 'applications'"
                                        :class="{ 'border-primary text-primary': activeTab === 'applications', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'applications' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        Applications
                                    </button>
                                </nav>
                            </div>
                        </div>

                        <!-- Authentication Tab -->
                        <div class="mt-8" x-show="activeTab === 'auth'" x-cloak>
                            <div class="space-y-8">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Register</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Register a new user</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/register</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "name": "John Doe",
  "email": "user@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "role": "candidate"  // or "recruiter"
}</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Login</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Login and get authentication token</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/login</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "email": "user@example.com",
  "password": "password123"
}</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Logout</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Logout and invalidate token</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/logout</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User Management Tab -->
                        <div class="mt-8" x-show="activeTab === 'users'" x-cloak>
                            <div class="space-y-8">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Get User Profile</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get current user profile</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/user</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Update User Profile</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Update user information</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">PUT</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/user</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "name": "Updated Name",
  "email": "updated@example.com",
  "phone_number": "+1234567890"
}</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Add Skill</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Add a skill to user profile</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/user/skills</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "name": "Laravel"
}</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job Offers Tab -->
                        <div class="mt-8" x-show="activeTab === 'jobs'" x-cloak>
                            <div class="space-y-8">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">List Job Offers</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get all active job offers</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/job-offers</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Note</p>
                                        <p class="mt-1 text-sm text-gray-500">This endpoint is publicly accessible without authentication.</p>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Get Job Offer</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get a specific job offer</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/job-offers/{id}</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Note</p>
                                        <p class="mt-1 text-sm text-gray-500">This endpoint is publicly accessible without authentication.</p>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Create Job Offer</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Create a new job offer (recruiter only)</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/job-offers</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "title": "Senior Laravel Developer",
  "description": "We are looking for an experienced Laravel developer.",
  "requirements": "5+ years of experience with PHP and Laravel",
  "location": "Remote",
  "is_active": true
}</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CV Management Tab -->
                        <div class="mt-8" x-show="activeTab === 'cvs'" x-cloak>
                            <div class="space-y-8">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">List User CVs</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get all CVs uploaded by current user</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/cvs</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Upload CV</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Upload a new CV file</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/cvs</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN
Content-Type: multipart/form-data</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <p class="mt-1 text-sm text-gray-500">Form data with a file field named 'cv'</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">cv: [FILE] (PDF or DOCX, max 5MB)</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete CV</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Delete a CV file</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">DELETE</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/cvs/{id}</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Applications Tab -->
                        <div class="mt-8" x-show="activeTab === 'applications'" x-cloak>
                            <div class="space-y-8">
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">List Applications</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get all applications of current user</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/applications</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Apply for Job</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Apply for a job with existing CV</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">POST</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/applications</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN
Content-Type: application/json</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Request Body</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">{
  "job_offer_id": 1,
  "cv_id": 1
}</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">List Job Applications</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Get applications for a job (recruiter only)</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">GET</span>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Endpoint</p>
                                        <p class="mt-1 text-sm text-gray-500"><code class="px-2 py-1 bg-gray-100 rounded">/api/job-offers/{id}/applications</code></p>
                                    </div>
                                    <div class="px-4 py-5 bg-gray-50 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Headers</p>
                                        <div class="mt-1 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                            <pre class="language-json">Authorization: Bearer YOUR_TOKEN</pre>
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 sm:px-6">
                                        <p class="text-sm font-medium text-gray-900">Note</p>
                                        <p class="mt-1 text-sm text-gray-500">User must be a recruiter and the creator of the job offer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Examples Section -->
            <div class="py-12 bg-gray-50" id="examples">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Examples</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Usage Examples
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Examples of how to use the API with cURL, JavaScript, and PHP.
                        </p>
                    </div>

                    <div class="mt-10" x-data="{ activeExample: 'curl' }">
                        <div class="sm:hidden">
                            <label for="example-tabs" class="sr-only">Select a tab</label>
                            <select
                                id="example-tabs"
                                name="tabs"
                                class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary"
                                @change="activeExample = $event.target.value"
                                x-model="activeExample"
                            >
                                <option value="curl">cURL</option>
                                <option value="javascript">JavaScript (Fetch)</option>
                                <option value="php">PHP</option>
                            </select>
                        </div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                    <button
                                        @click="activeExample = 'curl'"
                                        :class="{ 'border-primary text-primary': activeExample === 'curl', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeExample !== 'curl' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        cURL
                                    </button>
                                    <button
                                        @click="activeExample = 'javascript'"
                                        :class="{ 'border-primary text-primary': activeExample === 'javascript', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeExample !== 'javascript' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        JavaScript (Fetch)
                                    </button>
                                    <button
                                        @click="activeExample = 'php'"
                                        :class="{ 'border-primary text-primary': activeExample === 'php', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeExample !== 'php' }"
                                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    >
                                        PHP
                                    </button>
                                </nav>
                            </div>
                        </div>

                        <!-- cURL Example -->
                        <div class="mt-8" x-show="activeExample === 'curl'" x-cloak>
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Login and get token</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-bash">curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"email": "recruiter@example.com", "password": "password123"}'</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create a job offer (as recruiter)</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-bash">curl -X POST http://localhost:8000/api/job-offers \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -d '{
    "title": "Senior Laravel Developer",
    "description": "We are looking for an experienced Laravel developer.",
    "requirements": "5+ years of experience with PHP and Laravel",
    "location": "Remote",
    "is_active": true
  }'</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Upload CV</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-bash">curl -X POST http://localhost:8000/api/cvs \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -F "cv=@/path/to/your/resume.pdf"</pre>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript Example -->
                        <div class="mt-8" x-show="activeExample === 'javascript'" x-cloak>
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Login and get token</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-javascript">async function login() {
  const response = await fetch('http://localhost:8000/api/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      email: 'candidate@example.com',
      password: 'password123'
    })
  });

  const data = await response.json();
  // Store token for future requests
  localStorage.setItem('token', data.token);
  return data;
}</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Get job listings</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-javascript">async function getJobOffers() {
  const response = await fetch('http://localhost:8000/api/job-offers', {
    method: 'GET',
    headers: {
      'Accept': 'application/json'
    }
  });

  const data = await response.json();
  return data;
}</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Apply for a job</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-javascript">async function applyForJob(jobOfferId, cvId) {
  const token = localStorage.getItem('token');

  const response = await fetch('http://localhost:8000/api/applications', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': `Bearer ${token}`
    },
    body: JSON.stringify({
      job_offer_id: jobOfferId,
      cv_id: cvId
    })
  });

  const data = await response.json();
  return data;
}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PHP Example -->
                        <div class="mt-8" x-show="activeExample === 'php'" x-cloak>
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Login and get token</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-php">&lt;?php

$client = new GuzzleHttp\Client();

$response = $client->post('http://localhost:8000/api/login', [
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ],
    'json' => [
        'email' => 'recruiter@example.com',
        'password' => 'password123',
    ],
]);

$data = json_decode($response->getBody(), true);
$token = $data['token'];

// Store token for future requests
// $_SESSION['api_token'] = $token;
</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create a job offer</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-php">&lt;?php

$client = new GuzzleHttp\Client();

$response = $client->post('http://localhost:8000/api/job-offers', [
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
    ],
    'json' => [
        'title' => 'Senior Laravel Developer',
        'description' => 'We are looking for an experienced Laravel developer.',
        'requirements' => '5+ years of experience with PHP and Laravel',
        'location' => 'Remote',
        'is_active' => true,
    ],
]);

$data = json_decode($response->getBody(), true);
</pre>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Upload CV</h3>
                                    <div class="mt-3 bg-gray-800 rounded-lg p-4 text-sm font-mono text-gray-200 overflow-x-auto">
                                        <pre class="language-php">&lt;?php

$client = new GuzzleHttp\Client();

$response = $client->post('http://localhost:8000/api/cvs', [
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
    ],
    'multipart' => [
        [
            'name' => 'cv',
            'contents' => fopen('/path/to/your/resume.pdf', 'r'),
            'filename' => 'resume.pdf',
        ],
    ],
]);

$data = json_decode($response->getBody(), true);
</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">
                    <a href="https://github.com/protocol-404/job-application-api" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">
                        &copy; 2025 Job Application API. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
