@include('partials.header')
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4x1 font-bold text-white text-center">Student Register</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
    <section>
        <h3 class="font-bold text-2x1">Time Tracker</h3>
        <p class="text-gray-600 pt-2">Create an account</p>
    </section>
    <section class="mt-10">
        <form action="/store" method="POST" class="flex flex-col">
            @csrf
            {{-- for email input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                <input type="text" name="name"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    value={{ old('name') }}>
                {{-- error message for name --}}
                @error('name')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- for email input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    value={{ old('email') }}>
                {{-- error message for email --}}
                @error('email')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- password input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                {{-- error message for password --}}
                @error('password')
                    <p class="text-red-500 text-xs mt-2 p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- confirm password input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm
                    Password</label>
                <input type="password" name="password_confirmation"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                {{-- no need for error message for pass confirmation. We just want to check if the pass is match or not --}}
            </div>

            {{-- proceed button login or register --}}
            <button
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">Register</button>
        </form>
        <p class="text-center text-gray-600 pt-2">Already have an account?<a href="/login"
                class="text-purple-400 font-bold"> Login</a></p>
    </section>
    @include('partials.footer')
