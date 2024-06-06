<?php
namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function loginpage(){
        return Inertia::render('Login');
     }
    //  function home(){
    //     $data =['successMessage'=>"Arifur",'errorMessage'=>'300'];
    //     return Inertia::render('Empty')->with($data);
    //  }
     function registrationpage(){
        return Inertia::render('Registration')->with('message','Please Register To Continue');
     }
     public function registration(Request $request)
     {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            // Auth::login($user);

            return redirect()->intended('/login')->with('message', 'Registration successful!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->with('message', 'Registration failed! Please check your form.');
        } catch (Exception $e) {
            return back()->with('message', 'An unexpected error occurred. Please try again.');
        }
     }

     function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Login successful!');
        };

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput()->with('message', 'Login failed! Please check your credentials.');
    }


     public function logout(Request $request)
     {
         Auth::guard('web')->logout();

         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect('/login')->with('success', 'Logged out successfully!');
     }


}
