<?php

namespace App\Http\Controllers;
use App\Models\Olchamlar;
use Illuminate\Http\Request;

class OlchamlarController extends Controller
{
     //add Olchamlar
     public function olcham()
     {
         $olchams = Olchamlar::all();
         return view('admin.olcham', compact('olchams'));
     }
 
     public function edit($id)
     {
         // Retrieve the specific about section by its ID
         $olchams = Olchamlar::findOrFail($id);
         $olcham = Olchamlar::all();
     
         // Pass the about section to the view
         return view('admin.olchamedit', compact('olchams', 'olcham'));
     }
     
     public function update(Request $request, $id)
     {
         // Validate the incoming request data
         $request->validate([
             'olcham_nomi' => 'required|string|max:255',
         ]);
 
         // Find the Olchamlar by ID
         $olchams = Olchamlar::findOrFail($id);
 
         // Update the Olchamlar's data
         $olchams->olcham_nomi = $request->input('olcham_nomi');
 
         // Save the Olchamlar
         $olchams->save();
 
         // Redirect back with a success message
         return redirect()->route('adminolcham')->with('success', 'Muvaffaqiyatli Saqlandi.');    }
 
     public function delete(Request $request, $id)
     {
         // Retrieve the specific about section by its ID
         $olchams = Olchamlar::findOrFail($id);
 
          // Check if the about section exists
          if (!$olchams) {
             // If the about section does not exist, return a response
             return redirect()->back()->with('error', 'Ma\'lumot topilmadi.');
         }
 
         // Save the changes to the about section
         $olchams->delete();
 
         // Redirect back with a success message
         return redirect()->route('adminolcham')->with('success', 'O`chirildi.');
         }
 
 
         public function store(Request $request)
         {
             // Validate the request data
             $validatedData = $request->validate([
                 'olcham_nomi' => 'required|string|max:255',
             ]);
         
             try {
                 // Create a new Olchamlar model instance and save it to the database
                 Olchamlar::create([
                     'olcham_nomi' => $validatedData['olcham_nomi'],
                 ]);
         
                 return redirect()->route('adminolcham')->with('success', 'Muvaffaqiyatli Saqlandi.');
             } catch (Exception $e) {
                 // Handle any errors that might occur
                 return redirect()->back()->withErrors(['error' => 'Xatolik']);
             }
         }
     //add Olchamlar
}

