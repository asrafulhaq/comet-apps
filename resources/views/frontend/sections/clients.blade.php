<section>
  <div class="container">
    <div class="title center">
      <h4 class="upper">Some of the best.</h4>
      <h3>Our Clients<span class="red-dot"></span></h3>
      <hr>
    </div>
    <div class="section-content">
      <div class="boxes clients">
        <div class="row">

          @php 
            $clients = App\Models\Client::where('status', true) -> where('trash' , false) -> take(6) -> latest() -> get();
            $i = 1;
          @endphp 

          @foreach ($clients as $item)

            @php 

            if($i == 1 ) {
              $className = 'border-right border-bottom';
              $delay = 0;
            }else if($i == 2 ){
              $className = 'border-right border-bottom';
              $delay = 500;
            }else if($i == 3 ){
              $className = 'border-bottom';
              $delay = 1000;
            }else if($i == 4 ){
              $className = 'border-right';
              $delay = 0;
            }else if($i == 5 ){
              $className = 'border-right';
              $delay = 500;
            }else if($i == 6 ){
              $className = '';
              $delay = 1000;
            }

            @endphp 
            

            <div class="col-sm-4 col-xs-6 {{ $className }}">
              <img src="{{ url('storage/clients/'. $item -> logo ) }}" alt="" data-animated="true" class="client-image" data-delay="{{ $delay }}">
            </div>  
            @php $i++; @endphp             
          @endforeach

        </div>
        <!-- end of row-->
      </div>
    </div>
    <!-- end of section content-->
  </div>
</section>