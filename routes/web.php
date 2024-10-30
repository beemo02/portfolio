<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductMainController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubcategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::controller(LoginController::class)->group(function () {
        Route::post('/', 'logout')->name('logout');
    });
});


// admin route

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('settings');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_store')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });
        
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'create_category')->name('category.create');
            Route::get('/category/manage', 'manage_category')->name('category.manage');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'create_subcategory')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage_subcategory')->name('subcategory.manage');
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/create', 'create_discount')->name('discount.create');
            Route::get('/discount/manage', 'manage_discount')->name('discount.manage');
        });

        Route::controller(PaymentController::class)->group(function () {
            Route::get('/payment/create', 'create_payment')->name('payment.create');
            Route::get('/payment/manage', 'manage_payment')->name('payment.manage');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/create', 'create')->name('admin.products.create');
            Route::get('/product/manage', 'manage_product')->name('admin.products.manage');
            Route::get('/product/review/manage', 'manage_review')->name('product.review.manage');
            Route::post('products/store', 'store')->name('admin.products.store');
            Route::put('products/{products}', 'update')->name('admin.products.update');
            Route::delete('products/{products}', 'destroy')->name('admin.products.delete');
            Route::get('/products/{products}', 'edit')->name('admin.products.edit');
        });

        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/product-attribute/create', 'create_productAttribute')->name('product-attribute.create');
            Route::get('/product-attribute/manage', 'manage_productAttribute')->name('product-attribute.manage');
        });

        Route::controller(MasterCategoryController::class)->group(function () {
            Route::post('/store/category', 'store_cat')->name('store.cat');
            Route::delete('/categories/{category}', 'destroy_cat')->name('categories.destroy');
            Route::get('/categories/{category}', 'edit_cat')->name('categories.edit');
            Route::put('/categories/{category}', 'update_cat')->name('categories.update');
        
        });

        Route::controller(MasterSubcategoryController::class)->group(function () {
            Route::post('/subcategory/store', 'store')->name('subcategory.store');
            Route::delete('/subcategory/{subcategory}', 'destroy')->name('subcategory.destroy');
            Route::get('/subcategory/{subcategory}', 'edit')->name('subcategory.edit');
            Route::put('/subcategory/{subcategory}', 'update')->name('subcategory.update');
        });

        
    });
    
});

Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function(){
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'order_history')->name('order.history');
        });

        Route::controller(StoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('store.create');
            Route::get('/store/manage', 'manage_store')->name('store.manage');
            Route::post('/store', 'store')->name('store.s');
            Route::delete('/store/{store}', 'destroy')->name('store.destroy');
            Route::get('/store/{store}', 'edit')->name('store.edit');
            Route::put('/store/{store}', 'update')->name('store.update');
        });

        Route::controller(ProductMainController::class)->group(function () {
            Route::get('/product/manage', 'manage_product')->name('product.manage');
            Route::get('/product/create', 'index')->name('product.create');
            Route::get('/get-subcategories', 'getSubcategories')->name('get.subcategories');
            Route::post('/product/store', 'store')->name('product.store');
            Route::get('/product/{product}', 'edit')->name('product.edit');
            Route::put('/product/{product}', 'update')->name('product.update');
            Route::delete('/product/{product}', 'destroy')->name('product.delete');
           
        });
    
    });
    
});

Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('customer')->group(function(){
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/history', 'order_history')->name('customer.history');
            Route::get('/payment', 'payment_setting')->name('customer.payment');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });

        Route::controller(CartController::class)->group(function () {
            Route::get('/shop', 'index')->name('shop');
            Route::get('/force-logout', 'forceLogout')->name('force.logout');
            // web.php
            Route::get('/product/{subcategory}', 'products_subcategory')->name('product.productperCategory');


        });
    
    });
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
