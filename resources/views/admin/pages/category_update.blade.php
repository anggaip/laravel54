@extends('layouts.admin')

@section('title', 'Categories | Dashboard Administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Categories
            <small>Article Categories</small>
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

              <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <div class="form-group">
                    <legend>Category Update</legend>
                  </div>
              
                  <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Category Name:</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" id="input" class="form-control" value="{{ $category->category_name }}" required="required" maxlength="50">
                    </div>
                  </div>
              
                  <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                      <a href="{{ route('categories.index') }}" class="btn btn-default btn-flat">Cancel</a> &nbsp;
                      <button type="submit" class="btn btn-success btn-flat">Save Change</button>
                    </div>
                  </div>
              </form>

            </div><!-- ./col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection
