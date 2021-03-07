<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student_id/{id}', "StudentController@showID");

Route::get('/student_date/{date}', "StudentController@showDate");

Route::get('/student_age/{age}', "StudentController@showAge");

Route::get('/insert',function(){
    DB::insert('insert into students (name, date_of_birth, GPA, adviser) values ("Ilshat", "2001-09-28", 3.5, "Ilshat")');
});

Route::get('/insert2',function(){
    $student = new Student;
    $student->name = "Ilshat3";
    $student->date_of_birth = "2001-10-29";
    $student->GPA = "1.5";
    $student->adviser = "Ilshat2";
    $student->save();
    
});

Route::get('/select',function(){
    $results = DB::select('select * from students');
    foreach($results as $studInfo){
        echo "name is: ".$studInfo->name.", GPA: ".$studInfo->GPA."<br>";
    }
});

Route::get('/update',function(){
    $updated = DB::update('update students set name="Boris" where id=2');
    return $updated;
});

Route::get('/delete',function(){
    $deleted = DB::delete('delete from students where id=2');
    return $deleted;
});

Route::get('/read',function(){
    $students = Student::all();
    foreach($students as $studInfo){
        echo "name is: ".$studInfo->name.", GPA: ".$studInfo->GPA."<br>";
    }
});

Route::get('/find',function(){
    $students = Student::find(2);
    return "name is: ".$studInfo->name.", GPA: ".$studInfo->GPA."<br>";
});

Route::get('/basicUpdate',function(){
    $student = Student::find(3);
    $student->name = 'Boris';
    $student->save();
    
});

Route::get('/basicDelete',function(){
    $student = Student::find(4);
    $student->delete();
    
});