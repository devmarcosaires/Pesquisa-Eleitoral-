<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Throwable;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:states_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:states_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:states_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:states_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::orderBy('title')->paginate(25);

        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            $this->rules($request)
        );

        $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['title']);

        State::create($inputs);

        return redirect()->route('states.index')
            ->with('success', 'Registro adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $state = State::findOrFail($id);

        return view('states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $state = State::findOrFail($id);

        return view('states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $state = State::findOrFail($id);

        $this->validate(
            $request,
            $this->rules($request, $id)
        );

        $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['title']);

        $state->fill($inputs)->save();

        return redirect()->route('states.index')
            ->with('success', 'Registro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $state = State::findOrFail($id);
        try {
            $state->delete();
            return redirect()->route('states.index')
                ->with('success', 'Registro atualizado com sucesso.');
        } catch (Throwable $th) {
            return redirect()->route('states.index')
                ->with('error', 'Não foi possível deletar esse registro.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'title' => ['required', 'max:40'],
            'letter' => ['required', 'max:2', Rule::unique('states')->ignore($primaryKey)],
            'iso' => ['required'],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
