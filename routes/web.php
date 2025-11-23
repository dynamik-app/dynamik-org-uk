<?php

use App\Livewire\Homepage;
use App\Livewire\Solutions;
use App\Livewire\SolutionShow;
use App\Livewire\Tools;


use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\Admin\KnowledgeBaseArticleController;
use App\Http\Controllers\Admin\KnowledgeBaseCategoryController;
use App\Http\Controllers\Admin\KnowledgeBaseTopicController;
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
use App\Livewire\Companies\CreateCompanyForm;
use App\Models\Solution;
use App\Models\Section;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyInvitationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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
Route::get('/tools', Tools::class)->name('tools');
Route::view('/contact', 'contact')->name('contact');
Route::get('/plan', function () {
    return view('plan');
});

Route::get('/shop', ShopProductList::class)->name('shop.index');
Route::get('/shop/cart', ShopCart::class)->name('shop.cart');
Route::get('/shop/success', function () {
    Session::forget('cart.items');

    return view('shop.success');
})->name('shop.success');

Route::get('/sitemap.xml', function () {
    $staticUrls = [
        [
            'loc' => url('/'),
            'lastmod' => now()->toAtomString(),
        ],
        [
            'loc' => url('/solutions'),
            'lastmod' => now()->toAtomString(),
        ],
        [
            'loc' => url('/contact'),
            'lastmod' => now()->toAtomString(),
        ],
        [
            'loc' => url('/plan'),
            'lastmod' => now()->toAtomString(),
        ],
        [
            'loc' => url('/shop'),
            'lastmod' => now()->toAtomString(),
        ],
    ];

    $solutionUrls = Solution::where('is_published', true)
        ->orderByDesc('updated_at')
        ->get()
        ->map(function ($solution) {
            return [
                'loc' => $solution->slug ? route('solutions.show', $solution->slug) : url('/solutions'),
                'lastmod' => optional($solution->updated_at)->toAtomString() ?? now()->toAtomString(),
            ];
        })
        ->toArray();

    $urls = array_merge($staticUrls, $solutionUrls);

    return response()->view('partials.sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/assessment', TakeQuiz::class)->name('quiz.take');
    Route::get('/learn', LearnDashboard::class)->name('learn.dashboard');
    Route::get('/learn/{section}', Learn::class)->name('learn.section');
    Route::get('/suppliers', SuppliersIndex::class)->name('suppliers.index');
    Route::get('/suppliers/create', ManageSupplier::class)->name('suppliers.create');
    Route::get('/suppliers/{supplier}/edit', ManageSupplier::class)->name('suppliers.edit');

    Route::get('/knowledge-base', [KnowledgeBaseController::class, 'index'])->name('knowledge-base.index');
    Route::get('/knowledge-base/categories/{category:slug}', [KnowledgeBaseController::class, 'category'])->name('knowledge-base.categories.show');
    Route::get('/knowledge-base/topics/{topic:slug}', [KnowledgeBaseController::class, 'topic'])->name('knowledge-base.topics.show');
    Route::get('/knowledge-base/articles/{article:slug}', [KnowledgeBaseController::class, 'show'])->name('knowledge-base.show');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        $sections = Section::withCount([
            'questions',
            'questions as answered_questions_count' => function ($query) use ($user) {
                $query->whereHas('answeredByUsers', function ($subQuery) use ($user) {
                    $subQuery->where('user_id', $user->id);
                });
            },
        ])->get();

        $completedSections = $sections->filter(fn ($section) => $section->questions_count > 0
            && $section->answered_questions_count >= $section->questions_count)->count();

        $totalSections = $sections->count();
        $completionPercentage = $totalSections > 0
            ? round(($completedSections / $totalSections) * 100)
            : 0;

        return view('dashboard', [
            'learnProgress' => [
                'completed' => $completedSections,
                'total' => $totalSections,
            ],
            'learnCompletionPercentage' => $completionPercentage,
        ]);
    })->name('dashboard');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', CreateCompanyForm::class)->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::post('/companies/default', [CompanyController::class, 'setDefault'])->name('companies.default');

    Route::get('/companies/invitations/create', [CompanyInvitationController::class, 'create'])->name('companies.invitations.create');
    Route::post('/companies/invitations', [CompanyInvitationController::class, 'store'])->name('companies.invitations.store');

    Route::get('/companies/invitations/accept', [CompanyInvitationController::class, 'showAcceptForm'])->name('companies.invitations.accept');
    Route::post('/companies/invitations/accept', [CompanyInvitationController::class, 'accept'])->name('companies.invitations.accept.store');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'storeForDefaultCompany'])->name('projects.store');
    Route::post('/clients/{client}/projects', [ProjectController::class, 'store'])->name('clients.projects.store');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::prefix('certificates')->name('certificates.')->group(function () {
        Route::get('/', [CertificateController::class, 'index'])->name('index');
        Route::get('/create', [CertificateController::class, 'create'])->name('create');
        Route::get('/{certificate}/edit', [CertificateController::class, 'edit'])->name('edit');
        Route::get('/{certificate}', [CertificateController::class, 'show'])->name('show');
    });
});

// Admin Routes
Route::middleware(['auth', 'role:admin']) // Assuming you also want auth middleware
->prefix('office')
    ->name('admin.')
    ->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        Route::view('/settings', 'admin.settings')->name('settings');
        Route::view('/logs', 'admin.logs')->name('logs');

        Route::prefix('knowledge-base')->name('knowledge-base.')->group(function () {
            Route::resource('categories', KnowledgeBaseCategoryController::class)->except(['show']);
            Route::resource('topics', KnowledgeBaseTopicController::class)->except(['show']);
            Route::resource('articles', KnowledgeBaseArticleController::class)->except(['show']);
        });
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
