<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
   
    public function index()
    {
        $items = Item::all();
        return $items;
    }

 
    public function store(Request $request)
    {
       $item = new Item(); 
       $item->DoctorName = $request->DoctorName;
       $item->PhoneNumber = $request->PhoneNumber;
       $item->Specialty = $request->Specialty;
       $item->RoomNumber = $request->RoomNumber;

       $item->save();
       return response()->json(['message' => 'Yeni Doktor Kaydedildi']);

    }


    public function show(string $id)
    {
        $item =Item::find($id);
        return $item;
    }


    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($request->id);
        $item->DoctorName = $request->DoctorName;
        $item->PhoneNumber = $request->PhoneNumber;
        $item->Specialty = $request->Specialty;
        $item->RoomNumber = $request->RoomNumber;
        $item->save();
        return $item;

    }

 
    public function destroy(string $id)
    {
       $item= Item::destroy($id);
       return response()->json(['message' => 'Silme işlemi başarılı']);
    }
}
