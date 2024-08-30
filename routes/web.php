<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EgressController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Models\Account;
use App\Models\Egress;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //TRANSFER
    Route::controller(TransferController::class)->group(function () {
        //Listado por mes
        Route::get('/transfers', 'index')->name('transfers');

        //TRANSFERIR
        Route::get('/transfer', 'transfer')->name('transfer');
        Route::post('/storeTransfer', 'store')->name('storeTransfer');
    });

    //INCOMES
    Route::controller(IncomeController::class)->group(function () {
        //list
        Route::get('/incomes', 'index')->name('incomes'); //Por mes (por omisión)
        Route::get('/incomesForDay', 'displayForDay')->name('incomesForDay');
        Route::get('/incomesForWeek', 'displayForWeek')->name('incomesForWeek');
        Route::get('/incomesForYear', 'displayForYear')->name('incomesForYear');

        //show
        Route::get('/income/{income}', 'show')->name('incomeShow');

        //create
        Route::get('/incomeCreate', 'create')->name('incomeCreate');
        Route::post('/incomeSave', 'store')->name('incomeStore');

        //Edit-Update   
        Route::get('incomeEdit/{income}', 'edit')->name('incomeEdit');
        Route::put('incomeEdit/{income}', 'update');

        //delete
        Route::get('incomeDelete/{income}', 'destroy')->name('incomeDelete');
    });
    //ACCOUNTS
    Route::controller(AccountController::class)->group(function () {
        //list
        Route::get('/accounts', 'index')->name('accounts');

        //show
        Route::get('/account/{account}', 'show')->name('accountShow');

        //create
        Route::get('/accountCreate', 'create')->name('accountCreate');
        Route::post('/accountSave', 'store')->name('accountStore');

        //Edit-Update   
        Route::get('accountEdit/{account}', 'edit');
        Route::put('accountEdit/{account}', 'update')->name('accountEdit');

        //delete
        Route::get('accountDelete/{account}', 'destroy')->name('accountDelete');

    });

    //CATEGORY
    Route::controller(CategoryController::class)->group(function () {
        //list
        Route::get('/categories', 'index')->name('categories');

        //show
        Route::get('/category/{category}', 'show')->name('categoriesShow');

        //create
        Route::get('/categoryCreate', 'create')->name('categoryCreate');
        Route::post('/categorySave', 'store')->name('categorySave');

        //Edit-Update   
        Route::get('categoryEdit/{category}', 'edit');
        Route::put('categoryEdit/{category}', 'update');

        //delete
        Route::get('categoryDelete/{category}', 'destroy')->name('categoryDelete');
    });

    //EGRESS
    Route::controller(EgressController::class)->group(function () {
        //list
        Route::get('/egresses', 'index')->name('egresses');
        Route::get('/egressesForDay', 'displayForDay')->name('egressesForDay');
        Route::get('/egressesForWeek', 'displayForWeek')->name('egressesForWeek');
        Route::get('/egressesForYear', 'displayForYear')->name('egressesForYear');

        //show
        Route::get('/egress/{egress}', 'show')->name('egressShow');

        //create
        Route::get('/egressCreate', 'create')->name('egressCreate');
        Route::post('/egressSave', 'store')->name('egressStore');

        //Edit-Update   
        Route::get('egressEdit/{egress}', 'edit')->name('egressEdit');
        Route::put('egressEdit/{egress}', 'update');

        //delete
        Route::get('egressDelete/{egress}', 'destroy')->name('egressDelete');
    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';









