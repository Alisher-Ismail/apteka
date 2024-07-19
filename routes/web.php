<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\OlchamlarController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\KirimController;
use App\Http\Controllers\ChiqimsavdoController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\MuddatController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthManagerEng;
use App\Http\Controllers\OlchamlarControllerEng;
use App\Http\Controllers\TovarControllerEng;
use App\Http\Controllers\KirimControllerEng;
use App\Http\Controllers\ChiqimsavdoControllerEng;
use App\Http\Controllers\TitleControllerEng;
use App\Http\Controllers\MuddatControllerEng;
use App\Http\Controllers\RegistrationControllerEng;

use App\Http\Controllers\AuthManagerRu;
use App\Http\Controllers\OlchamlarControllerRu;
use App\Http\Controllers\TovarControllerRu;
use App\Http\Controllers\KirimControllerRu;
use App\Http\Controllers\ChiqimsavdoControllerRu;
use App\Http\Controllers\TitleControllerRu;
use App\Http\Controllers\MuddatControllerRu;
use App\Http\Controllers\RegistrationControllerRu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
///////////////////////////////////////////////////////////////////////////////////////////
//russian
Route::get('/ru', [AuthManagerRU::class, 'adminlogin'])->name('loginru');
Route::get('/registerru', [RegistrationControllerRU::class, 'register'])->name('registerru');
Route::post('/registerru', [RegistrationControllerRU::class, 'store'])->name('register.submitru');

Route::get('/licenseru', [MuddatControllerRU::class, 'showForm'])->name('licenseru');
Route::post('/licenseru', [MuddatControllerRU::class, 'handleForm'])->name('license.submitru');
Route::middleware('auth')->group(function () {
    //title section    
    Route::get('/admintitleru', [TitleControllerRU::class, 'title'])->name('admintitleru');
    Route::post('/addtitleru', [TitleControllerRU::class, 'store'])->name('title.storeru');
    Route::get('/title/{id}/editru', [TitleControllerRU::class, 'edit'])->name('title.editru');
    Route::post('/title/{id}/updateru', [TitleControllerRU::class, 'update'])->name('title.updateru');
    Route::delete('/title/{id}/deleteru', [TitleControllerRU::class, 'delete'])->name('title.deleteru');
    //title section
    //user section    
    Route::get('/adminhomeru', function () { return view('russian.blank'); })->name('adminhomeru'); 
    Route::get('/adminsuperuserru', [AuthManagerRU::class, 'usersuper'])->name('adminsuperuserru');
    Route::get('/adminuserru', [AuthManagerRU::class, 'user'])->name('adminuserru');
    Route::post('/adduserru', [AuthManagerRU::class, 'store'])->name('user.storeru');
    Route::get('/user/{id}/editru', [AuthManagerRU::class, 'edit'])->name('user.editru');
    Route::post('/user/{id}/updateru', [AuthManagerRU::class, 'update'])->name('user.updateru');
    Route::delete('/user/{id}/deleteru', [AuthManagerRU::class, 'delete'])->name('user.deleteru');
    //usr section
    //olcham section
    Route::get('/adminolchamru', [OlchamlarControllerRU::class, 'olcham'])->name('adminolchamru');
    Route::post('/addolchamru', [OlchamlarControllerRU::class, 'store'])->name('olcham.storeru');
    Route::get('/olcham/{id}/editru', [OlchamlarControllerRU::class, 'edit'])->name('olcham.editru');
    Route::post('/olcham/{id}/updateru', [OlchamlarControllerRU::class, 'update'])->name('olcham.updateru');
    Route::delete('/olcham/{id}/deleteru', [OlchamlarControllerRU::class, 'delete'])->name('olcham.deleteru');
    //olcham section
    //tovar section
    Route::get('/admintovarru', [TovarControllerRU::class, 'tovar'])->name('admintovarru');
    Route::post('/addtovarru', [TovarControllerRU::class, 'store'])->name('tovar.storeru');
    Route::get('/tovar/{id}/editru', [TovarControllerRU::class, 'edit'])->name('tovar.editru');
    Route::post('/tovar/{id}/updateru', [TovarControllerRU::class, 'update'])->name('tovar.updateru');
    Route::delete('/tovar/{id}/deleteru', [TovarControllerRU::class, 'delete'])->name('tovar.deleteru');
    Route::post('/check-barcoderu', [TovarControllerRU::class, 'checkBarcode'])->name('ajax.barcoderu');
    //tovar section
    
    //kirim section
    Route::get('/adminkirimscanru', [KirimControllerRU::class, 'kirimscan'])->name('adminkirimscanru');
    Route::get('/adminkirimborru', [KirimControllerRU::class, 'kirimbor'])->name('adminkirimborru');
    Route::get('/adminkirimtugaganru', [KirimControllerRU::class, 'kirimtugagan'])->name('adminkirimtugaganru');
    Route::get('/adminkirimru', [KirimControllerRU::class, 'kirim'])->name('adminkirimru');
    Route::post('/addkirimru', [KirimControllerRU::class, 'store'])->name('kirim.storeru');
    Route::post('/addkirimscanru', [KirimControllerRU::class, 'storescan'])->name('kirim.storescanru');
    Route::delete('/kirim/{id}/deleteru', [KirimControllerRU::class, 'delete'])->name('kirim.deleteru');

    Route::post('/delete-kirimru', [KirimControllerRU::class, 'deletescan'])->name('delete.kirimru');
    //kirim section
    //chiqim
    Route::get('/adminchiqimru', [ChiqimsavdoControllerRU::class, 'chiqim'])->name('adminchiqimru');
    Route::get('/adminchiqimbugunru', [ChiqimsavdoControllerRU::class, 'chiqimbugun'])->name('adminchiqimbugunru');
    Route::get('/chiqimqaytar/{id}/editru', [ChiqimsavdoControllerRU::class, 'qaytar'])->name('qaytar.editru');
    Route::get('/adminchiqimbugunsonru', [ChiqimsavdoControllerRU::class, 'chiqimbugunson'])->name('adminchiqimbugunsonru');
    Route::get('/adminchiqimsanaru', [ChiqimsavdoControllerRU::class, 'chiqimsana'])->name('adminchiqimsanaru');
    Route::get('/adminchiqimsanasonru', [ChiqimsavdoControllerRU::class, 'chiqimsanason'])->name('adminchiqimsanasonru');
    Route::post('/addchiqimru', [ChiqimsavdoControllerRU::class, 'store'])->name('chiqim.storeru');
    Route::post('/addchiqimsanaru', [ChiqimsavdoControllerRU::class, 'chiqimsanaqidir'])->name('chiqim.sanaru');
    Route::post('/addchiqimsanasonru', [ChiqimsavdoControllerRU::class, 'chiqimsanaqidirson'])->name('chiqim.sanasonru');
    Route::delete('/chiqim/{id}/deleteru', [ChiqimsavdoControllerRU::class, 'delete'])->name('chiqim.deleteru');
    Route::post('/chiqimsotildiru', [ChiqimsavdoControllerRU::class, 'sotildi'])->name('chiqim.sotildiru');
    //chiqim
});

//Route::get('/admin/login', [AuthManager::class, 'adminlogin'])->name('login');
Route::post('/adminloginru', [AuthManagerRU::class, 'adminloginPost'])->name('adminlogin.postru');
Route::get('/adminlogoutru', [AuthManagerRU::class, 'adminlogout'])->name('adminlogoutru');
//russian
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
//english
Route::get('/eng', [AuthManagerEng::class, 'adminlogin'])->name('logineng');
Route::get('/registereng', [RegistrationControllerEng::class, 'register'])->name('registereng');
Route::post('/registereng', [RegistrationControllerEng::class, 'store'])->name('register.submiteng');

Route::get('/licenseeng', [MuddatControllerEng::class, 'showForm'])->name('licenseeng');
Route::post('/licenseeng', [MuddatControllerEng::class, 'handleForm'])->name('license.submiteng');
Route::middleware('auth')->group(function () {
    //title section    
    Route::get('/admintitleeng', [TitleControllerEng::class, 'title'])->name('admintitleeng');
    Route::post('/addtitleeng', [TitleControllerEng::class, 'store'])->name('title.storeeng');
    Route::get('/title/{id}/editeng', [TitleControllerEng::class, 'edit'])->name('title.editeng');
    Route::post('/title/{id}/updateeng', [TitleControllerEng::class, 'update'])->name('title.updateeng');
    Route::delete('/title/{id}/deleteeng', [TitleControllerEng::class, 'delete'])->name('title.deleteeng');
    //title section
    //user section    
    Route::get('/adminhomeeng', function () { return view('english.blank'); })->name('adminhomeeng'); 
    Route::get('/adminsuperusereng', [AuthManagerEng::class, 'usersuper'])->name('adminsuperusereng');
    Route::get('/adminusereng', [AuthManagerEng::class, 'user'])->name('adminusereng');
    Route::post('/addusereng', [AuthManagerEng::class, 'store'])->name('user.storeeng');
    Route::get('/user/{id}/editeng', [AuthManagerEng::class, 'edit'])->name('user.editeng');
    Route::post('/user/{id}/updateeng', [AuthManagerEng::class, 'update'])->name('user.updateeng');
    Route::delete('/user/{id}/deleteeng', [AuthManagerEng::class, 'delete'])->name('user.deleteeng');
    //usr section
    //olcham section
    Route::get('/adminolchameng', [OlchamlarControllerEng::class, 'olcham'])->name('adminolchameng');
    Route::post('/addolchameng', [OlchamlarControllerEng::class, 'store'])->name('olcham.storeeng');
    Route::get('/olcham/{id}/editeng', [OlchamlarControllerEng::class, 'edit'])->name('olcham.editeng');
    Route::post('/olcham/{id}/updateeng', [OlchamlarControllerEng::class, 'update'])->name('olcham.updateeng');
    Route::delete('/olcham/{id}/deleteeng', [OlchamlarControllerEng::class, 'delete'])->name('olcham.deleteeng');
    //olcham section
    //tovar section
    Route::get('/admintovareng', [TovarControllerEng::class, 'tovar'])->name('admintovareng');
    Route::post('/addtovareng', [TovarControllerEng::class, 'store'])->name('tovar.storeeng');
    Route::get('/tovar/{id}/editeng', [TovarControllerEng::class, 'edit'])->name('tovar.editeng');
    Route::post('/tovar/{id}/updateeng', [TovarControllerEng::class, 'update'])->name('tovar.updateeng');
    Route::delete('/tovar/{id}/deleteeng', [TovarControllerEng::class, 'delete'])->name('tovar.deleteeng');
    Route::post('/check-barcodeeng', [TovarControllerEng::class, 'checkBarcode'])->name('ajax.barcodeeng');
    //tovar section
    
    //kirim section
    Route::get('/adminkirimscaneng', [KirimControllerEng::class, 'kirimscan'])->name('adminkirimscaneng');
    Route::get('/adminkirimboreng', [KirimControllerEng::class, 'kirimbor'])->name('adminkirimboreng');
    Route::get('/adminkirimtugaganeng', [KirimControllerEng::class, 'kirimtugagan'])->name('adminkirimtugaganeng');
    Route::get('/adminkirimeng', [KirimControllerEng::class, 'kirim'])->name('adminkirimeng');
    Route::post('/addkirimeng', [KirimControllerEng::class, 'store'])->name('kirim.storeeng');
    Route::post('/addkirimscaneng', [KirimControllerEng::class, 'storescan'])->name('kirim.storescaneng');
    Route::delete('/kirim/{id}/deleteeng', [KirimControllerEng::class, 'delete'])->name('kirim.deleteeng');

    Route::post('/delete-kirimeng', [KirimControllerEng::class, 'deletescan'])->name('delete.kirimeng');
    //kirim section
    //chiqim
    Route::get('/adminchiqimeng', [ChiqimsavdoControllerEng::class, 'chiqim'])->name('adminchiqimeng');
    Route::get('/adminchiqimbuguneng', [ChiqimsavdoControllerEng::class, 'chiqimbugun'])->name('adminchiqimbuguneng');
    Route::get('/chiqimqaytar/{id}/editeng', [ChiqimsavdoControllerEng::class, 'qaytar'])->name('qaytar.editeng');
    Route::get('/adminchiqimbugunsoneng', [ChiqimsavdoControllerEng::class, 'chiqimbugunson'])->name('adminchiqimbugunsoneng');
    Route::get('/adminchiqimsanaeng', [ChiqimsavdoControllerEng::class, 'chiqimsana'])->name('adminchiqimsanaeng');
    Route::get('/adminchiqimsanasoneng', [ChiqimsavdoControllerEng::class, 'chiqimsanason'])->name('adminchiqimsanasoneng');
    Route::post('/addchiqimeng', [ChiqimsavdoControllerEng::class, 'store'])->name('chiqim.storeeng');
    Route::post('/addchiqimsanaeng', [ChiqimsavdoControllerEng::class, 'chiqimsanaqidir'])->name('chiqim.sanaeng');
    Route::post('/addchiqimsanasoneng', [ChiqimsavdoControllerEng::class, 'chiqimsanaqidirson'])->name('chiqim.sanasoneng');
    Route::delete('/chiqim/{id}/deleteeng', [ChiqimsavdoControllerEng::class, 'delete'])->name('chiqim.deleteeng');
    Route::post('/chiqimsotildieng', [ChiqimsavdoControllerEng::class, 'sotildi'])->name('chiqim.sotildieng');
    //chiqim
});

//Route::get('/admin/login', [AuthManager::class, 'adminlogin'])->name('login');
Route::post('/adminlogineng', [AuthManagerEng::class, 'adminloginPost'])->name('adminlogin.posteng');
Route::get('/adminlogouteng', [AuthManagerEng::class, 'adminlogout'])->name('adminlogouteng');
//english
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
//uzbek
Route::get('/', [AuthManager::class, 'adminlogin'])->name('login');
Route::get('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.submit');

Route::get('/license', [MuddatController::class, 'showForm'])->name('license');
Route::post('/license', [MuddatController::class, 'handleForm'])->name('license.submit');
Route::middleware('auth')->group(function () {
    //title section    
    Route::get('/admintitle', [TitleController::class, 'title'])->name('admintitle');
    Route::post('/addtitle', [TitleController::class, 'store'])->name('title.store');
    Route::get('/title/{id}/edit', [TitleController::class, 'edit'])->name('title.edit');
    Route::post('/title/{id}/update', [TitleController::class, 'update'])->name('title.update');
    Route::delete('/title/{id}/delete', [TitleController::class, 'delete'])->name('title.delete');
    //title section
    //user section    
    Route::get('/adminhome', function () { return view('admin.blank'); })->name('adminhome'); 
    Route::get('/adminsuperuser', [AuthManager::class, 'usersuper'])->name('adminsuperuser');
    Route::get('/adminuser', [AuthManager::class, 'user'])->name('adminuser');
    Route::post('/adduser', [AuthManager::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [AuthManager::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update', [AuthManager::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/delete', [AuthManager::class, 'delete'])->name('user.delete');
    //usr section
    //olcham section
    Route::get('/adminolcham', [OlchamlarController::class, 'olcham'])->name('adminolcham');
    Route::post('/addolcham', [OlchamlarController::class, 'store'])->name('olcham.store');
    Route::get('/olcham/{id}/edit', [OlchamlarController::class, 'edit'])->name('olcham.edit');
    Route::post('/olcham/{id}/update', [OlchamlarController::class, 'update'])->name('olcham.update');
    Route::delete('/olcham/{id}/delete', [OlchamlarController::class, 'delete'])->name('olcham.delete');
    //olcham section
    //tovar section
    Route::get('/admintovar', [TovarController::class, 'tovar'])->name('admintovar');
    Route::post('/addtovar', [TovarController::class, 'store'])->name('tovar.store');
    Route::get('/tovar/{id}/edit', [TovarController::class, 'edit'])->name('tovar.edit');
    Route::post('/tovar/{id}/update', [TovarController::class, 'update'])->name('tovar.update');
    Route::delete('/tovar/{id}/delete', [TovarController::class, 'delete'])->name('tovar.delete');
    Route::post('/check-barcode', [TovarController::class, 'checkBarcode'])->name('ajax.barcode');
    //tovar section
    
    //kirim section
    Route::get('/adminkirimscan', [KirimController::class, 'kirimscan'])->name('adminkirimscan');
    Route::get('/adminkirimbor', [KirimController::class, 'kirimbor'])->name('adminkirimbor');
    Route::get('/adminkirimtugagan', [KirimController::class, 'kirimtugagan'])->name('adminkirimtugagan');
    Route::get('/adminkirim', [KirimController::class, 'kirim'])->name('adminkirim');
    Route::post('/addkirim', [KirimController::class, 'store'])->name('kirim.store');
    Route::post('/addkirimscan', [KirimController::class, 'storescan'])->name('kirim.storescan');
    Route::delete('/kirim/{id}/delete', [KirimController::class, 'delete'])->name('kirim.delete');

    Route::post('/delete-kirim', [KirimController::class, 'deletescan'])->name('delete.kirim');
    //kirim section
    //chiqim
    Route::get('/adminchiqim', [ChiqimsavdoController::class, 'chiqim'])->name('adminchiqim');
    Route::get('/adminchiqimbugun', [ChiqimsavdoController::class, 'chiqimbugun'])->name('adminchiqimbugun');
    Route::get('/chiqimqaytar/{id}/edit', [ChiqimsavdoController::class, 'qaytar'])->name('qaytar.edit');
    Route::get('/adminchiqimbugunson', [ChiqimsavdoController::class, 'chiqimbugunson'])->name('adminchiqimbugunson');
    Route::get('/adminchiqimsana', [ChiqimsavdoController::class, 'chiqimsana'])->name('adminchiqimsana');
    Route::get('/adminchiqimsanason', [ChiqimsavdoController::class, 'chiqimsanason'])->name('adminchiqimsanason');
    Route::post('/addchiqim', [ChiqimsavdoController::class, 'store'])->name('chiqim.store');
    Route::post('/addchiqimsana', [ChiqimsavdoController::class, 'chiqimsanaqidir'])->name('chiqim.sana');
    Route::post('/addchiqimsanason', [ChiqimsavdoController::class, 'chiqimsanaqidirson'])->name('chiqim.sanason');
    Route::delete('/chiqim/{id}/delete', [ChiqimsavdoController::class, 'delete'])->name('chiqim.delete');
    Route::post('/chiqimsotildi', [ChiqimsavdoController::class, 'sotildi'])->name('chiqim.sotildi');
    //chiqim
     //savdo
        ////////////////////////////////////////////////////////////////////
        Route::get('/api/tovar-details', function(Request $request) {
        //get only firma id
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        //get only firma id
            // Find the tovar by ID
            $tovar = App\Models\Tovar::where('firmaid', $userId)->where('id', $request->id)->first();
            // Get all Kirim entries for the given tovar_id
            $ombor = App\Models\Kirim::where('firmaid', $userId)->where('tovar_id', $request->id)->get();
            // Prepare the response data
            $response = [
                'dnarxi' => $tovar ? $tovar->dsotilgannarx : 0,
                'snarxi' => $tovar ? $tovar->sotilgannarx : 0,
                'ombor' => $ombor->isNotEmpty() ? $ombor->sum('miqdori') : 0 // Summing up the quantities if ombor is not empty
            ];
            // Return the response as JSON
            return response()->json($response);
            });
            /////////////////////////
            
            //tovarscan
            Route::get('/api/tovar-detailscan', function(Request $request) 
            {
                //get only firma id
        $user = auth()->user();
        $userId = 0;
        if($user->type == 'admin'){
            $userId = $user->id;     
        }else{
            $userId = $user->firmaid;
        }
        //get only firma id
            // Find the tovar by ID
            $tovar = App\Models\Tovar::where('firmaid', $userId)->where('barcode', $request->id)->first();
            
        
            if ($tovar) {
                $tovarid = $tovar->id;
                $olchamid = $tovar->olchovid;    
                $olcham = App\Models\Olchamlar::find($olchamid);
                // Get all Kirim entries for the given tovar_id
                $ombor = App\Models\Kirim::where('firmaid', $userId)->where('tovar_id', $tovarid)->where('muddati', '>', now())->get();
                        // Prepare the response data
                $response = [
                    'tovarid' => $tovar->id,
                    'nomi' => $tovar->nomi,
                    'olcham2' => $olcham->olcham_nomi,
                    'dnarxi' => $tovar->dsotilgannarx,
                    'snarxi' => $tovar->sotilgannarx,
                    'ombor' => $ombor->isNotEmpty() ? $ombor->sum('miqdori') : 0, // Summing up the quantities if ombor is not empty
                    'ombordona' => $ombor->isNotEmpty() ? $ombor->sum('dona') : 0 // Summing up the quantities if ombor is not empty
                ];
            } else {
                // Return an empty response indicating the barcode was not found
                $response = [
                    'nomi' => null,
                    'tovarid' => 0,
                    'dnarxi' => 0,
                    'snarxi' => 0,
                    'ombor' => 0
                ];
            }
        
            // Return the response as JSON
            return response()->json($response);
        });
        //tovarscan

        //tovarid
        Route::get('/api/tovarid-detailscan', function(Request $request) 
        {
        // Find the tovar by ID
        $tovar = App\Models\Tovar::where('id', $request->id)->first();
        
    
        if ($tovar) {
            $tovarid = $tovar->id;
            $olchamid = $tovar->olchovid;    
            $olcham = App\Models\Olchamlar::find($olchamid);
            // Get all Kirim entries for the given tovar_id
            $ombor = App\Models\Kirim::where('tovar_id', $tovarid)->where('muddati', '>', now())->get();
                    // Prepare the response data
            $response = [
                'tovarid' => $tovar->id,
                'nomi' => $tovar->nomi,
                'olcham2' => $olcham->olcham_nomi,
                'dnarxi' => $tovar->dsotilgannarx,
                'snarxi' => $tovar->sotilgannarx,
                'ombor' => $ombor->isNotEmpty() ? $ombor->sum('miqdori') : 0, // Summing up the quantities if ombor is not empty
                'ombordona' => $ombor->isNotEmpty() ? $ombor->sum('dona') : 0 // Summing up the quantities if ombor is not empty
            ];
        } else {
            // Return an empty response indicating the barcode was not found
            $response = [
                'nomi' => null,
                'tovarid' => 0,
                'dnarxi' => 0,
                'snarxi' => 0,
                'ombor' => 0
            ];
        }
    
        // Return the response as JSON
        return response()->json($response);
    });
    //tovarid
        Route::get('/api/tovar-miqdori', function(Request $request) 
        {
        // Find the tovar by ID
        $tovar = App\Models\Tovar::where('id', $request->id)->first();
        
        if ($tovar) {
            $ombor = App\Models\Kirim::where('tovar_id', $request->id)->where('muddati', '>', now())->get();
            $narxi = $tovar->sotilgannarx;    
            $response = [
                'narxi' => $narxi,
                'ombor' => $ombor->isNotEmpty() ? $ombor->sum('miqdori') : 0, // Summing up the quantities if ombor is not empty
        ];
        } else {
            // Return an empty response indicating the barcode was not found
            $response = [
                'narxi' => 0,
            ];
        }
        
        // Return the response as JSON
        return response()->json($response);
        });
        
        Route::get('/api/tovar-miqdoridona', function(Request $request) 
        {
        // Find the tovar by ID
        $tovar = App\Models\Tovar::where('id', $request->id)->first();
        
        
        if ($tovar) {
            $ombor = App\Models\Kirim::where('tovar_id', $request->id)->where('muddati', '>', now())->get();
            $narxi = $tovar->dsotilgannarx;    
            $response = [
                'narxi' => $narxi,
                'ombordona' => $ombor->isNotEmpty() ? $ombor->sum('dona') : 0 // Summing up the quantities if ombor is not empty
        ];
        } else {
            // Return an empty response indicating the barcode was not found
            $response = [
                'narxi' => 0,
            ];
        }
        
        // Return the response as JSON
        return response()->json($response);
        });
        ///////////////////////////////////////////////////////
    //savdo
});

//Route::get('/admin/login', [AuthManager::class, 'adminlogin'])->name('login');
Route::post('/adminlogin', [AuthManager::class, 'adminloginPost'])->name('adminlogin.post');
Route::get('/adminlogout', [AuthManager::class, 'adminlogout'])->name('adminlogout');
//uzbek
///////////////////////////////////////////////////////////////////////////////////////////

