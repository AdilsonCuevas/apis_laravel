<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'], 
            'password' => ['required', 'string'],
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LeCEegiAAAAABXPSH4wHgbLUybKKECI10qUENsN';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                    Session::flash('g-recaptcha-response', 'please check reCaptcha');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute.'google reCaptcha failed');
                }
            }
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect('dashboard');
        }
        return redirect('login')->withSuccess('no se completo el inicio');
    
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['string'],
            'email' => ['required', 'string'], 
            'password' => ['required', 'string', 'min:6'],
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LeCEegiAAAAABXPSH4wHgbLUybKKECI10qUENsN';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                    Session::flash('g-recaptcha-response', 'please check reCaptcha');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute.'google reCaptcha failed');
                }
            }
            
        ]);
        if ($request->get('password') == $request->get('password2')){
            $credentials = $request->only('email', 'password');
            $data = $request->all();
            $check = $this->creacion($data);
            if(Auth::attempt($credentials, false)){
                $request->session()->regenerate();
                return redirect('dashboard');
            }
        }
        return redirect('register')->withSuccess('no se completo el registro');
    }

    public function creacion(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
