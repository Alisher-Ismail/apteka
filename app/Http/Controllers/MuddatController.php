<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Muddat;
use Carbon\Carbon;

class MuddatController extends Controller
{
    //
    public function showForm()
    {
        return view('muddat');
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

            return view('admin.login');
        } else {
            return redirect()->back()->withErrors(['Litsenziya' => 'Litsenziya topilmadi yoki allaqachon ishlatilgan.']);
        }
    }
}
