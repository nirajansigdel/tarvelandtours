<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    /**
     * Backend - List all FAQs with pagination
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('backend.faq.index', compact('faqs'));
    }

    /**
     * Backend - Show create form
     */
    public function create()
    {
        return view('backend.faq.create');
    }

    /**
     * Backend - Store new FAQ
     */
  public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string|in:procurement,general',
        'heading' => 'required|string|max:255',
        'question' => 'required|string',
        'answer' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['type', 'heading', 'question', 'answer']);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/faqs'), $imageName);
        $data['image'] = $imageName;
    }

    Faq::create($data);

    return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
}


    /**
     * Backend - Show edit form
     */
    public function edit(Faq $faq)
    {
        return view('backend.faq.edit', compact('faq'));
    }

    /**
     * Backend - Update existing FAQ
     */
public function update(Request $request, Faq $faq)
{
    $request->validate([
        'type' => 'required|string|in:procurement,general',
        'heading' => 'required|string|max:255',
        'question' => 'required|string',
        'answer' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['type', 'heading', 'question', 'answer']);

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($faq->image && file_exists(public_path('uploads/faqs/' . $faq->image))) {
            unlink(public_path('uploads/faqs/' . $faq->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/faqs'), $imageName);
        $data['image'] = $imageName;
    }

    $faq->update($data);

    return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
}



    /**
     * Backend - Delete FAQ
     */
    public function destroy(Faq $faq)
{
    // Delete image if exists in public/uploads/faqs
    if ($faq->image && file_exists(public_path('uploads/faqs/' . $faq->image))) {
        unlink(public_path('uploads/faqs/' . $faq->image));
    }

    $faq->delete();

    return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
}


    /**
     * Frontend - Display FAQs dynamically
     */
    public function frontendIndex()
    {
        $faqs = Faq::latest()->get();
        return view('frontend.faq.index', compact('faqs'));
    }
}
