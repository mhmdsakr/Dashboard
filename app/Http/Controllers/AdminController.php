<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pr;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('users');
        $prs = Pr::all();
        $users = Admin::with('gender', 'pr')->get();
        return view('users', compact('users','prs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Admin::create([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'address' => $request->address,
            'gender_id' => $request->gender_id,
            'pr_id' => $request->pr_id
            // $request->all()
        ]);
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $prs = Pr::all();

        return view('users', compact('user', 'prs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Admin::findorFail($id);
        $user->update(
            $request->all()
        );
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Admin::findorFail($id)->delete();

        return redirect()->route('admins.index');
    }
}
