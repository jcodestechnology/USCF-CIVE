<!-- resources/views/expenses/index.blade.php -->

@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Matumizi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <h5 class="card-title">Jaza Matumizi</h5>

                <!-- Form for entering expenses -->
                <form class="row g-3" action="{{ route('expenses.store') }}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="expense_date" class="form-label">Tarehe</label>
                        <input type="date" id="expense_date" name="expense_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="amount" class="form-label">Kiasi (TZS)</label>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Kiasi">
                    </div>

                    <div class="col-md-6">
                        <label for="description" class="form-label">Maelezo ya Matumizi</label>
                        <textarea id="description" name="description" class="tinymce-editor form-control" rows="3" placeholder="Maelezo ya Matumizi"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
                    </div>
                </form><!-- End Form for entering expenses -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
