<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view('index', compact('files'));
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads');

        // Save the file details to the database
        $uploadedFile = new File();
        $uploadedFile->file_name = $fileName;
        $uploadedFile->file_path = $filePath;
        $uploadedFile->file_size = $file->getSize();
        $uploadedFile->save();

        return redirect()->route('file.index')->with('success', 'File uploaded successfully!');
    }

    public function download($id)
    {
        $file = File::find($id);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found!');
        }

        return Storage::download($file->file_path, $file->file_name);
    }

    public function view($id)
    {
        $file = File::find($id);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found!');
        }

        return view('view', compact('file'));
    }

    //     public function share($id)
    // {
    //     $file = File::find($id);

    //     if (!$file) {
    //         return redirect()->back()->with('error', 'File not found!');
    //     }

    //     $shareLink = url('/file/' . $file->id);

    //     return view('share', compact('file', 'shareLink'));
    // }



    public function share($id)
    {
        $file = File::find($id);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found!');
        }

        $shareLink = URL::signedRoute('file.download', ['id' => $file->id]);

        return view('share', compact('file', 'shareLink'));
    }
}
