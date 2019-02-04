<section id="about-us" class="about-us padd-section wow fadeInUp">
  <div class="container">
    <div class="row">
    	@if(!empty($data->about) || !is_null($data->about))
    		{!! trans($data->about) !!}
    	@endif
    </div>
  </div>
</section>