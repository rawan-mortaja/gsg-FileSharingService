<?php

namespace App\Http\Controllers;

use App\Events\DownloadEvent;
use App\Models\File;
use App\Models\FileDownload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function view($id)
    {
        $file = File::find($id);

        if (!$file) {
            return redirect()->back()->with('error', 'File not found!');
        }

        return view('view', compact('file'));
    }

    public function download($id)
    {
        // $file = File::find($id);

        // if (!$file) {
        //     return redirect()->back()->with('error', 'File not found!');
        // }

        $fileDownload = FileDownload::find($id);

        if (!$fileDownload) {
            return redirect('/')->with('error', 'File not found');
        }

        $fileDownload->increment('download_count');

        $ip_address = request()->ip();
        $user_agent = request()->header('User-Agent');
        $country = $this->getCountryByIpAddress($ip_address);

        event(new DownloadEvent($id, $ip_address, $user_agent, $country));

        $filePath = 'uploads/' . $fileDownload->filename;
        $downloadLink = Storage::url($filePath);

        return redirect($downloadLink);

        // return Storage::download($file->file_path, $file->file_name);
    }

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
