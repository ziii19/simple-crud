<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple CRUD</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 items-center justify-center min-h-screen">
    <header>
        <div class="flex justify-center  text-3xl text-bold text-slate-800 bg-slate-300 py-5">
            <h3>SIMPLE CRUD</h3>
        </div>
    </header>

    @if (session()->has('success'))
    <div id="alert-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    <div id="alert" class="fixed inset-0 flex items-center justify-center z-50">
        <div
            class="bg-white border border-gray-300 text-gray-800 px-6 py-6 rounded-lg shadow-lg relative w-full max-w-sm transform transition-all duration-300 scale-100">
            <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none"
                onclick="closeAlert()">
                &times;
            </button>
            <div class="flex flex-col items-center">
                <svg class="w-12 h-12 text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4"></path>
                </svg>
                <span class="font-semibold text-center">{{ session('success') }}</span>
            </div>
        </div>
    </div>

    @endif




    {{-- table --}}

    <div class="mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between px-6 py-4 bg-white shadow rounded-md">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">User Messages</h1>
                    <p class="text-gray-600">List of user data</p>
                </div>
                <div class="relative mt-4 md:mt-0 md:ml-4 w-full md:w-auto">
                    <form action="/">
                        <input type="search" id="search" name="search" value="{{ request('search') }}"
                            class="w-full md:w-80 px-4 py-2 mr-5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Search messages...">
                        <button type="submit"
                            class="absolute right-[-.6rem] bg-slate-600 p-[10.5px] rounded-e-lg top-1/2 transform -translate-y-1/2 text-gray-400 hover:bg-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m1.85-6.4a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-800 text-white uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Address</th>
                            <th class="py-3 px-6 text-left">Message</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>


                    @foreach ($posts as $index => $post)

                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $index + 1 }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $post->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $post->address }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $post->message }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">

                                    <a href="/edit/{{ $post->id }}"><button
                                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 ml-2">Edit</button></a>

                                    <form id="delete-form-{{ $post->id }}" action="/input/{{ $post->id }}" method="POST"
                                        onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">Delete</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    </tbody>

                    @endforeach

                </table>
            </div>
            <div class="px-6 py-4 bg-gray-100">
                <a href="/input"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add
                        New</button></a>

            </div>
        </div>
    </div>

    </div>

    <script>
        function confirmDelete() {
        return confirm("Are you sure you want to delete this post? This action cannot be undone.");
        }

        function closeAlert() {
        document.getElementById('alert').style.transform = 'scale(0)';
        document.getElementById('alert-overlay').style.opacity = '0';
        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
            document.getElementById('alert-overlay').style.display = 'none';
        }, 300); // Duration of the scale-down animation


    }

    </script>

</body>

</html>