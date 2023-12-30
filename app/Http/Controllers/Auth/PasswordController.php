<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\File;



class PasswordController extends Controller
{

    public function updatepassword(Request $request): RedirectResponse
    {
        $validator = \Validator::make($request->all(), [
            'new_password' => 'required|confirmed|min:8',
        ]);
        $user = $request->user();
        if (!$validator->fails() && $user->password != null) {
            $validator->addRules([
                'old_password' => 'required',
            ]);
            $validated = $validator->validate();
            if (!Hash::check($validated['old_password'], $user->password)) {
                return redirect('dashboard')->with('error', 'Incorrect current password.');
            }
        }
        if ($validator->fails()) {
            return redirect('dashboard')->with('error', 'Confirm Password Not Matched.')->withErrors($validator)->withInput();
        }
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);
        return redirect('dashboard')->with('success', 'Password updated successfully.');
    }


    public function updateusername(Request $request){
        $validated = $request->validate([
            "new_name" => "required|string",
        ]);
        $user = $request->user();
        $user->update([
            'name' => $validated['new_name'],
        ]);
        return response()->json(['success' => true, 'message' => 'Name updated successfully.']);
    }

}
