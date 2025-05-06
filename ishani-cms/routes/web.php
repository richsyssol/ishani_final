<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\WhoWeAreController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerTestimonialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ShowroomGalleryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FranchiseInfoController;
use App\Http\Controllers\FranchiseTestimonialController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;

Route::get('/api/herocontent', [HeroController::class, 'index']);
Route::get('/api/whoweare', [WhoWeAreController::class, 'index']);
Route::get('/api/gallery', [GalleryController::class, 'index']);
Route::get('/api/testimonials', [TestimonialController::class, 'index']);
Route::get('/api/testimonials/featured', [TestimonialController::class, 'featured']);
Route::get('/api/documents', [DocumentController::class, 'index']);
Route::get('/api/documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');
    Route::get('/api/companyinformation', action: [CompanyInformationController::class, 'index']);
Route::get('/api/productcategories', [CategoryController::class, 'index']);
Route::get('/api/categories/{id}', [CategoryController::class, 'show']);
Route::get('/api/products', [ProductController::class, 'index']);
Route::get('/api/products/{id}', [ProductController::class, 'show']);
Route::get('/api/customertestimonials', [CustomerTestimonialController::class, 'index']);
Route::get('/api/customertestimonials/{id}', [CustomerTestimonialController::class, 'show']);
Route::get('/api/faqs', [FaqController::class, 'index']);
Route::get('/api/faqs/{id}', [FaqController::class, 'show']);
Route::get('/api/showroomgallery', [ShowroomGalleryController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/api/contact', [ContactInformationController::class, 'index']);
Route::get('/api/franchise', [FranchiseInfoController::class, 'index']);
Route::get('/api/testimonials', FranchiseTestimonialController::class);
Route::get('/api/franchise/brochure', [FranchiseInfoController::class, 'downloadBrochure']);
Route::get('/franchise-info/brochure/download', [FranchiseInfoController::class, 'serveBrochure']);


Route::get('/api/blog', [BlogController::class, 'index']);
Route::get('/api/blog/recent', [BlogController::class, 'recent']);
Route::get('/api/categories', [BlogController::class, 'byCategory']);
Route::get('/api/blog/category/{category}', [BlogController::class, 'byCategory']);
Route::get('/api/blog/{slug}', [BlogController::class, 'show']);

Route::get('/', function () {
    return view('welcome');

});
