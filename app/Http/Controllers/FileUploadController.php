<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function storeUploads(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_bidding' => 'required',
            'id_category' => 'required',
            'document' => 'required|file|max:2048',
        ]);

        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName();

        $path = $file->storeAs('public/uploads/' . $request->input('id_bidding'), $fileName);


        $documentData = [
            'id_user' => $validatedData['id_user'],
            'id_bidding' => $validatedData['id_bidding'],
            'id_category' => $validatedData['id_category'],
            'file_name' => $fileName,
            'file_path' => $path,
            'file_size' => $file->getSize(),
        ];

        if ($request->has('id_subcategory')) {
            $documentData['id_subcategory'] = $request->input('id_subcategory');
        }

        $document = new Upload($documentData);

        try {
            $document->save();
            return redirect()->back()->with('success', trans('messages.file_uploaded_successfully'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }



    public function view($id)
    {
        try {
            $document = Upload::findOrFail($id);

            return response()->file(storage_path('app/' . $document->file_path));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', trans('File not found'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $document = Upload::findOrFail($id);

            if (auth()->user()->id !== $document->id_user) {
                return redirect()->back()->with('error', __('messages.permission_denied'));
            }

            Storage::disk('public')->delete($document->file_path);

            $document->delete();

            $directory = 'uploads/' . $document->id_bidding;
            Storage::disk('public')->deleteDirectory($directory);

            return redirect()->back()->with('success', trans('messages.file_directory_deleted'));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', trans('File not found'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
