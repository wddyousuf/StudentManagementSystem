
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
                    @if (isset($editData))
                    Update Attendance
                    @else
                        Take Attendance
                    @endif
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">@if (isset($editData))
                    Update Attendance
                    @else
                       Take Attendance
                    @endif</li>
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

                      @if (isset($editData))
                      <i class="fa fa-edit mr-1 text-info"></i>
                    Update Attendance
                    @else
                    <i class="fa fa-plus-circle mr-1 text-info"></i>
                        Take Attendance
                    @endif
                      <a href="{{ route('attendance.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>View Attendance</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                      <form action="{{ (@$editData)?route('attendance.update'):route('attendance.store') }}" method="post" id="myForm" name="takeAttendance">
                          @csrf
                          <table id="example1" class="table table-bordered table-striped">

                            @if (isset($editData))
                            <thead>
                                <tr>
                                  <th>SL No</th>
                                  <th>Roll</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                @foreach ($editData as $key=>$attendance)
                                <tbody>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $attendance->roll }}</td>
                                    <input type="hidden" name="id[]" value="{{ $attendance->id }}">
                                    <td>
                                        <label for="role">Attendance</label>
                                        <select name="atndnc[{{ $attendance->id }}]" id="atndnc" class="form-control">
                                            <option value="" disabled>Select</option>
                                            <option value="present" {{ ($attendance->status=="present")?'selected':'' }}>Present</option>
                                            <option value="absent" {{ ($attendance->status=="absent")?'selected':'' }}>Absent</option>
                                            <option value="leave" {{ ($attendance->status=="leave")?'selected':'' }}>Leave</option>
                                        </select>
                                    </td>
                                </tbody>
                                @endforeach
                            @else if
                            <thead>
                                <tr>
                                  <th>SL No</th>
                                  <th>Name</th>
                                  <th>Roll</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                @foreach ($att_query as $key=>$attendance)
                                <tbody>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $attendance->name }}</td>
                                    <td>{{ $attendance->roll }}</td>
                                    <input type="hidden" name="roll[]" value="{{ $attendance->roll }}">
                                    <td>
                                        <label for="role">Attendance</label>
                                        <select name="atndnc[{{ $attendance->roll }}]" id="atndnc" class="form-control">
                                            <option value="" disabled>Select</option>
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                            <option value="leave">Leave</option>
                                        </select>
                                    </td>
                                    <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                    <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                </tbody>
                                @endforeach
                            @endif


                        </table>

                              <input type="submit" value="{{ (@$editData)?'Update':'Submit' }}" class="btn btn-success">
                          </div>
                      </form>
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


