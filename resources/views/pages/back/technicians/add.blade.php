@extends("dashboard")
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Technicians</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Technicians</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="content ">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Technicians</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('technicians.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter technicians name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Designation</label>
                        <input name="designation" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter desgnation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook Link</label>
                        <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter facebook link">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Twitter Link</label>
                        <input name="twitter" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter twitter link">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Instagram Link</label>
                        <input name="instagram" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter instagram">
                    </div>
    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection