<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::with('roles')->findOrFail(auth()->id());

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, $this->rules($request, auth()->id()));

        DB::beginTransaction();
        $inputs = $request->all();

        $user = User::find(auth()->id());

        $user->fill($inputs)->save();
        DB::commit();

        return redirect()->route('profile.edit')
            ->with('success', 'Perfil atualizado com sucesso.');
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required', 'max:120'],
            'phone' => ['required', 'max:11'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($primaryKey)],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }

}
