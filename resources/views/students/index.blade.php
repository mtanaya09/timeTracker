{{-- @dd(auth()->user()->email) --}}
@include('partials.header')


{{-- from nav.blade.php --}}
<?php $array = ['title' => 'Time Tracker System']; ?>
<x-nav :data="$array" />




<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-3xl font-bold text-white text-center ">Recoooord</h1>
    </a>
</header>

<section class="mt-5">
    {{-- <div class="col-md-5 my-auto">
        <form action="{{url('search')}}" method="GET" role="search">
            <div class="input-group">
                <input type="search" name="search" value="" placeholder="Search here" class="form-control" />
                <button class="btn bg-white" type="submit">
                    <i class="fa fa-search"></i>
                </button>
        </form>
    </div> --}}
    <div class="overflow-x-auto relative">

        {{-- expandable display --}}
        {{-- <table class="w-full text-sm text-left text-gray-500"> --}}

        {{-- fixed display --}}
        <table class="w-auto mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Employee Number
                    </th>
                    <th scope="col" class="py-3 px-6">
                        First Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Time In
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Time Out
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- table row --}}
                @foreach ($students as $student)
                    <tr class="bg-gray-800 border-b text-white">
                        {{-- get user's first_name and display in view --}}
                        <td class="py-4 px-6">
                            {{ "ID#00".$student->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->first_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->last_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->created_at }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $student->updated_at }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="/student/{{ $student->id }}"
                                class="bg-sky-600 text-white px-4 py-2 rounded">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-lg pt-6 p-4 rounded-lg">{{ $students->links() }}</div>

    </div>
</section>

@include('partials.footer')
