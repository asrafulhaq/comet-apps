@extends('admin.layouts.app')

@section('main-section')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Portfolio Categories</h4>
                <a href="{{ route('admin.trash') }}" class="text-danger">Trash Categories <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0 data-table-haq">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach ($categories as $item)
                              <tr>
                                <td>{{ $loop -> index + 1 }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>{{ $item -> slug }}</td>
                                <td>{{ $item -> created_at -> diffforhumans() }}</td>
                                <td>
                                    @if($item -> status )
                                            <span class="badge badge-success">Published</span>
                                            <a class="text-danger" href="{{ route('admin.status.update', $item -> id ) }}"><i class="fa fa-times"></i></a>
                                    @else 
                                        <span class="badge badge-danger">unpublished</span>
                                        <a class="text-success" href="{{ route('admin.status.update', $item -> id ) }}"><i class="fa fa-check"></i></a>
                                    @endif    
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $item -> id ) }}"><i class="fa fa-edit"></i></a>
                                    
                                    <a href="{{ route('admin.trash.update', $item -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                </td>
                              </tr>
                          @endforeach                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        @if( $form_type == 'create')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new category</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('portfolio-category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>name</label>
                        <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                    </div>
                

                    
                
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif





    </div>
</div>




@endsection 