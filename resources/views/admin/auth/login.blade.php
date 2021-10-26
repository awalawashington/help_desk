@extends('layouts.admin.app')
@section('content')
<form action="{{ route('admin.login') }}" method="post" role="form" class="form">
@csrf
admin
    <div class="form-group mt-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="password" id="password" placeholder="Your Pasword" required>
    </div>
    @error('email')
        <div class="my-3">
            <div class="error-message">{{ $message }}</div>
        </div>
    @enderror
    
    <div class="text-center"><button type="submit">Login</button></div>
</form>
@endsection