// File Upload Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/upload/start', [FileUploadController::class, 'startUpload']);
    Route::post('/upload/chunk', [FileUploadController::class, 'uploadChunk']);
    Route::get('/upload/progress', [FileUploadController::class, 'getProgress']);
    Route::post('/upload/cancel', [FileUploadController::class, 'cancelUpload']);
}); 