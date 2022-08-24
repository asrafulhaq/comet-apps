@extends('admin.layouts.app')

@section('main-section')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Clients</h4>
                <a href="{{ route('admin.trash') }}" class="text-danger">Trash users <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0 data-table-haq">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>client</th>
                                <th>Logo</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $item)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td><img style="width: 60px ; height:60px; object-fit:cover; " src="{{ url( 'storage/clients/' . $item -> logo) }}" alt=""></td>
                                    <td>{{ $item -> created_at -> diffForHumans() }}</td>
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
                            @empty
                                
                            @endforelse

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
                <h4 class="card-title">Add new Testimonial</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Client name</label>
                        <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Logo</label>
                        <br>
                        <br>
                        <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
                        <br>
                        <br>
                        <input style="display:none;" name="logo" type="file" class="form-control" id="slider-photo">
                        <label for="slider-photo">
                            <img style="width:100px; cursor:pointer;" src="https://icon-library.com/images/image-icon/image-icon-2.jpg" alt="">
                        </label>
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