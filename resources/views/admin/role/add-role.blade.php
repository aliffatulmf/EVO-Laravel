@extends('admin.layouts.app')

@section('evo-title', 'Role')

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
            <form method="POST" action="{{ route('role.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <span>*</span>
                        @error('name')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter role name" value="{{ old('name') }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="point">Default Point</label>
                        <span>*</span>
                        @error('point')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="point" type="number" class="form-control" id="point" placeholder="Enter default point" value="{{ old('point') }}" autocomplete="off">
                    </div>
                    <!-- Admin -->
                    <hr>
                    <div class="form-group">
                        <input type="checkbox" id="admin" name="admin" data-toogle="switch" data-bootstrap-switch data-on-text="Admin" data-off-text="Non Admin">
                        @error('admin')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@section('evo-js')
<script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>
@if(session('message'))
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
