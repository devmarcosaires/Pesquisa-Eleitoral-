<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Throwable;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:roles_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:roles_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('description')->paginate(25);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::defaultPermissions();

        return view('roles.create', compact('permissions'));
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

        $role = Role::create($inputs);

        $role->givePermissionTo($request->permissions);

        return redirect()->route('roles.index')
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
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Permission::defaultPermissions();

        return view('roles.edit', compact('role', 'permissions'));
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
        $role = Role::findOrFail($id);

        $this->validate(
            $request,
            $this->rules($request, $id)
        );

        $inputs = $request->all();

        $role->fill($inputs)->save();

        $role->permissions()->detach();
        $role->givePermissionTo($request->permissions);

        return redirect()->route('roles.index')
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
        $role = Role::findOrFail($id);
        try {
            $role->delete();
            return redirect()->route('roles.index')
                ->with('success', 'Registro atualizado com sucesso.');
        } catch (Throwable $th) {
            return redirect()->route('roles.index')
                ->with('error', 'Não foi possível deletar esse registro.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required', 'max:125', Rule::unique('roles')->ignore($primaryKey)],
            'description' => ['required', 'string', 'max:125'],
            'permissions' => ['required', 'array']
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }

}
