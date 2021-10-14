
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
                    Edit Course
                    @else
                        Add Course
                    @endif
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">@if (isset($editData))
                    Edit Course
                    @else
                        Add Course
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
                    Edit Course
                    @else
                    <i class="fa fa-plus-circle mr-1 text-info"></i>
                        Add Course
                    @endif
                      <a href="{{ route('course.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Manage Course</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                      <form action="{{ (@$editData)?route('course.update',$editData->id):route('attendance.store') }}" method="post" id="myForm" name="addcourse">
                          @csrf
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
                                <input type="hidden" name="date" value="{{ $attendance->date }}">
                                <td>
                                    <a href="{{ route('attendance.viewbydate',[$attendance->date,$year,$semester]) }}" class="btn btn-success btn-xs">View</a>
                                    <a href="{{ route('attendance.edit',[$attendance->date,$year,$semester]) }}" class="btn btn-success btn-xs">Update</a>
                                </td>
                            </tbody>
                            @endforeach

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


