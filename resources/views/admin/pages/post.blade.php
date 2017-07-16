@extends('layouts.admin')

@section('title', 'Categories | Dashboard Administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Posts
            <small><a href="{{ route('posts.create') }}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> &nbsp; Add a Post</a></small>
          </h1>
          
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
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th width="150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($posts as $post)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->category_name }}</td>
                        <td>{{ $post->user->username }}</td>
                        <td><form method="post" action="{{ route('posts.destroy', $post->id) }}"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-flat btn-sm"><i class="fa fa-pencil"></i> &nbsp; Update</a> | 
                          {{ csrf_field() }} {{ method_field('DELETE') }}
                          <button onClick="return confirm('Hapus pora?')" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> &nbsp; Delete</button></form></td>
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
