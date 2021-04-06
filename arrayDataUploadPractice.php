<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class arrayDataUploadPractice extends Controller
{
    public function excelUpload()
    {
    	try {
    		$data=array(
				1 => 'Ferdows',
				2 => 'Aminul ',
				3 => 'Zinnah',
				4 => 'Rakib'
			);

		   $v_emp=DB::table('enw as b')
		   ->select('b.id','b.name')
		   ->get()->keyBY('id');
		   // dd($v_emp);
		   $dp=[];

		   	foreach ($data as $key => $v) {
			   	if(isset($v_emp[$key]) && $v_emp[$key]->id == 3){
			   		DB::table('enw')
			   		->where('id',$key)
			   		->delete();
			   	}else if(isset($v_emp[$key]))
			   	{
			   		DB::table('enw')
			   		->where('id',$key)
			   		->update([
			   			'name' => $v
			   		]);

			   	}else{
			   		$dp[$key] = $v;
			   		DB::table('enw')
			   		// ->where('id',$key)
			   		->insert([
			   			'name' => $v,
			   			'dsgn' => 'it'
			   		]);
			   	}
		   	}
		   return 'success';
    	} catch (\Exception $e) {
    		return $e->getMessage();
    	}

	   

    }

}
