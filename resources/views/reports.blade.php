@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Reports</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <!-- Single Card for Report Selection -->
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Report</h5>
                        <form action="{{ route('generate.report') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="report_type">Select Report Type</label>
                                <select class="form-control" id="report_type" name="report_type">
                                    <option value="income">Income</option>
                                    <option value="expenses">Expenses</option>
                                    <option value="income_expenses">Income and Expenses</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <button type="submit" class="btn  download-btn" style="background:#086808; color:#FFFFFF">Download Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End row -->
    </section>

</main><!-- End #main -->

@endsection
