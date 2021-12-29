@extends('admin.layouts.app')

@section('evo-title', 'Candidate')

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
            <form method="POST" action="{{ route('candidate.store') }}">
                @csrf
                <div class="card-body">
                    <!-- Number -->
                    <div class="form-group">
                        <label for="number">Number</label>
                        <span>*</span>
                        @error('number')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="number" type="number" class="form-control" id="number" placeholder="Number" value="{{ old('number') }}" autocomplete="off">
                    </div>
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <span>*</span>
                        @error('name')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}" autocomplete="off">
                    </div>
                    <!-- Position -->
                    <div class="form-group">
                        <label for="position">Position</label>
                        @error('position')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="position" type="text" class="form-control" id="position" placeholder="President" value="{{ old('position') }}" autocomplete="off">
                    </div>
                    <!-- Position -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        @error('address')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="address" type="text" class="form-control" id="address" placeholder="Wonogiri, Jawa Tengah" value="{{ old('address') }}" autocomplete="off">
                    </div>
                    <!-- Position -->
                    <div class="form-group">
                        <label for="education">Education</label>
                        @error('education')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <!-- <input name="education" type="text" class="form-control" id="education" placeholder="Wonogiri, Jawa Tengah" value="{{ old('education') }}" autocomplete="off"> -->
                        <textarea name="education" id="education" autocomplete="off">{{ old('education') }}</textarea>
                    </div>
                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Profile URL</label>
                        @error('image')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="image" type="text" class="form-control" id="image" placeholder="https://cdn.evoting.io/images/candidates/avatar.png" value="{{ old('image') }}" autocomplete="off">
                    </div>
                    <!-- Video -->
                    <div class="form-group">
                        <label for="video">Video URL</label>
                        <span>*
                            <sup class="text-red">
                                <i>
                                    <b>YouTube only</b>
                                </i>
                            </sup>
                        </span>
                        @error('video')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <input name="video" type="text" class="form-control" id="video" placeholder="https://www.youtube.com/watch?v=W0W3vo71u9" value="{{ old('video') }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <span>*</span>
                        @error('description')
                        <span class="text-red">{{ $message }}</span>
                        @enderror
                        <textarea class="ckeditor" name="description" id="description" autocomplete="off">{{ old('description') }}</textarea>
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


@section('evo-style')
<style>
    .ck-editor__editable_inline {
        min-height: 400px !important;
    }
</style>
@endsection

@section('evo-js')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#description'))
        .then(editor => {
            window.editor1 = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });

    ClassicEditor.create(document.querySelector('#education'))
        .then(editor => {
            window.editor2 = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
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