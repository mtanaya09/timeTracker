@include('partials.header')
<header class="max-w-lg mx-auto">
    <a href="#" method="POST">

        <h1 class="text-4xl font-bold text-white text-center">TIME TRACKER</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
    <section>
        <h3 class="font-bold text-2x1">EVERY SECOND COUNTS</h3>
        <p class="text-gray-600 pt-2">Sign in to your account</p>
    </section>
    <section class="mt-10">
        <form action="/login/process" method="POST" class="flex flex-col">
            @csrf
            {{-- checking user's input and displaying error if ever --}}
            @error('email')
                <p class="text-red-500 text-xs mt-2 p-1">
                    {{ $message }}
                </p>
            @enderror
            {{-- for email input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    value={{ old('email') }}>
            </div>

            {{-- password input --}}
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
            </div>

            <button
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">Login</button>
        </form>
        <p class="text-center text-gray-600 pt-2">Don't have an account?<a href="/register"
                class="text-purple-400 font-bold"> Register</a></p>
    </section>
    @include('partials.footer')
