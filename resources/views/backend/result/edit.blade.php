
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
                    Result information
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Result Information</li>
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

                      Result Information
                      <a href="{{ route('result.edit',$result->id) }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Update Result</a>
                    </h3>

                  </div><!-- /.card-header -->
                  <div class="card-body">

                          <table class="table table-bordered table-striped text-center">

                            <thead>
                                <tr>
                                  <th>Year</th>
                                  <th>Semester</th>
                                  <th>Roll</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $result->year }}</td>
                                    <td>{{ $result->semester }}</td>
                                    <td>
                                        {{ $result->roll }}
                                    </td>
                                </tbody>


                        </table>
                          </div>
                          <div>
                              <div><h3 class="text-center">Subject Wise Result </h3></div>
                              <div>
                                <form action="{{ route('result.update',$result->id) }}" method="post" id="myForm" name="ResultInsertion">
                                    @csrf
                                <table  class="table table-bordered table-striped text-center">

                                    <thead>
                                        <tr>
                                          <th>Course Code</th>
                                          <th>Marks</th>
                                        </tr>
                                        </thead>




                                  @php
                                      $sbjct=App\CourseWithResult::where('resultId',$result->id)->get();
                                  @endphp
                                  @foreach ($sbjct as $item)
                                  <tbody>
                                    <td>{{ $item->courseCode }}</td>
                                    @php
                                        $courseNo=$item->courseNo;
                                    @endphp
                                    <td>
                                        <input type="number" name="{{ $courseNo }}" id="{{ $courseNo }}" value="{{ $result->$courseNo }}" placeholder="80" max="100" min="0" class="form-control col-md-10 float-right mb-2">
                                    </td>
                                </tbody>
                                  @endforeach
                                </table>
                                <input type="submit" value="Submit" class="btn btn-success">
                              </div>
                            </form>
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


