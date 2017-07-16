@extends('layouts.admin')

@section('title', 'Categories | Dashboard Administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Write a Post <small></small>
          </h1>
          
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @if (count($errors) > 0)
            <div class="box-header">
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            </div>
          @endif
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <form action="{{ route('posts.update', $data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="col-md-9">
              <div class="box">
                <div class="box-header">
                  <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" name="title" id="input" class="form-control" placeholder="Title post" value="{{ old('title', $data->title) }}" required="required" maxlength="50">
                      </div>
                    </div>
                </div><!-- /.box-header -->
              </div>
                
              <div class="box">
                    <div class="box-body">
                      <textarea name="content" id="summernote" class="form-control" rows="20" required="required">{{ $data->content }}</textarea>
                    </div>
              </div>
            </div><!-- ./col -->

            <div class="col-md-3">
              <div class="box">
                <div class="box-header">
                  <div class="form-group">
                    <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Thumbnail</label>
                    <img src="{{ asset('/dist/'.$data->thumbnail) }}" class="col-xs-12" alt="">
                    </div>
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-info btn-flat btn-xs col-sm-12" data-toggle="modal" data-target="#thumbnailForm">Replace Thumbnail</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <select name="category" id="inputCategory" class="form-control" required="required">
                        <option value="">Choose a Category</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}" @if ($data->category_id === $category->id)
                            {{ 'selected' }}
                          @endif>{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success btn-flat">Save and Post</button>
                  <a href="{{ route('posts.index') }}" class="btn btn-default btn-flat">Cancel</a>
                </div>
              </div>
            </div>
                </form>
          </div><!-- /.row -->

          <div class="modal modal-success fade" id="thumbnailForm">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Replace Thumbnail</h4>
                  </div>

                  <form action="{{ url('admindashboard/posts/replace_thumbnail', $data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="modal-body">
                        <div class="form-group">
                          <div class="col-sm-9">
                            <input type="file" name="thumbnail" required="required">
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline">Save Thumbnail</button>
                  </div>
                  </form>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection
