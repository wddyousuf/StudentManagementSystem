@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Student</li>
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
                    <i class="fas fa-users mr-1 text-info"></i>
                    All Student
                    <a href="{{ route('student.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Student List</a>
                  </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('student.update',$editData->id) }}" method="post" enctype="multipart/form-data" id="myForm" name="regstr">
                        @csrf
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Student Name</label>
                                    <input type="text" id="name" value="{{ $editData->name }}" class="form-control" name="name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="year" >Year</label>
                                      <select name="year" id="year" class="form-control">
                                        <option value="" disabled>Select</option>
                                        <option value="1st" {{ ($editData->year=="1st")?"selected":"" }}>1st Year</option>
                                        <option value="2nd" {{ ($editData->year=="2nd")?"selected":"" }}>2nd Year</option>
                                        <option value="3rd" {{ ($editData->year=="3rd")?"selected":"" }}>3rd Year</option>
                                        <option value="4th" {{ ($editData->year=="4th")?"selected":"" }}>4th Year</option>
                                      </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="smstr">Semester</label>
                                        <select class="form-control" name="smstr" id="smstr" >
                                          <option value="" disabled>Select</option>
                                          <option value="1st" {{ ($editData->semester=="1st")?"selected":"" }}>1st Semester</option>
                                          <option value="2nd" {{ ($editData->semester=="2nd")?"selected":"" }}>2nd Semester</option>
                                        </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="session">Session</label>
                                    <input type="text" id="session" value="{{ $editData->session }}" class="form-control" name="session">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="roll">Roll</label>
                                    <input type="number" id="roll" value="{{ $editData->roll }}" class="form-control" name="roll">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="reg_no">Registration No</label>
                                    <input type="number" id="reg_no" value="{{ $editData->reg_no }}" class="form-control" name="reg_no">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number">Mobile</label>
                                    <input type="number" id="number" value="{{ $editData->mobile }}" class="form-control" name="number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" value="{{ $editData->address }}" class="form-control" name="address">
                                </div>
                              <div class="form-group col-md-4">
                                <label for="image">Image</label>
                                <input type="file" id="image" class="form-control" name="image">
                              </div>
                              <div class="form-group col-md-2">
                                <img src="{{ (!empty($editData->photo))? url('upload/student_images/'.$editData->photo): url('upload/noImage.jpg')}}" id="showImage" style="height: 150px; width: 150px; border: 1px solid black;" alt="">
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Update User" class="btn btn-success">
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


