
  @extends('backend.layouts.master')
  @section('content')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                    Attendance By Date
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Attendance By Date</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header">
                    <h3>

                      Attendance By Date
                      <a href="{{ route('attendance.take') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Take Attendance</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>SL No</th>
                              <th>Date</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($att_query as $key=>$attendance)
                            <tbody>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>
                                    <a href="{{ route('attendance.viewbydate',[$attendance->date,$year,$semester]) }}" class="btn btn-success btn-xs">View</a>
                                    <a href="{{ route('attendance.edit',[$attendance->date,$year,$semester]) }}" class="btn btn-success btn-xs">Update</a>
                                </td>
                            </tbody>
                            @endforeach

                        </table>

                          </div>
                  </div>
              </div>
              </div><!-- /.card-body -->
              </div>
              <!-- /.card -->




              </section>
              <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




  @endsection


