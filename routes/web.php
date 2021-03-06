<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeworkController;
use App\Http\Controllers\Admin\HomeworkUploadController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AnswerUploadController;
use App\Http\Controllers\Answer\AnswerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyPaymentController;

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

Route::get('/', function (Request $request) {
    if($request->has('homework_search')){
        $homework = \App\Models\Homework::search($request->homework_search)
            ->paginate(7);
    }else{
        $homework = \App\Models\Homework::paginate(12);
    }
    return view('welcome', compact('homework'));
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/howto', function () {
    return view('howto');
})->name('howTo');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('save_contact');




Route::get('/dashboard', function () {
    $user_id = Auth::id();
    $orders = \App\Models\Order::where('user_id', $user_id)->get();
    $payments = \App\Models\Payment::where('user_id', $user_id)->get();
    return view('dashboard', compact('orders', 'payments'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/storage/{extra}', function ($extra) {
    return redirect('/public/storage/$extra');
}
)->where('extra', '.*');

//download Route
Route::get('/file/{id}/download', function($id){
    $homework_file = \App\Models\HomeworkFile::findOrFail($id);
    $pathToFile = storage_path('app/files/' . $homework_file->filePath);
    return response()->download($pathToFile, $homework_file->OriginalName);
})->name('file_download');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('categories',CategoryController::class);
        Route::resource('homework',HomeworkController::class);

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

//        Homework Upload
        Route::get('/homework-files/{id}', [HomeworkUploadController::class, 'index'])->name('HomeworkUpload');
        Route::post('/homework-files', [HomeworkUploadController::class, 'store'])->name('saveHomeworkFiles');
        Route::delete('/homework-files/{id}', [HomeworkUploadController::class, 'destroy'])->name('deleteHomeworkFiles');

        //        Homework Upload
        Route::get('/homework-answers/{id}', [AnswerUploadController::class, 'index'])->name('AnswerUpload');
        Route::post('/homework-answers', [AnswerUploadController::class, 'store'])->name('saveHomeworkAnswers');
        Route::delete('/homework-answers/{id}', [AnswerUploadController::class, 'destroy'])->name('deleteHomeworkAnswers');

        //Admin Messages
        Route::get('/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('adminMessages');
        Route::get('/message/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('show_adminMessage');

        //Billing
        Route::get('/billing', [\App\Http\Controllers\Admin\BillingController::class, 'index'])->name('billing');
    });

    Route::get('/show/{id}', function ($id) {
//    inefficient way TODO make it better(Refactor)
        $homework = \App\Models\Homework::find($id);
        $files = \Illuminate\Support\Facades\DB::table('homework_files')
            ->where('homework_id', '=',$id)
            ->where('Answer', '=', False)
            ->get();
        return view('/client.showHomework', compact('homework','files'));
    })->name('show');

    //Answers
    Route::get('/answers/{id}', [AnswerController::class, 'show'])->name('ShowAnswer');

    //Payments
    Route::post('payment', [PaymentController::class, 'payment'])->name('payment');
    Route::get('cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::get('downloadAnswer/{id}', [PaymentController::class, 'downloadAnswer'])->name('download.answer');
    Route::post('payment/success', [PaymentController::class, 'success'])->name('payment.success');

    Route::get('/my_billing' ,  [MyPaymentController::class, 'myOrder'])->name('my_billing');
//    Route::get('orders')->name('orders');
    Route::get('/my_homework',  [MyPaymentController::class, 'index'])->name('my_homework');
    Route::get('/my_answers/{id}',  [MyPaymentController::class, 'show'])->name('my_answers');

//    Route::get('/')->name('customization_message');
    Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('messages');
    Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('show_message');
    Route::post('/post', [\App\Http\Controllers\PostController::class, 'store'])->name('customization_message');

    Route::post('/comment/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [\App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');
});
