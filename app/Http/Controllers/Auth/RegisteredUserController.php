<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Districts;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            "user_type" => "required"
        ]);
        if ($request->user_type == "user") {
            $user = User::create([
                'name' => $request->f_name . " " . $request->l_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                "user_type" => $request->user_type
            ]);
            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } else if ($request->user_type == "company") {
            $request->validate([
                'fiscal_id' => ['required'],
                'vat_code' => ['required'],
                'tax_code' => ['required'],
                'company_name' => ['required'],
                'postal_code' => ['required'],
                'ben_code' => ['required'],
                'pec_code' => ['required'],
            ]);
            $company = Company::create([
                'name' => $request->f_name . " " . $request->l_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                "user_type" => $request->user_type,
                "fiscal_id" => $request->fiscal_id,
                "vat_code" => $request->vat_code,
                "tax_code" => $request->tax_code,
                "company_name" => $request->company_name,
                "postal_code" => $request->postal_code,
                "ben_code" => $request->ben_code,
                "pec_code" => $request->pec_code,
            ]);

            $user = User::create([
                'name' => $request->f_name . " " . $request->l_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                "user_type" => $request->user_type
            ]);
            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
