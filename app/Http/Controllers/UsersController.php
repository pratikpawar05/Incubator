<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use App\UserRolePermission;
use Illuminate\Support\Facades\Gate;
use DB;
use Hash;
use Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users =  DB::select('SELECT  roles.role , users.name ,users.email , users.id
        FROM users
        LEFT JOIN roles ON users.role_id = roles.id order  by users.created_at desc
        ;');

        // dd($users);  

        // $permission = DB::select('SELECT  user_role_permissions.permission_id , users.name ,users.email , users.id ,users.role_id
        // FROM users
        // LEFT JOIN user_role_permissions ON users.id = user_role_permissions.user_id order  by users.created_at desc
        // ;');
        // dd($permission);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('j');

        $users_role =DB::select('SELECT * FROM admin.roles;');
        // dd($users_role);

        $permissions = Permission::all();
        // dd($permissions);
        return view('admin.users.create',compact('users_role','permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());    

        $this->validate($request,[
            'name'=> 'required|max:5000',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required',
            'role'=> 'required'
        ]);


        if (isset($request->Expense_create)) {
            $a = $request->Expense_create;
            $expense_create = explode("_", $a);
            $expense[]=$expense_create[1];
        }
        else {
            $expense[]=null;            
        }

          if (isset($request->Expense_read)) {
            $b = $request->Expense_read;
            $expense_read = explode("_", $b);
            $expense[]=$expense_read[1];
        }
        else {
            $expense[]=null;            
        }


         if (isset($request->Expense_update)) {
            $c = $request->Expense_update;
            $expense_update = explode("_", $c);
            $expense[]=$expense_update[1];
        }
        else {
            $expense[]=null;            
        }


        if (isset($request->Expense_delete)) {
            $d = $request->Expense_delete;
            $expense_delete = explode("_", $d);
            $expense[]=$expense_delete[1];
        }
        else {
            $expense[]=null;            
        }

        // dd($expense);
        if(isset($expense)){
            $permissions["expense"] = $expense; 
        }
        else{

            $permissions["expense"] = null; 
        }
        // dd($permissions);


        if (isset($request->Company_create)) {
            $e = $request->Company_create;
            $Company_create = explode("_", $e);
            $company[]=$Company_create[1];
        }
        else {
            $company[]=null;            
        }

        if (isset($request->Company_read)) {
            $f = $request->Company_read;
            $Company_read = explode("_", $f);
            $company[]=$Company_read[1];
        }
        else{
            $company[] = null;
        }

        if (isset($request->Company_update)) {
            $g = $request->Company_update;
            $Company_update = explode("_", $g);
            $company[]=$Company_update[1];
        }
        else{
            $company[] = null;
        }

        if (isset($request->Company_delete)) {
            $h = $request->Company_delete;
            $Company_delete = explode("_", $h);
            $company[]=$Company_delete[1];
        }
        else{
            $company[] = null;
        }
        // dd($company);

        if(isset($company)){
            $permissions["company"] = $company; 
        }
        else{
            
            $permissions["company"] = null; 
        }

        // dd($permissions);

        if (isset($request->Revenue_create)) {
            $i = $request->Revenue_create;
            $Revenue_create = explode("_", $i);
            $revenue[]=$Revenue_create[1];
        }
        else{

            $revenue[] = null;
        }

        if (isset($request->Revenue_read)) {
            $j = $request->Revenue_read;
            $Revenue_read = explode("_", $j);
            $revenue[]=$Revenue_read[1];
        }
        else{

            $revenue[] = null;
        }

         if (isset($request->Revenue_update)) {
            $k = $request->Revenue_update;
            $Revenue_update = explode("_", $k);
            $revenue[]=$Revenue_update[1];
        }
        else{

            $revenue[] = null;
        }

         if (isset($request->Revenue_delete)) {
            $l = $request->Revenue_delete;
            $Revenue_delete = explode("_", $l);
            $revenue[]=$Revenue_delete[1];
        }
        else{

            $revenue[] = null;
        }
        // dd($revenue);

         if(isset($revenue)){
            $permissions["revenue"] = $revenue; 
         }
         else{
            
            $permissions["revenue"] = null; 
         }

        if (isset($request->Members_create)) {
            $m = $request->Members_create;
            $Members_create = explode("_", $m);
            $member[]=$Members_create[1];
        }
        else{

            $member[] = null;

        }

        if (isset($request->Members_read)) {
            $n = $request->Members_read;
            $Members_read = explode("_", $n);
            $member[]=$Members_read[1];
        }
        else{

            $member[] = null;

        }

        if (isset($request->Members_update)) {
            $o = $request->Members_update;
            $Members_update = explode("_", $o);
             $member[]=$Members_update[1];

        }
        else{

            $member[] = null;

        }

        if (isset($request->Members_delete)) {
            $p = $request->Members_delete;
            $Members_delete = explode("_", $p);
            $member[]=$Members_delete[1];
        }
        else{

            $member[] = null;

        }

         if(isset($member)){

            $permissions["member"] = $member; 
         }

         else{
            
            $permissions["member"] = null; 
         }



        if (isset($request->Home_create)) {
            $q = $request->Home_create;
            $Home_create = explode("_", $q);
            $home[]=$Home_create[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->Home_read)) {
            $r = $request->Home_read;
            $Home_read = explode("_", $r);
            $home[]=$Home_read[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->Home_update)) {
            $s = $request->Home_update;
            $Home_update = explode("_", $s);
            $home[]=$Home_update[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->Home_delete)) {
            $t = $request->Home_delete;
            $Home_delete = explode("_", $t);
            $home[]=$Home_delete[1];
        }
        else{

            $home[] = null;
        }

        if(isset($home)){
            $permissions["home"] = $home;
        }
        else{

            $permissions["home"] = null;   
        }

        if (isset($request->additional_Revenue_create)) {
            $u = $request->additional_Revenue_create;
            $additional_Revenue_create = explode("_", $u);
            $additional_Revenue[]=$additional_Revenue_create[1];
        }
        else{

            $additional_Revenue[] = null;
        }

         if (isset($request->additional_Revenue_read)) {
            $v = $request->additional_Revenue_read;
            $additional_Revenue_read = explode("_", $v);
             $additional_Revenue[]=$additional_Revenue_read[1];
        }  
        else{

            $additional_Revenue[] = null;
        } 

        if (isset($request->additional_Revenue_update)) {
            $w = $request->additional_Revenue_update;
            $additional_Revenue_update = explode("_", $w);
            $additional_Revenue[]=$additional_Revenue_update[1];

        }  

        else{

            $additional_Revenue[] = null;
        } 

        if (isset($request->additional_Revenue_delete)) {
            $x = $request->additional_Revenue_delete;
            $additional_Revenue_delete = explode("_", $x);
            $additional_Revenue[]=$additional_Revenue_delete[1];
        }  
        else{

            $additional_Revenue[] = null;
        }

         if(isset($additional_Revenue)){

            $permissions["additional_Revenue"] = $additional_Revenue;
         }

         else{

             $permissions["additional_Revenue"] = null;

         }

        if (isset($request->test_create)) {
            $y = $request->test_create;
            $test_create = explode("_", $y);
            $test[]=$test_create[1];
        } 

        else{

            $test[] = null;
        } 

        if (isset($request->test_read)) {
            $z = $request->test_read;
            $test_read = explode("_", $z);
            $test[]=$test_read[1];
        }  
        else{

            $test[] = null;
        }


         if (isset($request->test_update)) {
            $za = $request->test_update;
            $test_update = explode("_", $za);
            $test[]=$test_update[1];
        } 
        else{

            $test[] = null;
        }

        if (isset($request->test_delete)) {
            $zb = $request->test_delete;
            $test_delete = explode("_", $zb);
             $test[]=$test_delete[1];
        } 
        else{

            $test[] = null;
        } 
        // dd($test);

        // if(isset($test)){
        //     $permissions["test"] = $test;
        // }
        // else{
        //     $permissions["test"] =null;
        // }



        $permissions_data = json_encode($permissions);

        // dd($permissions_data);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role_id = $request->role;
        $data->user_logo = "0";
        $data->save();

        $id = $data->id;
        $User_permission = new UserRolePermission();
        $User_permission->role_id = $request->role;
        $User_permission->user_id = $id;
        $User_permission->permission_id = $permissions_data;
        $User_permission->save();

        // $email = $request->email;
        // $name = $request->name;
        // $password = $request->password;
        // $role = $request->role;
        // dd($email);/

        //  $title="User Registration";
        // $message = "Thank you for Joining With BizNest.";
        // // $email = $request->email;
        // $message_data = ["message" => $message, "email"=> $email,"name"=>$name,"password"=>$password,"role"=>$role];
        // Mail::send('admin.users.thank_you_mail', ['title' => $title, 'message_data' => $message_data], function ($message) use($message_data)
        // {
        //     $message->from('therathdorahul@gmail.com');
        //     $message->to($message_data['email'])->subject('Thank you for Joining With BizNest.');
        // });

        // return redirect('users');
        return redirect('/users')->with('success_added', 'User Added Succefully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = User::find($id);
        // dd($data->password);

       // $a = Hash::check('INPUT PASSWORD', $data->password);
       // dd($a);
        $roles =DB::select('SELECT * FROM roles;');
        // dd($roles);
         $selectedRole = $data->role_id;
         // dd($selectedRole);
        $permissions = Permission::all();
        // dd($permissions);
        // $permission_module = DB::select("SELECT permission_id
        // FROM user_role_permissions where user_id =".$id.";");
        
        // dd($permission_module);
        // dd($permission_module);
        // dd($permission_module['0']->permission_id);
        // $permissions_data = explode('', $permission_module['0']->permission_id);
        // $permissions_data = $permission_module[0]->permission_id;
        // $permissions_data_array = json_decode($permissions_data);

        // dd($permissions_data_array);
        // dd($permissions_data_array->expense[2]);
        // if ($permissions_data_array==null) {
        //       dd("true");
        //   }  

        // foreach ($permissions_data_array as $key => $value) {
        //     // dd($value);
        //           if ($value[2]=='U') {
        //             dd("true");
        //         }
        //             elseif ($value[2]==null) {
        //               dd("false");
        //             }
          
        //  }     
        // $expense = $permissions_data_array->expense;
        // $revenue = isset($permissions_data_array->revenue)?$permissions_data_array->revenue:null;
        // $company = isset($permissions_data_array->company)?$permissions_data_array->company:null;
        // $additional_Revenue = isset($permissions_data_array->additional_Revenue)?$permissions_data_array->additional_Revenue:null;
        // dd($expense);

        return view('admin.users.edit',compact('data','roles','permissions','selectedRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        dd($request->all());
        
        // dd($permission_module);



        $this->validate($request,[
            'name'=> 'required|max:5000',
            'email' => 'required',
            'password'=> 'required',
            'role'=> 'required',
        ]);


         if (isset($request->expense_create)) {
            $a = $request->expense_create;
            $expense_create = explode("_", $a);
            $expense[]=$expense_create[1];
        }
        else {
            $expense[]=null;            
        }
        // dd($expense);

          if (isset($request->expense_read)) {
            $b = $request->expense_read;
            $expense_read = explode("_", $b);
            $expense[]=$expense_read[1];
        }
        else {
            $expense[]=null;            
        }


         if (isset($request->expense_update)) {
            $c = $request->expense_update;
            $expense_update = explode("_", $c);
            $expense[]=$expense_update[1];
        }
        else {
            $expense[]=null;            
        }


        if (isset($request->expense_delete)) {
            $d = $request->expense_delete;
            $expense_delete = explode("_", $d);
            $expense[]=$expense_delete[1];
        }
        else {
            $expense[]=null;            
        }

        // dd($expense);
        if(isset($expense)){
            $permissions["expense"] = $expense; 
        }
        else{

            $permissions["expense"] = null; 
        }
        // dd($permissions);


        if (isset($request->company_create)) {
            $e = $request->company_create;
            $Company_create = explode("_", $e);
            $company[]=$Company_create[1];
        }
        else {
            $company[]=null;            
        }

        if (isset($request->company_read)) {
            $f = $request->company_read;
            $company_read = explode("_", $f);
            $company[]=$company_read[1];
        }
        else{
            $company[] = null;
        }

        if (isset($request->company_update)) {
            $g = $request->company_update;
            $company_update = explode("_", $g);
            $company[]=$company_update[1];
        }
        else{
            $company[] = null;
        }

        if (isset($request->company_delete)) {
            $h = $request->company_delete;
            $company_delete = explode("_", $h);
            $company[]=$company_delete[1];
        }
        else{
            $company[] = null;
        }
        // dd($company);

        if(isset($company)){
            $permissions["company"] = $company; 
        }
        else{
            
            $permissions["company"] = null; 
        }

        // dd($permissions);

        if (isset($request->revenue_create)) {
            $i = $request->revenue_create;
            $revenue_create = explode("_", $i);
            $revenue[]=$revenue_create[1];
        }
        else{

            $revenue[] = null;
        }

        if (isset($request->revenue_read)) {
            $j = $request->revenue_read;
            $revenue_read = explode("_", $j);
            $revenue[]=$revenue_read[1];
        }
        else{

            $revenue[] = null;
        }

         if (isset($request->revenue_update)) {
            $k = $request->revenue_update;
            $revenue_update = explode("_", $k);
            $revenue[]=$revenue_update[1];
        }
        else{

            $revenue[] = null;
        }

         if (isset($request->revenue_delete)) {
            $l = $request->revenue_delete;
            $revenue_delete = explode("_", $l);
            $revenue[]=$revenue_delete[1];
        }
        else{

            $revenue[] = null;
        }
        // dd($revenue);

         if(isset($revenue)){
            $permissions["revenue"] = $revenue; 
         }
         else{
            
            $permissions["revenue"] = null; 
         }

        if (isset($request->member_create)) {
            $m = $request->member_create;
            $member_create = explode("_", $m);
            $member[]=$member_create[1];
        }
        else{

            $member[] = null;

        }

        if (isset($request->member_read)) {
            $n = $request->member_read;
            $member_read = explode("_", $n);
            $member[]=$member_read[1];
        }
        else{

            $member[] = null;

        }

        if (isset($request->member_update)) {
            $o = $request->member_update;
            $member_update = explode("_", $o);
             $member[]=$member_update[1];

        }
        else{

            $member[] = null;

        }

        if (isset($request->member_delete)) {
            $p = $request->member_delete;
            $member_delete = explode("_", $p);
            $member[]=$member_delete[1];
        }
        else{

            $member[] = null;

        }

         if(isset($member)){

            $permissions["member"] = $member; 
         }

         else{
            
            $permissions["member"] = null; 
         }



        if (isset($request->home_create)) {
            $q = $request->home_create;
            $home_create = explode("_", $q);
            $home[]=$home_create[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->home_read)) {
            $r = $request->home_read;
            $home_read = explode("_", $r);
            $home[]=$home_read[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->home_update)) {
            $s = $request->home_update;
            $home_update = explode("_", $s);
            $home[]=$home_update[1];
        }
        else{

            $home[] = null;
        }

        if (isset($request->home_delete)) {
            $t = $request->home_delete;
            $home_delete = explode("_", $t);
            $home[]=$home_delete[1];
        }
        else{

            $home[] = null;
        }

        if(isset($home)){
            $permissions["home"] = $home;
        }
        else{

            $permissions["home"] = null;   
        }

        if (isset($request->additional_Revenue_create)) {
            $ap = $request->additional_Revenue_create;
            $additional_Revenue_create = explode("_", $ap);
            $additional_Revenue[]=$additional_Revenue_create[2];
        }
        else{

            $additional_Revenue[] = null;
        }
        // dd($additional_Revenue);
         if (isset($request->additional_Revenue_read)) {
            $v = $request->additional_Revenue_read;
            $additional_Revenue_read = explode("_", $v);
             $additional_Revenue[]=$additional_Revenue_read[2];
        }  
        else{

            $additional_Revenue[] = null;
        } 

        if (isset($request->additional_Revenue_update)) {
            $w = $request->additional_Revenue_update;
            $additional_Revenue_update = explode("_", $w);
            $additional_Revenue[]=$additional_Revenue_update[2];

        }  

        else{

            $additional_Revenue[] = null;
        } 

        if (isset($request->additional_Revenue_delete)) {
            $x = $request->additional_Revenue_delete;
            $additional_Revenue_delete = explode("_", $x);
            $additional_Revenue[]=$additional_Revenue_delete[2];
        }  
        else{

            $additional_Revenue[] = null;
        }
// dd($additional_Revenue);
         if(isset($additional_Revenue)){

            $permissions["additional_Revenue"] = $additional_Revenue;
         }

         else{

             $permissions["additional_Revenue"] = null;

         }

        if (isset($request->test_create)) {
            $y = $request->test_create;
            $test_create = explode("_", $y);
            $test[]=$test_create[1];
        } 

        else{

            $test[] = null;
        } 

        if (isset($request->test_read)) {
            $z = $request->test_read;
            $test_read = explode("_", $z);
            $test[]=$test_read[1];
        }  
        else{

            $test[] = null;
        }


         if (isset($request->test_update)) {
            $za = $request->test_update;
            $test_update = explode("_", $za);
            $test[]=$test_update[1];
        } 
        else{

            $test[] = null;
        }

        if (isset($request->test_delete)) {
            $zb = $request->test_delete;
            $test_delete = explode("_", $zb);
             $test[]=$test_delete[1];
        } 
        else{

            $test[] = null;
        } 

        // if(isset($test))
        //     $permissions["test"] = $test;


        $permissions_data = json_encode($permissions);
        // dd($permissions_data);


        $data = User::find($id);
        // dd($data);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role_id = $request->role;
        $data->user_logo = "0";
        $data->save();

        $id = $data->id;
        $role_id = $data->role_id;
        // dd($role_id);

        // $permission_module = DB::select("SELECT permission_id , role_id , user_id
        // FROM user_role_permissions where user_id=".$id.";");
        // dd($permission_module);
        // dd($request->role_id);

        $User_permission =  UserRolePermission::where('user_id',$id)->first();
        // dd($User_permission);
        $User_permission->role_id = $request->role;
        $User_permission->user_id = $id;
        $User_permission->permission_id = $permissions_data;
        $User_permission->save();

        // return redirect('users');
        return redirect('/users')->with('success_update', 'User updated Succefully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

    // $data = User::find($id);
    //     $data->delete();

    //     return redirect('/users')->with('success', 'User deleted Succefully!');

       $data = User::find($id);
        if($data->delete()) {
            $response["status"] = "success";            
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }

    public function profile(){

        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $role = auth()->user()->role_id;
        $profile = auth()->user()->user_logo;
        // dd($role);
        $role_query = DB::select("SELECT role FROM roles where id =".$role.";");
        // dd($role_query[0]->role);
        // dd($role_query);
        $role_select = $role_query[0]->role;
        // dd($role_select);

        $permissions = DB::SELECT("SELECT module , permission
        FROM permissions
        LEFT JOIN role_permissions
        ON permissions.id = role_permissions.permission_id where role_id = ".$role.";");

        // dd($permissions);
        $roles = DB::select('SELECT * FROM roles;');
        // dd($roles);
        return view('profile.profile',compact('name','email','role_select','roles','profile'));
    }


    public function profile_Saved(Request $request){
        // dd($request->user_logo);

        $data = user::where('id',auth()->user()->id)->first();
        // dd($data);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role_id = $request->role_id;
        // $data->user_logo = $request->user_logo;

        if($request->hasfile('user_logo')){
            $file = $request->file('user_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'. $extenstion;
            $file->move('image', $filename);
            $data->user_logo = $filename;

        }
        if($data->save()) {
            $response["status"] = "success";            
        }
        else {
            $response["status"] = "failure";
        }
        return $response;
    }
    public function page_expire(){
        // return view("Errors.page_expire");
        return redirect('/login');
    }
}
