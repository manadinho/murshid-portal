<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function showAvatar($username) : View
    {
        return view('profile.avatar')->with('username', $username);
    }

    public function generateAvatar($username)
    {
        $initial = strtoupper(substr($username, 0, 1));
        $background = 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';
        $image = Image::canvas(100, 100, $background);
        $fontPath = public_path('fonts/futra.ttf');
        $image->text($initial, 50, 50, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(60); 
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('middle');
        });
        $response = response($image->encode('png'));
        $response->header('Content-Type', 'image/png');
        return $response;
    }

}
