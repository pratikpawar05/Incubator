<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\CompanyMaster;
use App\Employeelist;
use App\CompanyDeal;
use App\CompanyDocument;
use validate;
use App\Exports\memberexport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Response;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function companyDetails()
    {
        // $role_id = auth()->user()->role_id;
        // // dd($role_id);
        
        // $permission = DB::select("SELECT permission ,module 
        // FROM permissions as pr
        // LEFT JOIN role_permissions as rp 
        // ON pr.id = rp.permission_id where permission_id = ".$role_id."  && role_id = ".$role_id.";");

        // dd($permission);
        $memberdata = CompanyMaster::orderBy('updated_at', 'DESC')->orderBy('status')->get();
        // dd($memberdata);

        return view('company.index', compact('memberdata'));
    }

    public function addCompany()
    {

        return view('company.create_company');
    }

    public function viewCompanyDetails($id, $check=null)
    {
        // dd($check);


        if($check!=null){
        $member = CompanyMaster::find((int)$id);
        $company_deal = CompanyDeal::where('company_id', $id)->get();
        $company_docs = CompanyDocument::where('company_id', $id)->get();

        $company_deal_structure = DB::select('SELECT count(type_of_desk) as count from company_deals where company_id = ?', [$id]);
        $company_deal_director = DB::select('SELECT count(director_name) as count from company_deals where company_id = ?', [$id]);
        $structure_count = $company_deal_structure[0]->count;
        $director_count = $company_deal_director[0]->count;
        if ($structure_count == 0)
            $structure_count = 1;
        if ($director_count == 0)
            $director_count = 1;

         $company_image = DB::select("SELECT banner_source FROM company_masters where id = "."'".$id."'".";");
        // dd($company_image[0]);
        $image_mewo = $company_image[0]->banner_source;

        // dd($image_mewo);

        return view('company.view_company', ["member" => $member, "company_deal" => $company_deal, "deal_structure" => $structure_count, "deal_director" => $director_count, "company_docs" => $company_docs[0], "id" => $id,"check"=>$check],compact('image_mewo'));

        }
        print_r($check);
        $member = CompanyMaster::find((int)$id);
        $company_deal = CompanyDeal::where('company_id', $id)->get();
        $company_docs = CompanyDocument::where('company_id', $id)->get();

        $company_deal_structure = DB::select('SELECT count(type_of_desk) as count from company_deals where company_id = ?', [$id]);
        $company_deal_director = DB::select('SELECT count(director_name) as count from company_deals where company_id = ?', [$id]);
        $structure_count = $company_deal_structure[0]->count;
        $director_count = $company_deal_director[0]->count;
        if ($structure_count == 0)
            $structure_count = 1;
        if ($director_count == 0)
            $director_count = 1;
        return view('company.view_company', ["member" => $member, "company_deal" => $company_deal, "deal_structure" => $structure_count, "deal_director" => $director_count, "company_docs" => $company_docs[0], "id" => $id,"check"=>null, "image_mewo" => null]);
    
    }

    public function storeCompany(Request $req, $company_id)
    {
        // $this->validate($req,[
        //         'company_registered_name'=>'required|max:35',
        // ]);

        if ((int)$company_id == 0) {
            $flag = CompanyMaster::where('company_registered_name', $req->company_registered_name)->first();
            if ($flag) {
                $response["status"] = "Company already exists!";
                $response["company_id"] = null;
                return $response;
            }
            $company = new CompanyMaster();
        }
        else
            $company = CompanyMaster::find($company_id);

        $company->company_registered_name = $req->company_registered_name;
        $company->brand_name = $req->brand_name;
        $company->start_date = $req->start_date;
        $company->end_date = $req->end_date;
        $company->date_of_incorporation = $req->date_of_incorporation;
        $company->tenure = $req->tenure;
        $company->lock_in = $req->lock_in;
        $company->status = "1";
        $company->notice_period = $req->notice_period;
        $company->registered_address = $req->registered_address;
        $company->gst_no = $req->gst_no;
        $company->company_pan_number = $req->company_pan_number;
        $company->company_tan_number = $req->company_tan_number;
        $company->company_cin_number = $req->company_cin_number;
        $company_save = $company->save();
        $flag = DB::select("SELECT company_id from company_deals where company_id = ?", [(int)$company_id]);
        if (!$flag) {
            $companyDeal = new CompanyDeal();
            $companyDeal->company_id = $company->id;
            $companyDeal->save();
        }
        $flag = DB::select('SELECT company_id from company_documents where company_id = ?', [(int)$company_id]);

        if (!$flag) {
            $companyDocs = new CompanyDocument();
            $companyDocs->company_id  = $company->id;
            $companyDocs->save();
        }

        if ($company_save) {
            $response["status"] = "success";
            $response["company_id"] = $company->id;
            return $response;
        } else {
            $response["status"] = "failure";
            $response["company_id"] = null;
            return $response;
        }
        // $memberdata = CompanyMaster::orderBy('updated_at', 'DESC')->orderBy('status')->get();
        // return view('company.index',compact('memberdata'));
    }

    public function storeCompanyDeal(Request $request, $company_id)
    {
        $flag = DB::select('SELECT id from company_deals where company_id = ?', [(int)$company_id]);
        foreach ($flag as $row) {
            $companyDeal = CompanyDeal::find($row->id);
            $companyDeal->delete();
        }

        $deal_structure = [];
        $deal_structure_save = [];
        $director_detail_save = [];
        for ($i = 0; $i < count($request->type_of_desk); $i++) {
            $companyDeal = new CompanyDeal();
            $companyDeal->company_id = $request->company_id;
            $companyDeal->type_of_desk = $request->type_of_desk[$i];
            $companyDeal->no_of_desk = $request->no_of_desk[$i];
            $companyDeal->price_per_seat = $request->price_per_seat[$i];
            $companyDeal->net_total = $request->net_total[$i];
            $companyDeal->annual_net_total = $request->annual_net_total[$i];
            $companyDeal->annual_increment = $request->annual_increment[$i];
            $companyDeal->deposits_in_month = $request->deposits_in_month[$i];
            $companyDeal->deposit_amount = $request->deposit_amount[$i];
            $companyDeal->deposit_received = $request->deposit_received[$i];
            $companyDeal->deposits_received_date = $request->deposits_received_date[$i];
            $companyDeal->deposits_reference_no = $request->deposits_reference_no[$i];
            $companyDeal->agreement_term_in_years = $request->agreement_term_in_years[$i];
            $companyDeal->notice_period = $request->notice_period[$i];
            $companyDeal->meeting_room_credits = $request->meeting_room_credits[$i];
            $deal_structure_save[] = $companyDeal->save();

            $deal_structure[] = $companyDeal->id;
        }

        $companyDeal = CompanyDeal::find($deal_structure[0]);
        $companyDeal->discount_months = $request->discount_months;
        $companyDeal->amount_after_discounts = $request->amount_after_discount;
        $companyDeal->save();


        for ($i = 0; $i < count($request->directorName); $i++) {

            if ($i < count($deal_structure))
                $companyDeal = CompanyDeal::find($deal_structure[$i]);
            else {
                $companyDeal = new CompanyDeal();
                $companyDeal->company_id = $request->company_id;
            }

            $companyDeal->director_name = $request->directorName[$i];
            $companyDeal->din_number = $request->din_number[$i];
            $companyDeal->director_contact = $request->director_contact[$i];
            $companyDeal->director_email = $request->director_email[$i];
            $director_detail_save[] = $companyDeal->save();
        }

        if ((count(array_unique($deal_structure_save)) == 1) && (count(array_unique($director_detail_save)) == 1) && $deal_structure_save[0] == 1 && $director_detail_save[0] == 1) {
            $response["status"] = "success";
            $response["company_id"] = $request->company_id;
        } else {
            $response["status"] = "failure";
            $response["company_id"] = null;
        }
        return $response;
    }

    public function storeCompanyDocs(Request $request, $company_id)
    {

        $flag = DB::select('SELECT id from company_documents where company_id = ?', [(int)$company_id]);

        if ($flag)
            $companyDocs = CompanyDocument::find($flag[0]->id);
        else
            $companyDocs = new CompanyDocument();

        $path = public_path('/assets/company_documents/') . $company_id . '/';

        if (!file_exists($path)) {
            mkdir($path, 0700);
        }
        $path1 = '/assets/company_documents/' . $company_id . '/';
        $companyDocs->company_id = $company_id;
        if ($request->pan) {
            $company_pan_path = $request->pan->getClientOriginalName();
            $request->pan->move($path, $company_pan_path);
            $companyDocs->company_pan_path = $path1 . $company_pan_path;
        }
        if ($request->tan) {
            $company_tan_path = $request->tan->getClientOriginalName();
            $request->tan->move($path, $company_tan_path);
            $companyDocs->company_tan_path = $path1 . $company_tan_path;
        }
        if ($request->address_proof) {
            $company_adress_proof_path = $request->address_proof->getClientOriginalName();
            $request->address_proof->move($path, $company_adress_proof_path);
            $companyDocs->company_adress_proof_path = $path1 . $company_adress_proof_path;
        }
        if ($request->company_coi) {
            $company_coi_path = $request->company_coi->getClientOriginalName();
            $request->company_coi->move($path, $company_coi_path);
            $companyDocs->company_coi_path = $path1 . $company_coi_path;
        }
        if ($request->gst_certificate) {
            $company_gst_certificate_path = $request->gst_certificate->getClientOriginalName();
            $request->gst_certificate->move($path, $company_gst_certificate_path);
            $companyDocs->company_gst_certificate_path = $path1 . $company_gst_certificate_path;
        }

        if ($companyDocs->save()) {
            $response["status"] = 'File uploaded successfully.';
        } else {
            $response["status"] = 'failure';
        }

        return $response;
    }

    public function delete_member_list($id)
    {

        $commas = CompanyMaster::find($id)->delete();
        $comdeal = CompanyDeal::where('company_id', '=', $id)->delete();
        $comdoc = CompanyDocument::where('company_id', '=', $id)->delete();
        // if ($commas && $comdeal && $comdoc) {
        //     $response["status"] = "success";
        // } else {
        //     $response["status"] = "failure";
        // }
        // return $response;
        session()->flash('success', 'Succesfully Deleted The Company');
        return redirect("companyDetails");
    }

    public function edit_member_list($id)
    {
        // dd($id);

        $member = CompanyMaster::find((int)$id);
        $company_deal = CompanyDeal::where('company_id', $id)->get();
        $company_docs = CompanyDocument::where('company_id', $id)->get();
        // dd($company_docs);
        $company_deal_structure = DB::select('SELECT count(type_of_desk) as count from company_deals where company_id = ?', [$id]);
        $company_deal_director = DB::select('SELECT count(director_name) as count from company_deals where company_id = ?', [$id]);
        $structure_count = $company_deal_structure[0]->count;
        $director_count = $company_deal_director[0]->count;
        if ($structure_count == 0)
            $structure_count = 1;
        if ($director_count == 0)
            $director_count = 1;

        // dd($company_docs);
        $a = $company_docs[0]->company_pan_path;
        return view('company.member_edit', ["member" => $member, "company_deal" => $company_deal, "deal_structure" => $structure_count, "deal_director" => $director_count, "company_docs" => $company_docs[0], "id" => $id],compact('a'));
    }

    public function editMemberDetails(Request $req, $id)
    {

        // dd($req->all());
        $this->validate($req, [
            'brand_name' => 'required|max:35',
            'Company_name' => 'required|min:5|max:35',
            'start_date' => 'required',
            'end_date' => 'required',
            'Lock_in' => 'required',
            'tenure' => 'required',
        ]);
        $data = Member::find($id);
        // dd($data);
        $data->brand_name = $req->brand_name;
        $data->member_name = $req->Company_name;
        $data->start_date = $req->start_date;
        $data->end_date = $req->end_date;
        $data->tenure = $req->tenure;
        $data->Lock_in = $req->Lock_in;
        $data->save();
    }

    public function employeelist($member_id)
    {
        // dd($member_id);


        $employees = Employeelist::where('member_id', $member_id, 'DESC')->get();

        // dd($employees);

        $data = CompanyMaster::find($member_id);
       // dd($data);
        $member_name = $data->company_registered_name;
        // dd($member_name);

        return view('company.employees.index', compact('employees', 'member_id', 'member_name'));
    }


    //new employee list
    public function fonikemployeelist($member_id){
        // dd($member_id);
        $employees = Employeelist::where('member_id', $member_id, 'DESC')->get();

        // dd($employees);

        // $data = CompanyMaster::find($member_id);
        $data = DB::select('SELECT company_registered_name from company_masters where id = ?', [$member_id]);
       // dd($data);
        $company_name = $data[0]->company_registered_name;

        $obj = DB::select("select count(*) as count , gender from employeelists where member_id= ".$member_id." group by gender;");

        // dd($obj);

        $male = $obj[1]->count;
        // dd($male);
        $female = $obj[0]->count;
        // dd($female);
        $gender_data = $obj[0]->count . ':' . $obj[1]->count;



        return view('company.employees.fonik_employee_list',compact('employees', 'member_id', 'company_name','male','female','gender_data'));

        // return view('revenue.company_revenue', [
        //     "revenues" => $check,
        //     "additional_revenues" => $db_additional_revenues,
        //     "company_name" =>$company_name,
        //     "data" => $db_revenues,
        //     "total" => $total
        // ]);

    }


    public function fonik_active_employee_list($member_id){

        // dd($member_id);


        $employees = Employeelist::where('member_id', $member_id, 'DESC')->get();
        $a=(array)$employees->count();
        // if($a[0]==0){
        //     dd($employees);
        // }
        // else{

        // }

        $data = CompanyMaster::find($member_id);
       // dd($data);
        $member_name = $data->company_registered_name;
        // dd($member_name);

        $obj = DB::select("SELECT count(*) as count , gender from employeelists where member_id= ".$member_id." group by gender;");

        //dd($obj);

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
        else if (count($obj) > 1) {
            $male = $obj[1]->count;
            // dd($male);
            $female = $obj[0]->count;
            // dd($female);
        }
        else {
            $male = 0;
            $female = 0;
        }
        $gender_data = $female . ':' . $male;
        // dd($gender_data);

        return view('company.employees.fonik_active_employee',compact('employees','member_name','male','female','gender_data','a'));
    }


    public function fonik_employee_list_data($member_id){


        $employees = Employeelist::where('member_id', $member_id, 'DESC')->get();

        // dd($employees);

        $data = Member::find($member_id);
       // dd($data);
        $member_name = $data->Company_name;


        return view('company.employees.fonik_employee_list',compact('employees', 'member_id', 'member_name'));


        // dd($member_id);

    }



    public function memberDetailsExport()
    {
        return Excel::download(new memberexport, 'member.xlsx');
    }

    public function employeList()
    {

        // $data = Employeelist::all();
        // dd($data);
        $data = Employeelist::orderBy('id', 'DESC')->get();

        // dd($data);
        $article_statuses = ["Active", "Inactive"];
        return view('company.employees.employee_list', compact('data', 'article_statuses'));
    }

    public function activeCompany()
    {

        $ActiveCompany = DB::select('SELECT company_masters.id, company_masters.company_registered_name, company_masters.brand_name, company_masters.tenure, company_masters.lock_in, company_masters.start_date, company_masters.end_date, company_masters.status FROM company_masters where status = "1";');

        $today = Carbon::now();
        // $currentDate =  $today->format('Y-m');
        $currentDate =  "2020-05";
        // dd($currentDate);

        $db_company = DB::select('SELECT company_masters.id, company_masters.company_registered_name FROM company_masters');
        $pie_chart = [];
        foreach ($db_company as $value) {
            $db_seats = DB::select('SELECT no_of_seats as occupancy from company_revenues where company_id = ? AND payment_month = ?', [$value->id, $currentDate]);
            if (empty($db_seats))
                $pie_chart[] = ["company_name" => $value->company_registered_name, "seats" => 0];
            else
                $pie_chart[] = ["company_name" => $value->company_registered_name, "seats" => round((int)$db_seats[0]->occupancy / config('global.total_seats') * 100)];
        }
        $occupied_data = 0;
        foreach ($pie_chart as $value) {
            $occupied_data += $value["seats"];
        }
        $unoccupied_data = 100 - $occupied_data;
        $pie_chart[] = ["company_name" => "Empty Seats", "seats" => $unoccupied_data];

        // dd($pie_chart);
        return view('company.employees.active_company', compact('ActiveCompany','pie_chart', 'unoccupied_data'));
    }

    public function InactiveCompany()
    {

        $InactiveEmployee = DB::select('SELECT * FROM company_masters where status = 0;');
        // dd($InactiveEmployee);
    return view('company.employees.inactive_company', compact('InactiveEmployee'));
    }



    public function Company_filter(Request $req)
    {

        $company_status = $req->company_filter;
        // dd($company_status);

        $memberdata = CompanyMaster::where('status', $company_status)->get();
        // dd($company_details);
        $company_statuses = ["Active", "Inactive", "--Select--"];
        // dd($company_statuses);

        return view("company.index", compact('memberdata', 'company_status', "company_statuses"));
    }

    public function Employee_filter(Request $req)
    {

        $employee_status = $req->employee_filter;
        // dd($company_status);

        $data = Employeelist::where('status', $employee_status)->get();
        // dd($company_details);
        $employee_statuses = ["Active", "Inactive", "--Select--"];

        return view('company.employees.employee_list', compact('data', 'employee_status'));
    }


    // public function changeStatus(Request $req)
    
    // {
    //     // dd($req->all());

    //     $user = Member::find($req->id);
    //     $user->status = $req->status;
    //     $user->save();
    //     return response()->json(['success' => 'Status change successfully.']);
    // }


    public function downloadMemberDocs(Request $request)
    {
        $pathToFile = url('/') . "/assets/member_documents";
        // dd($pathToFile);        
        // $name = "duc_dataset_request_form.pdf";
        $file = public_path() . "/assets/member_documents/All Event Rules & Regulation.pdf.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'company_pan.pdf', $headers);
    }

    public function downloadMemberDocsTAN(Request $request)
    {
        $pathToFile = url('/') . "/assets/member_documents";
        // dd($pathToFile);        
        // $name = "duc_dataset_request_form.pdf";
        $file = public_path() . "/assets/member_documents/All Event Rules & Regulation.pdf.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'company_tan.pdf', $headers);
    }

    public function downloadMemberDocsAOA(Request $request)
    {
        $pathToFile = url('/') . "/assets/member_documents";
        // dd($pathToFile);        
        // $name = "duc_dataset_request_form.pdf";
        $file = public_path() . "/assets/member_documents/All Event Rules & Regulation.pdf.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'company_aoa.pdf', $headers);
    }

    public function downloadMemberDocsMOA(Request $request)
    {
        $pathToFile = url('/') . "/assets/member_documents";
        // dd($pathToFile);        
        // $name = "duc_dataset_request_form.pdf";
        $file = public_path() . "/assets/member_documents/All Event Rules & Regulation.pdf.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'company_moa.pdf', $headers);
    }

    public function downloadMemberDocsGST(Request $request)
    {
        $pathToFile = url('/') . "/assets/member_documents";
        // dd($pathToFile);        
        // $name = "duc_dataset_request_form.pdf";
        $file = public_path() . "/assets/member_documents/All Event Rules & Regulation.pdf.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'company_gst.pdf', $headers);
    }



    public function memberDocs(Request $request)
    {
        $handle = $_SERVER['DOCUMENT_ROOT'] . "/assets/member_documents";
        // dd($handle);
        if ($handle = opendir('.')) {

            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {

                    dd($entry);
                }
            }

            closedir($handle);
        }
    }

    public function getListDocument(Request $request)
    {

        $data = DB::select('SELECT members.Company_name ,company_documents.pan_card, company_documents.tan_card ,company_documents.aoa,company_documents.moa,company_documents.gst
FROM company_documents
RIGHT JOIN members ON company_documents.company_id = members.id
ORDER BY company_documents.id;');

        // dd($data);
        
        return view("company.listDocuments", compact('data'));
    }


    public function companyStatuschange(Request $req){

       $user = CompanyMaster::find($req->user_id);
        // dd($user);
        $user->status = $req->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);

    }

    public function securityDeposits(){

        $SecurityDeposite = DB::select('SELECT company_masters.company_registered_name,company_masters.start_date, company_deals.no_of_desk ,company_deals.price_per_seat,company_deals.net_total,company_deals.deposits_in_month,company_deals.deposits_received_date,company_deals.deposits_reference_no, company_deals.deposit_amount,company_deals.deposit_received
            FROM company_deals
            LEFT JOIN company_masters ON company_masters.id = company_deals.company_id
            ORDER BY company_deals.deposit_amount DESC;');
        // dd($SecurityDeposite);

        $colors = [];
        $s = 100;
        $l = 95;
        for ($i = 0; $i < count($SecurityDeposite); $i++) { 
            $colors[] = [240, $s, $l];
            // $s -= 1;
            $l -= 3;
        }
        // dd($SecurityDeposite);

            $DepositeReceived = DB::select('SELECT sum(deposit_received) as deposite_receives FROM company_deals;');
            // dd($DepositeReceived);
            $Total_Deposites = DB::select('SELECT sum(deposit_amount) as deposite FROM company_deals;');
            // dd($Total_Deposites);

            return view('company.security_deposits', compact('SecurityDeposite', 'DepositeReceived', 'Total_Deposites', 'colors'));
    }


    public function fonik_active_member(){

        $ActiveCompany = DB::select('SELECT company_masters.id, company_masters.company_registered_name, company_masters.status, company_deals.no_of_desk FROM company_masters join company_deals on company_masters.id = company_deals.company_id where status = "1" order by company_deals.no_of_desk desc;');

        // dd($ActiveCompany);
        $activeMembersCount = DB::select("SELECT count(*) as count FROM employeelists where status='1';");
        $activeMembersCount = $activeMembersCount[0]->count;

        $pie_chart=[];
        $store=0;
        foreach ($ActiveCompany as $key => $value) {
            # code...
            //round(($value->no_of_desk/config('global.total_seats'))*100)
            if ((int)$value->no_of_desk==0) {
            array_push($pie_chart, ["company_name"=>$value->company_registered_name,"seats"=>0]);
                
            }
            else{
                $store+=$value->no_of_desk;
                array_push($pie_chart, ["company_name"=>$value->company_registered_name,"seats"=>round(($value->no_of_desk/config('global.total_seats'))*100)]);
            }
        }

        $store=config('global.total_seats')-$store;

        //dd($store);
        if ($store==0) {
            array_push($pie_chart, ["company_name"=>"Empty Seats","seats"=>100]);

        }   
        else{
            array_push($pie_chart, ["company_name"=>"Empty Seats","seats"=>round(($store/config('global.total_seats'))*100)]);
        }
        // dd($ActiveCompany);
        $gender=[];
        $obj = DB::select("SELECT gender, count(*) as count FROM employeelists group by gender ;");

        $gender["male"] = $obj[1]->count;
        $gender["female"] = $obj[0]->count;
        //dd($obj);
        return view('company.employees.active_employee',compact('ActiveCompany','pie_chart','gender','activeMembersCount'));

    }


}
