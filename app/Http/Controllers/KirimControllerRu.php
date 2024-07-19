<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kirim;
use App\Models\Tovar;
use App\Models\Olchamlar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class KirimControllerRu extends Controller
{
    //
    //add Kirim
    public function kirimtugagan()
    {   
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

        $today = Carbon::today();
        $tovars = Tovar::where('firmaid', $userId)->get();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '=', 0)
                  ->Where('dona', '=', 0);
        })
        ->orwhere('muddati', '<', $today)
        ->where('firmaid', $userId)
        ->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();
        return view('russian.kirim_tugagan', compact('kirims', 'olchams', 'tovars'));
    }
    
    public function kirimbor()
    {   
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

        $today = Carbon::today();
        $tovars = Tovar::where('firmaid', $userId)->get();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>=', $today)
        ->where('firmaid', $userId)
        ->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();
        return view('russian.kirim_bor', compact('kirims', 'olchams', 'tovars'));
    }

        public function kirim()
    {
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

        $today = Carbon::today();
        $tovars = Tovar::where('firmaid', $userId)->get();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>', $today)
        ->where('firmaid', $userId)
        ->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();
        return view('russian.kirim', compact('kirims', 'olchams', 'tovars'));
    }

    public function kirimscan()
    {
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

        $today = Carbon::today();
        $tovars = Tovar::where('firmaid', $userId)->get();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>', $today)
        ->where('firmaid', $userId)
        ->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();
        return view('russian.kirim_scan', compact('kirims', 'olchams', 'tovars'));
    }

    
    public function delete(Request $request, $id)
    {
        // Retrieve the specific about section by its ID
        $kirims = Kirim::findOrFail($id);

         // Check if the about section exists
         if (!$kirims) {
            // If the about section does not exist, return a response
            return redirect()->back()->with('error', 'Информация не найдена.');
        }

        // Save the changes to the about section
        $kirims->delete();

        // Redirect back with a success message
        return redirect()->route('adminkirimru')->with('success', 'Удалено.');
        }



public function store(Request $request)
{   
    $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

    try {
        // Validate the request data
        $validatedData = $request->validate([
            'tovarid' => 'required|integer',
            'Nechta' => 'required|integer',
            'Nechtadona' => 'required|integer',
            'muddat' => 'required|date',
        ]);

        // Find the Tovar model or throw a ModelNotFoundException
        $tovars = Tovar::findOrFail($validatedData['tovarid']);
        $donanechta = $tovars->donasoni;
        $donaumumiy = $validatedData['Nechta'] * $donanechta;

        // Create a new Kirim model instance and save it to the database
        Kirim::create([
            'tovar_id' => $validatedData['tovarid'],
            'miqdori' => $validatedData['Nechta'],
            'dona' => $validatedData['Nechtadona'] + $donaumumiy,
            'muddati' => $validatedData['muddat'],
            'firmaid' => $userId,
        ]);

        return 'Сохранено успешно.';
    } catch (ModelNotFoundException $e) {
        // Handle model not found exception (e.g., return 404 Not Found)
        abort(404);
    } catch (\Exception $e) {
        // Handle other exceptions
        return 'Ошибка';
    }
}

public function storescan(Request $request)
{   
    $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }

    try {
        // Validate the request data
        $validatedData = $request->validate([
            'tovarid' => 'required|integer',
            'Nechta' => 'required|integer',
            'Nechtadona' => 'required|integer',
            'muddat' => 'required|date',
        ]);

        // Find the Tovar model or throw a ModelNotFoundException
        $tovars = Tovar::findOrFail($validatedData['tovarid']);
        $donanechta = $tovars->donasoni;
        $donaumumiy = $validatedData['Nechta'] * $donanechta;

        // Create a new Kirim model instance and save it to the database
        Kirim::create([
            'tovar_id' => $validatedData['tovarid'],
            'miqdori' => $validatedData['Nechta'],
            'dona' => $validatedData['Nechtadona'] + $donaumumiy,
            'muddati' => $validatedData['muddat'],
            'firmaid' => $userId,
        ]);

        return 'Сохранено успешно.';
    } catch (ModelNotFoundException $e) {
        // Handle model not found exception (e.g., return 404 Not Found)
        abort(404);
    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect()->back()->withErrors(['error' => 'Ошибка']);
    }
}

public function deletescan(Request $request)
{
    try {
        // Retrieve selected IDs from the request
        $selectedIds = $request->selectedIds;
        
        //if(strlen($selectedIds) > 0){
        // Perform deletion for each selected ID
        foreach ($selectedIds as $id) {
            // Find the Kirim record by ID and delete it
            $kirim = Kirim::find($id);
            if ($kirim) {
                $kirim->delete();
            }
        }
    //}else{
    //    return 'Tanlang!';
    //}

        // Return a success response
        return 'Удалено';
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error deleting selected items: ' . $e->getMessage());

        // Return an error response
        return 'Internal Server Error';
    }
}
    //add Kirim
}
