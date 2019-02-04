<section id="get-team" class="get-service padd-section wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
    	@if(!empty($data->our_team) || !is_null($data->our_team))
    		{!! trans($data->our_team) !!}
    	@endif
    </div>
  </div>
</section>