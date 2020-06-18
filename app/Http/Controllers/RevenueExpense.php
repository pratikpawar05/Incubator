<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class RevenueExpense extends Controller
{
    public function profit_vs_burns() {

        $db_rent = DB::select('SELECT payment_month, SUM(monthly_rent) as amount from company_revenues GROUP BY payment_month;');
        $db_alternate = DB::select('SELECT payment_month, SUM(total_amt) as amount from additional_revenues GROUP BY payment_month;');
        $db_expense = DB::select('SELECT date, total from expenses order by date desc');

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
        $expense = [];
        for ($i = 0; $i < count($db_expense); $i++) { 
        	$expense[((array)$db_expense[$i])['date']] = ((array)$db_expense[$i])['total'];
        }
        // dd($expense);

		foreach ($alternate as $key => $value) {
        	if (!in_array($key, array_keys($expense)))
        		$expense[$key] = 1 ;
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
        // dd($expense);
        krsort($total_revenue);

		$profit = [];
		for ($i = 0; $i < count($rent); $i++) { 
            $check=$total_revenue[$dates[$i]] - $expense[$dates[$i]];
            if ($check>0) {
                # code...
                array_push($profit, ["status"=>"Profit","month"=>$dates[$i],"value"=>$check]);
            }
            else{
                array_push($profit, ["status"=>"Burn","month"=>$dates[$i],"value"=>($check)]);
            }
			// $profit[$dates[$i]] = $total_revenue[$dates[$i]] - $expense[$dates[$i]];
            // dd($profit);
            $monthYear = [];
            foreach ($dates as $value) {
                $dateObj   = \DateTime::createFromFormat('Y-m-j', $value . "-10");
                $monthYear[] = $dateObj->format('Y-F');
            }
		}
        // dd($dates[0]);
		$total_revenue_value = array_values($total_revenue);
		//$profit_value = array_values($profit);
		$expense_value = array_values($expense);
        // dd($expense_value);

		return view('revenue_expense', ['dates' => $monthYear, 'rent' => $rent_value, 'alternate' => $alternate_value, 'expense' => $expense_value, 'total_revenue' => $total_revenue_value, 'profit' => $profit],compact('monthYear'));
    }

    public function barClick($label, $state) {

        $company_registered_name = DB::select('SELECT company_masters.company_registered_name from company_masters where company_masters.id in (select company_id from company_revenues where payment_month = ?)', [$label]);
        $db_company_revenues = DB::select('SELECT revenue_type, invoice_amount, payment_status, monthly_rent from company_revenues where payment_month = ?', [$label]);
        $additional_revenues = DB::select('SELECT company_name, revenue_type, invoice_amt, payment_status, total_amt from additional_revenues where payment_month = ?', [$label]);
        $expense = DB::select('SELECT fixed_total, electricity, cafe_total, water_bills, travel_hotel_conveyance_total, internet_charge, marketing_total, events_total, commission, misc_total, total from expenses where date = ?', [$label]);
        if ($expense)
            $expense = $expense[0];
        $company_name = [];
        for ($i = 0; $i < count($company_registered_name); $i++) { 
            $company_name[] = ((array)$company_registered_name[$i])['company_registered_name'];
        } 
        $company_revenues = [];
        for ($i = 0; $i < count($db_company_revenues); $i++) { 
            $company_revenues[] = ((array)$db_company_revenues[$i]);
        }
        // dd($company_revenues);
        $total_revenue = 0;
        for ($i = 0; $i < count($db_company_revenues); $i++) {
            $total_revenue += $company_revenues[$i]['monthly_rent'];
        }
        for ($i = 0; $i < count($additional_revenues); $i++) {
            $total_revenue += $additional_revenues[$i]->total_amt;
        }

        $no_rows = count($company_name) + count($additional_revenues);
        if ((int)$state == 1)
            return ["company_name" => $company_name, "company_revenues" => $company_revenues, "additional_revenues" => $additional_revenues, "total_revenue" => $total_revenue, "total_rows" => $no_rows, "year_month" => $label, "expense" => $expense];
        
        return view('bar_click', ["company_name" => $company_name, "company_revenues" => $company_revenues, "additional_revenues" => $additional_revenues, "total_revenue" => $total_revenue, "total_rows" => $no_rows, "year_month" => $label, "expense" => $expense]);

    }

    public function revenuebarClick($label,$state) {

        // dd($label);

         $company_registered_name = DB::select('SELECT company_masters.company_registered_name from company_masters where company_masters.id in (select company_id from company_revenues where payment_month = ?)', [$label]);
         // dd($company_registered_name);
        $db_company_revenues = DB::select('SELECT revenue_type, invoice_amount, payment_status, monthly_rent from company_revenues where payment_month = ?', [$label]);
        $additional_revenues = DB::select('SELECT company_name, revenue_type, invoice_amt, payment_status, total_amt from additional_revenues where payment_month = ?', [$label]);

        $company_name = [];
        for ($i = 0; $i < count($company_registered_name); $i++) { 
            $company_name[] = ((array)$company_registered_name[$i])['company_registered_name'];
        } 
        $company_revenues = [];
        for ($i = 0; $i < count($db_company_revenues); $i++) { 
            $company_revenues[] = ((array)$db_company_revenues[$i]);
        }
        // dd($company_revenues);
        $total_revenue = 0;
        for ($i = 0; $i < count($db_company_revenues); $i++) {
            $total_revenue += $company_revenues[$i]['monthly_rent'];
        }
        for ($i = 0; $i < count($additional_revenues); $i++) {
            $total_revenue += $additional_revenues[$i]->total_amt;
        }

        $no_rows = count($company_name) + count($additional_revenues);
        if ((int)$state == 1)
            return ["company_name" => $company_name, "company_revenues" => $company_revenues, "additional_revenues" => $additional_revenues, "total_revenue" => $total_revenue, "total_rows" => $no_rows, "year_month" => $label];

        return view('revenue.combines_revenue', ["company_name" => $company_name, "company_revenues" => $company_revenues, "additional_revenues" => $additional_revenues, "total_revenue" => $total_revenue, "total_rows" => $no_rows, "year_month" => $label]);
    }

       public function monthlyProfitDisplay($date) {

        // $dateObj   = \DateTime::createFromFormat('Y-F-j',(int) $date . "-10");
        // $monthName = $dateObj->format('Y-m');
        
        //$response["date"]=$date;
        
        // $monthly_due_amount = DB::select('SELECT SUM(monthly_rent) as monthly_rent, payment_month,SUM(amount_received)  as amount_received  from company_revenues where payment_month = ?', [$monthName]);

        // $due_amount = (int)$monthly_due_amount[0]->monthly_rent - (int)$monthly_due_amount[0]->amount_received;
        // $response["data"] = ["payment_month" => $monthly_due_amount[0]->payment_month,"month" => $date, "monthly_due" => $due_amount,"monthly_due_percentage"=>round(($due_amount/$monthly_due_amount[0]->monthly_rent)*100)];
        // $response["status"] = "success";
        return $response;
        
    }

}
