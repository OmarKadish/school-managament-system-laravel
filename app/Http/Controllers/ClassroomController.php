<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomAddUpdateRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;

class ClassroomController extends Controller
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
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('students')->Paginate(10);
        return view('classroom.index',compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('classroom.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomAddUpdateRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(ClassroomAddUpdateRequest $request)
    {
        $input = $request->all();
        Classroom::create($input);
        return redirect('/classroom')->with('success', 'A New Classroom Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.view', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassroomAddUpdateRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(ClassroomAddUpdateRequest $request, int $id)
    {
        $input = $request->all();
        // one way to update a record.
/*        $classroom = Classroom::findOrFail($id);
        $classroom->name = $input['name'];
        $classroom->description = $input['description'];
        $classroom->save();*/

        //another way to update a record.
        try {
            Classroom::query()->where('id',$id)->update([
                'name' => $input['name'],
                'description' => $input['description']
            ]);
        } catch (Exception $exception){
            echo $exception->getMessage();
        }
        return redirect('/classroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        try {
            Classroom::destroy($id);
        } catch (Exception $exception){
            echo $exception->getMessage();
        }
        return redirect('/classroom');
    }
}
