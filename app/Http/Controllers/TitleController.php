<?php

namespace App\Http\Controllers;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    //add Title
    public function title()
    {
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        

        $titles = Title::where('firmaid', $userId)->get();
        return view('admin.title', compact('titles'));
    }

    public function edit($id)
    {
        // Retrieve the specific about section by its ID
        $titles = Title::findOrFail($id);
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        

        $title2 = Title::where('firmaid', $userId)->get();
    
        // Pass the about section to the view
        return view('admin.titledit', compact('titles', 'title2'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Find the Title by ID
        $title = Title::findOrFail($id);

        // Update the Title's data
        $title->title = $request->input('title');
     
        // Save the Title
        $title->save();

        // Redirect back with a success message
        return redirect()->route('admintitle')->with('success', 'Muvaffaqiyatli Saqlandi!');    
    }

    public function delete(Request $request, $id)
    {
        // Retrieve the specific about section by its ID
        $title = Title::findOrFail($id);

         // Check if the about section exists
         if (!$title) {
            // If the about section does not exist, return a response
            return redirect()->back()->with('error', 'topilmadi.');
        }

        // Save the changes to the about section
        $title->delete();

        // Redirect back with a success message
        return redirect()->route('admintitle')->with('success', 'O`chirildi!');
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
                'title' => 'required|string|max:255'
            ]);
        
            try {
                // Create a new Title model instance and save it to the database
                Title::create([
                    'title' => $validatedData['title'],
                    'firmaid' => $userId,
                ]);
        
                return redirect()->route('admintitle')->with('success', 'Muvaffaqiyatli Saqlandi!');
            } catch (\Exception $e) {
                // Handle any errors that might occur
                return redirect()->back()->withErrors(['error' => 'Xatolik']);
            }
        }
    //add Title
}
