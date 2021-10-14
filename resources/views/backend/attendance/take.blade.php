
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
                        Take Attendance
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Take Attendance</li>
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
                    <i class="fa fa-plus-circle mr-1 text-info"></i>
                        Take Attendance
                      <a href="{{ route('course.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Manage Course</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                      <form action="{{ route('attendance.queries') }}" method="post" id="myForm" name="takeattendance">
                          @csrf
                              <div class="form-row col-md-6">
                                  <label for="year" class="mb-4 mr-4">Year</label>
                                  <select name="year" id="year" class="form-control col-md-10 float-right mb-4">
                                    <option value="" disabled>Select</option>
                                    <option value="1st">1st Year</option>
                                    <option value="2nd">2nd Year</option>
                                    <option value="3rd">3rd Year</option>
                                    <option value="4th">4th Year</option>
                                  </select>
                                </div>
                                <div class="form-row col-md-6">
                                    <label for="smstr" class="mr-2">Semester</label>
                                    <select class="form-control col-md-10 float-right mb-4" name="smstr" id="smstr" >
                                      <option value="" disabled>Select</option>
                                      <option value="1st">1st Semester</option>
                                      <option value="2nd">2nd Semester</option>
                                    </select>
                                </div>
                          <div>
                              <input type="submit" value="Take Attendance" class="btn btn-success">
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


