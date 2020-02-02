@extends('layouts.backend.app')
@section('title','Tag Create')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit Tag</h2>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                         Edit Tag
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                            <form action="{{ route('admin.tag.update', $tag->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tag_name" name="tag_name" value="{{ $tag->name }}" class="form-control">
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <a href="{{ route('admin.tag.index') }}" class="btn btn-danger m-t-15 waves-effect"> Back Tag</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit Tag</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>
</section>
@endsection

