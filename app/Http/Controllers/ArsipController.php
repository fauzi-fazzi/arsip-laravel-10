<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// buat manggil lirary

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.arsip.index', [
            'title' => 'Dokumen',
            'arsip' => Arsip::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.arsip.create', [
            'title' => 'Dokumen',
            'arsip' => Arsip::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_upload' => 'required|date',
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        $validatedData['kategori'] = $request->input('kategori');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $existingFile = Arsip::where('file', $fileName)->first();

            if ($existingFile) {
                return redirect()->back()->with('error', 'File ' . $fileName . ' sudah ada.');
                // return dd('error', 'File dengan nama ' . $fileName . ' sudah ada.');
            }

            $filePath = $file->storeAs('uploads', $fileName);
            $validatedData['file'] = basename($filePath);
        }

        Arsip::create($validatedData);

        return redirect('/arsip')->with('success', 'Arsip berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = Arsip::findOrFail($id);
        $filePath = $arsip->file;

        if (Storage::exists('uploads/' . $filePath)) {
            $file = Storage::get('uploads/' . $filePath);
            $fileType = Storage::mimeType('uploads/' . $filePath);

            $response = response($file, 200)
                ->header('Content-Type', $fileType)
                ->header('Content-Disposition', 'attachment; filename="' . $arsip->file . '"');

            return $response;
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);

        return view('menu.arsip.edit', [
            'title' => 'Edit Dokumen',
            'arsip' => $arsip,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tgl_upload' => 'required|date',
            'kategori' => 'required',
            'keterangan' => 'required',
            'file' => 'nullable|mimes:pdf',
        ]);

        $arsip = Arsip::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName);
            $validatedData['file'] = $fileName;

            // Hapus file lama jika ada
            $oldFilePath = 'uploads/' . $arsip->file;
            if (Storage::exists($oldFilePath)) {
                Storage::delete($oldFilePath);
            }
        }

        $arsip->update($validatedData);

        return redirect('/arsip')->with('success', 'Arsip berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $arsip = Arsip::findOrFail($id);

        Storage::delete('uploads/' . $arsip->file);

        $arsip->delete();

        return redirect('/arsip')->with('success', 'Arsip berhasil dihapus.');
    }
}
