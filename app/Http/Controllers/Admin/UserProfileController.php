<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change_password()
    {
        return view('admin.change-password');
    }

    public function update_password(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'old_password' => [
                'required',

                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Your password was not updated, since the provided old password does not match.');
                    }
                }
            ],
            'password' => [
                'required', 'min:6', 'confirmed', 'different:old_password'
            ]
        ]);

        $user->fill([
            'password' => Hash::make($validated['password'])
        ])->save();

        $request->session()->flash('notification', 'Your password has been updated successfully.');

        return back();
    }
}
