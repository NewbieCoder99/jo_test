<section id="get-contact" class="get-service padd-section wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
    	@if(!empty($data->contact) || !is_null($data->contact))
    		{!! trans($data->contact) !!}
    	@endif
    </div>
  </div>
</section>