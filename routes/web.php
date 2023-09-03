<?php

use Illuminate\Auth\Events\Logout;
use App\Exports\LogistikDataExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\TblareaController;
use App\Http\Controllers\LogistikController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisUserController;
use App\Http\Controllers\LogistikFEController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TblWilayahController;
use App\Http\Controllers\WajipPajakController;
use App\Http\Controllers\LogLogistikController;
use App\Http\Controllers\SuperoperatorController;
use App\Http\Controllers\PemasanganDetailContraller;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
#jika belum melakukan login
Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[LoginController::class,'login'])->name('login');
    Route::post('/',[LoginController::class,'authenticate']);
});
#End_________________________________________________________________
#Jika Login Admin Dan Operator
Route::group(['middleware'=>['auth','hakakses:admin,operator']],function(){
    Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});
# untuk Admin
Route::group(['middleware' => ['auth', 'hakakses:admin']], function() {
    #Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/admin', [SuperadminController::class, 'index']);
    Route::get('/logistik_detail', function (){
        return view('logistik_detail');
    });
    Route::get('/admin',[LogistikController::class,'logistikdetail']);
    Route::get('/DetailUser', function () {
        return view('Detail_User');
    });
    Route::get('/registerUser',function() {
        return view('register.registerUser');
    });
    Route::get('/historyMutasi', function () {
        return view('historyMutasi');
    });
    Route::get('/mutasi_logistik', function (){
        return view('insert.addmutasilogistik');
    });
    Route::get('/vendor_detail', function () {
        return view('vendor_detail');
    });
    Route::get('/wilayah_detail', function (){
        return view('wilayah_detail');
    });
    Route::get('/wp_detail', function (){
        return view('wp_detail');

    });
    Route::get('/addlogistik', function (){
        return view('insert.addlogistik');
    });
    Route::get('/addvendor', function (){
        return view('insert.addvendor');
    });
    Route::get('/addwilayah', function (){
        return view('insert.addwilayah');
    });
    Route::get('/addwp', function (){
        return view('insert.addwp');

    });
    Route::get('/addinstallation',function (){
        return view('insert.AddInstallation');
    });
    Route::get('logistik_detail', [LogistikController::class, 'logistikdetail']);
    Route::get('DetailUser',[RegisUserController::class,'UserDetail']);
    Route::get('pemasangan_detail', [PemasanganDetailContraller::class, 'index']);
    Route::get('addinstallation', [PemasanganDetailContraller::class, 'detailLogistik']);
    Route::post('insertPemasangan', [PemasanganDetailContraller::class, 'insertPemasangan']);
    Route::get('historyMutasi', [LogLogistikController::class, 'viewHistory']);
    Route::get('mutasi_logistik', [LogLogistikController::class, 'logistik_list']);
    Route::get('/wp_detail', [WajipPajakController::class, 'Wpdetail']);
    Route::get('editWP/{id}', [WajipPajakController::class, 'edit']);
    Route::get('edithistorylog/{id}', [LogLogistikController::class, 'edit']);
    Route::get('editWilayah/{id}', [TblWilayahController::class, 'edit']);
    Route::put('editWilayah/{id}', [TblWilayahController::class, 'update']);
    Route::put('saveUpdateHistoryLog/{id}', [LogLogistikController::class, 'update']);
    Route::put('/editWP/{id}', [WajipPajakController::class, 'update']);
    Route::get('vendor_detail', [vendorController::class, 'vendordetail']);
    Route::get('wilayah_detail', [TblWilayahController::class, 'Wilayahdetail']);
    Route::get('addlogistik', [vendorController::class, 'vendorlist']);
    Route::get('addwp', [groupController::class, 'grouplist']);
    Route::get('addwilayah', [TblareaController::class, 'DataArea']);
    Route::post('insertlogistik', [LogistikController::class, 'insert_logistik']);
    Route::post('insertwp', [WajipPajakController::class, 'insert_wp']);
    Route::post('insert_wilayah', [TblWilayahController::class, 'insertwilayah']);
    Route::post('/insert_User',[RegisUserController:: class,'store']);
    Route::post('insertvendor', [vendorController::class, 'insert_vendor']);
    Route::post('insert_mutasi', [LogLogistikController::class, 'insert_log']);
    Route::delete('logistik_detail/{no_seri}', [LogistikController::class, 'delete'])->name('datalogistik.delete');
    Route::delete('vendor_detail/{id}', [vendorController::class, 'delete'])->name('DataDetailVendor.delete');
    Route::delete('wilayah_detail/{id}', [TblWilayahController::class, 'delete'])->name('DataDetailwilayah.delete');
});

# untuk Operator
Route::group(['middleware' => ['auth', 'hakakses:operator']], function() {
    #Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/frontEnd', [SuperoperatorController::class, 'index']);
    Route::get('/frontEnd',[LogistikFEController::class,'logistik_detail']);
    Route::get('/frontEnd/export/', [LogistikFEController::class, 'export'])->name('export');
});
