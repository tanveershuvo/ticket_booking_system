@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">All Buses</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All buses</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All buses of <strong>{{ Auth::user()->companies[0]->company_name }}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Bus ID</th>
              <th>Bus Type</th>
              <th>registration no</th>
              <th>Total Seats</th>
              {{-- <th>Trip ID</th> --}}
          </tr>
          </thead>
          <tbody>
              {{dd($bus_details->companies)}}
              @foreach ($bus_details as $key => $value)

                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->companies->company_name }}</td>
                      <td>{{ $value->registration_no }}</td>
                      <td>{{ $value->total_seats }}</td>
                  </tr>

                @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>Bus ID</th>
              <th>Bus Type</th>
              <th>registration no</th>
              <th>Total Seats</th>
              {{-- <th>Trip ID</th> --}}
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

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
    // $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": []
    });

  });
</script>
@endsection
