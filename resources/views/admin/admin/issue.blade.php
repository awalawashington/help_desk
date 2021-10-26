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
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2>{{$issue->user->sir_name}} {{$issue->user->other_names}}</h2>
              <h3>{{$issue->user->admission_number}}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Respond</button>
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
                  
                  <h5 class="card-title">Issue Details</h5>

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

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{ route('admin.help.store') }}" method="post" role="form" class="form">
                    @csrf
                    <input type="hidden" name="issue" value="{{$issue->id}}">
                    <div class="form-group mb-3">
                      <label for="exampleFormControlTextarea1">Response</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="response">
                        {{$issue->response}}
                        </textarea>
                     </div>
                      @error('response')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>


                    <div class="text-center">
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