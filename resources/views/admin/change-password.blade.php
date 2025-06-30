@extends('admin.layout')

@section('content')
@section('title')
Profile
@endsection
@section('page_title')
Profile
@endsection
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-4">Change Password</h6>
                @if ($errors->any())
                <div style=" color: #e70619;
                                                background-color: #ffffff;
                                                border-color: #f10e25;" class="alert">

                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('admin.update.password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input name="old_password" type="password" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input name="password" type="password" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password Repeat</label>
                        <input name="password_confirmation" type="password" class="form-control">

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection