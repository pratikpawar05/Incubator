<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Employeelist;
use App\CompanyMaster;
use App\Imports\memberImport;
use App\Exports\employeeExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Storage;
use Response;
use Validator;

class EmployeeController extends Controller
{
    public function createEmployee($member_id){


        $data = company_masters::find($member_id);
        $member_name = $data->Company_name;
    	return view('company.employees.create',compact('member_id','member_name'));
    }

    public function employeeDetailSubmit(Request $req ,$member_id){

    	// dd($req->all());
    	$data = new Employeelist();

    	$data->customer_Name = $req->customer_Name;
    	$data->gender = $req->gender;
    	$data->contact = $req->contact;
    	$data->DOB = $req->DOB;
    	$data->address = $req->address;
    	$data->email = $req->email;
    	$data->aadhar_Card = $req->aadhar_Card;
    	$data->pan_card = $req->pan_Card;
    	$data->company_Name = $req->company_name;
    	$data->access_card = $req->access_card;
    	$data->card_no = $req->card_no;
    	$data->cabin_access = $req->cabin_access;
    	$data->Card_Types = $req->card_type;
    	$data->date_of_Joining = $req->date_of_joining;
    	$data->designation = $req->designation;
    	$data->status = $req->status;
    	$data->designation = $req->designation;
        $data->marital_status = $req->marital_status;
    	$data->member_id = $member_id;
         if($req->hasfile('user_logo')){
            $file = $req->file('user_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'. $extenstion;
            $file->move('image', $filename);
            $data->user_logo = $filename;

        }
        // if($req->hasfile('address_proof')){
        // $file = $req->file('address_proof');
        // $extenstion = $file->getClientOriginalExtension();
        // $filename = time().'.'. $extenstion;
        // $file->move('AddressProof', $filename);
        // $data->address_proof = $filename;

        // }


        $images = $req->file('address_proof');
        // dd($images);
        if ($req->hasFile('address_proof')) :
        foreach ($images as $item):
            $var = date_create();
            // dd($var);
            $time = date_format($var, 'YmdHis');
            $imageName = $time . '-' . $item->getClientOriginalName();
            // $item->move(base_path() . 'campaign_image', $imageName);

            $item->move('AddressProof', $imageName);
            $arr[] = $imageName;
            // dd($arr[]);
        endforeach;
        $image = implode(",", $arr);
        else:
        $image = '';
        endif;
        // dd($arr[0]);
        $data->address_proof = $image;


        if($req->hasfile('id_proof')){
        $file = $req->file('id_proof');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'. $extenstion;
        $file->move('IdProof', $filename);
        $data->id_proof = $filename;

        }
    	if($data->save()){

    		$response['status']='success';
    	}

    	else{
    			$response['status']='failure';
    	}

    	return $response;
    }
    public function employeExport(){

        return Excel::download(new employeeExport, 'EmployeeList.xlsx');

    }

    public function addMembers(){

     $member_data = DB::select("SELECT id, company_registered_name  FROM admin.company_masters;");

     // $data = $member_data["member_name"];
     // dd($member_data);

        return view('company.employees.new_employee', compact('member_data'));
    }

    public function employeSave(Request $req){

        // dd($req->all());

        $this->validate($req,[
                'customer_Name'=>'required|max:35',
                'gender'=>'required',
                'contact'=> 'required|numeric|digits:10',
                'member_id'=>'required',
                'DOB'=> 'required',
                'address'=> 'required',
                'gender'=>'required',
                'email'=>'required|email|unique:users',
                'aadhar_Card' =>'required',
                'pan_Card'=> 'required',
                'access_card'=>'required',
                'card_no'=>'required',
                'cabin_access'=>'required',
                'card_type'=>'required',
                'date_of_joining'=>'required',
                'designation'=>'required',
                'status'=>'required',
                'user_logo'=>'required',
                'address_proof'=>'required',
                'id_proof'=>'required',

                ]);



       $data = new Employeelist();
       // dd($data);

       if(isset($req->member_id)) {
            $obj = CompanyMaster::where('id', $req->member_id)->first();
            $data->company_Name = $obj->company_registered_name;
            $data->member_id = $req->member_id;
        }
        $data->customer_Name = $req->customer_Name;
        $data->gender = $req->gender;
        $data->contact = $req->contact;
        $data->DOB = $req->DOB;
        $data->address = $req->address;
        $data->email = $req->email;
        $data->aadhar_Card = $req->aadhar_Card;
        $data->pan_card = $req->pan_Card;
        $data->access_card = $req->access_card;
        $data->card_no = $req->card_no;
        $data->cabin_access = $req->cabin_access;
        $data->Card_Types = $req->card_type;
        $data->marital_status = $req->marital_status;
        
        if($req->hasfile('address_proof')){
        $file = $req->file('address_proof');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'. $extenstion;
        $file->move('AddressProof', $filename);
        $data->address_proof = $filename;

        }
        $data->date_of_Joining = $req->date_of_joining;
        $data->designation = $req->designation;

        if($req->hasfile('id_proof')){
        $file = $req->file('id_proof');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'. $extenstion;
        $file->move('IdProof', $filename);
        $data->id_proof = $filename;

        }

        $data->status = $req->status;
        $data->designation = $req->designation;
        
        if($req->hasfile('user_logo')){
            $file = $req->file('user_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'. $extenstion;
            $file->move('image', $filename);
            $data->user_logo = $filename;

        }



        if(isset($member_id)) {
            $data->member_id = $member_id;
            $data->company_Name = $req->company_name;
        }
        if($data->save()){

            $response['status']='success';
        }

        else{
                $response['status']='failure';
        }

        return $response;     

    }

    public function activeEmployee(){

        $ActiveEmployee = DB::select('SELECT * FROM admin.employeelists where status= "1";');
        //dd($ActiveEmployee);

        // $data = count($ActiveEmployee);
        // dd($data);

        return view('company.employees.active_employee',compact('ActiveEmployee'));

    }
    public function InactiveEmployee(){

        $InactiveEmployee = DB::select('SELECT * FROM admin.employeelists where status= "Inactive";');
        // dd($InactiveEmployee);

        return view('company.employees.inactive_employee',compact('InactiveEmployee'));
    }

    public function changeEmployeeStatus(Request $request, $employee_status, $employee_id, $button_class) {
        $data = Employeelist::find($employee_id);
        $data->status = $employee_status;
        $data->button_class = $button_class;
        if($data->save()) {
            $response["status"] = "success";
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function editEmployee($employee_id){

        // dd($employee_id);
        // $data = Employeelist::find($employee_id);
    // dd($data);
        
         $roles =DB::select('SELECT * FROM admin.employeelists;');
         // dd($roles);
        // $member_id = $data->members_id;
        $Employee_details = Employeelist::find($employee_id);
        //dd($Employee_details->marital_status);
        $employee_status = $Employee_details->status;
        // dd($employee_status);
        $employe_gender = $Employee_details->gender;
        $employee_marital_status = $Employee_details->marital_status;
        //dd($Employee_details);
        return view('company.employees.edit_employee',compact('Employee_details','employe_gender','employee_status','roles','employee_marital_status'));

    }

    public function editEmployeeSave(Request $req, $employee_id){



        $data = Employeelist::find($employee_id);
        // dd($data);

        // if(isset($req->member_id)) {
        //     $obj = Member::where('id', $req->member_id)->first();
        //     $data->company_Name = $obj->member_name;
        //     $data->member_id = $req->member_id;
        // }

          // dd($data);
        $data->customer_Name = $req->customer_Name;
        $data->gender = $req->gender;
        $data->contact = $req->contact;
        $data->DOB = $req->DOB;
        $data->address = $req->address;
        $data->email = $req->email;
        $data->aadhar_Card = $req->aadhar_Card;
        $data->pan_card = $req->pan_Card;
        $data->company_Name = $req->company_name;
        $data->access_card = $req->access_card;
        $data->card_no = $req->card_no;
        $data->cabin_access = $req->cabin_access;
        $data->Card_Types = $req->card_type;
        $data->date_of_Joining = $req->date_of_joining;
        $data->designation = $req->designation;
        $data->status = $req->status;
        $data->designation = $req->designation;
        $data->marital_status = $req->marital_status;
         if($req->hasfile('user_logo')){
            $file = $req->file('user_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'. $extenstion;
            $file->move('image', $filename);
            $data->user_logo = $filename;

        }
        if($req->hasfile('address_proof')){
        $file = $req->file('address_proof');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'. $extenstion;
        $file->move('AddressProof', $filename);
        $data->address_proof = $filename;

        }
        if($req->hasfile('id_proof')){
        $file = $req->file('id_proof');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'. $extenstion;
        $file->move('IdProof', $filename);
        $data->id_proof = $filename;

        }
        if($data->save()){

            $response['status']='success';
        }

        else{
                $response['status']='failure';
        }

        return $response;

    }
    
    public function employeeDetails($employees_id){

        $Employee_details = Employeelist::find($employees_id);
        $employee_status_data =  $Employee_details->status;

        return view('company.employees.Employee_show',compact('Employee_details','employee_status_data'));
    }

    public function deleteEmployee($employees_id){

        $data = Employeelist::find($employees_id);
        if($data->delete()) {
            $response["status"] = "success";
        }
        else {
            $response["status"] = "success";
        }
        return $response;     
    }

    public function changeMemberStatus(Request $request) {
        // dd($request->all());
        $user = Employeelist::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function change_employee_status(Request $request, $visitor_id, $visitor_status){

        dd($request->all());
        $flag = DB::table('employeelists')
            ->where('vid', $visitor_id)
            ->update(['status' => $visitor_status]);
            dd($flag);
        if($flag ==1) {
            $response["status"] = "success";
        }
        else {
            $response["status"] = "failure";
        }
        return $response;


    }

    public function downloadAddressProof($id){

        $data = Employeelist::find($id);
        // dd($data);
        $image = $data->address_proof;

        $address_proof = public_path('AddressProof/')."$image";
        return Response::download($address_proof);

    }

    public function downloadIdProof($id){
        
      $data = Employeelist::find($id);
        // dd($data);
        $image = $data->id_proof;
        
        $Id_proof = public_path('IdProof/')."$image";
        return Response::download($Id_proof);

    }

    public function changeStatus(Request $req){

        // dd($req->user_id);

        $user = Employeelist::find($req->user_id);
        // dd($user);
        $user->status = $req->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
