@extends('client.master.layouts')

@section('evo-main')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ $data->image }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">
                            <b>{{ $data->name }}</b>
                        </h3>

                        <p class="text-muted text-center">{{ $data->position }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <strong><i class="fas fa-crown mr-1"></i> Number</strong>
                                @if ($data->number)
                                <p class="text-muted">
                                <h1 class="text-center">{!! $data->number !!}</h1>
                                </p>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                @if ($data->education)
                                <p class="text-muted">
                                    {!! $data->education !!}
                                </p>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                @if ($data->address)
                                <p class="text-muted">
                                    {!! $data->address !!}
                                </p>
                                @endif
                            </li>
                        </ul>
                        @if (!$transaction)
                        <form id="vote" action="{{ route('vote') }}" method="post" onsubmit="submit.disabled = true; return true;">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user }}">
                            <input type="hidden" name="number" value="{{ $data->number }}">
                            <button class="btn btn-success btn-block" name="submit"><b>VOTE</b></button>
                        </form>
                        @else
                        <button id="vote-button" class="btn btn-danger btn-block" disabled><b>VOTED</b></button>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab">Description</a></li>
                            <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                        </ul>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="description">
                                <!-- Post -->
                                <div class="">
                                    <!-- /.user-block -->
                                    {!! $data->description !!}
                                </div>
                                <!-- /.post -->
                            </div>
                            <div class="tab-pane" id="image">
                                <img width="100%" src="{{ $data->image }}" alt="{{ $data->name }}" srcset="">
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('evo-js')
<script>
    $('#vote-button').submit(function() {
        $(this).prop({
            disabled: true
        })
    })
</script>
@error('number')
<script>
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        autohide: true,
        delay: 2000,
        body: '{{ $message }}'
    })
</script>
@enderror
@error('user')
<script>
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        autohide: true,
        delay: 2000,
        body: '{{ $message }}'
    })
</script>
@enderror
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