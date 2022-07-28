<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;
use Illuminate\Validation\Validator;

class TeacherController extends Controller
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
        $teachers = Teacher::with('subjects')->Paginate(10);

        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('teacher.view',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'email' => 'required|email|unique:teachers,email',
            //'classroom' => ['required',Rule::exists('classrooms', 'id')],
            'phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'address' => 'required',
        ]);
        try {
            // Safely perform set of DB related queries if fail rollback all.
            DB::transaction(function () use ($request){
                if ($request->hasFile('photo')) {
                    $path = Str::of('Teachers/')->append($request->get('surname'));
                    // Save the file locally in the public/images folder under a new folder named /Teachers
                    $photo = $request->file('photo');
                    $photo_path = $photo->storeAs($path, $photo->getClientOriginalName(), 'images');
                }

                Teacher::insert([
                    'teacher_num' => $this->generateTeacherNumber(),
                    'first_name' => $request->get('first_name'),
                    'surname' => $request->get('surname'),
                    'birth_date' => $request->get('birth_date'),
                    'email' => $request->get('email'),
                    'phone_number' => $request->get('phone_number'),
                    'photo_path' => $photo_path,
                    'address' => $request->get('address'),
                    'gender' => $request->get('gender'),
                ]);
            });
        }catch (\Exception $exception){
            // Back to form with errors
            return redirect('/teacher/create')
                ->withErrors($exception->getMessage());
        }
        return redirect('/teacher')->with('success', 'A New Teacher Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
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
        $teacher = Teacher::findOrFail($id);
        return view('teacher.view', compact('teacher', 'classrooms' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->validate($request, [
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'email' => ['required',Rule::unique('teachers', 'email')->ignore($id),],
            'phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'address' => 'required',
        ]);
        try {
            DB::transaction(function () use ($request, $teacher){
                if ($request->hasFile('photo')) {
                    try {
                        // remove the image locally.
                        unlink(public_path('/images/' . $teacher->photo_path));
                    } catch (\Exception $exception) {
                        // Todo: To handel this.
                    }
                    $path = Str::of('Teachers/')->append($request->get('surname'));
                    // Save the file locally in the public/images folder under a new folder named /Teachers
                    $photo = $request->file('photo');
                    $photo_path = $photo->storeAs($path, $photo->getClientOriginalName(), 'images');
                }
                $teacher->first_name = $request->first_name;
                $teacher->surname = $request->surname;
                $teacher->birth_date = $request->birth_date;
                $teacher->email = $request->email;
                $teacher->phone_number = $request->phone_number;
                $teacher->photo_path = $photo_path;
                $teacher->address = $request->address;
                $teacher->gender = $request->gender;
                $teacher->save();
            });
        }catch (\Exception $exception){
            // Back to form with errors
            return redirect('/teacher/edit/'.$id)
                ->withErrors($exception->getMessage())->withInput();
        }
        return redirect('/teacher')->with('success', 'A Teacher Updated Successfully.');

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
            Teacher::destroy($id);
        } catch (Exception $exception){
            echo $exception->getMessage();
        }
        return redirect('/teacher');
    }

    // Todo: ask for the differences between these ways and which one has better performance.
//    public function fetchSubjects(Request $request){
//        $id = $request->get('id');
//        $subs = Subject::query()->where('classroom_id', $id)->get();
//        $outputhtml = '<option value="">Select a Subject</option>';
//        foreach($subs as $sub) {
//            $outputhtml .= '<option value="'.$sub->id.'">'.$sub->name.'</option>';
//        }
//        echo $outputhtml;
//    }
    public function getSubjects($id)
    {
        $subs = Subject::query()->where('classroom_id', $id)->get();
        $outputhtml = '<option value="">Select a Subject</option>';
        foreach ($subs as $sub) {
            $outputhtml .= '<option value="' . $sub->id . '">' . $sub->name . '</option>';
        }
        echo $outputhtml;
    }

    //Todo: Marge generateTeacherNumber, generateStudentNumber and generateSubjectNumber to be one generic function.
    public function generateTeacherNumber(): string
    {
        return (string)str('TN-')->append($this->getLastTCID());
    }
    function getLastTCID()
    {
        $last = Teacher::query()->orderByDesc('teacher_num')->first('teacher_num');
        if($last != null){
            $lastNum = (string)Str::of($last)->after('-');
            return sprintf("%06d", (int)$lastNum +1);
        } else
            return sprintf("%06d", 1);
    }
}
