
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
                        Result Insertion
                    @endif
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">@if (isset($editData))
                    Update Attendance
                    @else
                    Result Insertion
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
                    Result Insertion
                    @endif
                      <a href="{{ route('result.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>View Result</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                      <form action="{{ (@$editData)?route('attendance.update'):route('result.store') }}" method="post" id="myForm" name="ResultInsertion">
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
                                  <th>Name</th>
                                  <th>Roll</th>
                                  <th>Session</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $att_query->name }}</td>
                                    <td>{{ $att_query->roll }}</td>
                                    <td>
                                        {{ $att_query->session }}
                                    </td>
                                </tbody>

                            @endif


                        </table>
                        <div class="text-center bg-success my-2 py-4">
                            <h3>Result Section</h3>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" name="roll" value="{{ $att_query->roll }}">
                            <input type="hidden" name="year" value="{{ $att_query->year }}">
                            <input type="hidden" name="semester" value="{{ $att_query->semester }}">
                            @php
                                $count=0;
                                $credit=0;
                            @endphp
                            @foreach ($course as $item)
                            @php
                                $count++;
                                $credit=$credit+$item->credit;
                            @endphp

                                <label for="crs{{ $count }}" class="mb-4 mt-2 col-md-2">{{ $item->courseCode }}</label>
                                <input type="number" name="crs{{ $count }}" id="crs{{ $count }}" value="" placeholder="80" max="100" min="0" class="form-control col-md-10 float-right mb-2">
                                <input type="hidden" name="credit{{ $count }}" value="{{ $item->credit }}">
                            @endforeach
                            <input type="hidden" name="t_credit" value="{{ $credit }}">
                        </div>
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


