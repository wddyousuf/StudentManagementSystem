@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update News and Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Update News and Events</li>
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
                    <i class="fa fa-edit mr-1 text-info"></i>
                    Update News and Events
                    <a href="{{ route('news.view') }}" class="btn btn-info float-right "><i class="fa fa-list fa-xs ml-1 mr-1"></i>Manage News and Events</a>
                  </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('news.update',$editData->id) }}" method="post" enctype="multipart/form-data" id="myForm" name="updatenews">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $editData->title }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" rows="4" cols="15">{{ $editData->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="text" name="date" id="datepicker" class="form-control" value="{{ $editData->date }}" placeholder="YYYY-MM-DD" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <img src="{{ (!empty($editData->image))? url('upload/news/'.$editData->image): url('upload/123.png')}}" id="showImage" style="height: 150px; width: 150px; border: 1px solid black;" alt="">
                            </div>
                          <div class="form-group col-md-4">
                            <label for="image">Image</label>
                            <input type="file" id="image" class="form-control" name="image">
                          </div>


                        </div>
                        <div>
                            <input type="submit" value="Update News and Events" class="btn btn-success">
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


