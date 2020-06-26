<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesData;
use App\Member;
use App\User;
use App\Expense;
use Carbon\Carbon;
use DB;
use Goutte\Client;
use App\ReturnSd;
use Config;

class AdminController extends Controller
{
    public function fonikIndex()
    {


        $data = DB::select('SELECT * FROM admin.company_masters where status = "1";');
        $member_count = count($data);

        // dd($member_count);

        $occupancyCount = DB::select("SELECT count(*) as count FROM admin.employeelists;");
        $occupancyCount = $occupancyCount[0]->count;

        $mewoTotalCount = 90;
        $mpTotalCount = 196;
        $occupancyRatio = (int) floor(($occupancyCount / $mewoTotalCount) * 100);
        // dd($occupancyRatio);

        $Emp_data = DB::select('SELECT * FROM admin.employeelists where status= "1";');
        $employee_count = count($Emp_data);

        // dd($employee_count);

        $db_rent = DB::select('SELECT payment_month, SUM(monthly_rent) as amount from company_revenues GROUP BY payment_month order by payment_month desc');
        $db_alternate = DB::select('SELECT payment_month, SUM(total_amt) as amount from additional_revenues GROUP BY payment_month order by payment_month desc');

        $rent = [];
        $alternate = [];

        for ($i = 0; $i < count($db_rent); $i++) {
            $rent[((array) $db_rent[$i])['payment_month']] = ((array) $db_rent[$i])['amount'];
        }

        for ($i = 0; $i < count($db_alternate); $i++) {
            $alternate[((array) $db_alternate[$i])['payment_month']] = ((array) $db_alternate[$i])['amount'];
        }

        foreach ($rent as $key => $value) {
            if (!in_array($key, array_keys($alternate)))
                $alternate[$key] = 0;
        }

        foreach ($alternate as $key => $value) {
            if (!in_array($key, array_keys($rent)))
                $rent[$key] = 0;
        }
        // dd($rent);f

        krsort($rent);
        krsort($alternate);

        //Check the netTotal
        $netTotal = DB::select("SELECT SUM(net_total) as net_total FROM admin.company_deals where net_total is not null AND net_total!=0;");
        $netTotal = $netTotal[0]->net_total;

        // dd($alternate);
        $dates = array_keys($rent);
        $rent_value = array_values($rent);
        $alternate_value = array_values($alternate);
        $total_revenue = [];
        for ($i = 0; $i < count($rent); $i++) {
            $total_revenue[$dates[$i]] = (int) ceil((($rent_value[$i] + $alternate_value[$i]) / (int) $netTotal) * 100);
        }
        krsort($total_revenue);


        //dd($total_revenue);


        $Member_data = DB::select('SELECT * FROM admin.employeelists order by updated_at desc limit 3;');

        $db_data = DB::select('SELECT date, total from expenses order by date desc limit 5');
        $db_expense = [];
        foreach ($db_data as $value) {
            $db_expense[((array) $value)['date']] = ((array) $value)['total'];
        }
        $d = array_keys($db_expense);
        for ($i = 0; $i < count($d); $i++) {
            if ($d[$i] < date('Y-m')) {
                $current_expense = $db_expense[$d[$i]];
                break;
            }
        }
        if ($i == count($d)) {
            $current_expense = 0;
        }
        foreach ($db_expense as $key => $value) {
            if (!in_array($key, array_keys($total_revenue)))
                $total_revenue[$key] = 0;
        }



        foreach ($total_revenue as $key => $value) {
            if (!in_array($key, array_keys($db_expense)))
                $db_expense[$key] = 0;
        }

        krsort($total_revenue);
        krsort($db_expense);
        $keys = array_keys($total_revenue);

        $bottom = [];
        $expense = [];
        $dates = [];
        $revenue = [];
        for ($index = 0; $index < count($keys); $index++) {
            $bottom['label'] = $keys[$index];
            $dates[] = $bottom;
            $bottom = [];
            $bottom['value'] = (string) $db_expense[$keys[$index]];
            $expense[] = $bottom;
            $bottom = [];
            $bottom['value'] = (string) $total_revenue[$keys[$index]];
            $revenue[] = $bottom;
            $bottom = [];
        }

        $revenue_data = DB::select('SELECT payment_month as label, sum(total_amt) value 
                                    from(
                                        select payment_month , total_amt 
                                        from additional_revenues
                                        union all
                                        select payment_month , monthly_rent 
                                        from company_revenues where payment_status="RECEIVED"
                                    )t
                                    group by payment_month 
                                    order by payment_month desc;');
        // dd($revenue_data);

        /////////////////////////////Instagram Functionality///////////////////////////
        $username = 'mewoworknest';
        $response = @file_get_contents("https://www.instagram.com/$username/?__a=1");

        if ($response !== false) {
            $data = json_decode($response, true);
            $instagram = [];
            if ($data !== null) {
                $full_name = $data['graphql']['user']['full_name'];
                $following  = $data['graphql']['user']['edge_follow']['count'];
                $followers  = $data['graphql']['user']['edge_followed_by']['count'];
                $profile = $data['graphql']['user']['profile_pic_url_hd'];
                $instagram['username'] = $username;
                $instagram['full_name'] = $full_name;
                $instagram['followers'] = $followers;
                $instagram['following'] = $following;
                $instagram['profile'] = $profile;
            }
        } else {
            echo 'Username not found.';
        }
    
        
        $current_revenue = DB::select('SELECT payment_month as label, sum(total_amt) value 
                                    from(
                                        select payment_month , total_amt 
                                        from additional_revenues
                                        union all
                                        select payment_month , monthly_rent 
                                        from company_revenues where payment_status="RECEIVED"
                                    )t
                                    group by payment_month 
                                    order by payment_month desc limit 1;');
        // dd($current_revenue);
        $DepositeReceived = DB::select('SELECT sum(deposit_received) as deposite_receives FROM admin.company_deals;');
        // dd($DepositeReceived[0]->deposite_receives);



        // return view("fonik_theme.index");
        $obj = DB::select("SELECT gender, count(*) as count FROM admin.employeelists group by gender ;");

        // dd($obj[0]->count);


        if (count($obj) == 1) {
            if ("Female" != $obj[0]->gender)
                $female = 0;
            else
                $female = $obj[0]->count;
            if ("Male" != $obj[0]->gender)
                $male = 0;
            else
                $male = $obj[0]->count;
        }
        else {
            $male = $obj[1]->count;
            // dd($male);
            $female = $obj[0]->count;
            // dd($female);
        }
        $gender_data = $female . ':' . $male;
        // dd($gender_data);


        $monthEmployee = DB::select("SELECT months, CEIL((count(*)/90)*100) as count FROM admin.employeelists where months is not null AND months !=' ' AND status = '1' group by months order by months;");
        
        // dd($monthEmployee);

        $monthCount = [];
        foreach ($monthEmployee as $value) {
            $monthCount[$value->months] = $value->count;
        }
        // dd($monthCount);

        $today = Carbon::now();
        $lastMonth =  $today->subMonth()->format('m'); // 11

        foreach ($total_revenue as $key => $value) {
            if (!in_array($key, array_keys($monthCount)))
                $monthCount[$key] = 0;
        }

        // dd($total_revenue);

        foreach ($monthCount as $key => $value) {
            if (!in_array($key, array_keys($total_revenue)))
                $total_revenue[$key] = 0;
        }

        // dd($monthCount);

        // dd($key);

        $month = $key;
        // dd($month);


        ksort($total_revenue);
        $total_revenues = $total_revenue;
        // dd($total_revenue);
        //print_r($total_revenues);
        ksort($monthCount);
        // dd($monthCount);
        //print_r($monthCount);



        $lastMonthObj = $today->year . "-" . $lastMonth;
           // dd($lastMonth);
        $query = "SELECT FLOOR(internet/90) as internet, FLOOR(ellectricity_units/90) as ellectricity_units, FLOOR(ac_units/90) as ac_units, FLOOR(tea_cofee/90) as tea_cofee, FLOOR(water_liters/90) as water_liters, FLOOR(huose_keeping/90) as huose_keeping  FROM admin.consumptions where consumption_month like " . "'%" . $lastMonthObj . "" . "%'" . ";";

        $current_consumption_month = DB::select($query);
           // dd($current_consumption_month);
        if (count($current_consumption_month) != 0) {
            $current_consumption_month = $current_consumption_month[0];
        }


        // dd($payment_month);

        $date = $today->year . '-' . $today->month;
        // dd($date);


        $query = "SELECT  sum(amount_received) as amount_received, payment_month  FROM admin.company_revenues group by payment_month;";

        $monthlyCollection = DB::select($query);
        // dd($monthlyCollection);
        // ============Monthly Collection ends

        //////////////////////////////////////// progfit & burns ////////////////

        $db_rent = DB::select('SELECT payment_month, SUM(monthly_rent) as amount from company_revenues GROUP BY payment_month');
        // dd($db_rent);
        $db_alternate = DB::select('SELECT payment_month, SUM(total_amt) as amount from additional_revenues GROUP BY payment_month');
        $db_expense = DB::select('select date, total from expenses order by date desc');

        $rent = [];
        $alternate = [];

        for ($i = 0; $i < count($db_rent); $i++) {
            $rent[((array) $db_rent[$i])['payment_month']] = ((array) $db_rent[$i])['amount'];
        }
        for ($i = 0; $i < count($db_alternate); $i++) {
            $alternate[((array) $db_alternate[$i])['payment_month']] = ((array) $db_alternate[$i])['amount'];
        }

        foreach ($rent as $key => $value) {
            if (!in_array($key, array_keys($alternate)))
                $alternate[$key] = 0;
        }

        foreach ($alternate as $key => $value) {
            if (!in_array($key, array_keys($rent)))
                $rent[$key] = 0;
        }
        $expense = [];
        for ($i = 0; $i < count($db_expense); $i++) {
            $expense[((array) $db_expense[$i])['date']] = ((array) $db_expense[$i])['total'];
        }

        foreach ($alternate as $key => $value) {
            if (!in_array($key, array_keys($expense)))
                $expense[$key] = 0;
        }

        foreach ($expense as $key => $value) {
            if (!in_array($key, array_keys($alternate)))
                $alternate[$key] = 0;
        }
        foreach ($expense as $key => $value) {
            if (!in_array($key, array_keys($rent)))
                $rent[$key] = 0;
        }
        krsort($rent);
        krsort($alternate);
        krsort($expense);

        $dates = array_keys($rent);
        $rent_value = array_values($rent);
        $alternate_value = array_values($alternate);

        $total_revenue = [];
        for ($i = 0; $i < count($rent); $i++) {
            $total_revenue[$dates[$i]] = $rent_value[$i] + $alternate_value[$i];
        }
        krsort($total_revenue);
        // dd($total_revenue);

        $profit = [];
        for ($i = 0; $i < count($rent); $i++) {
            $profit[$dates[$i]] = $total_revenue[$dates[$i]] - $expense[$dates[$i]];
        }
//         $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
// echo $fmt->format(10000000000.1234)."\n"; 
        // dd($total_revenue);
        $todayDate = date("Y-m");
        // dd($todayDate);
        foreach ($total_revenue as $month => $value) {
            // dd($month);
            if ($month <= $todayDate) {
                $total_revenue_value1 = $value;
                break;
            }
        }
        // dd($total_revenue_value);

        $total_revenue_current_month = round($value/3517);
        // dd($total_revenue_current_month);

        foreach ($profit as $month => $value) {
            if ($month <= $todayDate) {
                $profit_value = $value;
                $profit_value1 = $value;

                break;
            }
        }
        // dd($profit_value);

        $profit_data_value = round($profit_value/3517);

        // $total_revenue_value = array_values($total_revenue)[0];
        $expense_value = array_values($expense);
        // dd($total_revenue_value/3517); 
        $DepositeReceived=$DepositeReceived[0]->deposite_receives;
        //Current Revenue
        // dd($DepositeReceived);
        $current_revenue=$current_revenue[0]->value;
        // dd($total_revenue);   
        $monthly_due_amount = DB::select('SELECT SUM(monthly_rent) as monthly_rent,payment_month,SUM(amount_received)  as amount_received  from company_revenues GROUP BY payment_month order by payment_month desc');
        // dd( );
        $may_due_amount = $monthly_due_amount[0] =$monthly_due_amount[0]->monthly_rent - $monthly_due_amount[0]->amount_received;
        // 
        // dd($may_due_amount);

        // $due_amount_monthly=0;
        // foreach ($monthly_due_amount as $key => $value) {
        //      # code...
        //     $due_amount_monthly+=($value->monthly_rent)-($value->amount_received);
        //  }
         // dd($due_amount_monthly);
        ////////////////////////////////////////End progfit & burns ////////////////

        // dd($expense_value[0]);


        //////////////////////////////////////////consumption List///////////////////


        $expense_data = Expense::orderBy('id', 'DESC')->get();
        $operational_breakeven = $expense_data[0];
        // dd($operational_breakeven);
        
        //////////////////////////////////////////End consumption List///////////////////

        $mewo = Expense::orderBy('id', 'DESC')->get();
        // dd($mewo[0]->total);
        $mewo_expense = $mewo[0]->total;

        $mewo_expense_data = round($mewo_expense/3517);

        $tw_username = "MeWoWorkNest"; 
        // print_r($tw_username); die;
        $data = file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$tw_username); 
        $parsed =  json_decode($data,true);
        $tw_followers =  $parsed[0]['followers_count'];

        // dd($tw_followers);

        //Facebook Followers Count
        
         $client = new Client();
        try {
            $crawler = $client->request('GET',"https://en-gb.facebook.com/MeWoWorkNest?locale=en_GB");
            $x=$crawler->filter('div[class=_4bl9]')->eq(1);
            $y=$crawler->filter('div[class=_4bl9]')->eq(0);
            $facebook_follower_count=explode(" ",$x->text())[0];
            $facebook_like_count=explode(" ",$y->text())[0];
            
            //     $crawler->filter('div[class=_4bl9]')->each(function ($node,$i){
        //     if ($i==1) {
        //         $headline = $node->text();
        //         $GLOBALS['a'] = explode(" ",$headline)[0];
        //         //print_r($facebook_follower_count);
                
        //     }
        // });

    } catch (Exception $e) {
             //echo $e;
         } 

         $revenue_data = DB::select('SELECT payment_month as label, sum(monthly_rent)/sum(no_of_seats) as value from company_revenues group by payment_month order by payment_month Desc;');

        $today = date("Y-m");

        foreach ($revenue_data as $value) {
            if ($value->label <= $today) {
                $avg_data = $value->value;
                break;
            }
        }
        // dd($avg_data);


        ////////////////Code for graph display//////////////////////////

$db_revenues = DB::select('SELECT DISTINCT company_masters.id, company_revenues.payment_month, SUM(company_revenues.no_of_seats) as no_of_seats, company_revenues.price_per_seat,SUM(company_revenues.monthly_rent) as monthly_rent, occupancies.percentage, SUM(company_revenues.amount_received) as amount_received, company_revenues.company_id from company_masters join company_revenues on company_masters.id = company_revenues.company_id join occupancies on company_masters.id = occupancies.company group by company_revenues.payment_month ');
        // $db_revenues = DB::select('SELECT company_masters.id, company_revenues.payment_month, company_deals.no_of_desk, company_revenues.price_per_seat,SUM(company_revenues.monthly_rent) as monthly_rent, occupancies.percentage, SUM(company_revenues.amount_received) as amount_received, company_revenues.company_id from company_masters join company_revenues on company_masters.id = company_revenues.company_id join occupancies on company_masters.id = occupancies.company join company_deals on company_deals.company_id = company_revenues.company_id group by company_revenues.payment_month ');


        // dd($db_revenues);

        $db_additional_revenues = DB::select('SELECT payment_month, SUM(total_amt) as total_amount, SUM(amount_received) as amount_received from additional_revenues group by additional_revenues.payment_month ');


        //dd($db_additional_revenues);
        $temp1 = [];
        $temp2 = [];
        foreach ($db_additional_revenues as $key => $value) {
            # code...
            array_push($temp1, $value->payment_month);
        }

        foreach ($db_revenues as $key => $value) {
            # code...
            array_push($temp2, $value->payment_month);
        }
        

        //dd($temp2);
        //dd($temp1);
        $check = [];
        foreach ($db_revenues as $key => $value) {
            # code.monthly_rent
            //dd($value);
            if (!in_array($value->payment_month, $temp1)) {
                $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
                $monthName = $dateObj->format('Y-F');
               // print_r($value->payment_month);
               array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => (int)$value->no_of_seats,"percentage" => $value->percentage, "total_revenue" => $value->monthly_rent,"amount_received"=>$value->amount_received]);
            } 
            else {
                $a = 0;
                $b=0;
                $c=0;
                $dateObj   = \DateTime::createFromFormat('Y-m', $value->payment_month);
                $monthName = $dateObj->format('Y-F');
                        
                foreach ($db_additional_revenues as $keys => $values) {
                    # code...
                    //dd($values);
                    if ($values->payment_month == $value->payment_month) {
                        $a = $values->total_amount;
                        $b = $values->amount_received;
                        break;
                       
                    }
                }
                array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => (int)$value->no_of_seats,"percentage" => $value->percentage, "total_revenue" => $value->monthly_rent + $a, "amount_received"=>$value->amount_received+ $b]);
            }
        }

        // dd($db_additional_revenues);
        foreach ($db_additional_revenues as $key => $value) {
            # code...

            // dd($value->invoice_amount);
            if (!in_array($value->payment_month, $temp2)) {
                $dateObj   = \DateTime::createFromFormat('Y-m', $value->payment_month);
                $monthName = $dateObj->format('Y-F');
                array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => 0, "percentage" => 0,  "total_revenue" => $value->total_amount,"amount_received"=>$value->amount_received]);
            }
        }
        // dd($check);

        $occu_data = $check;

        krsort($occu_data);

        $occupency = [];
        foreach ($occu_data as $value) {
            // dd($value);
            $occupency[] = round($value["no_of_seats"]/90*100);
        }

        $occupancy_percentage_data = DB::select('SELECT SUM(no_of_desk) as occupancy from company_deals');

        if (empty($occupancy_percentage_data))
            $occupancy_percentage_data = 0;
        else
            $occupancy_percentage_data = round((int)$occupancy_percentage_data[0]->occupancy / 90 * 100);

        $revenue_data = DB::select('SELECT payment_month as label, sum(invoice_amount) value 
                                    from(
                                        select payment_month , invoice_amount 
                                        from additional_revenues
                                        union all
                                        select payment_month , invoice_amount 
                                        from company_revenues where payment_status="RECEIVED"
                                    )t
                                    group by payment_month 
                                    order by payment_month desc
                                    ;'); 

        // dd($x);
        $months=[];
        foreach($revenue_data as $data) {
            array_push($months, $data->label);
        }

        $revenueValues=[];
        foreach($revenue_data as $data) {
            array_push($revenueValues, round(($data->value/3517)));
        }


        $current_revenue_month = (int)$revenueValues[0];
        // dd($current_revenue_month);

        // ==============ruturn amount============================

        $return_data =DB::select('SELECT * FROM admin.return_sds order by returns_sd_month desc;');
        // dd(round($Return_data[0]->sd_amount*0.75/100));

        $months=[];
        foreach($return_data as $data) {
            array_push($months, $data->returns_sd_month);
        }

        // dd($months);

        // $returnValue=[];
        // foreach($Return_data as $data) {
        //     array_push($returnValue, $data->sd_amount);
        // }

        $return_sd_amount = round($return_data[0]->sd_amount*0.75/100);
        // dd($return_sd_amount);


        $db_rent = DB::select('SELECT payment_month, SUM(monthly_rent) as amount from company_revenues GROUP BY payment_month;');
        $db_alternate = DB::select('SELECT payment_month, SUM(total_amt) as amount from additional_revenues GROUP BY payment_month;');
        $db_expense = DB::select('SELECT date, total from expenses order by date desc');
        // dd($db_expense);
        $rent = []; 
        $alternate = [];

        for ($i = 0; $i < count($db_rent); $i++) { 
            $rent[((array)$db_rent[$i])['payment_month']] = ((array)$db_rent[$i])['amount'];
        }
        for ($i = 0; $i < count($db_alternate); $i++) { 
            $alternate[((array)$db_alternate[$i])['payment_month']] = ((array)$db_alternate[$i])['amount'];
        }

        foreach ($rent as $key => $value) {
                    if (!in_array($key, array_keys($alternate)))
                        $alternate[$key] = 0;
                }

        foreach ($alternate as $key => $value) {
                    if (!in_array($key, array_keys($rent)))
                        $rent[$key] = 0;
                }
        krsort($rent);
        krsort($alternate);

        $dates = array_keys($rent);
        $rent_value = array_values($rent);
        $alternate_value = array_values($alternate);
        // dd($dates);
        $total_revenue = [];
        for ($i = 0; $i < count($rent); $i++) {
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $dates[$i] . "-10");
            $monthName = $dateObj->format('Y-F');
            $total_revenue[] = ["amount" => $rent_value[$i] + $alternate_value[$i], "date" => $monthName];
        }
        // dd();

        $revenue_per_sq_feet = round($total_revenue[0]["amount"]/3517);
        // dd($current_expense);


        $db_expense1 = DB::select('select date, total from expenses order by date desc');



        // ===============End Return======================================
        return view('dashboard.index', compact( 'instagram','profit_value1' ,'member_count','db_expense1', 'employee_count', 'Member_data', 'expense', 'revenue', 'dates', 'revenue_data', 'current_expense', 'current_revenue', 'DepositeReceived', 'male', 'female', 'profit_value', 'total_revenue_value1', 'mewo', 'total_revenues', 'monthCount','month','employee_count', 'tw_followers','mewo_expense_data','facebook_follower_count','facebook_like_count','avg_data','check','profit_data_value','current_revenue_month','total_revenue_current_month','occupency','revenue_per_sq_feet','may_due_amount', 'occupancy_percentage_data','db_expense'));
        // return view("fonik_theme.index",compact('male','female'));

    }
    public function toggleCompany(Request $request) {
        return view('toggle_company');
    }

    public function submitCompany(Request $request) {
        // dd($request->all());
        // session()->put('current_company',$request->company);

        if($request->company == "MeWo") {
            config(['database.connections.admin' => [
                'driver' => "mysql",
                'host' => "localhost",
                'username' => "root",
                'password' => ""
            ]]);
        
            DB::connection('admin');

        }
        else {
            config(['database.connections.millenial_pod' => [
                'driver' => "mysql",
                'host' => "localhost",
                'username' => "root",
                'password' => ""
            ]]);
            DB::connection('millenial_pod');
        }
    }
}