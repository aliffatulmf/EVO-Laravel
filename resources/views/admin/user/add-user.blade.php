@extends('admin.layouts.app')

@section('evo-title', 'User')

@section('evo-menu', 'Add')

@section('evo-main')
<div class="content">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="card-body">
                    @if ($roles->count() === 0)
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Enter full name" autocomplete="off" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" disabled>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" disabled>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        @error('fullname')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input value="{{ old('fullname') }}" name="fullname" type="text" class="form-control" id="fullname" placeholder="Enter full name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        @error('username')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input value="{{ old('username') }}" name="username" type="text" class="form-control" id="username" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        @error('password')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
                    </div>
                    @endif

                    <!-- Role -->
                    <div class="form-group">
                        <label>Role</label>
                        @error('role')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <select name="role" class="custom-select">
                            <option value="">Empty</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}:{{ $role->default_point }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    @if ($roles->count() === 0)
                    <button type="submit" class="btn btn-primary" disabled>Submit</button>
                    @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

<!-- JavaScript -->
@section('evo-js')
@if (session('message'))
<script>
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        autohide: true,
        delay: 2000,
        body: '{{ session("message") }}'
    })
</script>
@endif
@endsection