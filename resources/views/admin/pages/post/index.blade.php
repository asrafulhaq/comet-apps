@extends('admin.layouts.app')

@section('main-section')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Posts</h4>
                <a href="{{ route('admin.trash') }}" class="text-danger">Trash posts <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0 data-table-haq">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach ($posts as $item)
                              <tr>
                                <td>{{ $loop -> index + 1 }}</td>
                                <td>{{ $item -> title }}</td>
                                <td>
                                    <ul>
                                        @foreach( $item -> category as $cat )
                                        <li>{{ $cat -> name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                
                                <td>
                                    @php 
                                        $featured = json_decode($item -> featured);
                                        echo $featured -> post_type;
                                    @endphp
                                </td>
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
                <h4 class="card-title">Add new Post</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" type="text" value="{{ old('title') }}" class="form-control">
                    </div> 

                    <div class="form-group">
                        <label>Post Type</label>
                        <hr>
                        <select class="form-control" name="type" id="post-type-selector">
                            <option value="Standard">Standard</option>
                            <option value="Gallery">Gallery</option> 
                            <option value="Video">Video</option>
                            <option value="Audio">Audio</option>
                            <option value="Quote">Quote</option>
                        </select>
                        
                    </div> 

                    <div class="form-group post-standard">
                        <label>Featured Photo</label>
                        <br>
                        <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
                        <br>
                        <input style="display:none;" name="standard" type="file" class="form-control" id="slider-photo">
                        <label for="slider-photo">
                            <img style="width:100px; cursor:pointer;" src="https://icon-library.com/images/image-icon/image-icon-2.jpg" alt="">
                        </label>
                    </div>
                    <hr>

                    <div class="form-group post-gallery">
                        <label>Gallery Photos</label>
                        <br>
                        <div class="port-gall">

                        </div>
                        <input style="display:none;" name="gallery[]" multiple type="file" class="form-control" id="portfolio-gallery">
                        <label for="portfolio-gallery">
                            <img style="width:100px; cursor:pointer;" src="https://icon-library.com/images/image-icon/image-icon-2.jpg" alt="">
                        </label>
                    </div>

                    <div class="form-group post-video">
                        <label>video Post</label>
                        <input name="video" type="text" value="{{ old('video') }}" class="form-control">
                    </div> 

                    <div class="form-group post-audio">
                        <label>Audio Post</label>
                        <input name="audio" type="text" value="{{ old('audio') }}" class="form-control">
                    </div> 

                    <div class="form-group post-quote">
                        <label>Quote</label>
                        <textarea class="form-control" name="quote" id="" cols="30" rows="4"></textarea>
                    </div>
                    

                    <div class="form-group">
                        <label>Post Content</label>                        
                        <textarea name="content" id="portfolio-desc"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Categories</label>                        
                        <ul class="comet-list">
                            @foreach ($cats as $cat)
                                <li> 
                                    <label><input name="cat[]" value="{{ $cat -> id }}" type="checkbox"> {{ $cat -> name }}</label> 
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <select class="form-control comet-select-2" name="tag[]" id="" multiple>
                            @foreach( $tags as $tag )
                            <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
                            @endforeach
                        </select>
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