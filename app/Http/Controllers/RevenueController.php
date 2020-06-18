<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AdditionalRevenue;
use App\CompanyMaster;
use App\CompanyRevenues;
use App\CompanyDeal;
use App\Member;
use App\Imports\Revenueimport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use SimpleXMLElement;

// require_once('../config/TwitterAPIExchange.php'); 

class RevenueController extends Controller
{
    public function revenue()
    {

        // $revenue = DB::select('SELECT company_deals.id ,members.Company_name,company_deals.type_of_seat, company_deals.no_of_seats,company_deals.price_per_seat,company_deals.annual_net_total,company_deals.net_total, company_deals.net_total*0 as gst_amount, company_deals.net_total as total_amount 
        // FROM company_deals
        // RIGHT JOIN members ON company_deals.company_id = members.id
        // ORDER BY members.id desc;');

        $revenueData = DB::select('SELECT cm.company_registered_name , cr.id, cr.no_of_seats , cr.received_date, cr.company_id , cr.no_of_seats ,cr.revenue_type,cr.price_per_seat,cr.monthly_rent,  cr.gst_rate,cr.invoice_amount,cr.invoice_number,cr.invoice_date,cr.payment_status,cr.payment_month, cr.amount_received FROM company_revenues as cr
        left join company_masters as cm
        on cr.company_id = cm.id order by id desc');
        $payment_status_data = $revenueData[0]->payment_status;

        $total_amount = DB::select('SELECT sum(no_of_seats) as total_seats ,SUM(price_per_seat) AS seat_amount , sum(invoice_amount) as total_amt FROM company_revenues;');
        // dd($revenueData);    

        return view('revenue.index', compact('revenueData', 'total_amount'));
    }

    public function expense()
    {



        return view('revenue.expense');
    }

    public function additionalRevenue()
    {

        // $data = revenue::all();
        $data = AdditionalRevenue::orderBy('id', 'DESC')->get();
        // dd($data);

        $total = DB::select('SELECT SUM(total_amt) as amount, sum(invoice_amt_gst) as invoice_amt,sum(invoice_amt_gst) as invoice_amt_gst,sum(total_amt) as total_amt
      FROM admin.additional_revenues;');
        // dd($total);

        return view('revenue.additional_revenue', compact('data', 'total'));
    }

    public function add_revenue()
    {
        $members = CompanyMaster::all();

        // dd($members);
        return view('revenue.create_revenue', compact('members'));
    }

    public  function additionalRevenueSave(Request $req)
    {

        // dd($req->all());
        $this->validate($req, [
            'company_name' => 'required|max:50',
            'revenue_type' => 'required',
            'total_amt' => 'required|numeric',
            'invoice_amt' => 'required',
            'invoice_amt_gst' => 'required',
            'total_amt' => 'required',
            'payment_status' => 'required',
            'payment_month' => 'required'
        ]);

        $data = new AdditionalRevenue();
        $data->company_name = $req->company_name;
        $data->revenue_type = $req->revenue_type;
        $data->total_amt = $req->total_amt;
        $data->invoice_amount = $req->invoice_amt;
        $data->invoice_amt_gst = $req->invoice_amt_gst;
        $data->total_amt = $req->total_amt;
        $data->payment_status = $req->payment_status;
        $data->payment_month = $req->payment_month;
        $data->invoice_date = $req->invoice_date;
        $data->invoice_no = $req->invoice_no;
        $data->received_date = $req->received_date;
        $data->amount_received = $req->amount_received;
        if($data->save()) {
            $response["status"] = "success";            
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function edit_additional_revenue(Request $req, $revenue_id)
    {
        // dd($revenue_id);
        $data = AdditionalRevenue::find($revenue_id);
        // dd($data);
        return view('revenue.edit_additional_revenue', compact('data'));
    }

    public function edit_revenue_save(Request $req, $revenue_id)
    {

        // $this->validate($req, [
        //     'company_name' => 'required|max:50',
        //     'revenue_type' => 'required',
        //     'total_amt' => 'required|numeric',
        //     'invoice_amt' => 'required',
        //     'invoice_amt_gst' => 'required',
        //     'total_amt' => 'required',
        //     'payment_status' => 'required',
        //     'payment_month' => 'required'
        // ]);


        $data = AdditionalRevenue::find($revenue_id);
        $data->company_name = $req->company_name;
        $data->revenue_type = $req->revenue_type;
        $data->total_amt = $req->total_amt;
        $data->invoice_amount = $req->invoice_amt;
        $data->invoice_amt_gst = $req->invoice_amt_gst;
        $data->total_amt = $req->total_amt;
        $data->payment_status = $req->payment_status;
        $data->payment_month = $req->payment_month;
        $data->invoice_date = $req->invoice_date;
        $data->invoice_no = $req->invoice_no;
        $data->received_date = $req->received_date;
        $data->amount_received = $req->amount_received;
        if($data->save()) {
            $response["status"] = "success";            
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function delete_additional_revenue($revenue_id)
    {
        // dd($revenue_id);
        $data = AdditionalRevenue::find($revenue_id);
        // dd($data);
        // $data->delete();

        if ($data->delete()) {
            $response["status"] = "success";
        } else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function payment_filter(Request $req)
    {

        $company_status = $req->company_filter;
        // dd($company_status);

        $data = AdditionalRevenue::where('payment_status', $company_status)->get();

        // dd($data);
        $company_statuses = ["RECEIVED", "PENDING", "--Select--"];

        $total = DB::select('SELECT SUM(total_amt) as amount, sum(invoice_amount) as invoice_amt,sum(invoice_amt_gst) as invoice_amt_gst,sum(total_amt) as total_amt
FROM admin.revenues;');

        return view('revenue.additional_revenue', compact('data', 'total'));
    }

    public function revenuemonth_filter(Request $req)
    {

        $company_status = $req->company_filter;
        // dd($company_status);

        $data = AdditionalRevenue::where('Payment_month', $company_status)->get();

        // dd($data);
        // $company_statuses = ["RECEIVED", "PENDING","--Select--"];

        $total = DB::select('SELECT SUM(amount) as amount, sum(invoice_amount) as invoice_amt,sum(invoice_amt_gst) as invoice_amt_gst,sum(total_amt) as total_amt
FROM admin.revenues;');

        return view('revenue.additional_revenue', compact('data', 'total'));
    }

    public function import(Request $request)
    {

        dd($request->file('import_file'));
        $request->validate([
            'import_file' => 'required'
        ]);

        Excel::import(new Revenueimport, request()->file('import_file'));
        return back()->with('success', 'Contacts imported successfully.');
    }

    public function revenue_data()
    {

        // $members = DB::select('SELECT members.id, members.Company_name, members.brand_name,count(*) as no_of_seats FROM admin.occupancies
        // join members on members.id = occupancies.company
        // join employeelists on employeelists.member_id = occupancies.company
        // where employeelists.status="Active" AND members.status="Active"
        // group by employeelists.member_id ORDER BY count(*) desc;');

        $members = CompanyMaster::all();

        $data = CompanyDeal::all();

        // $members = Member::all();
        // dd($members);
        return view('revenue.main_revenue', compact('members', 'data'));
    }

    public function revenueSave(Request $req)
    {

        // dd($req->all());

        $data = new CompanyRevenues();
        $data->company_id = $req->company_id;
        $data->no_of_seats = $req->no_of_seats;
        $data->revenue_type = $req->revenue_type;
        $data->price_per_seat = $req->price_per_seat;
        $data->monthly_rent = $req->monthly_rent;
        $data->gst_rate = $req->gst_rate;
        $data->invoice_amount = $req->invoice_amount;
        $data->invoice_number = $req->invoice_number;
        $data->invoice_date = $req->invoice_date;
        $data->received_date = $req->received_date;
        $data->payment_status = $req->payment_status;
        $data->payment_month = $req->payment_month;
        $data->amount_received = $req->amount_received;

        if($data->save()) {
            $response["status"] = "success";            
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function editRevenue($company_id)
    {
        // $companyRevenue = CompanyRevenue::where('company_id', (int)$company_id)->first();
        // dd(gettype($company_id));

        // gettype($company_id);

        $companyRevenue = CompanyRevenues::find($company_id);
        // dd($companyRevenue->company_id);

        $companyId = $companyRevenue->company_id;
        // dd($companyId);

        $companyName = DB::select("SELECT * FROM company_masters where id = " . "'" . $companyId . "'" . ";");
        // dd($companyName['0']->company_registered_name);
        // dd($companyName);

        $company_new = $companyName['0']->company_registered_name;
        //         $companyRevenue = DB::Select('SELECT mb.Company_name,cr.company_id ,cr.id, cr.no_of_seats , cr.received_date, cr.company_id , cr.no_of_seats ,cr.revenue_type,cr.price_per_seat,cr.monthly_rent,  cr.gst_rate,cr.invoice_amount,cr.invoice_number,cr.invoice_date,cr.payment_status,cr.payment_month FROM company_revenues as cr
        // left join members as mb
        // on cr.company_id = mb.id

        //             ');
        // $companyRevenue = $companyRevenue['0'];
        // dd($companyRevenue); 



        return view('revenue.revenue_edit', compact('companyRevenue', 'company_new'));
    }

    public function updateRevenue(Request $req, $company_id)
    {

        // dd($req->all()); 

        $updateRevenue = CompanyRevenues::find($company_id);
        // dd($updateRevenue);
        $updateRevenue->company_id = $req->company_id;
        $updateRevenue->no_of_seats = $req->no_of_seats;
        $updateRevenue->revenue_type = $req->revenue_type;
        $updateRevenue->price_per_seat = $req->price_per_seat;
        $updateRevenue->monthly_rent = $req->monthly_rent;
        $updateRevenue->gst_rate = $req->gst_rate;
        $updateRevenue->invoice_amount = $req->invoice_amount;
        $updateRevenue->invoice_number = $req->invoice_number;
        $updateRevenue->invoice_date = $req->invoice_date;
        $updateRevenue->received_date = $req->received_date;
        $updateRevenue->payment_status = $req->payment_status;
        $updateRevenue->payment_month = $req->payment_month;
        $updateRevenue->amount_received = $req->amount_received;
        $updateRevenue->save();
    }

    public function deleteRevenue($companyRevenueId)
    {
        // dd($company_id);
        $data = CompanyRevenues::find($companyRevenueId);
        if ($data->delete()) {
            $response["status"] = "success";
        } else {
            $response["status"] = "success";
        }
        return $response;
    }

    public function RevenueFilter(Request $req)
    {

        $company_status = $req->company_filter;
        // dd($company_status);

        // $revenueData = CompanyRevenues::where('payment_status', $company_status)->get();

        // dd($revenueData);

        $revenueData = DB::select("
                            SELECT cm.company_registered_name , cr.id, cr.no_of_seats , cr.received_date, cr.company_id , cr.no_of_seats ,cr.revenue_type,cr.price_per_seat,cr.monthly_rent,  cr.gst_rate,cr.invoice_amount,cr.invoice_number,cr.invoice_date,cr.payment_status,cr.payment_month FROM company_revenues as cr
        left join company_masters as cm
        on cr.company_id = cm.id where payment_status = " . "'" . $company_status . "'" . ";");
        // dd($revenueData);

        $company_statuses = ["RECEIVED", "PENDING", "--Select--"];

        return view('revenue.index', compact('revenueData'));
    }

    public function revenue_filter_month(Request $req)
    {

        // dd($req->all());

        $company_status = $req->filter_month;
        // dd($company_status);

        // $revenueData = CompanyRevenues::where('payment_status', $company_status)->get();

        // dd($revenueData);

        $revenueData = DB::select("
                            SELECT cm.company_registered_name , cr.id, cr.no_of_seats , cr.received_date, cr.company_id , cr.no_of_seats ,cr.revenue_type,cr.price_per_seat,cr.monthly_rent,  cr.gst_rate,cr.invoice_amount,cr.invoice_number,cr.invoice_date,cr.payment_status,cr.payment_month FROM company_revenues as cr
        left join company_masters as cm
        on cr.company_id = cm.id where payment_month = " . "'" . $company_status . "'" . ";");
        // dd($revenueData);    

        return view('revenue.index', compact('revenueData'));
    }

    public function additional_month_filter(Request $req)
    {

        $company_status = $req->filter_month;


        $data = AdditionalRevenue::where('payment_month', $company_status)->get();

        // dd($data);
        $company_statuses = ["RECEIVED", "PENDING", "--Select--"];

        $total = DB::select('SELECT SUM(total_amt) as amount, sum(invoice_amount) as invoice_amt,sum(invoice_amt_gst) as invoice_amt_gst,sum(total_amt) as total_amt
FROM admin.revenues;');

        return view('revenue.additional_revenue', compact('data', 'total'));
    }

    public function revenueTotal()
    {
        $obj = DB::select(' SELECT * FROM company_revenues
                            LEFT JOIN additional_revenues ON company_revenues.id = additional_revenues.id
                            UNION
                            SELECT * FROM company_revenues
                            RIGHT JOIN additional_revenues ON company_revenues.id = additional_revenues.id');
        $data = [];
        foreach ($obj as $row) {
            if ($row->monthly_rent == null || $row->total_amt == null) {
                if ($row->monthly_rent == null)
                    $row->monthly_rent = 0;
                if ($row->total_amt == null)
                    $row->total_amt = 0;
            }
            $data[$row->payment_month] = $row->monthly_rent + $row->total_amt;
        }
        krsort($data);
    }

    public function CombinedRevenue($date_flag = 0, $date = null)
    {
        $occupancyCount = DB::select("SELECT count(*) as count FROM admin.employeelists;");
        // dd($occupancyCount);
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
        // dd($rent);

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

        krsort($rent);
        krsort($alternate);

        //Check the netTotal
        $netTotal = DB::select("SELECT company_revenues.payment_month, SUM(company_deals.net_total) as net_total FROM admin.company_deals join admin.company_revenues on company_deals.company_id = company_revenues.company_id group by company_revenues.payment_month order by company_revenues.payment_month desc;");
        // $netTotal = $netTotal[0]->net_total;
        // dd($netTotal);

        $net_total = [];
        foreach ($netTotal as $value) {
            $net_total[$value->payment_month] = $value->net_total;
        }

        // dd($net_total);
        $dates = array_keys($rent);

        foreach ($dates as $value) {
            if (!in_array($value, array_keys($net_total)))
                $net_total[$value] = 1;
        }

        // dd($net);

        // dd($alternate);
        // dd($rent);
        $rent_value = array_values($rent);
        $alternate_value = array_values($alternate);
        $total_revenue = [];
        for ($i = 0; $i < count($rent); $i++) {
            $total_revenue[$dates[$i]] = (int) round((($rent_value[$i] + $alternate_value[$i]) / (int) $net_total[$dates[$i]]) * 100);
        }
        krsort($total_revenue);


        // dd($total_revenue);


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

        $male = $obj[1]->count;
        // dd($male);
        $female = $obj[0]->count;

        $gender_data = $obj[0]->count . ':' . $obj[1]->count;
        // dd($gender_data);    

        $monthEmployee = DB::select("SELECT months, CEIL((count(*)/90)*100) as count FROM admin.employeelists where months is not null AND months !=' ' group by months order by months;");
        // dd($monthEmployee);

        $today = Carbon::now();
        $lastMonth =  $today->subMonth()->format('m'); // 11


        $monthCount = [];
        $t = [];
        foreach ($monthEmployee as $key => $value) {
            # code...
            $x = (array) $value;
            array_push($t, $x['months']);
            if ((int) $x['months'] > $lastMonth + 1) {
                // $monthCount['2019-' . $x['months']] = (int) $x['count'];
                $monthCount[$x['months']] = (int) $x['count'];
            } else {
                // $monthCount['2020-' . $x['months']] = (int) $x['count'];
                $monthCount[$x['months']] = (int) $x['count'];
            }
        }

        // dd($t);

        // for ($i = 1; $i < 13; $i++) {
        //     # code..
        //     if (!in_array((string) $i, array_values($t)) and $i > $lastMonth + 1) {
        //         $monthCount['2019-' . "0" . (string) $i] = 0;
        //     } else if (!in_array((string) $i, array_values($t)) and $i <= $lastMonth + 1) {
        //         $monthCount['2020-' . "0" . (string) $i] = 0;
        //     }
        // }

        foreach ($total_revenue as $key => $value) {
            if (!in_array($key, array_keys($monthCount)))
                $monthCount[$key] = 0;
        }

        // dd($value);

        foreach ($monthCount as $key => $value) {
            if (!in_array($key, array_keys($total_revenue)))
                $total_revenue[$key] = 0;
        }

        // dd($key);

        $month = $key;
        // dd($month);


        ksort($total_revenue);
        $total_revenues = $total_revenue;
        // dd($total_revenue);
        //print_r($total_revenues);
        ksort($monthCount);
       // dd($monthCount);



        // $today = Carbon::now();
      // $lastFullMonth =  Carbon::now()->format('M');
        // $lastFullMonth = $today->subMonth()->format('M');
        // dd($lastFullMonth);
        // $lastYear = $today->year;

        // dd($lastYear);

        $db_dates = DB::select('SELECT payment_month from company_revenues group by payment_month order by payment_month desc');
        // dd($db_dates);


        $today = Carbon::now();
        $lastMonth =  $today->subMonth()->format('m');
        // dd($lastMonth);
        // $lastMonth = "05";
        $lastMonthObj = $today->year . "-" . $lastMonth;
        // dd($lastMonthObj);
        // dd($date_flag);
        if ($date != null) {
            $dateObj = \DateTime::createFromFormat('Y-M-j', $date . "-10");
            $date = $dateObj->format('Y-m');
            // dd($date);
        }

        foreach ($db_dates as $value) {
            if ((String)$date_flag == '0' && $lastMonthObj >= $value->payment_month) {
                $lastMonthObj = $value->payment_month;
                // dd($lastMonthObj);
                break;
            }

            if ((String)$date_flag == '-1' && $date > $value->payment_month) {
                $lastMonthObj = $value->payment_month;
                break;               
            }
        }

        foreach (array_reverse($db_dates) as $value) {
            if ((String)$date_flag == '1' && $date < $value->payment_month) {
                $lastMonthObj = $value->payment_month;
                break;
            }
        }


        $today = Carbon::now();
        $lastMonth =  $today->subMonth()->format('m');
        $lastMonth = "05";
        $lastDate = $today->year . "-" . $lastMonth;

        foreach ($db_dates as $value) {
            if ((String)$date_flag == '0' && $lastDate >= $value->payment_month) {
                $lastDate = $value->payment_month;
                break;
            }
        }
        // dd($date);
        if ($lastDate == $lastMonthObj)
            $nextState = 1;
        else
            $nextState = 0;

        
        $date = explode("-", $lastMonthObj);
        $lastYear = $date[0];

        $dateObj = \DateTime::createFromFormat('m-j', $date[1] . "-10");
        $monthName = $dateObj->format('F');

        $lastFullMonth = $monthName;


        $db_revenue = DB::select('SELECT company_masters.id, company_revenues.invoice_amount, company_masters.company_registered_name, company_revenues.no_of_seats, company_revenues.price_per_seat from company_masters join company_revenues on company_masters.id = company_revenues.company_id where company_revenues.payment_month = ?', [$lastMonthObj]);

        // dd($db_revenue);
        $may_data = $db_revenue;

        $today = Carbon::now();
        // $currentDate =  $today->format('Y-m');
        $currentDate =  "2020-05";

        $temp = $db_revenue;
       // dd($may_data);
        $db_revenue_company = [];
        $db_employee_company = [];
        foreach ($db_revenue as $row) {
            $db_revenue_company[] = DB::select('SELECT SUM(monthly_rent) as to_pay, SUM(amount_received) as amount_received from company_revenues where company_id = ? and payment_month = ?', [$row->id, $lastMonthObj]);
            // dd($db_revenue_company);
            $db_seats = DB::select('SELECT no_of_seats as occupancy from company_revenues where company_id = ? AND payment_month = ?', [$row->id, $currentDate]);
            if (empty($db_seats))
                $db_employee_company[] = 0;
            else
                $db_employee_company[] = $db_seats[0]->occupancy;
        }
        // dd($db_employee);
        $revenue_name = [];
        foreach ($db_revenue as $value) {
            $revenue_name[] = $value->company_registered_name;
        }
        // dd($db_revenue);
        $zipped_revenue = array_map(null, $db_revenue, $db_revenue_company, $db_employee_company);

        $db_additional_revenue = DB::select('SELECT company_name from additional_revenues where payment_month = ?', [$lastMonthObj]);

        $db_additional_revenue_company = [];
        foreach ($db_additional_revenue as $row) {
            $db_additional_revenue_company[] = DB::select('SELECT SUM(total_amt) as to_pay, SUM(amount_received) as amount_received from additional_revenues where company_name = ? and payment_month = ?', [$row->company_name, $lastMonthObj]);
        }

        $additional_name = [];
        foreach ($db_additional_revenue as $value) {
            $additional_name[] = $value->company_name;
        }

        $zipped_additional_revenue = array_map(null, $db_additional_revenue, $db_additional_revenue_company);

        // dd($zipped_revenue);
        $data = [];
        foreach ($zipped_revenue as $value) {
            if (in_array($value[0]->company_registered_name, $additional_name)) {
                foreach ($zipped_additional_revenue as $inner) {
                    if ($value[0]->company_registered_name == $inner[0]->company_name) {
                        $value[1][0]->to_pay += $inner[1][0]->to_pay;
                        $value[1][0]->amount_received += $inner[1][0]->amount_received;
                        break;
                    }
                }
            }
            $data[] = ["company_name" => $value[0]->company_registered_name, "seats" => $value[0]->no_of_seats, "to_pay" => $value[1][0]->to_pay, "occupancy" => $value[2], "due_amount" => $value[1][0]->to_pay - $value[1][0]->amount_received];
        }
        // dd($data);

        foreach ($zipped_additional_revenue as $value) {
            if (!in_array($value[0]->company_name, $revenue_name)) {
                $data[] = ["company_name" => $value[0]->company_name, "seats" => 0, "to_pay" => $value[1][0]->to_pay, "occupancy" => "0", "due_amount" => $value[1][0]->to_pay - $value[1][0]->amount_received,"unsold_seats"=>"41"];
            }
        }

        // dd($data);
        $total = 0;

        foreach ($data as $value) {
            $total += $value["to_pay"];
        }
        $occcupency_data = [];
        foreach ($data as $key => $value) {
                array_push($occcupency_data, $value["occupancy"]);
        }


        ////////////////Code for graph display//////////////////////////




        // $revenue_data = DB::select('SELECT payment_month, (total_amt + monthly_rent) as total_amount 
        //                             from(
        //                                 select payment_month , total_amt 
        //                                 from additional_revenues
        //                                 union all
        //                                 select payment_month , monthly_rent 
        //                                 from company_revenues
        //                             )t
        //                             group by payment_month 
        //                             order by payment_month desc limit 5;');

        // $revenue_data = DB::select('SELECT payment_month , total_amt 
        //                                 from additional_revenues
        //                                 union all
        //                                 select payment_month , monthly_rent 
        //                                 from company_revenues
        //                             ');

        // $revenue_data = DB::select('SELECT monthly_rent as ramount, total_amt as aamount from(SELECT monthly_rent from company_revenues union all SELECT total_amt from additional_revenues)t');

        $revenue_data = DB::select("SELECT company_revenues.payment_month as rm, company_revenues.monthly_rent, additional_revenues.payment_month as am, additional_revenues.total_amt from company_revenues RIGHT JOIN additional_revenues ON company_revenues.payment_month = additional_revenues.payment_month");        

        // dd($revenue_data);






        $db_revenues = DB::select('SELECT company_masters.id, company_revenues.payment_month, SUM(company_revenues.no_of_seats) as no_of_seats, company_revenues.price_per_seat,SUM(company_revenues.monthly_rent) as monthly_rent, occupancies.percentage, SUM(company_revenues.amount_received) as amount_received, company_revenues.company_id from company_masters join company_revenues on company_masters.id = company_revenues.company_id join occupancies on company_masters.id = occupancies.company group by company_revenues.payment_month');

        // dd($db_revenues);

        $db_additional_revenues = DB::select('SELECT payment_month, SUM(total_amt) as total_amount, SUM(amount_received) as amount_received from additional_revenues group by additional_revenues.payment_month');

 //NEW starts
        $revenue_data = [];

        foreach ($db_revenues as $value) {
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
            $monthName = $dateObj->format('Y-F');            
            $revenue_data[$value->payment_month] = ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => $value->no_of_seats,"percentage" => $value->percentage, "total_revenue" => $value->monthly_rent,"amount_received"=>$value->amount_received];
        }

        foreach ($db_additional_revenues as $value) {
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
            $monthName = $dateObj->format('Y-F');
            if (isset($revenue_data[$value->payment_month])) {
                $revenue_data[$value->payment_month]["total_revenue"] += $value->total_amount;
                $revenue_data[$value->payment_month]["amount_received"] += $value->amount_received;
            }
            else
                $revenue_data[$value->payment_month] = ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => 0, "percentage" => 0, "total_revenue" => $value->total_amount,"amount_received"=>$value->amount_received];
        }
//NEW ends
        krsort($revenue_data);


//OLD starts
        // dd($db_additional_revenues);
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
        
        // dd($temp2);
        // dd($temp1);
        $check = [];
        foreach ($db_revenues as $key => $value) {
            # code.monthly_rent
            // dd($value);
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
                $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
                $monthName = $dateObj->format('Y-F');
                        
                foreach ($db_additional_revenues as $keys => $values) {
                    # code...
                    // dd($values);
                    if ($values->payment_month == $value->payment_month) {
                        $a = $values->total_amount;
                        $b = $values->amount_received;
                        break;
                       
                    }
                }
                array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => (int)$value->no_of_seats,"percentage" => $value->percentage, "total_revenue" => $value->monthly_rent + $a, "amount_received"=>$value->amount_received+ $b]);
            }
        }
            // dd($check);

        // dd($value);
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

//OLD ends

        // $obj = array_multisort(array_column($data, 'occupancy'), SORT_DESC, $data);
        // dd($data);
        $data = self::sortArray($data,'occupancy','DESC');
        // dd($data);

        $occupency_data = $revenue_data;
        // $occupency_data = $check;


        $occupency = [];
        foreach ($occupency_data as $value) {
            $occupency[] = round($value["no_of_seats"]/90*100);
        }

        // dd($occupency);

        $company_data = DB::select('SELECT count(*) as active_company FROM admin.company_masters where status=1;');
        // dd($company_data[0]->active_company);

        $member_count = $company_data[0]->active_company;
        // dd($member_count);
        $employee = DB::select('SELECT count(*) as employee_list FROM admin.employeelists where status = 1;');
        // dd($employee[0]->employee_list);

        // dd($month);

        $employee_count =$employee[0]->employee_list;


        $colors = [];
        $s = 100;
        $l = 95;
        for ($i = 0; $i < count($data); $i++) { 
            $colors[] = [120, $s, $l];
            // $s -= 1;
            $l -= 3;
        }


        $colors1 = [];
        $colors1[] = [354, 84, 65];
        $s = 100;
        $l = 95;
        for ($i = 0; $i < count($data); $i++) { 
            $colors1[] = [120, $s, $l];
            // $s -= 1;
            $l -= 3;
        }

 
        $occupied_data = 0;
        foreach ($data as $key => $value) {
            $occupied_data += $value["occupancy"];
        }
        $unoccupied_data = 90 - $occupied_data;
        // dd($occupied_data);
        // dd($total);
       

        $occupancy_percentage_data = round($occupied_data / config('global.total_seats') * 100);

// dd($data);
        return view('revenue.all_revenue' ,["records" => $data,'total_revenues'=>$total_revenues ,'monthCount'=>$monthCount,'male'=>$male,'female'=>$female ,"month" => $lastFullMonth, "year" => $lastYear, "total" => $total,"all_revenue"=>$check, "colors" => $colors, "colors1" => $colors1],compact('occupency','member_count','employee_count','may_data','unoccupied_data', 'nextState', 'occupancy_percentage_data'));
    }


    public function sortArray($array, $sortByKey, $sortDirection) {

        $sortArray = array();
        $tempArray = array();
    
        foreach ( $array as $key => $value ) {
            $tempArray[] = strtolower( $value[ $sortByKey ] );
        }
    
        if($sortDirection=='ASC'){ asort($tempArray ); }
            else{ arsort($tempArray ); }
    
        foreach ( $tempArray as $key => $temp ){
            $sortArray[] = $array[ $key ];
        }
    
        return $sortArray;
    
    }

    public function revenueCompany($company_name, $flag = null)
    {
        $db_revenues = DB::select('SELECT company_masters.id, company_revenues.payment_month,company_revenues.invoice_amount, company_revenues.no_of_seats, company_revenues.price_per_seat,company_revenues.monthly_rent, occupancies.percentage, company_revenues.amount_received, company_revenues.company_id, company_revenues.tds_received from company_masters join company_revenues on company_masters.id = company_revenues.company_id join occupancies on company_masters.id = occupancies.company where company_masters.company_registered_name = ? order by company_revenues.payment_month limit 12', [$company_name]);

        // dd($db_revenues);

        $db_additional_revenues = DB::select('SELECT payment_month,invoice_amount, total_amt, amount_received from additional_revenues where company_name = ? order by payment_month  limit 12', [$company_name]);
        // dd($db_additional_revenues);
        // dd($db_revenues);



 //NEW starts
        $revenue_data = [];
        
        foreach ($db_revenues as $value) {
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
            $monthName = $dateObj->format('Y-F');            
            $revenue_data[$value->payment_month] = ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => $value->no_of_seats,"price_per_seat"=>$value->price_per_seat, "monthly_rent" => $value->monthly_rent, "percentage" => $value->percentage,"invoice_amount" =>$value->invoice_amount, "meeting_revenue" => 0, "total_revenue" => $value->monthly_rent, "due_amount" => $value->monthly_rent - $value->amount_received,"amount_received"=>$value->amount_received,"company_id"=>$value->company_id, "tds_received" => $value->tds_received];
        }

        foreach ($db_additional_revenues as $value) {
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
            $monthName = $dateObj->format('Y-F');
            if (isset($revenue_data[$value->payment_month])) {
                $revenue_data[$value->payment_month]["total_revenue"] += $value->total_amt;
                $revenue_data[$value->payment_month]["amount_received"] += $value->amount_received;
                $revenue_data[$value->payment_month]["invoice_amount"] += $value->invoice_amount;
                $revenue_data[$value->payment_month]["due_amount"] += $value->total_amt - $value->amount_received;
                $revenue_data[$value->payment_month]["meeting_revenue"] += $value->total_amt;
            }
            else
                $revenue_data[$value->payment_month] = ["date" => $monthName, "payment_month" => $value->payment_month, "invoice_amount" => $value->invoice_amount, "no_of_seats" => 0, "price_per_seat"=>0,"monthly_rent" => 0, "percentage" => 0, "meeting_revenue" => $value->total_amt, "total_revenue" => $value->total_amt, "due_amount" => $value->total_amt - $value->amount_received,"amount_received"=>$value->amount_received, "company_id"=>0, "tds_received" => 0];
        }
//NEW ends
        krsort($revenue_data);


//OLD starts 
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
            // dd($value);
            if (!in_array($value->payment_month, $temp1)) {
                $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
                $monthName = $dateObj->format('Y-F');
               // print_r($value->payment_month);
               array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => $value->no_of_seats,"price_per_seat"=>$value->price_per_seat, "monthly_rent" => $value->monthly_rent, "percentage" => $value->percentage,"invoice_amount" =>$value->invoice_amount, "meeting_revenue" => 0, "total_revenue" => $value->monthly_rent, "due_amount" => $value->monthly_rent - $value->amount_received,"amount_received"=>$value->amount_received,"company_id"=>$value->company_id, "tds_received" => $value->tds_received]);
        } else {
                $a = 0;
                $b=0;
                $c=0;
                $dateObj   = \DateTime::createFromFormat('Y-m', $value->payment_month);
                $monthName = $dateObj->format('Y-F');
                        
                foreach ($db_additional_revenues as $keys => $values) {
                    # code...
                    // dd($value);
                    if ($values->payment_month == $value->payment_month) {
                        $a = $values->total_amt;
                        $b = $values->amount_received;
                        $c = $values->invoice_amount;
                        break;
                        // dd($c);
                    }
                }
                array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month, "no_of_seats" => $value->no_of_seats, "price_per_seat"=>$value->price_per_seat,
                 "monthly_rent" => $value->monthly_rent, "percentage" => $value->percentage,"invoice_amount" =>(int)$c+(int)$value->invoice_amount, "meeting_revenue" => $a, "total_revenue" => $value->monthly_rent + $a, "due_amount" => ($value->monthly_rent + $a) - ($value->amount_received + $b),"amount_received"=>$value->amount_received+ $b,"company_id"=>$value->company_id, "tds_received" => $value->tds_received]);
            }
        }

        // dd($db_additional_revenues);
        foreach ($db_additional_revenues as $key => $value) {
            # code...

            // dd($value->invoice_amount);
            if (!in_array($value->payment_month, $temp2)) {
                $dateObj   = \DateTime::createFromFormat('Y-m', $value->payment_month);
                $monthName = $dateObj->format('Y-F');
                array_push($check, ["date" => $monthName, "payment_month" => $value->payment_month,"invoice_amount" => $value->invoice_amount, "no_of_seats" => 0, "price_per_seat"=>0,"monthly_rent" => 0, "percentage" => 0, "meeting_revenue" => $value->total_amt, "total_revenue" => $value->total_amt, "due_amount" => $value->total_amt - $value->amount_received,"amount_received"=>$value->amount_received, "company_id"=>0, "tds_received" => 0]);
            }
        }
//OLD ends


        // if ($flag) {
        //     return $check;
        // }


        $b = array_values($revenue_data);

        $total = 0;
        foreach ($check as $value) {
            $total += $value["total_revenue"];
        }


        return view('revenue.company_revenue', [
            "revenues" => $b,
            "additional_revenues" => $db_additional_revenues,
            "company_name" =>$company_name,
            "data" => $db_revenues,
            "total" => $total
        ],compact('b'));
    }

    public function companyAgreementTable(Request $request,$company_id) {

        $company_data = DB::select("SELECT id, company_registered_name as company_name, tenure, lock_in, start_date, end_date from company_masters where id = ?", [$company_id]);
        //dd($company_data);

         $company_image = DB::select("SELECT banner_source FROM admin.company_masters where id = "."'".$company_id."'".";");
        // dd($company_image[0]);
        $image_mewo = $company_image[0]->banner_source;

        return view("revenue.agreement_table", ["company" => $company_data[0]],compact('image_mewo'));
    }


    //Company Invoice
    public function companyInvoice($company_name)
    {

        // dd($company_name);
        // $invoice=json_decode($request->revenues);
        $invoice = RevenueController::revenueCompany($company_name, 1);
       // dd($invoice);

        $a = $invoice;

       krsort($a);

        $monthly_invoice = [];
        foreach ($a as $value) {
            // dd($value);
            $monthly_invoice[] = $value;
        }
        // dd($invoice); 
        

return view('revenue.invoice.company_invoice',[
            "company_invoice" =>$invoice,
            "company_name"=>(string)$company_name,
            "prev_month"=>$invoice[0]["date"]],compact('monthly_invoice'));

        //return response()->json(['foo'=>'bar']);
    } 

    public function monthly_due(){
       $payment_month=DB::select('SELECT payment_month from company_revenues group by payment_month order by payment_month desc');
        $payment_month=$payment_month[0]->payment_month;
       $companies_dues=DB::select('SELECT company_masters.company_registered_name, company_masters.brand_name, company_revenues.company_id, company_revenues.monthly_rent , company_revenues.payment_month, company_revenues.amount_received, (company_revenues.monthly_rent-company_revenues.amount_received) as outstanding from company_revenues join company_masters on company_masters.id = company_revenues.company_id where company_revenues.payment_month= "'.$payment_month.'" order by outstanding desc');
        // dd(array_filter((array)$companies_dues));

        $monthly_due=[];

         $monthly_due_amount = DB::select('SELECT SUM(monthly_rent) as monthly_rent,payment_month,SUM(amount_received)  as amount_received  from company_revenues GROUP BY payment_month order by payment_month');
         // dd($monthly_due_amount);
         //dd($monthName);
         foreach ($monthly_due_amount as $key => $value) {
             # code...
            $due_amount=($value->monthly_rent)-($value->amount_received);
            $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->payment_month . "-10");
            $yearMonth = $dateObj->format('Y-F');
            array_push($monthly_due, ["payment_month"=>$value->payment_month,"month"=>$yearMonth,"monthly_due"=>$due_amount,"monthly_due_percentage"=>round(($due_amount/$value->monthly_rent)*100)]);

         }
       // dd($yearMonth); 

        return view('revenue.monthly_due',[
            "monthly_due"=>$monthly_due,
            "company_due"=>$companies_dues,
        ],compact('yearMonth'));
    }


    public function monthlyDueBarClick($date) {

        $dateObj   = \DateTime::createFromFormat('Y-F-j', $date . "-10");
        $monthName = $dateObj->format('Y-m');

        $monthly_due_amount = DB::select('SELECT SUM(monthly_rent) as monthly_rent, payment_month,SUM(amount_received)  as amount_received  from company_revenues where payment_month = ?', [$monthName]);

        $companies_dues=DB::select('SELECT company_masters.company_registered_name, company_masters.brand_name, company_revenues.company_id, company_revenues.monthly_rent , company_revenues.payment_month, company_revenues.amount_received, (company_revenues.monthly_rent-company_revenues.amount_received) as outstanding from company_revenues join company_masters on company_masters.id = company_revenues.company_id where company_revenues.payment_month= "'.$monthName.'" order by outstanding desc');
        $response["company_due"]=$companies_dues;

        $due_amount = (int)$monthly_due_amount[0]->monthly_rent - (int)$monthly_due_amount[0]->amount_received;
        $response["data"] = ["payment_month" => $monthly_due_amount[0]->payment_month,"month" => $date, "monthly_due" => $due_amount,"monthly_due_percentage"=>round(($due_amount/$monthly_due_amount[0]->monthly_rent)*100)];
        $response["status"] = "success";
        return $response;
        
    }


    public function companies_monthly_due(Request $request,$payment_month){

        $companies_dues=DB::select('SELECT company_masters.company_registered_name, company_masters.brand_name, company_revenues.company_id, company_revenues.monthly_rent , company_revenues.payment_month, company_revenues.amount_received, (company_revenues.monthly_rent-company_revenues.amount_received) as outstanding from company_revenues join company_masters on company_masters.id = company_revenues.company_id where company_revenues.payment_month= '.'"'.$payment_month.'"'.'order by outstanding desc');

        // dd($companies_dues);
        // $company_id=[];
        // foreach($companies_dues as $key => $value) {
        
        //     array_push($company_id,$value->company_id);
        // }
        // $companies_names=CompanyMaster::select('id','company_registered_name')
        //      ->whereIn('id', $company_id)
        //      ->get();
        //dd($companies_names);
        // foreach ($companies_names as $key => $value) {
        //     # code...
        //     print_r($value->company_registered_name);
        // }
        return view('revenue.companies_monthly_due',[
            "company_due"=>$companies_dues,
        ]);
    }

    public function revenue_filter($year, $month)
    {

        // dd($month);
        $date = $year . "-" . $month;
        // dd($date);
        $data = DB::select('select id from additional_revenues where payment_month = ?', [$date]);
        // dd($data);
        $response['status'] = "success";
        $response['id'] = $data[0]->id;
        // dd($response['id']);
        return $response;
    }

    public function companySeats($companyId)
    {

        // dd($companyId);
        $no_of_seats = DB::select("SELECT  company_deals.no_of_desk
        FROM company_masters
        LEFT JOIN company_deals ON company_masters.id = company_deals.company_id
        where company_masters.id = " . $companyId . ";");
        // dd($no_of_seats[0]->no_of_desk);

        $seats =  $no_of_seats[0]->no_of_desk;

        return response()->json($seats);
    }
    public function twitter_user_info($screen_name)
    {
        // $data = file_get_contents("https://cdn.api.twitter.com/1/users/lookup.json?screen_name=" . $screen_name);
        // $data = json_decode($data, true);
        // return $data[0];

        $xml = new SimpleXMLElement(urlencode(strip_tags('https://twitter.com/users/google.xml')), null, true);
        dd($xml);
    }

    public function twiiterFollowerCount()
    {
        // dd("h");
        $twitter = self::twitter_user_info("HardeepAsrani");
        dd($twitter['followers_count']);
    }
    public function averagePrice() {

         $revenue_data = DB::select('SELECT payment_month as label, sum(monthly_rent)/sum(no_of_seats) as value from company_revenues group by payment_month order by payment_month desc ;');
        // dd($revenue_data);

         $revenue_data1 = DB::select('SELECT payment_month as label, sum(monthly_rent)/sum(no_of_seats) as value from company_revenues group by payment_month order by payment_month ;');

         $payment_month=[];
         foreach ($revenue_data1 as $key => $value) {
             $dateObj   = \DateTime::createFromFormat('Y-m-j', $value->label . "-10");
                $monthName = $dateObj->format('Y-F');
             array_push($payment_month, $monthName);
         }

         $avg_price=[];
         $formattedAverageValue = [];
         $fmt = new \NumberFormatter($locale = "en_IN", \NumberFormatter::DECIMAL);
         foreach ($revenue_data1 as $key => $value) {
             array_push($avg_price, (int)($value->value));
             $formattedAverageValue[] = "INR " . $fmt->format(round((int)$value->value));
         }

         $graph = array_map(null, $payment_month, $avg_price, $formattedAverageValue);

        return view("revenue.average_price",compact('revenue_data', 'graph', 'payment_month', 'avg_price'));
    }
}
