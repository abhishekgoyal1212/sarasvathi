<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\DynamicController;
use App\Http\Controllers\admin\BoardController;
use App\Http\Controllers\admin\ChaptersController;
use App\Http\Controllers\admin\ExamController;
use App\Http\Controllers\admin\ClassesController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\admin\ConceptController;
use App\Http\Controllers\admin\ExerciseController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\TutorController;
use App\Http\Controllers\admin\InstructorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::view('/login', 'admin/auth/login')->name('admin.login');
        Route::post('/login-verify', [AuthController::class, 'loginAuth'])->name('admin.login-verify');
        Route::view('/forgot-password', 'admin/auth/forgot-password')->name('admin.forgot-password');
        Route::post('/forgot-email-verify', [AuthController::class, 'forgotEmailVerify'])->name('admin.forgotEmailVerify');
        Route::get('/reset-password/{id}', [AuthController::class, 'resetPassword'])->name('admin.reset-password');
        Route::post('/reset-password-verify/{id}', [AuthController::class, 'verifyResetPassword'])->name('admin.reset-password-verify');
    });

    Route::prefix('tutor')->group(function () {
        Route::view('/login', 'admin/auth/tutor/tutor-login')->name('tutor.login');
        Route::post('/login-verify', [AuthController::class, 'loginTutor'])->name('tutor.login-verify');
    });


    Route::prefix('school')->group(function () {
        Route::view('/login', 'admin/auth/school/school-login')->name('school.login');
        Route::post('/login-verify', [AuthController::class, 'loginSchool'])->name('school.login-verify');
    });


    Route::prefix('instructor')->group(function () {
        Route::view('/login', 'admin/auth/instructor/instructor-login')->name('instructor.login');
        Route::post('/login-verify', [AuthController::class, 'loginInstructor'])->name('instructor.login-verify');
    });
});
Route::middleware('auth:school,admin,instructor,tutor')->group(function () {
    // Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin/dashboard')->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.getProfile');
    Route::post('/save-profile', [ProfileController::class, 'save_profile'])->name('admin.setProfile');

    // ---------------------------CLASSES---------------------------------------
    Route::get('/classes', [ClassesController::class, 'index'])->name('classes.list');
    Route::view('/classes/add', 'admin.classes.add')->name('classes.add');
    Route::post('/classes/insert', [ClassesController::class, 'insert'])->name('classes.insert');
    Route::get('/classes/edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('/classes/update/{id}', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/classes/delete/{id}', [ClassesController::class, 'delete'])->name('classes.delete');
    Route::get('/classes/status/{id}/{status}', [ClassesController::class, 'status'])->name('classes.status');

    // ---------------------------SUBJECTS---------------------------------------

    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.list');
    Route::get('/subjects/add-subject', [SubjectController::class, 'add'])->name('subjects.add');
    Route::post('/subjects/insert-subject', [SubjectController::class, 'insert'])->name('subjects.insert');
    Route::get('/subjects/edit-subjects/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::post('/subjects/update-subject/{id}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::get('/subjects/delete-subject/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');
    Route::get('/subjects/subject-status/{id}/{status}', [SubjectController::class, 'status'])->name('subjects.status');

    // ---------------------------CHAPTERS---------------------------------------
    Route::get('/chapters/{subject_id}', [ChaptersController::class, 'index'])->name('chapters.index');
    Route::post('/chapters/insert-chapter', [ChaptersController::class, 'insert'])->name('chapters.insert');
    Route::get('/chapters/edit-chapters/{id}', [ChaptersController::class, 'edit'])->name('chapters.edit');
    Route::post('/chapters/update-chapter/{id}', [ChaptersController::class, 'update'])->name('chapters.update');
    Route::get('/chapters/delete-chapter/{id}', [ChaptersController::class, 'delete'])->name('chapters.delete');
    Route::get('/chapters/chapter-status/{id}/{status}', [ChaptersController::class, 'status'])->name('chapters.status');

    // ---------------------------SECTION---------------------------------------
    Route::get('/section/edit-section/{id}', [SectionController::class, 'edit'])->name('section.edit');
    Route::get('/section/{chapter_id}/{subject_id}', [SectionController::class, 'index'])->name('sections.index');
    Route::post('/section/insert-section', [SectionController::class, 'insert'])->name('section.insert');
    Route::post('/section/update-section/{id}', [SectionController::class, 'update'])->name('section.update');
    Route::get('/section/delete-section/{id}', [SectionController::class, 'delete'])->name('section.delete');
    Route::get('/section/section-status/{id}/{status}', [SectionController::class, 'status'])->name('section.status');
    // Route::post('/get-section-by-class/', [SectionController::class, 'getSections'])->name('section.by.class');
    // ---------------------------LESSON---------------------------------------
    Route::post('/lesson/insert-lesson', [LessonController::class, 'insert'])->name('lesson.insert');
    Route::get('/lesson/edit-lesson/{id}', [LessonController::class, 'edit'])->name('lesson.edit');
    Route::post('/lesson/update-lesson/{id}', [LessonController::class, 'update'])->name('lesson.update');
    Route::get('/lesson/delete-lesson/{id}', [LessonController::class, 'delete'])->name('lesson.delete');
    Route::get('/lesson/lesson-status/{id}/{status}', [LessonController::class, 'status'])->name('lesson.status');
    // ---------------------------CONCEPT---------------------------------------
    Route::post('/concept/insert-concept', [ConceptController::class, 'insert'])->name('concept.insert');
    Route::get('/concept/edit-concept/{id}', [ConceptController::class, 'edit'])->name('concept.edit');
    Route::get('/concept/{chapter_id}/{subject_id}', [ConceptController::class, 'index'])->name('concepts.index');
    Route::post('/concept/update-concept/{id}', [ConceptController::class, 'update'])->name('concept.update');
    Route::get('/concept/delete-concept/{id}', [ConceptController::class, 'delete'])->name('concept.delete');
    Route::get('/concept/concept-status/{id}/{status}', [ConceptController::class, 'status'])->name('concept.status');
    // });
});


Route::prefix('school')->middleware('auth:school')->group(function () {

    // ---------------------------TEACHER---------------------------------------
    Route::get('/teachers', [InstructorController::class, 'index'])->name('teacher.list');
    Route::get('/teacher/add', [InstructorController::class, 'add'])->name('teacher.add');
    Route::post('/teacher/insert', [InstructorController::class, 'insert'])->name('teacher.insert');
    Route::get('/teacher/edit-teacher/{id}', [InstructorController::class, 'edit'])->name('teacher.edit');
    Route::post('/teacher/update/{id}', [InstructorController::class, 'update'])->name('teacher.update');
    Route::get('/teacher/delete/{id}', [InstructorController::class, 'delete'])->name('teacher.delete');
    Route::get('/teacher/status/{id}/{status}', [InstructorController::class, 'status'])->name('teacher.status');


    // ---------------------------STUDENT---------------------------------------
    Route::get('/students', [StudentController::class, 'index'])->name('student.list');
    Route::get('/student/add', [StudentController::class, 'add'])->name('student.add');
    Route::post('/student/insert', [StudentController::class, 'insert'])->name('student.insert');
    Route::get('/student/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/student/status/{id}/{status}', [StudentController::class, 'status'])->name('student.status');
});
Route::prefix('instructor')->middleware('auth:instructor')->group(function () {

    // ---------------------------STUDENT---------------------------------------
    Route::get('/students', [StudentController::class, 'index'])->name('student.list');
    Route::get('/student/add', [StudentController::class, 'add'])->name('student.add');
    Route::post('/student/insert', [StudentController::class, 'insert'])->name('student.insert');
    Route::get('/student/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/student/status/{id}/{status}', [StudentController::class, 'status'])->name('student.status');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // ---------------------------PAGES---------------------------------------

    Route::view('/pages', 'admin.dynamic.index')->name('pages');
    Route::get('/logo/edit', [DynamicController::class, 'edit_logo'])->name('logo.edit');
    Route::post('/logo/update', [DynamicController::class, 'update_logo'])->name('logo.update');
    Route::get('/banner/edit', [DynamicController::class, 'edit_banner'])->name('banner.edit');
    Route::post('/banner/update', [DynamicController::class, 'update_banner'])->name('banner.update');
    Route::get('/loginpage/edit', [DynamicController::class, 'edit_loginpage'])->name('loginpage.edit');
    Route::post('/loginpage/update', [DynamicController::class, 'update_loginpage'])->name('loginpage.update');

    // ---------------------------BOARDS---------------------------------------

    Route::get('/boards', [BoardController::class, 'index'])->name('board.list');
    Route::view('/board/add', 'admin.board.add')->name('board.add');
    Route::post('/board/insert', [BoardController::class, 'insert'])->name('board.insert');
    Route::get('/board/edit-board/{id}', [BoardController::class, 'edit'])->name('board.edit');
    Route::post('/board/update/{id}', [BoardController::class, 'update'])->name('board.update');
    Route::get('/board/delete/{id}', [BoardController::class, 'delete'])->name('board.delete');
    Route::get('/board/status/{id}/{status}', [BoardController::class, 'status'])->name('board.status');

    // ---------------------------SCHOOLS---------------------------------------

    Route::get('/schools', [SchoolController::class, 'index'])->name('school.list');
    Route::get('/school/add', [SchoolController::class, 'add'])->name('school.add');
    Route::post('/school/insert', [SchoolController::class, 'insert'])->name('school.insert');
    Route::get('/school/edit-school/{id}', [SchoolController::class, 'edit'])->name('school.edit');
    Route::post('/school/update/{id}', [SchoolController::class, 'update'])->name('school.update');
    Route::get('/school/delete/{id}', [SchoolController::class, 'delete'])->name('school.delete');
    Route::get('/school/status/{id}/{status}', [SchoolController::class, 'status'])->name('school.status');

    // ---------------------------SCHOOLS---------------------------------------

    Route::get('/tutors', [TutorController::class, 'index'])->name('tutor.list');
    Route::get('/tutor/add', [TutorController::class, 'add'])->name('tutor.add');
    Route::post('/tutor/insert', [TutorController::class, 'insert'])->name('tutor.insert');
    Route::get('/tutor/edit-tutor/{id}', [TutorController::class, 'edit'])->name('tutor.edit');
    Route::post('/tutor/update/{id}', [TutorController::class, 'update'])->name('tutor.update');
    Route::get('/tutor/delete/{id}', [TutorController::class, 'delete'])->name('tutor.delete');
    Route::get('/tutor/status/{id}/{status}', [TutorController::class, 'status'])->name('tutor.status');


    // ---------------------------EXAMS---------------------------------------

    Route::get('/exams', [ExamController::class, 'index'])->name('exam.list');
    Route::view('/exams/add', 'admin.exam.add')->name('exam.add');
    Route::post('/exams/insert', [ExamController::class, 'insert'])->name('exam.insert');
    Route::get('/exams/edit-exam/{id}', [ExamController::class, 'edit'])->name('exam.edit');
    Route::post('/exams/update/{id}', [ExamController::class, 'update'])->name('exam.update');
    Route::get('/exams/delete/{id}', [ExamController::class, 'delete'])->name('exam.delete');
    Route::get('/exams/status/{id}/{status}', [ExamController::class, 'status'])->name('exam.status');

    // ---------------------------EXERCISE ICON---------------------------------------

    Route::get('/exercise', [ExerciseController::class, 'index_icon'])->name('exercise-icon.list');
    Route::post('/exercise/icon-insert', [ExerciseController::class, 'insert_icon'])->name('exercise-icon.insert');
    Route::get('/exercise/icon-edit/{ids}', [ExerciseController::class, 'edit_icon'])->name('exercise-icon.edit');
    Route::post('/exercise/icon-edit/{ids}', [ExerciseController::class, 'update_icon'])->name('exercise-icon.update');
    Route::get('/exercise/icon-delete/{id}', [ExerciseController::class, 'delete_icon'])->name('exercise-icon.delete');
    Route::get('/exercise/icon-status/{id}/{status}', [ExerciseController::class, 'status_icon'])->name('exercise-icon.status');
});
// });
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/', function () {
    return redirect()->route('admin.login');
})->middleware('guest');

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth:admin');
