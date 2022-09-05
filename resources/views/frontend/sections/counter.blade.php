<section>
    <div class="container">
      <div class="row">

        @php 
            $counter = App\Models\Counter::latest() -> take(4) -> get();
        @endphp 
        @foreach($counter as $count)
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="{{ $count -> icon }}"></i>
            </div>
            <div class="counter-content">
              <h5><span data-count="{{ $count -> count }}" class="number-count">{{ $count -> count }}</span><span class="red-dot"></span></h5><span>{{ $count -> title }}</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
        @endforeach



      </div>
    </div>
  </section>