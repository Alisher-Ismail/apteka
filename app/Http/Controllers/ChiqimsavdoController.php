<?php

namespace App\Http\Controllers;
use App\Models\Chiqimsavdo;
use App\Models\Tovar;
use App\Models\Kirim;
use App\Models\Olchamlar;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChiqimsavdoController extends Controller
{
    //
     //add Kirim
     public function chiqimbugunson()
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
         $olchams = Olchamlar::where('firmaid', $userId)->get();
         $users = User::where('firmaid', $userId)->orwhere('id', $userId)->get();
         $chiqim = Chiqimsavdo::where('firmaid', $userId)->where('sotildi', 1)->whereDate('created_at', $today)->get();
         return view('admin.chiqim_bugun_son', compact('olchams', 'tovars', 'users', 'chiqim'));
     }
          public function chiqimbugun()
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
     $olchams = Olchamlar::where('firmaid', $userId)->get();
     $users = User::where('firmaid', $userId)->orwhere('id', $userId)->get();
         $chiqim = Chiqimsavdo::where('firmaid', $userId)->where('sotildi', 1)->whereDate('created_at', $today)->get();
         return view('admin.chiqim_bugun', compact('olchams', 'tovars', 'users', 'chiqim'));
     }
     
     public function chiqim()
     {  
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        $tovars = Tovar::where('firmaid', $userId)->get();
        $kirims = Kirim::where('firmaid', $userId)->where('muddati', '>', now())->orderBy('muddati', 'desc')->get();

         $olchams = Olchamlar::where('firmaid', $userId)->get();
         $chiqims = Chiqimsavdo::where('firmaid', $userId)->get();
         $chiqim = Chiqimsavdo::where('firmaid', $userId)->where('sotildi', 0)->get();
         return view('admin.chiqim', compact('kirims', 'olchams', 'tovars', 'chiqims', 'chiqim'));
     }

     public function chiqimsana(){
        return view('admin.chiqimsana');        
     }

     public function chiqimsanason(){
        return view('admin.chiqimsana_son');        
     }

     public function sotildi()
     {
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
         // Retrieve all records where 'sotildi' is 0
         $users = Chiqimsavdo::where('firmaid', $userId)->where('sotildi', 0)->get();
     
         // Check if any records were found
         if ($users->isEmpty()) {
             // If no records are found, return a response
             return redirect()->back()->with('error', 'Topilmadi.');
         }
     
         // Iterate through each record and update the 'sotildi' field
         foreach ($users as $user) {
             $user->sotildi = 1;
             $user->save();
         }
     
         // Redirect back with a success message
         return redirect()->route('adminchiqim')->with('success', 'Sotildi.');
     }
     

     public function delete(Request $request, $id)
     {
        
         // Retrieve the specific about section by its ID
         $user = Chiqimsavdo::findOrFail($id);
         $miqdori = $user->miqdori;   
         $miqdoridona = $user->miqdoridona;
         $tovar_id = $user->tovar_id;
         ///////////////////////////////////
         $tovar = Tovar::findOrFail($tovar_id);
         $tdona = $tovar->donasoni;
         //////////////////////////////////
         $ombor = Kirim::where('tovar_id', $tovar_id)->where('muddati', '>', now())->orderBy('muddati', 'desc')
         ->first();
         $omborid = $ombor->id;
         $ombormiq2 = $ombor->dona;
         $yangimiqdor2 = $ombormiq2 + $miqdoridona + ($miqdori * $tdona);

         $ombormiq = $ombor->miqdori;
         $yangimiqdor = 0;
         if($miqdoridona > 0){
            $yangimiqdor = intval($yangimiqdor2 / $tdona);//calculating dona then putting back to its original place
         }else{
            $yangimiqdor = $ombormiq + $miqdori;
         }
         
         $ombor->dona = $yangimiqdor2;
         $ombor->miqdori = $yangimiqdor;
         $ombor->save();

          // Check if the about section exists
          if (!$user) {
             // If the about section does not exist, return a response
             return redirect()->back()->with('error', 'Topilmadi.');
         }
 
         // Save the changes to the about section
         $user->delete();
 
         // Redirect back with a success message
         return redirect()->route('adminchiqim')->with('success', 'O`chirildi.');
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

        $currentDateTime = Carbon::now('Asia/Tashkent');
         // Validate the request data
         $validatedData = $request->validate([
             'tovarid' => 'required|integer',
             'Miqdori' => 'required|integer',
             'dona' => 'required|integer',
             'Summa' => 'required|integer',
             'Summadona' => 'required|integer',
             'Summat' => 'required|integer',
             'userid' => 'required|integer'
         ]);
     
         try {
             // Create a new Chiqimsavdo model instance and save it to the database
             $latest = Chiqimsavdo::where('firmaid', $userId)->where('sotildi', 1)->latest()->first();
             $bolimid = 0;
             
             if ($latest) {
                 $bolimid = $latest->bolimid + 1;
             }else {
                 $bolimid = 1;
             }
             $miqdori = $validatedData['Miqdori'];
             $dona = $validatedData['dona'];
             $omborid2 = 0;

             //tovar detial
             $tovar = Tovar::findOrFail($validatedData['tovarid']);
             $tdona = $tovar->donasoni;
             //tovar detial
             while ($dona > 0) {
                // Assuming Kirim is an Eloquent model
                $ombor2 = Kirim::where('firmaid', $userId)->where('tovar_id', $validatedData['tovarid'])
                ->where('muddati', '>', now())
                ->whereRaw('CAST(dona AS SIGNED) > 0')
                ->first();
            
                if ($ombor2) {
                    $omborid2 = $ombor2->id;
                    $ombordona = $ombor2->dona;
                    $yangidona = $ombordona - 1;
                    //////////////////////////////////
                    $miq = intval($yangidona / $tdona);
                    /////////////////////////////////
                    $omborupdate2 = Kirim::findOrFail($omborid2);
                    $omborupdate2->dona = $yangidona;
                    $omborupdate2->miqdori = $miq;
                    $omborupdate2->save();
                }
            
                $dona--;
            }

             while ($miqdori > 0) {
                // Assuming Kirim is an Eloquent model
                $ombor = Kirim::where('firmaid', $userId)->where('tovar_id', $validatedData['tovarid'])->where('muddati', '>', now())->first();            
                $tovar = Tovar::findOrFail($validatedData['tovarid']);
                $tdona = $tovar->donasoni;

                if ($ombor) {
                    $omborid = $ombor->id;
                    $ombormiq = $ombor->miqdori;
                    $yangimiqdor = $ombormiq - 1;
                    $ombordona = $ombor->dona;
                    $yangidona = $ombordona - $tdona;
            
                    $omborupdate = Kirim::findOrFail($omborid);
                    $omborupdate->miqdori = $yangimiqdor;
                    $omborupdate->dona = $yangidona;
                    $omborupdate->save();
                }
            
                $miqdori--;
            }
            
             Chiqimsavdo::create([
                 'tovar_id' => $validatedData['tovarid'],
                 'miqdori' => $validatedData['Miqdori'],
                 'miqdoridona' => $validatedData['dona'],
                 'summa' => $validatedData['Summa'],
                 'summadona' => $validatedData['Summadona'],
                 'toliqsumma' => $validatedData['Summat'],
                 'userid' => $validatedData['userid'],
                 'bolimid' => $bolimid,
                 'firmaid' => $userId,
                 'created_at' => $currentDateTime,
             ]);
     
             return 'Muvaffaqiyatli Saqlandi.';
         } catch (Exception $e) {
             // Handle any errors that might occur
             return redirect()->back()->withErrors(['error' => 'Xatolik']);
         }
     }

     public function chiqimsanaqidir(Request $request)
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
             'sanadan' => 'required|date',      // Assuming 'sanadan' is a date field
             'sanagacha' => 'required|date'     // Assuming 'sanagacha' is a date field
         ]);
     
         // Extract the validated dates from the request
         $sanadan = $validatedData['sanadan'];
         $sanagacha = $validatedData['sanagacha'];
     
         // Query using Carbon dates for comparison
         $chiqim = Chiqimsavdo::where(function ($query) use ($sanadan, $sanagacha) {
            $query->whereDate('created_at', '>=', $sanadan)
                  ->whereDate('created_at', '<=', $sanagacha);
        })
        ->where('firmaid', $userId)
        ->get();

     
         // Assuming these are necessary for your view
         $tovars = Tovar::where('firmaid', $userId)->get();
         $olchams = Olchamlar::where('firmaid', $userId)->get();
         $users = User::where('firmaid', $userId)->orwhere('id', $userId)->get();
         return view('admin.chiqimsanashow', compact('users', 'olchams', 'tovars', 'chiqim'));
     }
     
     public function chiqimsanaqidirson(Request $request)
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
             'sanadan' => 'required|date',      // Assuming 'sanadan' is a date field
             'sanagacha' => 'required|date'     // Assuming 'sanagacha' is a date field
         ]);
     
         // Extract the validated dates from the request
         $sanadan = $validatedData['sanadan'];
         $sanagacha = $validatedData['sanagacha'];
     
         // Query using Carbon dates for comparison
         $chiqim = Chiqimsavdo::where(function ($query) use ($sanadan, $sanagacha) {
            $query->whereDate('created_at', '>=', $sanadan)
                  ->whereDate('created_at', '<=', $sanagacha);
        })
        ->where('firmaid', $userId)
        ->get();

     
         // Assuming these are necessary for your view
         $tovars = Tovar::where('firmaid', $userId)->get();
         $olchams = Olchamlar::where('firmaid', $userId)->get();
         $users = User::where('firmaid', $userId)->orwhere('id', $userId)->get();
         return view('admin.chiqimsanashowson', compact('users', 'olchams', 'tovars', 'chiqim'));
     }

     public function qaytar($id)
     {
 
         // Find the Title by ID
         $chiq = Chiqimsavdo::findOrFail($id);
 
         // Update the Title's data
         $chiq->sotildi = '0';
      
         // Save the Title
         $chiq->save();
 
         // Redirect back with a success message
         return redirect()->route('adminchiqim')->with('success', 'Muvaffaqiyatli Saqlandi.');    
     }
}
