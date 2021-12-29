@extends('admin.layouts.app')

@section('evo-title', 'Dashboard')

@section('evo-menu', 'Dashboard')

@section('evo-main')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $users->count() }}</h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $candidates->count() }}</h3>

            <p>Candidates</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="{{ route('candidate.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            @if ($users->count() === 0)
            <h3>0<sup style="font-size: 20px">%</sup></h3>
            @else
            <h3>{{ round(100 * ($transactions->count() / $users->count())) }}<sup style="font-size: 20px">%</sup></h3>
            @endif

            <p>Transactions</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#result-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="container" id="result-table">
      <div class="card">
        <div class="card-body">
          <div id="role_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table id="trans" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="role" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                      <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Name</th>
                      <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Users</th>
                      <th class="sorting" tabindex="0" aria-controls="role" rowspan="1" colspan="1">Total Point</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($candidates as $c)
                    <tr>
                      <td class="dtr-control sorting_1" tabindex="0">{{ $c->number }}</td>
                      <td>{{ $c->name }}</td>
                      <td>{{ \App\Models\Admin\Candidate::findOrFail($c->id)->transactions->count() }}</td>
                      <td>
                        @php
                        $t = \App\Models\Admin\Transaction::where('candidate_id', $c->id)->get();
                        $point = 0;

                        foreach ($t as $i) {
                        $point += \App\Models\Admin\User::find($i->user_id)->role->default_point;
                        }

                        echo $point;
                        @endphp
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">ID</th>
                      <th rowspan="1" colspan="1">Name</th>
                      <th rowspan="1" colspan="1">Default Point</th>
                      <th rowspan="1" colspan="1">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- /.container-fluid -->
</div>
@endsection

@section('evo-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<style>
  html {
    scroll-behavior: smooth;
  }
</style>
@endsection

@section('evo-js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $('#trans').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
  });
</script>
@endsection