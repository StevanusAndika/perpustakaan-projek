<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Load category data (for AJAX).
     */
    public function loadData()
    {
        $categories = Kategori::orderBy('created_at', 'DESC')->paginate(20);

        return response()->json($categories);
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:kategoris,nama',

            'deskripsi' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Kategori::create([
            'id' => Str::uuid(),
            'nama' => $request->input('category_name'),
            'deskripsi' => $request->input('description'),
            'created_by' => Auth::user()->email,
            'updated_by' => null,
        ]);

        return response()->json(['success' => 'Kategori berhasil ditambahkan'], 201);
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:kategoris,category_name,',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category->update([
            'nama' => $request->input('category_name'),
            'deskripsi' => $request->input('description'),
            'updated_by' => Auth::user()->email,
        ]);

        return response()->json(['success' => 'Kategori berhasil diperbarui']);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'Kategori berhasil dihapus']);
    }
}
