<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Muddat;
use Carbon\Carbon;

class MuddatControllerRu extends Controller
{
    //
    public function showForm()
    {
        return view('muddatru');
    }

    public function handleForm(Request $request)
    {
        $validated = $request->validate([
            'Litsenziya' => 'required|string',
        ]);

        $user = User::all();
        $mudd = Muddat::where('parol', $validated['Litsenziya'])->where('used', '0')->first();
        if ($mudd) {
            // Mark as used if found
            $mudd->used = 1;
            $mudd->save();

            // Update the expiration date for all users
            $newExpiryDate = Carbon::now()->addMonth();
            $users = User::all();
            foreach ($users as $user) {
                $user->muddat = $newExpiryDate;
                $user->save();
            }

            return view('russian.login');
        } else {
            return redirect()->back()->withErrors(['Litsenziya' => 'Лицензия не найдена или уже использована.']);
        }
    }
}
