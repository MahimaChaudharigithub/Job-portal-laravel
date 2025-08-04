<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;  

class Job extends Model
{
    use HasFactory;

    public static function getJobList($id = null)
    {

        if ($id) {

            return DB::table('jobs')->where('id', $id)->first();
         }

        if (session('user_role') == 'EMPLOYEE') 
        {

            $employee = session('user_name');
            return DB::table('jobs')
            ->where('created_by', $employee)
            ->paginate(10);  // Paginate results
        }

        return DB::table('jobs')->paginate(10);
    }       
    


}
