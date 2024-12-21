<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoReply;

class AutoReplyController extends Controller
{
    public function index()
    {
        $autoReplies = AutoReply::paginate(10); // Ambil data AutoReply dengan pagination
        return view('auto-reply.index', compact('autoReplies')); // Kirim data ke view
    }

    public function create()
    {
        return view('auto-reply.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|unique:auto_replies',
            'response' => 'required|string',
        ]);

        AutoReply::create($request->all());

        return redirect()->route('wa.auto-reply.index')->with('success', 'Auto Reply berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $autoReply = AutoReply::findOrFail($id);
        return view('auto-reply.edit', compact('autoReply'));
    }

    public function update(Request $request, $id)
    {
        $autoReply = AutoReply::findOrFail($id);

        $request->validate([
            'keyword' => 'required|string|unique:auto_replies,keyword,' . $autoReply->id,
            'response' => 'required|string',
        ]);

        $autoReply->update($request->all());

        return redirect()->route('wa.auto-reply.index')->with('success', 'Auto Reply berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $autoReply = AutoReply::findOrFail($id);
        $autoReply->delete();

        return redirect()->route('wa.auto-reply.index')->with('success', 'Auto Reply berhasil dihapus.');
    }
}
