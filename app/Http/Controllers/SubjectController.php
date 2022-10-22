<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectAddUpdateRequest;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
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
        $subjects = Subject::with(['classroom','teacher'])->Paginate(10);
        return view('subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('subject.view',compact('classrooms','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubjectAddUpdateRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(SubjectAddUpdateRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                Subject::insert([
                    'subject_code' => $this->generateSubjectNumber(),
                    'name' => $request->get('name'),
                    'semester' => $request->get('semester'),
                    'description' => $request->get('description'),
                    'teacher_id' => $request->get('teacher'),
                    'classroom_id' => $request->get('classroom'),
                ]);
            });
        }catch (\Exception $exception){
            // Back to form with errors
            return redirect('/subject/create')
                ->withErrors($exception->getMessage());
        }
        return redirect('/subject')->with('success', 'A New Subject Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
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
        $teachers = Teacher::all();
        $subject = Subject::findOrFail($id);
        return view('subject.view', compact('teachers', 'classrooms','subject' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubjectAddUpdateRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(SubjectAddUpdateRequest $request, int $id)
    {
        $subject = Subject::findOrFail($id);
        try {
            DB::transaction(function () use ($request, $subject){
                $subject->name = $request->get('name');
                $subject->semester = $request->get('semester');
                $subject->description = $request->get('description');
                $subject->teacher_id = $request->get('teacher');
                $subject->classroom_id = $request->get('classroom');
                $subject->save();
            });
        }catch (\Exception $exception){
            // Back to form with errors
            return redirect('/subject/edit/'.$id)
                ->withErrors($exception->getMessage())->withInput();
        }
        return redirect('/subject')->with('success', 'A Subject Updated Successfully.');
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
            Subject::destroy($id);
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
        return redirect('/subject');
    }

    public function generateSubjectNumber(): string
    {
        return (string)str('SC-')->append($this->getLastTCID());
    }
    function getLastTCID()
    {
        $last = Subject::query()->orderByDesc('subject_code')->first('subject_code');
        if($last != null){
            $lastNum = (string)Str::of($last)->after('-');
            return sprintf("%06d", (int)$lastNum +1);
        } else
            return sprintf("%06d", 1);
    }
}
