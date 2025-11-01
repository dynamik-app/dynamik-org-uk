<?php

use App\Livewire\Homepage;
use App\Livewire\Solutions;
use App\Livewire\SolutionShow;
use App\Livewire\Articles\Create;
use App\Livewire\Articles\Index;
use App\Http\Controllers\ArticleController;
use App\Livewire\Admin\Solutions\Index as AdminSolutionsIndex;
use App\Livewire\Admin\Solutions\Manage as ManageSolutions;
use App\Livewire\Admin\Quizzes\Index as QuizIndex;
use App\Livewire\Admin\Quizzes\Manage as ManageQuiz;
use App\Livewire\Admin\ProductCategoriesManager;
use App\Livewire\Admin\ProductManager;
use App\Livewire\TakeQuiz;
use App\Livewire\Learn;
use App\Livewire\LearnDashboard;
use App\Livewire\Suppliers\Index as SuppliersIndex;
use App\Livewire\Suppliers\Manage as ManageSupplier;
use App\Livewire\Shop\Cart as ShopCart;
use App\Livewire\Shop\ProductList as ShopProductList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Session;

Route::get('/send-test-email-org', function () {
    try {
        Mail::to('georgedanieldobre@gmail.com')
        ->send(new TestMail());

        return "Test email sent successfully using .env configuration!";
    } catch (\Exception $e) {
        // If it fails with the 535 error, the IP validation is still the problem.
        return "Failed to send email using .env configuration: " . $e->getMessage();
    }
});

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

Route::get('/', Homepage::class);

Route::redirect('/services', '/solutions', 301);
Route::get('/solutions', Solutions::class)->name('solutions');
Route::get('/solutions/{slug}', SolutionShow::class)->name('solutions.show');
Route::get('/knowledge-base', Index::class)->name('knowledge-base.index'); // <-- Main knowledge base page
Route::get('/knowledge-base/{slug}', [ArticleController::class, 'show'])->name('knowledge-base.show'); // <-- Single article page
Route::get('/plan', function () {
    return view('plan');
});

Route::get('/shop', ShopProductList::class)->name('shop.index');
Route::get('/shop/cart', ShopCart::class)->name('shop.cart');
Route::get('/shop/success', function () {
    Session::forget('cart.items');

    return view('shop.success');
})->name('shop.success');

Route::middleware(['auth'])->group(function () {
    Route::get('/assessment', TakeQuiz::class)->name('quiz.take');
    Route::get('/learn', LearnDashboard::class)->name('learn.dashboard');
    Route::get('/learn/{section}', Learn::class)->name('learn.section');
    Route::get('/suppliers', SuppliersIndex::class)->name('suppliers.index');
    Route::get('/suppliers/create', ManageSupplier::class)->name('suppliers.create');
    Route::get('/suppliers/{supplier}/edit', ManageSupplier::class)->name('suppliers.edit');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes
Route::middleware(['auth', 'role:admin']) // Assuming you also want auth middleware
->prefix('office')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', Create::class)->name('dashboard');
        Route::get('/users', Create::class)->name('users.index');
        Route::get('/users/roles', Create::class)->name('roles.index');
        Route::get('/users/permissions', Create::class)->name('permissions.index');
        Route::get('/settings', Create::class)->name('settings');
        Route::get('/logs', Create::class)->name('logs');
        Route::get('/knowledge-base/create', Create::class)->name('knowledge-base.create');
        Route::get('/solutions', AdminSolutionsIndex::class)->name('solutions.index');
        Route::get('/solutions/create', ManageSolutions::class)->name('solutions.create');
        Route::get('/solutions/{solution}/edit', ManageSolutions::class)->name('solutions.edit');
        Route::get('/quizzes', QuizIndex::class)->name('quizzes.index');
        Route::get('/quizzes/create', ManageQuiz::class)->name('quizzes.create');
        Route::get('/quizzes/{question}/edit', ManageQuiz::class)->name('quizzes.edit');
        Route::get('/shop/categories', ProductCategoriesManager::class)->name('shop.categories');
        Route::get('/shop/products', ProductManager::class)->name('shop.products');
    });

/*use App\Http\Livewire\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class);

*/
