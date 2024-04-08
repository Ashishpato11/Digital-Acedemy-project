<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Models\Category;

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

Route::get('/debug/routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<pre>";
    foreach ($routeCollection as $value) {
        echo $value->getPath() . "<br>";
    }
    echo "</pre>";
});
   
Route::get('/',[HomeController::class,'index'])->name('front.home');
Route::get('/front/singlecourse/{id}',[HomeController::class,'singlecourse']);
Route::get('/front/categorycourse/{id}',[HomeController::class,'categorycourse']);

Route::get('/front/singleinstructor/{id}',[HomeController::class,'singleinstructor']);

Route::get('/front/shop/{categoryTitle?}/{instructorName?}', [HomeController::class, 'shop'])->name('front.shop');



Route::get('/dashboard',[UserController::class,'dashboard'] )->middleware(['auth', 'verified'])->name('dashboard');
 
///--------- User group middle ware -------------////
Route::middleware(['auth','role:user' ])->group(function () {
   
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
}); //------------ end of user middleware


//// user profile middle ware
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

    //-------------------adimin group middle ware
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    //--------------------------teacher lists
    Route::get('/admin/instruct/instructor/list', [AdminController::class, 'AdminInstructorList'])->name('admin.instruct.instructor.list');
    Route::get('/admin/instruct/instructor/{id}/show', [AdminController::class, 'AdminInstructorShow'])->name('admin.instruct.instructor.show');
    Route::get('/admin/instruct/instructor/{id}/delete', [AdminController::class, 'AdminInstructorDelete'])->name('admin.instruct.instructor.delete');

    //--------------------------student lists
    Route::get('/admin/user/user/list', [AdminController::class, 'AdminUserList'])->name('admin.user.user.list');
    Route::get('/admin/user/user/{id}/show', [AdminController::class, 'AdminUserShow'])->name('admin.user.user.show');
    Route::get('/admin/user/user/{id}/delete', [AdminController::class, 'AdminUserDelete'])->name('admin.user.user.delete');
    
    

    //------------------ category
    Route::get('/admin/category/list', [CategoryController::class, 'index'])->name('admin.category.list');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{id}/update', [CategoryController::class, 'update']);
    Route::get('/admin/category/{id}/delete', [CategoryController::class, 'destory']);

    //------------------ course
    Route::get('/admin/course/list', [CourseController::class, 'index'])->name('admin.course.list');
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course/store', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/admin/course/{id}/edit', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/admin/course/{id}/update', [CourseController::class, 'update']);
    Route::get('/admin/course/{id}/delete', [CourseController::class, 'destory']);
    Route::get('/admin/course/get-course', [CourseController::class, 'getCourse'])->name('admin.course.getCourse');

    /// Section 
    Route::get('/admin/course/section/create/{id}', [SectionController::class, 'create'])->name('admin.course.section.create');;
    Route::post('/admin/course/section/store', [SectionController::class, 'store'])->name('admin.course.section.store');
    Route::get('/admin/course/section/{id}/edit', [SectionController::class, 'edit'])->name('admin.course.section.edit');
    Route::put('/admin/course/section/{id}/update', [SectionController::class, 'update'])->name('admin.course.section.update');
    Route::get('/admin/course/section/{id}/delete', [SectionController::class, 'delete'])->name('admin.course.section.delete');



}); //-------------------------------end of admin middlware




//---------------------------------instructor group middle ware 
Route::middleware(['auth','role:instructor', 'verified'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::post('/instructor/profile/store', [InstructorController::class, 'InstructorProfileStore'])->name('instructor.profile.store');
    Route::get('/instructor/change/password', [InstructorController::class, 'InstructorChangePassword'])->name('instructor.change.password');
    Route::post('/instructor/update/password', [InstructorController::class, 'InstructorUpdatePassword'])->name('instructor.update.password');


    /// instructor Course 
    Route::get('/instructor/course/list', [InstructorController::class, 'index'])->name('instructor.course.list');
    Route::get('/instructor/course/create', [InstructorController::class, 'create'])->name('instructor.course.create');
    Route::post('/instructor/course/store', [InstructorController::class, 'store'])->name('instructor.course.store');
    Route::get('/instructor/course/{id}/edit', [InstructorController::class, 'edit'])->name('instructor.course.edit');
    Route::put('/instructor/course/{id}/update', [InstructorController::class, 'update']);
    Route::get('/instructor/course/{id}/delete', [InstructorController::class, 'destory']);
    Route::get('/instructor/course/get-course', [InstructorController::class, 'getCourse'])->name('instructor.course.getCourse');
   
    //////// instructor section
    Route::get('/instructor/course/section/create/{id}', [InstructorController::class, 'screate'])->name('instructor.course.section.create');

    Route::post('/instructor/course/section/store', [InstructorController::class, 'sstore'])->name('instructor.course.section.store');
    Route::get('/instructor/course/section/{id}/edit', [InstructorController::class, 'sedit'])->name('instructor.course.section.edit');
    Route::put('/instructor/course/section/{id}/update', [InstructorController::class, 'supdate'])->name('instructor.course.section.update');
    Route::get('/instructor/course/section/{id}/delete', [SectionController::class, 'sdelete'])->name('instructor.course.section.delete');
}); //-------------------------------- end of ins middleware



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/instructor/register', [InstructorController::class, 'InstructorRegister'])->name('instructor.register');
Route::get('/auth/register', [UserController::class, 'UserRegister'])->name('auth.register');
Route::get('/auth/login', [UserController::class, 'UserLogin'])->name('auth.login');


//------------------------------