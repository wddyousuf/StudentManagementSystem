
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
                      <form action="{{ (@$editData)?route('course.update',$editData->id):route('course.store') }}" method="post" id="myForm" name="addcourse">
                          @csrf
                              <div class="form-row col-md-6">
                                  <label for="year" class="mb-4 mr-4">Year</label>
                                  <select name="year" id="year" class="form-control col-md-10 float-right mb-4">
                                    <option value="" disabled>Select</option>
                                    <option value="1st" {{ (@$editData->year=='1st')?"selected":"" }}>1st Year</option>
                                    <option value="2nd" {{ (@$editData->year=='2nd')?"selected":"" }}>2nd Year</option>
                                    <option value="3rd" {{ (@$editData->year=='3rd')?"selected":"" }}>3rd Year</option>
                                    <option value="4th" {{ (@$editData->year=='4th')?"selected":"" }}>4th Year</option>
                                  </select>
                                </div>
                                <div class="form-row col-md-6">
                                    <label for="smstr" class="mr-2">Semester</label>
                                    <select class="form-control col-md-10 float-right mb-4" name="smstr" id="smstr" >
                                      <option value="" disabled>Select</option>
                                      <option value="1st" {{ (@$editData->semester=='1st')?"selected":"" }}>1st Semester</option>
                                      <option value="2nd" {{ (@$editData->semester=='2nd')?"selected":"" }}>2nd Semester</option>
                                    </select>
                                </div>
                                <div class="form-row col-md-6">
                                    <label for="credit" class="mr-4">Credit</label>
                                    <select class="form-control col-md-10 float-right mb-4" name="credit" id="credit" >
                                      <option value="" disabled>Select</option>
                                      <option value="0.75" {{ (@$editData->credit=='0.75')?"selected":"" }}>0.75</option>
                                      <option value="1.5" {{ (@$editData->credit=='1.5')?"selected":"" }}>1.5</option>
                                      <option value="3.00" {{ (@$editData->credit=='3.00')?"selected":"" }}>3.0</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="crssession">Session</label>
                                     <input type="text" name="crssession" id="crssession" value="{{ @$editData->session }}" placeholder="Ex: 2015-16" class="form-control"  >
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="crsname">Course Name</label>
                                     <input type="text" name="crsname" id="crsname" value="{{ @$editData->courseName }}" placeholder="Ex: Data Structure and Algorithm" class="form-control"  >
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="crscode">Course Code</label>
                                     <input type="text" name="crscode" id="crscode" value="{{ @$editData->courseCode }}" placeholder="Ex: ICE-1101" class="form-control"  >
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="instrctr">Course Instructor</label>
                                     <input type="text" name="instrctr" id="instrctr" value="{{ @$editData->instructor }}" placeholder="Ex: Dr. Md. Omor Faruk" class="form-control"  >
                                </div>
                          <div>
                              <input type="submit" value="{{ (@$editData)?'Edit Course':'Add Course' }}" class="btn btn-success">
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


