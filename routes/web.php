<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TrashedController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/
Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [App\Http\Controllers\AuthController::class, 'index'])->name('admin.login');
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');
    Route::post('login/try', [App\Http\Controllers\AuthController::class, 'login'])->name('admin.login.try');
});
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // admin register
    Route::get('/admin/register', [App\Http\Controllers\HomeController::class, 'adminregister'])->name('adminregister');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('users');

    // SSLCOMMERZ Start
    Route::get('/example1', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END
});


// Test for Firebase Notification
Route::get('/fcm', [App\Http\Controllers\HomeController::class, 'FCM'])->name('fcm');
Route::get('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send_fcm');

// Cache Remover
Route::get('/php-artisan/{id?}', function ($id = null) {
    $array = [];
    $array[1] = [
        'call' => 'optimize:clear',
        'massage' => 'Reoptimized class loader'
    ];
    $array[2] = [
        'call' => 'route:clear',
        'massage' => 'Clear Route clear'
    ];
    $array[3] = [
        'call' => 'view:clear',
        'massage' => 'Clear View'
    ];
    $array[4] = [
        'call' => 'config:clear',
        'massage' => 'Clear Config'
    ];
    $array[5] = [
        'call' => 'config:cache',
        'massage' => 'Clear Config caches'
    ];
    $array[6] = [
        'call' => 'cache:clear',
        'massage' => 'Menu Cache'
    ];
    $array[7] = [
        'call' => 'storage:link',
        'massage' => 'Storage linked'
    ];

    $html = '';
    if ($id) {
        $exitCode = Artisan::call($array[$id]['call']);

        $html .= '<h1>' . $array[$id]['massage'] . '</h1><br>';
    } else {
        $html .= '<h1>See below,What you want?</h1><br>';
    }

    //$exitCode = Artisan::call('cache:clear');
    $html .= '<a href="' . url('php-artisan/1') . '"> ==> Optimized </a><br>';
    $html .= '<a href="' . url('php-artisan/2') . '"> ==> Route Clear</a><br>';
    $html .= '<a href="' . url('php-artisan/3') . '"> ==> View Clear</a><br>';
    $html .= '<a href="' . url('php-artisan/4') . '"> ==> Config Clear</a><br>';
    $html .= '<a href="' . url('php-artisan/5') . '"> ==> Config cache</a><br>';
    $html .= '<a href="' . url('php-artisan/6') . '"> ==> Menu cache</a><br>';
    $html .= '<a href="' . url('php-artisan/7') . '"> ==> storage link</a><br>';
    $html .= '<br><a href="' . url('/') . '"> ==> Back to Home</a><br>';
    return $html;
});
