<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddUpdateRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('classroom')->Paginate(10);

        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('student.view', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentAddUpdateRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(StudentAddUpdateRequest $request)
    {
        try {
            // Safely perform set of DB related queries if fail rollback all.
            DB::transaction(function () use ($request){
                Student::insert([
                    'student_num' => $this->generateStudentNumber(),
                    'first_name' => $request->get('first_name'),
                    'surname' => $request->get('surname'),
                    'birth_date' => $request->get('birth_date'),
                    'classroom_id' => $request->get('classroom'),
                    'parent_phone_number' => $request->get('parent_phone_number'),
                    'second_phone_number' => $request->get('second_phone_number'),
                    'enrollment_date' => $request->get('enrollment_date'),
                    'address' => $request->get('address'),
                    'gender' => $request->get('gender'),
                ]);
            });
        } catch (\Exception $exception){
            // Back to form with errors
            return redirect('/student/create')
                ->withErrors($exception->getMessage());
        }
        return redirect('/student')->with('success', 'A New Student Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $classrooms = Classroom::all();
        $student = Student::findOrFail($id);
        return view('student.view', compact('student', 'classrooms' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentAddUpdateRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(StudentAddUpdateRequest $request, int $id)
    {
        $student = Student::findOrFail($id);
        try {
            // Safely perform set of DB related queries if fail rollback all.
            DB::transaction(function () use ($request, $student){
                $student->first_name = $request->first_name;
                $student->surname = $request->surname;
                $student->birth_date = $request->birth_date;
                $student->classroom_id = $request->classroom;
                $student->parent_phone_number = $request->parent_phone_number;
                $student->second_phone_number = $request->second_phone_number;
                $student->address = $request->address;
                $student->enrollment_date = $request->enrollment_date;
                $student->gender = $request->gender;
                $student->save();
            });
        } catch (\Exception $exception){
            // Back to form with errors
            return redirect('/student/edit/'.$id)
                ->withErrors($exception->getMessage());
        }
        return redirect('/student')->with('success', 'A New Student Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        try {
            Student::destroy($id);
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
        return redirect('/student');
    }

    //Todo: Marge generateTeacherNumber with generateStudentNumber to be one generic function.
    public function generateStudentNumber(): string
    {
        return (string)str('STDN-')->append($this->getLastTCID());
    }
    function getLastTCID()
    {
        $last = Student::query()->orderByDesc('student_num')->first('student_num');
        if($last != null){
            $lastNum = (string)Str::of($last)->after('-');
            return sprintf("%06d", (int)$lastNum +1);
        } else
            return sprintf("%06d", 1);
    }
}
