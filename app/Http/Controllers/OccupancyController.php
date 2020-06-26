<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupancy;
use App\Member;
use DB;
use Carbon\Carbon;

class OccupancyController extends Controller
{
    public function occupancy() {
        $data = Occupancy::all();
        $data = DB::select('SELECT  company_masters.id, company_masters.company_registered_name, company_masters.brand_name,count(*) as no_of_seats FROM occupancies
        join company_masters on company_masters.id = occupancies.company
        join employeelists on employeelists.member_id = occupancies.company
        where employeelists.status="1" AND company_masters.status="Active"
        group by employeelists.member_id ORDER BY count(*) desc;');
        // dd($data);
        foreach($data as $key => $d) {
        // dd($data[$key]->no_of_seats);
            $per = ($d->no_of_seats*100)/90;
            // dd($data);
            $data[$key]->percentage = (int)$per;
            // dd($data[$key]->percentage);
        }

        $pie_graph = DB::select('SELECT  company_masters.id, company_masters.company_registered_name, company_masters.brand_name,count(*) as no_of_seats FROM occupancies
        join company_masters on company_masters.id = occupancies.company
        join employeelists on employeelists.member_id = occupancies.company
        where employeelists.status="1" AND company_masters.status="Active"
        group by employeelists.member_id ORDER BY count(*) desc;
        ');
        foreach($pie_graph as $key => $d) {
        // dd($data[$key]->no_of_seats);
            $per = ($d->no_of_seats*100)/196;
            // dd($per);
            $data[$key]->percentage = (int)$per;
            // dd($data[$key]->percentage);
        }

        $total = DB::select('SELECT SUM(no_of_seats) AS no_of_seats , sum(percentage) as percentage FROM occupancies;');

        // dd($total);  
        return view("occupancy.index", compact('data','pie_graph','total'));
    }

    public function add_occupancy() {
        $members = Member::all();
        return view("occupancy.create", compact('members'));
    }

    public function showOccupancy() {

        $today = Carbon::now();
        // dd($today);
        $currentDate =  $today->format('Y-m');
        // $currentDate =  "2020-05";
        // dd($currentDate);
        $db_company = DB::select('SELECT company_masters.id, company_masters.company_registered_name FROM company_masters');
        $company = [];
        foreach ($db_company as $value) {
            $db_seats = DB::select('SELECT no_of_seats as occupancy from company_revenues where company_id = ? AND payment_month = ?', [$value->id, $currentDate]);
            if (empty($db_seats))
                $company[] = ["company_name" => $value->company_registered_name, "seats" => 0];
            else
                $company[] = ["company_name" => $value->company_registered_name, "seats" => (int)$db_seats[0]->occupancy];
        }
        // dd($company);

        $seats = array_column($company, 'seats');
        array_multisort($seats, SORT_DESC, $company);

        $colors = [];
        $colors[] = [354, 84, 65];
        $s = 100;
        $l = 95;
        for ($i = 0; $i < count($company); $i++) { 
            $colors[] = [120, $s, $l];
            // $s -= 1;
            $l -= 3;
        }

        $occupied_data = 0;
        foreach ($company as $value) {
            $occupied_data += $value["seats"];
        }
        $unoccupied_data = 90 - $occupied_data;

        // dd($company);

        // $a = $company;
        // // // krsort($a);
        // // rsort($a);
        // arsort($a);
        // $b =[];
        // foreach ($a as $key => $value) {
        //    $b[] = $value;

        // }
        // // dd($b);

        
        return view("occupancy.fonik_index", compact('company', 'colors', 'occupied_data', 'unoccupied_data'));
    }

}
