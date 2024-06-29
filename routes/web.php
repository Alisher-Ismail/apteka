<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\OlchamlarController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\KirimController;
use App\Http\Controllers\ChiqimsavdoController;
use App\Http\Controllers\TitleController;
use Illuminate\Http\Request;
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

Route::get('/', [AuthManager::class, 'adminlogin'])->name('login');

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
    Route::get('/adminservice', [ServiceController::class, 'service'])->name('adminservice');
    Route::post('/addservice', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');
    //team section
    //savdo
        ////////////////////////////////////////////////////////////////////
        Route::get('/api/tovar-details', function(Request $request) {
            // Find the tovar by ID
            $tovar = App\Models\Tovar::find($request->id);
            // Get all Kirim entries for the given tovar_id
            $ombor = App\Models\Kirim::where('tovar_id', $request->id)->get();
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
            
            Route::get('/api/tovar-detailscan', function(Request $request) 
            {
            // Find the tovar by ID
            $tovar = App\Models\Tovar::where('barcode', $request->id)->first();
            
        
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

//require __DIR__.'/auth.php';
