<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\InteractionsController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Models\User;
use App\Notifications\HelloUser;
use App\Services\Helper\Referrer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;
use TCG\Voyager\Models\Role;

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

Route::get('/', [PublicPagesController::class, 'home'])->name('home');
Route::get('/contact', [PublicPagesController::class, 'contact'])->name('contact');
Route::post('/contact', [InteractionsController::class, 'contactStore'])->name('contact.store');
Route::get('/about', [PublicPagesController::class, 'about'])->name('about');
Route::get('/faq', [PublicPagesController::class, 'faq'])->name('faq.index');
Route::get('/data', [PublicPagesController::class, 'data'])->name('data.index');
Route::get('/team', [PublicPagesController::class, 'team'])->name('team');
Route::get('/blog', [PublicPagesController::class, 'blog'])->name('blog');
Route::get('/withdraw', [PublicPagesController::class, 'withdraw'])->name('withdraw')->middleware(['auth']);
Route::post('/add/address', [ProfileController::class, 'addAddress'])->name('add.address')->middleware(['auth']);
Route::post('/withdraw/request', [ProfileController::class, 'withdrawRequest'])->name('withdraw.request')->middleware(['auth']);
Route::get('/delete/address/{id}', [ProfileController::class, 'deleteAddress'])->name('delete.wallet')->middleware(['auth']);
Route::get('/withdraw/cancel/{id}', [ProfileController::class, 'cancelRequest'])->name('cancel.request')->middleware(['auth']);

Route::get('/settings', [ProfileController::class, 'settings'])->name('settings.index')->middleware(['auth']);
Route::post('/settings', [ProfileController::class, 'settingsStore'])->name('settings.store')->middleware(['auth']);
Route::post('/password/retool', [ProfileController::class, 'passwordReset'])->name('password.new')->middleware(['auth']);
Route::post('/invest/{offerid}', [MiscController::class, 'invest'])->name('invest')->middleware(['auth']);



Route::get('/panel', [AdminPagesController::class, 'home'])->name('admin.home')->middleware(['auth']);
Route::get('/panel/users', [AdminPagesController::class, 'users'])->name('admin.users')->middleware(['auth']);
Route::get('/panel/packages', [AdminPagesController::class, 'packages'])->name('admin.packages')->middleware(['auth']);
Route::get('/panel/contactus', [AdminPagesController::class, 'contactus'])->name('admin.contact')->middleware(['auth']);
Route::get('/panel/offers', [AdminPagesController::class, 'offers'])->name('admin.offers')->middleware(['auth']);
Route::post('/panel/offers', [AdminPagesController::class, 'offers_new'])->name('admin.offers.new')->middleware(['auth']);
Route::get('/panel/offers/delete/{id}', [AdminPagesController::class, 'offer_delete'])->name('admin.offers.delete')->middleware(['auth']);

Route::get('/panel/address', [AdminPagesController::class, 'address'])->name('admin.address')->middleware(['auth']);
Route::post('/panel/address/new', [AdminPagesController::class, 'addressStore'])->name('admin.address.new')->middleware(['auth']);
Route::post('/panel/address/edit/{target}', [AdminPagesController::class, 'editAddress'])->name('admin.address.edit')->middleware(['auth']);
Route::get('/panel/address/delete/{target}', [AdminPagesController::class, 'deleteAddress'])->name('admin.address.delete')->middleware(['auth']);
Route::post('/panel/search', [SearchController::class, 'searchUser'])->name('search')->middleware(['auth']);
Route::get('/panel/user/{username}/{userid}', [AdminPagesController::class, 'showuser'])->name('panel.user.profile')->middleware(['auth']);
Route::get('/panel/topup/{userid}', [MiscController::class, 'topup'])->name('panel.topup')->middleware(['auth']);
Route::get('/panel/requests', [MiscController::class, 'requestPage'])->name('panel.request')->middleware(['auth']);
Route::get('/panel/user/fund', [AdminPagesController::class, 'userFund'])->name('panel.user_fund')->middleware(['auth']);
Route::get('/panel/user/addfund/{userid}/{amount}/{fundingID}', [AdminPagesController::class, 'addfund'])->name('addfund')->middleware(['auth']);
Route::get('/panel/users/investments', [MiscController::class, 'user_investments'])->name('user_investments')->middleware(['auth']);
Route::get('/panel/block/{userid}', [MiscController::class, 'blockuser'])->name('block.user')->middleware(['auth']);
Route::get('/panel/unblock/{userid}', [MiscController::class, 'un_blockuser'])->name('unblock.user')->middleware(['auth']);
Route::get('panel/withdraw/approve/{id}/{amount}', [MiscController::class, 'approveWithdraw'])->name('withdraw.approve')->middleware(['auth']);


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware(['auth']);
Route::post('/profile/fund/now', [ProfileController::class, 'fund'])->name('profile.fund')->middleware(['auth']);

Route::get('/test_email', [TestController::class, 'mailTesting']);
Route::get('test-interest', [TestController::class, 'testInterestPayment']);

Route::get('test-ref',function(){
    $user = User::find(1);
    $ref = new Referrer();
    $ref->generatorAssignCode($user);
});

require __DIR__.'/auth.php';


