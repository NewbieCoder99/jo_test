<section id="get-service" class="get-service padd-section wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
    	@if(!empty($data->services) || !is_null($data->services))
    		{!! trans($data->services) !!}
    	@endif
    </div>
  </div>
</section>