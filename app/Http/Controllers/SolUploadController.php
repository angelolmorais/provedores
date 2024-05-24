<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; 

class SolUploadController extends Controller
{
    public function storeUploads(Request $request)
    {
        
        // Validação dos dados do formulário
         $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_bidding' => 'required',
            'id_information' => 'required',
            'file_description' => 'required',
            'document' => 'required|file|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Processamento do arquivo
        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName();

        

        // Salvar o arquivo no armazenamento
        $path = $file->storeAs('public/uploads/' . $request->input('id_bidding'), $fileName);

        // Criar uma nova instância de Upload
        $information = new Upload([
            'id_user' => $request->input('id_user'),
            'id_bidding' => $request->input('id_bidding'),
            'id_information' => $request->input('id_information'),
            'file_description' => $request->input('file_description'),
            'file_name' => $fileName,
            'file_path' => $path,
            'file_size' => $file->getSize(),
        ]);

        try {
            // Salvar o registro do Upload no banco de dados
            $information->save();
            return redirect()->back()->with('success', trans('messages.file_uploaded_successfully'));

        } catch (\Exception $e) {
            // Lidar com erros
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function view($id)
    {
        try {
            $information = Upload::findOrFail($id);

            return response()->file(storage_path('app/' . $information->file_path));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', trans('File not found'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $information = Upload::findOrFail($id);

            if (auth()->user()->id !== $information->id_user) {
                return redirect()->back()->with('error', __('messages.permission_denied'));
            }

            Storage::disk('public')->delete($information->file_path);

            $information->delete();

            $directory = 'uploads/' . $information->id_bidding;
            Storage::disk('public')->deleteDirectory($directory);

            return redirect()->back()->with('success', trans('messages.file_directory_deleted'));

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', trans('File not found'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
