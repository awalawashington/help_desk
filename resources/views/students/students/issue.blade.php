@extends('layouts.portal.app')
@section('content')

</head>

<body>

@include('layouts.portal.students.navbar')

@include('layouts.portal.students.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2>{{auth()->user()->sir_name}}. {{auth()->user()->other_names}}</h2>
              <h3>{{auth()->user()->admission_number}}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Issue</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Issue Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Department</div>
                    <div class="col-lg-9 col-md-8">{{$issue->helpable_type::find($issue->helpable_id)->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Title</div>
                    <div class="col-lg-9 col-md-8">{{$issue->title}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Description</div>
                    <div class="col-lg-9 col-md-8">{{$issue->body}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Attachment</div>
                    <div class="col-lg-9 col-md-8"> <a href="{{asset('student/evidence/'.$issue->evidence)}}" target="_blank">View</a></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Time</div>
                    <div class="col-lg-9 col-md-8">{{$issue->created_at->diffForHumans()}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Response</div>
                    <div class="col-lg-9 col-md-8">{{$issue->response}}</div>
                  </div>
                    

                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @include('layouts.portal.footer')
@endsection