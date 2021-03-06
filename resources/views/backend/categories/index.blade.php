@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Category Management</h3>

            <div class="box-tools pull-right">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-info btn-xs">Create Category</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Icon Image</th>
                            <th>Parent ID</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorie_list as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td><img src='{{url("images/90x60/categories/" . $category->icon_image)}}' /></td>
                            <td>{{$category->parent_id}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info btn-xs">Edit</a>
                                <!-- <a href="#" class="btn btn-danger btn-xs">Delete</a> -->
                                {!! Form::open(["route"=>["admin.categories.destroy", $category->id], "method"=>"delete"]) !!}
                                    <button class="btn btn-danger btn-xs" >Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
{{$categorie_list->links()}}
    
@stop

@section('after-scripts')
    
@stop