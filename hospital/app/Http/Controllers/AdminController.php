<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        try {
            $doctor = new Doctor; 
            $image = $request->file; 
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
 
            $image->move('doctorimage', $imageName); 
    
            $doctor->image = $imageName;
            $doctor->name = $request->name;
            $doctor->phone = $request->number;
            $doctor->room = $request->room;
            $doctor->specialty = $request->specialty;
            $doctor->save();
    
            return redirect()->back()->with('success', 'Veri başarıyla eklendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Veri eklenirken bir hata oluştu: ' . $e->getMessage());
        }

    }
    public function showdoctor()
    {
        $data = doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request,$id)
    {
        $data=doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->specialty;
        $doctor->room=$request->room;
        $image=$request->file;
        
        if($image)
        {
            $imagename=time(). '.' .$image->getOriginalClientExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }
        $doctor->save();

        return redirect()->back();

       
    }

}

