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
        $this->validate($request, [
            'full_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|unique',
            'gender' => 'required',
            'phone' => 'required|integer',
            'address' => 'required',
            'image.*' => 'required'
    ]);
        $form_data = $request->all();

        $model = new Student();
        $model->name = $form_data['full_name'];
        $model->DOB = $form_data['date_of_birth'];
        $model->email = $form_data['email'];
        $model->gender = $form_data['gender'];
        $model->phone = $form_data['phone'];
        $model->address = $form_data['address']; 

        // for single image
        /*
        if (request()->hasFile('image')) { 
            $uploadedImage = $request->file('image');  
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/image/student');
            $uploadedImage->move($destinationPath, $imageName);
            $model->image = $imageName;
        }  
           */


        // for multiple image
        $files = [];
        if(request()->hasFile('image'))
         {
            foreach($request->file('image') as $file)
            { 
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('image/student'), $name);  
                $files[] = $name;  
            }
         } 
         $model->image = implode(",",$files);

        $result = $model->save();

 
        // return redirect()->to('student'); 
        return back()->with('success', 'Student Ragistered successfully!');
    //    return response()->json(['status' => true, 'res' => $result]);
    }

    public function get_data(){

        $data= new Student ;
        return view('viewstudent', compact('data'));
    }


}