<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservasiController;


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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/aboutus', [FrontendController::class, 'aboutus']);
Route::get('/reservasi', [FrontendController::class, 'reservasi']);
Route::get('/pesanan', [FrontendController::class, 'pesanan'])->name('pesanan');
Route::get('/menu/{slug}',[FrontendController::class,'Kategori'])->name('kategori');
Route::get('/User/Feedback', [FeedbackController::class, 'UserFeedback'])->name('user.feedback');

Route::group(['middleware' => 'admin'], function () {
    // Admin routes
    Route::get('/Admin/welcome', function () {
        return view('Admin.welcome');
    });
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    //mengirim data ke database atau tambah data
    Route::post('/kategori', [KategoriController::class, 'store']);

    //read kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    //menampilkan detail kategori berdasarkan id
    Route::get('/kategori/{kategori_id}', [KategoriController::class, 'show']);

    //Update kategori
    Route::get('/kategori/{kategori_id}/edit', [KategoriController::class, 'edit']);
    //update data ke dalam database berdasarkan id
    Route::put('/kategori/{kategori_id}', [KategoriController::class, 'update']);

    //Delete kategori
    Route::delete('/kategori/{kategori_id}', [KategoriController::class, 'destroy']);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::put('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders')->middleware('auth');
Route::post('/admin/orders/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus')->middleware('auth');


    //CRUD POST
    //create
    Route::resource('post', PostController::class);

});
Route::group(['pelanggan'], function () {
    // Admin routes
    Route::get('/pesanan', [FrontendController::class, 'pesanan'])->name('pesanan');
    Route::delete('/pesanan/{id}', [FrontendController::class, 'deletePesanan'])->name('delete.pesanan');
    Route::get('/User/Home', [FrontendController::class, 'User'])->name('homepageUser');
    Route::post('/User/komentar', [FeedbackController::class, 'Komentar'])->name('komentar');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('tambahpesanan');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('viewcart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updatecart');
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('processPayment');

});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//CRUD KATEGORI
//create kategori

// routes/web.php

Route::post('/submit_order', function () {
    // Proses data pemesanan di sini
    return redirect('/')->with('success', 'Pemesanan berhasil!');
})->name('submit_order');

Route::get('/menu', [MenuController::class, 'index']);

