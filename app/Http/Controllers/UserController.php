<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        //
        // $users = User::orderBy('id', 'desc')->get;
        // $users = User::latest()->get();
        $users = User::orderByDesc('id')->get();
        $title = 'User Management';

        $deleteTitle = 'Hapus User!';
        $deleteText = "Apakah Anda Yakin Ingin Menghapus User Ini?";
        confirmDelete($deleteTitle, $deleteText);

        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New User";
        $lastUser = User::latest()->first();
        // $number = $lastUser ? substr($lastUser->code, 3) + 1 :1;
        // code :

        //kalo kondisi id gada dimulai dari 1, kalo ada diambil dari lastUser, dan dibagian usercode setelah strpad pakai $id
        // $id = $lastUser ? $lastUser->id : 1;
        $userCode = "USR" . str_pad($lastUser->id + 1, 5, "0", STR_PAD_LEFT);
        $roles = Role::get();
        return view('user.create', compact('title', 'roles', 'userCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6'
        // ]);

        DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $user->roles()->sync($request->role_ids);

            DB::commit();
            // Alert::success('Success!!', 'Created user success');
            toast('Your User Has Been Created!', 'success');
            return redirect()->to('user');

        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
            DB::rollBack();
            Alert::error('FAIL!!', 'An Error Occurred While Saving The User');
            return back()->withInput();
        }

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Edit User';
        $edit = User::find($id); //kalo gabisa blank
        $roles = Role::get();
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('user.edit', compact('title', 'edit', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            //code...
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            //jika user memasukan password
            if (filled($request->password)) {
                $data['password'] = $request->password;
            }

            $user = User::find($id);
            $user->update($data);
            $user->roles()->sync($request->role_ids);
            DB::commit();
            toast('Your User Has Been Update!', 'success');
            return redirect()->to('user');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::error('FAIL!!', 'Update Is Failed');
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Alert::success('SUCCESS!!', 'User Has Been Deleted');
        return redirect()->to('user');
    }
}
