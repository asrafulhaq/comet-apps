@extends('frontend.layouts.app')

@section('frontend-main')

<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="{{ url('frontend/images/bg/11.jpg') }}" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Our Blog<span class="red-dot"></span></h1>
              <h4>Let’s get in touch.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">


            @foreach( $posts as $post )
            <article class="post-single">
              <div class="post-info">
                <h2><a href="#">{{ $post -> title }}</a></h2>
                <h6 class="upper"><span>By</span><a href="#"> {{ $post -> author -> name }}</a><span class="dot"></span><span>{{ date('F d, Y', strtotime($post -> created_at)) }}</span><span class="dot"></span>

                    @foreach($post -> tag as $tag) 
                                         
                        <a href="" class="post-tag">{{ $tag -> name }}</a> @if(( $loop -> index + 1) < count($post -> tag)  ) - @endif

                    @endforeach

                
                
                </h6>
              </div>

                @php 
                    $featured = json_decode($post -> featured);
                @endphp 

                @if( $featured -> post_type == 'Gallery' )
                {{-- For gallery post  --}}
                <div class="post-media">
                    <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                    <ul class="slides">

                        @foreach( json_decode($featured -> gallery) as $gall )
                        <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                            <img src="{{ url('storage/posts/' . $gall ) }}" alt="">
                        </li>
                        @endforeach

                    </ul>
                    </div>
                </div>
                @endif
              
                @if( $featured -> post_type == 'Video' )
                {{-- For video post  --}}
                <div class="post-media">
                    <div class="media-video">
                    <iframe src="https://www.youtube.com/embed/rrT6v5sOwJg" frameborder="0"></iframe>
                    </div>
                </div>
                @endif

                @if( $featured -> post_type == 'Standard' )
                {{-- Standard post  --}}
                <div class="post-media">
                    <a href="#">
                    <img src="{{ url('storage/posts/' . $featured -> standard ) }}" alt="">
                    </a>
                </div>
                @endif 

                @if( $featured -> post_type == 'Audio' )
                {{-- Audio Post  --}}
                <div class="post-media">
                    <div class="media-audio">
                    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51057943&amp;amp;color=ff5500&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false" frameborder="0"></iframe>
                    </div>
                </div>
                @endif


              <div class="post-body">
                
                {!! Str::of(htmlspecialchars_decode($post -> content)) -> words(30, '......') !!} 

                <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                </p>
              </div>
            </article>
            @endforeach




            <!-- end of article-->
          </div>


          <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
            </li>
          </ul>


          <!-- end of pagination-->
        </div>


        @include('frontend.layouts.blog-sidebar')



      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>










        
@endsection 