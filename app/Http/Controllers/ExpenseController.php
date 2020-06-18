<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
	public function index()
	{
		$data = DB::select('select * from expenses order by date desc');

		$keys = [];
		$arr_data = [];
		for ($i = 0; $i < count((array) $data); $i++) {
			$arr_data[] = (array) $data[$i];
            $dateObj = \DateTime::createFromFormat('Y-m-j', $arr_data[$i]['date'] . "-10");
            $date = $dateObj->format('Y-F');
			$arr_data[$i]['date'] = $date;
		}

		if(count((array)$data) > 0) {
			$keys = array_keys((array)$data[0]);
			unset($keys[0]);
			unset($keys[1]);
			unset($keys[36]);
			unset($keys[37]);
			$keys = array_values($keys);
		}


		$types = ['Salaries & Fixed Expenses', '- Salaries', '- Marketing', '- Tech', 'Electricity, UPS & Generator etc', 'Cafe Material', '- CCD Material', '- Pantry Materials', 'Water Bills', 'Travel, Hotel & Conveyance', '- Travel Expenses', '- Conveyance', '- Stay', 'Internet Charge (Pre-Paid Quarterly', 'Additional Marketing', '- Google Ads', '- Facebook Ads', '- Collaterals', 'Events & Refreshments', '- Entertainment', '- Event', '- Gifting', 'Brokerage/Commission', 'Misc Expenses', '- Society Rental for Internet Cable', '- Pest Control Monthly', '- Meeting Room Booking License', '- Stationery', '- Employee Health Exp', '- Fixtures & Fittings', 'Additional Details', '- House Keeping', '- Generator', 'MONTHLY EXPENSES'];

		// $budgets = [357500, 103600, 117000, 23400, 50000, 37500, 0, 20000, 29177, 29600, 64321, 775377];
		$budgets = [357500, 103600, 117000, 23400, 50000, 37500, 0, 20000, 29177, 29600, 64321, 769000];
		// dd($budgets);

		/////////////// Code for revenue ///////////////

		$db_revenues = DB::select('SELECT payment_month, SUM(monthly_rent) as amount from company_revenues group by payment_month order by payment_month desc');

		$db_additional_revenues = DB::select('SELECT payment_month, SUM(total_amt) as amount from additional_revenues group by payment_month order by payment_month desc');

		$revenue_data = [];

        foreach ($db_revenues as $value)
            $revenue_data[$value->payment_month] = ["date" => $value->payment_month, "amount" => $value->amount];

        foreach ($db_additional_revenues as $value) {
            if (isset($revenue_data[$value->payment_month])) {
                $revenue_data[$value->payment_month]["amount"] += $value->amount;
            }
            else
                $revenue_data[$value->payment_month] = ["date" => $value->payment_month, "amount" => $value->amount];
        }

		foreach ($data as $value) {
			if (!isset($revenue_data[$value->date]))
				$revenue_data[$value->date] = ["date" => $value->date, "amount" => 0];
		}
		krsort($revenue_data);

		$burns = [];
		foreach ($data as $value) {
			$burns[] = ["id" => $value->id, "amount" => ($revenue_data[$value->date]["amount"] - $value->total)];
			$revenue_data[$value->date]["id"] = $value->id;
		}

		// dd($revenue_data);

		return view('fonik_expense.index', ['records' => $arr_data, 'types' => $types, 'keys' => $keys, 'budgets' => $budgets, "revenues" => $revenue_data, "burns" => $burns],compact('data'));

	}
	public function create(Request $request)
	{
		return view('fonik_expense.add_expense');
	}


	public function storeExpense(Request $request, $id)
	{

		$date = $request->year . '-' . $request->month;
		//dd($date);

		if ($id == 0) {

			$flag = Expense::where('date', $date)->first();

			if ($flag) {
				$response["status"] = "Expense already exists!";
				return $response;
			}

			// ====Create Expense begins

			$expense = new Expense();
		} else
			$expense = Expense::find($id);


		$expense->date = $date;
		$expense->salaries = $request->salaries;
		$expense->marketing = $request->marketing;
		$expense->tech = $request->tech;
		$expense->electricity = $request->electricity;
		$expense->ccd_materials = $request->ccd_materials;
		$expense->pantry_materials = $request->pantry_materials;
		$expense->water_bills = $request->water_bills;
		$expense->travel = $request->travel;
		$expense->conveyance = $request->conveyance;
		$expense->stay = $request->stay;
		$expense->internet_charge = $request->internet_charge;
		$expense->google_ads = $request->google_ads;
		$expense->facebook_ads = $request->facebook_ads;
		$expense->collaterals = $request->collaterals;
		$expense->entertainment = $request->entertainment;
		$expense->event = $request->event;
		$expense->gifting = $request->gifting;
		$expense->commission = $request->commission;
		$expense->internet_cable_rent = $request->internet_cable_rent;
		$expense->pest_control_monthly = $request->pest_control_monthly;
		$expense->meeting_room_booking_license = $request->meeting_room_booking_license;
		$expense->stationery = $request->stationery;
		$expense->employee_health = $request->employee_health;
		$expense->fixtures_fittings = $request->fixtures_fittings;
		$expense->fixed_total = $request->fixed_total;
		$expense->cafe_total = $request->cafe_total;
		$expense->travel_hotel_conveyance_total = $request->travel_hotel_conveyance_total;
		$expense->marketing_total = $request->marketing_total;
		$expense->events_total = $request->events_total;
		$expense->misc_total = $request->misc_total;
		$expense->house_keeping = $request->house_keeping;
		$expense->generator = $request->generator;
		$expense->additional_total = $request->additional_total;
		$expense->total = $request->total;

		if ($expense->save()) {
			$response["status"] = "success";
		} else {
			$response["status"] = "failure";
		}
		return $response;
	}

	public function edit($id)
	{
		$expense_record = Expense::find($id);
		$month_year = explode('-', $expense_record['date']);
		// dd($expense_record);
		return view('fonik_expense.edit_expense', ['record' => $expense_record, 'year' => $month_year[0], 'month' => $month_year[1]]);
	}


	public function destroyExpense($expense_id)
	{
		if (Expense::destroy($expense_id)) {
			$response["status"] = "success";
		} else {
			$response["status"] = "failure";
		}
		return $response;
	}

	public function filterExpense($year, $month)
	{
		// dd($month);
		$date = $year . "-" . $month;
		// dd($date);
		$data = DB::select('select id from expenses where date = ?', [$date]);
		// dd($data);
		$response['status'] = "success";
		$response['id'] = $data[0]->id;
		// dd($response['id']);
		return $response;
	}
}
