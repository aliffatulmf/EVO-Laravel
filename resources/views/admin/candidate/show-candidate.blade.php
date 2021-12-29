@extends('admin.layouts.app')

@section('evo-title', 'Candidate')

@section('evo-menu', 'List')

@section('evo-main')
<div class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div id="role_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="role" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="role" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Full Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i)
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $i->id }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>
                                        <img src="{{ $i->image }}" alt="{{ $i->candidate_name }} profile" width="128">
                                    </td>
                                    <td>
                                        {!! Str::limit($i->description, 50) !!}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="{{ route('candidate.destroy', $i->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-block btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-block btn-warning">Edit</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Full Name</th>
                                    <th rowspan="1" colspan="1">Image</th>
                                    <th rowspan="1" colspan="1">Description</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('evo-style')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('evo-js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#role').DataTable();
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

