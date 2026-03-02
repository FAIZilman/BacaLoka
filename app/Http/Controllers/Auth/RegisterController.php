<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        // @dd($request->ip());
        return view('auth/register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'confirmed:password_confirmation', Password::min(8)]
        ]);

        if ($validator->fails()) {
            notify()
                ->error()
                ->title('Anda Gagal Register!')
                ->send();
            return back()->withErrors($validator)
                ->withInput();
        }

        try {
            $user = DB::table('users')->insertGetId([
                'name' => $request->string('name')->trim()->ucwords(),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('email')),
                'role' => 'user'
            ]);

            Auth::loginUsingId($user);
            notify()
                ->success()
                ->title('Anda Berhasil Login!')
                ->send();
            return redirect()->intended('');


        } catch (\Illuminate\Database\QueryException $e) {
            // dd($e->getMessage());
            notify()
                ->error()
                ->title('Anda Gagal Register!')
                ->send();
            return back();
        }
        // return view('auth/register');
    }
}