<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Title;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RegistrationControllerEng extends Controller
{
    //
    function register(){
        return view('english.register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'ism' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'parol' => 'required|string|min:4',
            
        ]);
    
        try {
            // Create a new User model instance and save it to the database
            $newExpiryDate = Carbon::now()->addMonth();
            User::create([
                'name' => $validatedData['ism'],
                'email' => $validatedData['email'],
                'type' => 'admin',
                'muddat' => $newExpiryDate,
                'password' => Hash::make($validatedData['parol']), // Hash the password
            ]);
    
            return redirect()->route('logineng')->with('success', 'Successfully Saved.');
        } catch (\Exception $e) {
            // Handle any errors that might occur
            return redirect()->back()->withErrors(['error' => 'Error']);
        }
    }
    
}
