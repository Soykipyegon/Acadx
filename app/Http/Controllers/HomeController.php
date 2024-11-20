<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Lecturer;
use App\Models\Receipt;
use App\Models\Unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        {
            // Get the total number of users
            $totalUsers = User::count();
            $totalStudents = Student::count();
            $totalEmployees = Employee::count();
            $totalCourses = Course::count();
            $totalUnits = Unit::count();
            $totalLecturers = Lecturer::count();
            $totalPaid = Receipt::sum('amount_paid');
            $totalBalance = Receipt::sum('balance');
            $recentUsers = User::latest()->take(5)->get(); // Get 5 most recent users

            $employeeCountsByDepartment = Employee::selectRaw('department, count(*) as count')
                ->groupBy('department')
                ->get()
                ->keyBy('department')
                ->map(fn($item) => $item->count);
            
    
            // Pass the total number of users to the view
            return view('home', compact('totalUsers', 'recentUsers', 'totalStudents', 'totalEmployees', 'employeeCountsByDepartment', 'totalPaid', 'totalBalance', 'totalCourses', 'totalUnits', 'totalLecturers'));

              // Get the total paid amount
        //$totalAmount = Receipt::sum('amount_paid');

        // Get the total outstanding balance
       // $totalBalance = Receipt::sum('balance');

        // Get the number of paid and unpaid entries (optional)
        $totalPaidCount = Receipt::where('status', 'paid')->count();
        $totalUnpaidCount = Receipt::where('status', 'pending')->count();

        // Pass the data to the view
        return view('home', compact('totalPaid', 'totalBalance', 'totalPaidCount', 'totalUnpaidCount'));
        }
        //return view('home');
    }
}
