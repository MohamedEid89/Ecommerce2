<?php

namespace App\Http\Controllers\Dashboard;

use Symfony\Component\Intl\Languages;
use Symfony\Component\Intl\Countries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', [
            'user' => $user,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),

        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'gender' => ['in:male,female'],
            'country' => ['nullable', 'string', 'size:2'],

        ]);
        $user = $request->user();
        $user->profile->fill($request->all())->save();
        // $profile = $user->profile;
        // if ($profile->user_id) {
        //     $profile->update($request->all());
        // } else {
        //     $user->profile()->create($request->all);
        // }
        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile Updated Successfully');
    }
}
