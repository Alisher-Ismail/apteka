<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kirim;
use App\Models\Tovar;
use App\Models\Olchamlar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class KirimController extends Controller
{
    //
    //add Kirim
    public function kirimtugagan()
    {
        $today = Carbon::today();
        $tovars = Tovar::all();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '=', 0)
                  ->Where('dona', '=', 0);
        })
        ->orwhere('muddati', '<', $today)
        ->get();
        $olchams = Olchamlar::all();
        return view('admin.kirim_tugagan', compact('kirims', 'olchams', 'tovars'));
    }
    
    public function kirimbor()
    {
        $today = Carbon::today();
        $tovars = Tovar::all();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>=', $today)
        ->get();
        $olchams = Olchamlar::all();
        return view('admin.kirim_bor', compact('kirims', 'olchams', 'tovars'));
    }

        public function kirim()
    {
        $today = Carbon::today();
        $tovars = Tovar::all();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>', $today)
        ->get();
        $olchams = Olchamlar::all();
        return view('admin.kirim', compact('kirims', 'olchams', 'tovars'));
    }

    public function kirimscan()
    {
        $today = Carbon::today();
        $tovars = Tovar::all();
        $kirims = Kirim::where(function($query) {
            $query->where('miqdori', '>', 0)
                  ->orWhere('dona', '>', 0);
        })
        ->where('muddati', '>', $today)
        ->get();
        $olchams = Olchamlar::all();
        return view('admin.kirim_scan', compact('kirims', 'olchams', 'tovars'));
    }

    
    public function delete(Request $request, $id)
    {
        // Retrieve the specific about section by its ID
        $kirims = Kirim::findOrFail($id);

         // Check if the about section exists
         if (!$kirims) {
            // If the about section does not exist, return a response
            return redirect()->back()->with('error', 'Ma\'lumot topilmadi.');
        }

        // Save the changes to the about section
        $kirims->delete();

        // Redirect back with a success message
        return redirect()->route('adminkirim')->with('success', 'O`chirildi.');
        }



public function store(Request $request)
{
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
        ]);

        return 'Muvaffaqiyatli Saqlandi';
    } catch (ModelNotFoundException $e) {
        // Handle model not found exception (e.g., return 404 Not Found)
        abort(404);
    } catch (\Exception $e) {
        // Handle other exceptions
        return 'Xatolik';
    }
}

public function storescan(Request $request)
{
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
        ]);

        return 'Muvaffaqiyatli saqlandi';
    } catch (ModelNotFoundException $e) {
        // Handle model not found exception (e.g., return 404 Not Found)
        abort(404);
    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect()->back()->withErrors(['error' => 'Xatolik']);
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
        return 'O`chirildi';
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error deleting selected items: ' . $e->getMessage());

        // Return an error response
        return 'Internal Server Error';
    }
}
    //add Kirim
}
