@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">All Trips</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All trips</li>
@endsection

@section('content')
    <div class="col-12">
      <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">All trips of the registred companies</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped display responsive">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Bus ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Start Point</th>
                <th>End Point</th>
                <th>Fare</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trips as $value)
                <tr>
                    <td>{{ $value->company_name }}</td>
                    <td>{{ $value->bus_id }}</td>
                    <td>{{ $value->date }}</td>
                    <td>{{ $value->start_time }}</td>
                    <td>{{ $value->start_name }}</td>
                    <td>{{ $value->end_name }}</td>
                    <td>{{ $value->fare }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Company Name</th>
                <th>Bus ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Start Point</th>
                <th>End Point</th>
                <th>Fare</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

@endsection



@section('admin_css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/jquery.dataTables.min.css')}}">


@endsection


@section('admin_scripts')

    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

@endsection
