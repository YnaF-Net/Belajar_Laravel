<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;
// use App\Models\key;
use RealRashid\SweetAlert\Facades\Alert;


class KeyController extends Controller
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
        $keys = Keys::orderByDesc('id')->get();
        $title = 'Key Management';
        return view('key.index', compact('keys', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New key";
        return view('key.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:keys,name',
            'is_active' => 'required'
        ]);


        //
        Keys::create($request->all());
        // Alert::success('Success!!', 'Created Key success');
        toast('Your Key Has Been Created!', 'success');

        return redirect()->to('key');
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
        $title = 'Edit Key';
        $edit = Keys::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('key.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active,
        ];
        //jika user memasukan password


        Keys::find($id)->update($data);
        return redirect()->to('key');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Keys::find($id)->delete();
        return redirect()->to('key');
    }
}
