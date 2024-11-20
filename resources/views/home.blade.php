@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Welcome Section -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 >Welcome to Acadx, {{ Auth::user()->name }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="row justify-content-left mb-3">
            <!-- Total Users Card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Users</h4>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $totalUsers }}</h5>
                    </div>
                    <div class="card-header">
                        <h4>Recent Users</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($recentUsers as $user)
                                <li>{{ $user->name }} ({{ $user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif; /* Optional: Set font */
            background-color: #f4f4f4; /* Optional: Set background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Full viewport height */
        }

        /* Container for the two sections */
        .dashboard-container {
            display: flex;
            gap: 20px; /* Add space between sections */
        }

        /* Column styling for the student and employee cards */
        .dashboard-column {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Add space between cards */
        }

        /* Card styling */
        .card {
            background: #fff;
            padding: 0.005px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;

        }

        .card-header h4 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }

        .card-body p {
            font-size: 1.5em;
            color: #555;
        }

        /* Financial Dashboard styling */
        .dashboard-content {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-widget h2 {
            margin: 10px 0;
            color: #333;
        }

        .dashboard-widget p {
            font-size: 1.2em;
            color: #555;
        }
       
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Students and Employees Section -->
        <div class="dashboard-column">
            <div class="card">
                <div class="card-header">
                    <h4>Total Students</h4>
                </div>
                <div class="card-body">
                    <p>{{ $totalStudents }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Total Employees</h4>
                </div>
                <div class="card-body">
                    <p>{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>
        <div class="dashboard-column">
            <div class="card">
                <div class="card-header">
                    <h4>Total Courses</h4>
                </div>
                <div class="card-body">
                    <p>{{ $totalCourses }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Total Units</h4>
                </div>
                <div class="card-body">
                    <p>{{ $totalUnits }}</p>
                </div>
            </div>
        </div>


        <!-- Financial Dashboard Section -->
        <div class="dashboard-column">
            <div class="card">
        

            <div class="card-header">
                <h4>Total Fees Paid</h2>
            </div>
            <div class="card-body">
            <p>{{ $totalPaid }}</p>
            </div>
           </div>

           <div class="card"> 
           <div class="card-header">
                <h4>Total Fees Balance</h2>
            </div>
            <div class="card-body">
            <p>{{ $totalBalance }}</p>
            </div>
            </div>
        </div>
    </div>
</body>

</html>


       <!-- Dashboard Charts -->
       <div class="row text-center">
            <!-- Total Employees by Department -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Employees by Department</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="employeeChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Paid vs Unpaid -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Paid vs Unpaid</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="financesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Lecturers vs Students -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Lecturers vs Students</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="lecturersVsStudentsChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Employees by Department Chart
        const departmentLabels = @json($employeeCountsByDepartment->keys());
        const employeeCounts = @json($employeeCountsByDepartment->values());
        new Chart(document.getElementById('employeeChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: departmentLabels,
                datasets: [{
                    label: 'Number of Employees',
                    data: employeeCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Paid vs Unpaid Chart
        new Chart(document.getElementById('financesChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Paid', 'Unpaid'],
                datasets: [{
                    label: 'Finances Breakdown',
                    data: [{{ $totalPaid }}, {{ $totalBalance }}],
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });

        // Lecturers vs Students Chart
        const lecturers = {{ $totalLecturers }};
        const students = {{ $totalStudents }};
        new Chart(document.getElementById('lecturersVsStudentsChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Lecturers', 'Students'],
                datasets: [{
                    label: 'Lecturer to Student Ratio',
                    data: [lecturers, students],
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    </script>

@endsection

