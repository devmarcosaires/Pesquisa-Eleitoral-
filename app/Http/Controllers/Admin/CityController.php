<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cities_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cities_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cities_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:cities_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('state')->orderBy('title')->paginate(25);

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::orderBy('title')->get(['title', 'id']);

        return view('cities.create', compact('states'));
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

        City::create($inputs);

        return redirect()->route('cities.index')
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
        $city = City::with('state')->findOrFail($id);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $city = City::findOrFail($id);

        $states = State::orderBy('title')->get(['title', 'id']);

        return view('cities.edit', compact('city', 'states'));
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
        $state = City::findOrFail($id);

        $this->validate(
            $request,
            $this->rules($request, $id)
        );

        $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['title']);

        $state->fill($inputs)->save();

        return redirect()->route('cities.index')
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
        $state = City::findOrFail($id);
        try {
            $state->delete();
            return redirect()->route('cities.index')
                ->with('success', 'Registro atualizado com sucesso.');
        } catch (Throwable $th) {
            return redirect()->route('cities.index')
                ->with('error', 'Não foi possível deletar esse registro.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'title' => ['required', 'max:40'],
            'iso_ddd' => ['required', 'max:2'],
            'iso' => ['required'],
            'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'long' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'state_id' => ['required'],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
