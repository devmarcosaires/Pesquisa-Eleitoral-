<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Mandates;
use Illuminate\Http\Request;

class MandatesController extends BaseController
{
    /*
    public function __construct()
    {
        $this->middleware('permission:mandates_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:mandates_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mandates_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mandates_delete', ['only' => ['destroy']]);
         
    }
    */
    
    //Resource preview page
    public function index()
    {
        $mandates = Mandates::all();
        return view('mandates.index', compact('mandates'));
    }

    // Mandate viewing page.
    public function show(Mandates $mandate)
    {
        return view('mandates.show', compact('mandate'));
    }

    // Show the form for creating a new mandate.
    public function create()
    {
        return view('mandates.create');
    }

    //Resource editing page
    public function edit(Mandates $mandate)
    {
        return view('mandates.edit', compact('mandate'));
    }

    // Delete a mandate
    public function destroy(Mandates $mandate)
    {
        $mandate->delete();
        return redirect()->route('mandates.index')->with('success', 'Mandate excluído com sucesso.');
    }

    // Creates a new mandate 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'active' => 'required|in:0,1',
        ]);

        Mandates::create($data);

        return redirect()->route('mandates.index');
    }
    
    // Changes a mandate
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'boolean',
        ]);

        $mandate = Mandates::findOrFail($id);

        $mandate->update([
            'name' => $data['name'],
            'active' => $data['active'],
        ]);

        return redirect()->route('mandates.index')->with('success', 'Mandato atualizado com sucesso!');
    }
}
