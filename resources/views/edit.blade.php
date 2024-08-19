<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <header>
        <div class="flex justify-center  text-3xl text-bold text-slate-800 bg-slate-300 py-3">
            <h3>FORM UPDATE</h3>
        </div>
    </header>

    <div class="flex items-center justify-center mt-5">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-10/12 md:w-full">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">User Information Form</h1>
            <form action="/edit/{{ $post->id }}" method="post">
                @method('put')
                @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input type="text" id="name" name="name" value="{{ old('name', $post->name) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter your name">
                </div>
                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    @error('address')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input type="text" id="address" name="address" value="{{ old('address', $post->address) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter your address">
                </div>
                <!-- Message Field -->
                <div class="mb-6">
                    <label for="message" class="block text-gray-700 text-sm font-bold">Message</label>
                    @error('message')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input id="message" name="message" value="{{ old('message', $post->message) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2"
                        placeholder="Enter your message"></input>
                </div>
                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>