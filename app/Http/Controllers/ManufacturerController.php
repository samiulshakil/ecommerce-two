<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function createManufacturer(){
    	return view('admin.manufacturer.createManufacturer');
    }

    public function saveManufacturer(Request $request){
    	$this->validate($request, [
            'ManufacturerName' => 'required',
            'description' => 'required', 
        ]);

    	DB::table('manufacturers')->insert([
		    'ManufacturerName' => $request->ManufacturerName,
    		'description' => $request->description,
    		'publicationStatus' => $request->publicationStatus,
    	]);

    	return redirect('/manufacturer/add')->with('message','Manufacturer Info Save Successfully...');
    }

        public function manageManufacturer(){
    	$manufacturer = Manufacturer::all();
    	return view('admin.manufacturer.manageManufacturer', ['manufacturer' => $manufacturer]);
    }

        public function editManufacturer($id){ 
        $manufacturerById = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer', ['manufacturerById' => $manufacturerById]);
    }

    public function updateManufacturer(Request $request){
        $manufacturer = Manufacturer::find($request->id); 
        $manufacturer->ManufacturerName = $request->ManufacturerName;
        $manufacturer->description = $request->description;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer Updated Successfully...');

    }

    public function deleteManufacturer($id){
        $category = Manufacturer::find($id); 
        $category->delete();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer Deleted Successfully...');
    }


}
