<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function student()
    {
        return view('student');
    }

    public function add_data(request $request)
    {

        $request = $request->all();

        // $model = new Student();
        // $model->name = $request['full_name'];
        // $model->DOB = $request['date_of_birth'];
        // $model->email = $request['email'];
        // $model->gender = $request['gender'];
        // $model->phone = $request['phone'];
        // $model->address = $request['address'];
        // if (request()->hasFile('image')) {
            $uploadedImage = $request->file('image');
        //     // $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        //     // $destinationPath = public_path('/image/student');
        //     // $uploadedImage->move($destinationPath, $imageName);
        //     // $model->image = $imageName;
        // }
         

        // $result = $model->save();

 
        return response()->json(['status' => true, 'res' => $uploadedImage]);
    }


}