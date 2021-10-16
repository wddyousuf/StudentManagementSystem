@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
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
                    <i class="fas fa-user mr-1 text-info"></i>
                    Profile
                    <a href="{{ route('profiles.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>View Profile</a>
                  </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('profiles.update') }}" method="post" enctype="multipart/form-data" id="myForm" name="regstr">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="{{ $editData1->name }}" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="f_name">Name</label>
                                <input type="text" id="f_name" value="{{ $editData1->father }}" class="form-control" name="f_name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="m_name">Name</label>
                                <input type="text" id="m_name" value="{{ $editData1->mother }}" class="form-control" name="m_name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" id="email" value="{{ $editData->email }}" class="form-control" name="email">
                                <span>{{ ($errors->has('email')) ? $errors->first('email') : '' }}</span>
                            </div>
                            @if ($editData1->role == 'Student')
                            <div class="form-group col-md-4">
                                <label for="role">Session</label>
                                <select name="session" id="session" class="form-control">
                                    <option value="" disabled>Select</option>
                                    <option value="2015-16">2015-16</option>
                                    <option value="2016-17">2016-17</option>
                                    <option value="2017-18">2017-18</option>
                                    <option value="2018-19">2018-19</option>
                                    <option value="2019-20">2019-20</option>
                                    <option value="2020-21">2020-21</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="reg_id">Registration No</label>
                                <input type="number" id="reg_id" value="0{{ $editData1->reg_id }}" class="form-control" name="reg_id">
                            </div>
                            @elseif ($editData1->role == 'Admin' || $editData1->role == 'Editor')
                            <div class="form-group col-md-4">
                                <label for="m_name">Designation</label>
                                <input type="text" id="designation" value="{{ $editData1->designation }}" class="form-control" name="designation">
                            </div>
                            @endif
                            <div class="form-group col-md-4">
                                <label for="present">Present Address</label>
                                <input type="text" id="present" value="{{ $editData1->present_address }}" class="form-control" name="present">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="permanent">Permanent Address</label>
                                <input type="text" id="permanent" value="{{ $editData1->permanent_address }}" class="form-control" name="permanent">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="number">Mobile</label>
                                <input type="number" id="number" value="0{{ $editData->number }}" class="form-control" name="number">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nid">NID No</label>
                                <input type="number" id="nid" value="{{ $editData1->nid }}" class="form-control" name="nid">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="birthdate">BirthDate</label>
                                <input type="text" name="birthdate" id="datepicker" class="form-control" value="{{ $editData1->birthdate }}" placeholder="YYYY-MM-DD" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address">Address</label>
                                <input type="text" id="address" value="{{ $editData->address }}" class="form-control" name="address">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <div class="col-sm-12 form-control">
                                  <input type="radio" name="gender" id="gender" value="Male" class="col-sm-1" {{ ($editData->gender=="Male")?"checked":"" }}>Male
                                  <input type="radio" name="gender" id="gender" value="Female" class="col-sm-1" {{ ($editData->gender=="Female")?"checked":"" }}>Female
                                </div>
                            </div>
                          <div class="form-group col-md-4">
                            <label for="image">Image</label>
                            <input type="file" id="image" class="form-control" name="image">
                          </div>
                          <div class="form-group col-md-4">
                            <img src="{{ (!empty($editData->image))? url('upload/user_images/'.$editData->image): url('upload/noImage.jpg')}}" id="showImage" style="height: 150px; width: 150px; border: 1px solid black;" alt="">
                          </div>

                        </div>
                        <div>
                            <input type="submit" value="Update Profile" class="btn btn-success">
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


