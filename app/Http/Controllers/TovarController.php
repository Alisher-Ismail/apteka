<?php

namespace App\Http\Controllers;
use App\Models\Tovar;
use App\Models\Olchamlar;
use Illuminate\Http\Request;

class TovarController extends Controller
{   
    //check barcode exists
    public function checkBarcode(Request $request)
{   

    $id = $request->input('id');
    $count = Tovar::where('barcode', $id)->count();
    
    if ($count == 0) {
        return response()->json('success');
    } else {
        return response()->json('Bu shtrix kod ba`zaga kiritilgan!');
    }
}

    //add tovar
    public function tovar()
    {   
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        $tovars = Tovar::where('firmaid', $userId)->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();
        return view('admin.tovar', compact('tovars', 'olchams'));
    }

    public function edit($id)
    {
        // Retrieve the specific about section by its ID
        $tovar = Tovar::findOrFail($id);
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        $tovars = Tovar::where('firmaid', $userId)->get();
        $olchams = Olchamlar::where('firmaid', $userId)->get();

        // Pass the about section to the view
        return view('admin.tovaredit', compact('tovars', 'tovar', 'olchams'));
    }
    
    public function update(Request $request, $id)
    {   
        
        // Validate the incoming request data
        $request->validate([
            //'barcode' => 'required|string|max:555|unique:tovar,barcode,'.$id,
            'materialnomi' => 'required|string|max:555',
            'olchamid' => 'required|integer',
            'OlinganNarxi' => 'required|integer',
            'SotilishNarx' => 'required|integer',
            'Pachkadanechta' => 'required|integer',
            'DonaOlinganNarxi' => 'required|integer',
            'DonaSotilishNarx' => 'required|integer',
        ]);
    
        try {

            $user = auth()->user();
    $userId = 0;
    if($user->type == 'admin'){
        $userId = $user->id;     
    }else{
        $userId = $user->firmaid;
    }
    $tovarchek = Tovar::where('barcode', $request->input('barcode'))->where('firmaid', $userId)->first();
        if($tovarchek){
            return redirect()->back()->withErrors(['error' => 'Bu shtrix kod bazaga kiritilgan']);
        }
        else{
            // Find the Tovar by ID
            $tovar = Tovar::findOrFail($id);
    
            // Update the Tovar's data
            $tovar->nomi = $request->input('materialnomi');
            $tovar->olingannarx = $request->input('OlinganNarxi');
            $tovar->sotilgannarx = $request->input('SotilishNarx');
            $tovar->olchovid = $request->input('olchamid');
            $tovar->barcode = $request->input('barcode');
            $tovar->donasoni = $request->input('Pachkadanechta');
            $tovar->dolingannarx = $request->input('DonaOlinganNarxi');
            $tovar->dsotilgannarx = $request->input('DonaSotilishNarx');
    
            // Save the Tovar
            $tovar->save();
    
            // Redirect back with a success message
            return redirect()->route('admintovar')->with('success', 'Muvaffaqiyatli Saqlandi.');
        }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Tovar is not found
            return redirect()->back()->withErrors(['error' => 'Tovar topilmadi']);
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->withErrors(['error' => 'Xatolik']);
        }
    }
    
    public function delete(Request $request, $id)
    {
        // Retrieve the specific about section by its ID
        $tovars = Tovar::findOrFail($id);

         // Check if the about section exists
         if (!$tovars) {
            // If the about section does not exist, return a response
            return redirect()->back()->with('error', 'Ma\'lumot topilmadi.');
        }

        // Save the changes to the about section
        $tovars->delete();

        // Redirect back with a success message
        return redirect()->route('admintovar')->with('success', 'O`chirildi.');
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

    // Validate the request data
    $validatedData = $request->validate([
        //'barcode' => 'required|string|max:555|unique:tovar',
        'materialnomi' => 'required|string|max:555',
        'olchamid' => 'required|integer',
        'OlinganNarxi' => 'required|integer',
        'SotilishNarx' => 'required|integer',
        'Pachkadanechta' => 'required|integer',
        'DonaOlinganNarxi' => 'required|integer',
        'DonaSotilishNarx' => 'required|integer',
    ]);

    try {
        
        $tovarchek = Tovar::where('barcode', $request['barcode'])->where('firmaid', $userId)->first();
        if($tovarchek){
            return redirect()->back()->withErrors(['error' => 'Bu shtrix kod bazaga kiritilgan']);
        }
        else{
        // Create a new Tovar model instance and save it to the database
        Tovar::create([
            'barcode' => $request['barcode'],
            'nomi' => $validatedData['materialnomi'],
            'olingannarx' => $validatedData['OlinganNarxi'],
            'sotilgannarx' => $validatedData['SotilishNarx'],
            'olchovid' => $validatedData['olchamid'],
            'donasoni' => $validatedData['Pachkadanechta'],
            'dolingannarx' => $validatedData['DonaOlinganNarxi'],
            'dsotilgannarx' => $validatedData['DonaSotilishNarx'],
            'firmaid' => $userId,
        ]);

        return redirect()->route('admintovar')->with('success', 'Muvaffaqiyatli Saqlandi.');
    }
    } catch (Exception $e) {
        // Handle any errors that might occur
        return redirect()->back()->withErrors(['error' => 'Xatolik']);
    }
}

    //add tovar
}
