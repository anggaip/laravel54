@extends('layouts.admin')

@section('title', 'Categories | Dashboard Administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Categories
            <small>Article Categories <button href="#" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#addForm"><i class="fa fa-plus"></i> &nbsp; Add Category</button></small>
          </h1>
          <div class="modal modal-success fade" id="addForm">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add a Category</h4>
                  </div>

                  <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                  <div class="modal-body">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 control-label">Category Name:</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" id="name" class="form-control" required="required">
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline">Save</button>
                  </div>
                  </form>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                  @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      {{ session('status') }}
                    </div>
                  @endif
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Articles</th>
                        <th width="150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->posts()->where('category_id', $category->id)->count() }}</td>
                        <td><form method="post" action="{{ route('categories.destroy', $category->id) }}"><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-flat btn-sm"><i class="fa fa-pencil"></i> &nbsp; Update</a> | 
                          {{ csrf_field() }} {{ method_field('DELETE') }}
                          <button href="#" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> &nbsp; Delete</button></form></td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Articles</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection
