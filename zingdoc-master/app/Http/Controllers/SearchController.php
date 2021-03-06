<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(){
    	$user = \Auth::user();

        $sun_raw = Carbon::parse('next sunday');
        $mon_raw = Carbon::parse('next monday');
        $tue_raw = Carbon::parse('next tuesday');
        $wed_raw = Carbon::parse('next wednesday');
        $thu_raw = Carbon::parse('next thursday');
        $fri_raw = Carbon::parse('next friday');
        $sat_raw = Carbon::parse('next saturday');
    	
        $sun = Carbon::parse('next sunday')->format('jS F');
        $mon = Carbon::parse('next monday')->format('jS F');
        $tue = Carbon::parse('next tuesday')->format('jS F');
        $wed = Carbon::parse('next wednesday')->format('jS F');
        $thu = Carbon::parse('next thursday')->format('jS F');
        $fri = Carbon::parse('next friday')->format('jS F');
        $sat = Carbon::parse('next saturday')->format('jS F');
        
        
        
        $doctors = DB::table('users')
            ->where('user_type', '=', '1')
    		->get();
    	

       //  foreach($doctors as $doctor){
       //      $doctor_info = DB::table('time_slot')
    			// ->where('d_user', '=', $doctor->username)
    			// ->get();
       //      // echo(sizeof($doctor_info));
            
       //  }
        // echo(sizeof($doctor_info));

        
        $doctor_info_sun = DB::table('time_slot')
            ->where('created_for', '=', $sun_raw)
            ->get();

        $doctor_info_mon = DB::table('time_slot')
            ->where('created_for', '=', $mon_raw)
            ->get();

        $doctor_info_tue = DB::table('time_slot')
            ->where('created_for', '=', $tue_raw)
            ->get();

        $doctor_info_wed = DB::table('time_slot')
            ->where('created_for', '=', $wed_raw)
            ->get();

        $doctor_info_thu = DB::table('time_slot')
            ->where('created_for', '=', $thu_raw)
            ->get();

        $doctor_info_fri = DB::table('time_slot')
            ->where('created_for', '=', $fri_raw)
            ->get();

        $doctor_info_sat = DB::table('time_slot')
            ->where('created_for', '=', $sat_raw)
            ->get();


        
        // return view('patient.find', compact('user', 'doctors', 'sun', 'mon', 'tue', 'wed', 
        //     'thu', 'fri', 'sat'));


    	return view('patient.find', compact('user', 'doctors', 'sun', 'mon', 'tue', 'wed', 
            'thu', 'fri', 'sat', 'doctor_info_sun', 'doctor_info_mon', 'doctor_info_tue'
            , 'doctor_info_wed', 'doctor_info_thu', 'doctor_info_fri', 'doctor_info_sat'));

        // $date = Carbon::parse('next monday')->toDateString();
        // $date = Carbon::today()->format('l');
        
        // $date = $date->format('l jS \\of F Y h:i:s A');
        // echo($date);
        // echo($sun." ".$mon." ".$tue." ".$wed." ".$thu." ".$fri." ".$sat);
    }
}
