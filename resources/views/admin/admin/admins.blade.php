@extends('layouts.portal.app')
@section('content')
</head>

<body>

@include('layouts.portal.admin.navbar')

@include('layouts.portal.admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">


        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Create Admin</button>
                </li>

              </ul>
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
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Department</th>
                        <th scope="col">Since</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($admins as $admin)
                      <tr>
                        <th scope="row"><a href="#">{{$admin->name}}</a></th>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->phone_number}}</td>
                        <td>{{$admin->adminable_type::find($admin->adminable_id)->name}}</td>
                        <td>{{$admin->created_at->diffForHumans()}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{ route('admin.admins.store') }}" method="post" role="form" class="form"  enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                      <label for="yourUsername" class="form-label">Select department</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Default select example" name="department" required>
                            <option value="">Select department</option>
                            @foreach($school_departments as $department)
                              <option value="staff-{{$department->id}}">{{$department->name}} - Staff</option>
                            @endforeach
                            @foreach($faculties as $faculty)
                              <option value="faculty-{{$faculty->id}}">{{$faculty->name}} - Faculty</option>
                            @endforeach
                            @foreach($course_departments as $department)
                              <option value="department-{{$department->id}}">{{$department->name}} - Department</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="invalid-feedback">Please select department</div>
                        @error('department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="newPassword" required/>
                      </div>
                      @error('name')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <div class="col-lg-12">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="newPassword" required/>
                      </div>
                      @error('email')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <div class="col-lg-12">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone_number" type="text" class="form-control" id="newPassword" required/>
                      </div>
                      @error('phone_number')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>
                   
                    <div class="col-lg-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>
                        <div class="invalid-feedback">Please enter password!</div>
                    </div>
                    <div class="col-lg-12">
                        <label for="yourPassword" class="form-label">Password Confirmation</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                        </div>
                        <div class="invalid-feedback">Please confirm password!</div>
                    </div>
                    
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-primary">Save</button>
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