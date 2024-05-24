<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Models\UploadedDocument;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentController extends Controller
{
    public function showUploadForm()
    {
        return view('upload.form'); // View que exibe o modal de upload
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document_type' => 'required',
            'document' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png|max:15360',
        ], [
            'document.mimes' => __('messages.invalid_document_type'),
        ]);

        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();

        $document = new Document();
        $document->user_id = auth()->user()->id;
        $document->type_id = $request->input('document_type');
        $document->filename = $fileName;
        $document->document_type_id = $request->input('document_type');
        $document->save();

        $filePath = $file->storeAs('public/documents', $fileName);

        return redirect()->route('dashboard')->with('success', __('messages.document_uploaded'));
    }

    public function destroy($id)
    {
        try {
            $document = UploadedDocument::findOrFail($id);

            // Verificar se o usuário autenticado é o proprietário do documento
            if ($document->user_id !== auth()->user()->id) {
                return redirect()->back()->with('error', __('messages.permission_denied'));
            }

            // Deletar o arquivo físico no armazenamento
            Storage::delete('public/documents/' . $document->file_name);

            // Deletar o registro do banco de dados
            $document->delete();

            return redirect()->back()->with('success', __('messages.document_deleted_successfully'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', __('messages.document_not_found'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('messages.error_deleting_document'));
        }
    }

}
*/
