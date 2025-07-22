<?php

namespace App\Http\Controllers;

use App\Models\Blob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('blob.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|max:1024'
        ]);

        // User
        $user = Auth::user();

        // File
        $file = $request->file('file');

        // Get file content to prepare it to code
        $content = file_get_contents($file->getRealPath());

        // Store the file
        $path = $file->storeAs('users/' . $user->name, preg_replace('/ /i', '_', $file->getClientOriginalName()), 'public');

        $user->blobs()->create([
            'name' => preg_replace('/ /i', '_', $file->getClientOriginalName()),
            'data' => base64_encode($content),
            'path' => $path,
            'size' => $file->getSize(),
        ]);
        
        return redirect()->back()->with('success', 'The file uploaded successfully!.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blob $blob)
    {
        //

        if(!base64_decode($blob->data, $strict = true)){

            return redirect()->back()->withErrors(['File error', 'File content bad']);

        }

        return view('blob.view', compact('blob'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blob $blob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blob $blob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blob $blob)
    {
        //
        Storage::disk('public')->delete($blob->path);

        $blob->delete();
        return redirect('/')->with('Success', 'The file was deleted successfully!.');
    }
}
