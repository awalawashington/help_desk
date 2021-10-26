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
              <div class="tab-content pt-2">
              @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endforeach
                @endif
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- Change Password Form -->
                  <form action="{{ route('student.help.store') }}" method="post" role="form" class="form">
                    @csrf
                    <div class="col-lg-12">
                      <label for="yourUsername" class="form-label">Select department</label>
                      <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="department" required>
                            <option value="">Select department</option>
                            <option value="faculty">{{auth()->user()->course->course->course_department->faculty->name}}</option>
                            <option value="department">{{auth()->user()->course->course->course_department->name}}</option>
                            @foreach($school_department as $department)
                              <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="invalid-feedback">Please select your department</div>
                        @error('department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" id="newPassword">
                      </div>
                      @error('title')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <div class="col-lg-12">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Message</label>
                      <div class="col-md-8 col-lg-9">
                      <textarea id="w3review" name="message" rows="4" cols="50"></textarea>
                      </div>
                    </div>
                    @error('message')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                    @enderror
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Evidence</label>
                    <input type="file" name="evidence">

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @include('layouts.portal.footer')
@endsection