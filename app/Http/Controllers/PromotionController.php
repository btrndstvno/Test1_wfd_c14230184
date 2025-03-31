<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::paginate(10);
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $promotion = new Promotion();
        $promotion->title = $request->title;
        $promotion->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public'); // simpan file ke public/storage/uploads
            $promotion->image = $path;
        }

        $promotion->save();

        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil ditambahkan!');
    }

    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $promotion->title = $request->title;
        $promotion->description = $request->description;

        if ($request->hasFile('image')) {
            $promotion->image = $request->file('image')->store('uploads', 'public');
        }

        $promotion->save();

        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil diperbarui!');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil dihapus!');
    }

}
