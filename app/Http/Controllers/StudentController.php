<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(10));

        return view('students.index', $data);

        /* ORDERING, SORTING AND LIMIT THE DATA IN DATABASE
        |
        |  $data = Students::where('age', '>', '30')->orderBy('first_name', 'desc')->limit(10)->get();
        |
        */

        /*  GET COUNT BY GENDER IN DATABASE
        |
        |   $data = DB::table('students')
        |       ->select(DB::raw('count(*) as gender_count, gender'))->groupBy('gender')->get();
        |
        */

        // $data = Students::where('id', 100)->firstOrFail()->get();
    }

    public function show($id)
    {

        $data = Students::findOrFail($id);
        // dd($data);
        return view('students.edit', ['student' => $data]);
    }

    public function create()
    {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request)
    {
        //to validate user's input
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required', 'min:4'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')],
        ]);

        Students::create($validated);

        return redirect('/')->with('message', 'New record added successfully!');
    }

    //to update the record function
    public function update(Request $request, Students $student, $id)

    {
        // dd($request);
        $validated = $request->validate([
            "first_name" => 'required|min:4',
            "last_name" => 'required|min:4',
            "gender" => 'required|min:4',
            "age" => 'required',
            "email" => 'required|email',
        ]);

        $getStudent = $student->findOrFail($id);
        //student->update();
        $getStudent->fill($request->all())->save();



        // return back()->with('message', 'Record updated successfully');
        return redirect('/')->with('message', 'Record updated successfully');
    }

    //function to delete single data
    public function destroy(Request $request, Students $student, $id)
    {
        // dd($request);
        $getStudent = $student->findOrFail($id);
        $getStudent->fill($request->all())->delete();
        //$student->delete();
        return redirect('/')->with('message', 'Record deleted successfully');
    }
}
