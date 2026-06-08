<?php

namespace App\Http\Controllers;
use App\Models\Locker;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lockers = Locker::all();
        $title = "Create New Locker";
        return view('locker.index', compact('lockers', 'title'));

        // $lockers = Locker::orderBy('id')->get();
        // // $lockers = Locker::all();
        // $title = 'Locker Management';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        // return view('locker.index', compact('lockers', 'title', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New Locker";
        return view('locker.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'locker_name' => 'required|unique:lockers,locker_name',
            'batch' => 'required|in: 1,2,3,4',
            'major_name' => 'required|in:Web Programming,Content Creator,Teknisi Jaringan',
            'status' => 'required|in:Available,Unavailable,Damaged,Missing'
        ]);


        //alert
        // Locker::create($request->all());
        Locker::create([
            'locker_name' => $request->locker_name,
            'batch' => $request->batch,
            'major_name' => $request->major_name,
            'status' => $request->status
        ]);
        Alert::success('Success!!', 'Created Locker success');
        // toast('Your Locker Has Been Created!', 'success');

        return redirect()->to('locker');
        // return redirect()->route('locker.index');
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
        $title = "Edit Locker";
        $edit = Locker::find($id);
        return view('locker.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = [
            'locker_name' => $request->locker_name,
            'batch' => $request->batch,
            'major_name' => $request->major_name,
            'status' => $request->status,
        ];
        //jika user memasukan password

        Locker::find($id)->update($data);
        return redirect()->route('locker.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Locker = Locker::find($id);
        $Locker->delete();
        toast('Your Locker Has Been Deleted!', 'success');
        return redirect()->route('locker.index');
    }
}
