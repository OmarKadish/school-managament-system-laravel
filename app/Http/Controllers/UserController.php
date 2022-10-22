<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class UserController extends Controller
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
        $managers = User::where('id', '!=', auth()->user()->id)->paginate(10);
        return view('user.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserAddUpdateRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(UserAddUpdateRequest $request)
    {
        try {
            // Safely perform set of DB related queries if fail rollback all.
            DB::transaction(function () use ($request){
                User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                    'photo_path' => 'users/blank-profile.png',
                ]);
            });
        }catch (\Exception $exception){
            // Back to form with errors
            return redirect('/manager/create')
                ->withErrors($exception->getMessage());
        }
        return redirect('/manager')->with('success', 'A New manager Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //Don't delete your self.
        if (auth()->user()->id!=$id){
            try {
                User::destroy($id);
            } catch (\Exception $exception){
                echo $exception->getMessage();
            }
        }

        return redirect('/manager');
    }
}
