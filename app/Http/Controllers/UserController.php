<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->with(["roles"])->get();
        $roles=Role::all();

        return view("cpanel.users.index",compact("users","roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|min:8",
            "role"=>"required|exists:roles,name"
        ]);

        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);

        $user->assignRole($request->role);

        return redirect()->back()->with("success","User created successfully");
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
        $user=User::findOrFail($id);
        $roles=Role::all();

        return view("cpanel.users.edit",compact("user","roles"));
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
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email,".$id,
            "role"=>"required|exists:roles,name"
        ]);

        $user=User::findOrFail($id);

        if($request->password){
            $request->validate([
                "password"=>"required|min:8"
            ]);

            $user->update([
                "password"=>bcrypt($request->password)
            ]);
        }

        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route("cpanel.users.index")->with("success","User updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with("success","User deleted successfully");
    }
}
