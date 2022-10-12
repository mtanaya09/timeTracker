{{-- ITEM: Login, Register and Logout to be utilize in different files --}}

<ul class="flex flex-col md:flex-row px-4">
    @auth
        {{-- Add record --}}
        <li>
            <a href="/add/student" class="block py-2 pr-4 pl-3">Add Record</a>
        </li>
        {{-- Logout button --}}
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button class="block py-2 pr-4 pl-3">Logout</button>
            </form>
        </li>
    @else
        {{-- Login Button --}}
        <li>
            <a href="/login" class="block py-2 pr-4 pl-3">Login</a>
        </li>
        {{-- Register Button --}}
        <li>
            <a href="/register" class="block py-2 pr-4 pl-3">Register</a>
        </li>
    @endauth
</ul>
