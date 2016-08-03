@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Files</div>
                    <div class="panel-body container-fluid">

                        @include('common.errors')

                        <form action="{{ url('store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                    <!-- Task Name -->
                            <div class="form-group">
                                <label for="file-name" class="col-sm-4 control-label">File Name</label>

                                <div class="col-md-4 col-sm-6">
                                    <input type="text" name="name" id="file-name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file-description" class="col-sm-4 control-label">Description (optional)</label>

                                <div class="col-md-4 col-sm-6">
                                    <textarea rows="4" cols="50" name="description" id="file-description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file-file" class="col-sm-4 control-label">File</label>

                                <div class="col-md-4 col-sm-6">
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>
                            </div>


                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-md-offset-6 col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus"></i> Add File
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TODO: Current Tasks -->
@endsection
