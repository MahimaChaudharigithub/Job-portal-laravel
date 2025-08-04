<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;     
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\session;
use App\Models\Job;
use Illuminate\Support\Facades\View;



class Jobs extends Controller
{
    public function login(Request $request)
    {
      
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       
        $username = $request->input('email');
        $password = $request->input('password');


       $user = DB::table('users')->where('email', $username)->first();
  
       if ($user && sha1($password) === $user->password) {

          Session::put('user_name', $user->name);
          Session::put('user_login_id', $user->id);
          Session::put('user_role', $user->user_role);
          session()->flash('success', 'Login successfully!');
           
           return redirect()->route('dashboard');
         

        } else {
           
              session()->flash('error', 'Login not successfully!');
               return redirect()->route('login');
        }

        //return redirect()->route('dashboard');

    }


    public function showDashboard()
    {
        
       
       // $jobs = Job::paginate($perPage);
       // $data['jobs'] = JOB::getJobList()->paginate(10)  
        $data['jobs'] = JOB::getJobList();
      
        $data['users']=DB::table('users')->get();
        return view('dashboard',$data);

    }

    public function login_view()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function saveAddclient(Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $role=$request->input('role');
        $data=array(
            'name'=>$name,
            'email'=>$email,
            'password'=>md5($password),
            'user_role'=>$role,
            'created_at'=>date('Y-m-d H:i:s'),
           
        );
        $check = DB::select("SELECT count(*) as count FROM users WHERE email = ?", [$email]);
        if($check[0]->count >0)
        {
             session()->flash('error',"This Email alrady Register");
        }
        else{
              $insert= DB::table('users')->insert($data);
                if($insert)
                {
                    session()->flash('success',"successfully Inserted");
                }
                else{
                    session()->flash('error',"somthing wrong");
                }
            }
     
      return redirect()->route('register');
        
    }

    public function save_jobs(Request $request)
    {
        $job_name=$request->input('title');
        $description=$request->input('description');
        $location=$request->input('location');
        $type=$request->input('type');
        $salary=$request->input('salary');
        $company_input=$request->input('company_name');
        $id=$request->input('id');

        $data=array(

            'title' => $job_name,
            'description' => $description,
            'location' => $location,
            'type' => $type, // Assuming it's 'Full-time', 'Part-time', etc.
            'salary' => $salary,
            'company_name' => $company_input,
            'created_by'=>session('user_name')
        
        );

        if(!empty($id))
        {
            $insert=DB::table('jobs')->where('id',$id)->update($data);
        }
        else{
             $insert= DB::table('jobs')->insert($data);
        }
      

        if($insert)
        {
            session()->flash('success',"successfully Inserted");

        }

       return redirect()->route('job_post');
    }


    public function logout()
    {
        session()->flush();
        return redirect()->route('dashboard');
    }

    public function deleteJob($id)
    {
        $delete=DB::table('jobs')->where('id',$id)->delete();

        if($delete)
        {
            session()->flash('success',"successfully Deleted");

        }

       return redirect()->route('dashboard');
    }

    public function show_detail($id)
    {
        $job= JOB::getJobList($id);
      
        if (!$job) {

                return response()->json(['error' => 'Job not found'], 404);
             }

        return response()->json($job); 
        
    }

    public function edit_job($id)
    {
        $data['old']= JOB::getJobList($id);
        return view('jobs',$data);
    }

    public function apply(Request $request)
{ 

  
    $jobId = $request->input('job_id');
    $seekerId = session('user_login_id');

    // Check if the user already applied
    $alreadyApplied = DB::table('applyjob') // use your actual table name here
        ->where('job_id', $jobId)
        ->where('seeker_id', $seekerId)
        ->exists();

    if ($alreadyApplied) {
        return back()->with('error', 'You have already applied for this job.');
    }

    // Insert the new application
    DB::table('applyjob')->insert([
        'job_id' => $jobId,
        'seeker_id' => $seekerId,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'You have successfully applied for this job.');
}

public function appliedjobs()
{
    

    $seekerId = session('user_login_id');
   // return($seekerId);

    $appliedJobs = DB::table('applyjob')
        ->join('jobs', 'applyjob.job_id', '=', 'jobs.id')
        ->where('applyjob.seeker_id', $seekerId)
        ->select('jobs.*', 'applyjob.created_at as applied_date')
        ->orderByDesc('applyjob.created_at')
        ->get();

    return view('applied_jobs', compact('appliedJobs'));

}

public function filterjob(Request $request)
{
    $query = \App\Models\Job::query();

    if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->keyword . '%')
              ->orWhere('description', 'like', '%' . $request->keyword . '%');
        });
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    $jobs = $query->get();

    // Render only the HTML block (from jobResults div)
    $html = '<div class="grid grid-cols-1 md:grid-cols-2 gap-6">';
    foreach ($jobs as $job) {
        $html .= '<div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">';
        $html .= '<div class="flex justify-between items-start">';
        $html .= '<div>';
        $html .= '<h3 class="text-xl font-semibold text-gray-800 mb-1">' . e($job->title) . '</h3>';
        $html .= '<p class="text-gray-500 text-sm mb-2">' . e($job->company_name) . ' • ' . e($job->location) . '</p>';
        $html .= '<p class="text-sm text-gray-600">' . e($job->description, 150) . '</p>';
        $html .= '</div>';
        $html .= '<div class="text-right py-3">';
        $html .= '<span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full mb-2">' . e($job->type) . '</span>';
        $html .= '<p class="text-green-600 font-semibold">' . e($job->salary) . '/month</p>';
        $html .= '<a href="javascript:void(0);" onclick="openModal(' . $job->id . ')" class="text-sm text-blue-600 hover:underline block mt-2">View Details →</a>';
        $html .= '</div></div></div>';
    }

    if (empty($html)) {
        $html = '<p class="text-gray-500">No jobs found matching your filters.</p>';
    }

    return response()->json(['html' => $html]);
}



   




}
 ?>