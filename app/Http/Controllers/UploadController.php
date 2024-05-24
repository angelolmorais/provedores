<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:' . config('filesystems.max_upload_size'),
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public');

            /
            $document = new Upload([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'file_size' => $file->getSize(),

            ]);



            return redirect()->back()->with('success', trans('messages.file_uploaded_successfully'));
        }

        return redirect()->back()->with('error', trans('messages.no_file_selected'));
    }
}
*/
