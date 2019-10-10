@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
		<!--about-us start -->
		<section id="home" class="about-us">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
									<h2 class="animated fadeInUp" style="opacity: 0;">
										Explore the Beauty of the Beautiful World

									</h2>
									<div class="about-btn">
										<button class="about-view animated fadeInDown" style="opacity: 0;">
											explore now
										</button>
									</div><!--/.about-btn-->
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
							<div class="single-about-us">
								
							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->

		</section><!--/.about-us-->
       		<!--travel-box start-->
               <section class="travel-box">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="single-travel-boxes">
        					<div id="desc-tabs" class="desc-tabs">

								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active">
									 	<a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">
									 		<i class="fa fa-plane"></i>
									 		flights
									 	</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
								<form action="{{url('flight-search')}}" method="post">
								{!! csrf_field() !!}
									<div role="tabpanel" class="tab-pane active fade in" id="tours">
                                            <div class="tab-para">
											<div class="trip-circle">
												<div class="single-trip-circle">
													<input type="radio" id="radio01" value="round" class="flight-type" name="flight_type" checked>
  													<label for="radio01">
  														<span class="round-boarder">
  															<span class="round-boarder1"></span>
  														</span>round trip
  													</label>
												</div><!--/.single-trip-circle-->
												<div class="single-trip-circle">
													<input type="radio" id="radio02" value="oneway" class="flight-type" name="flight_type">
  													<label for="radio02">
  														<span class="round-boarder">
  															<span class="round-boarder1"></span>
  														</span>on way
  													</label>
												</div><!--/.single-trip-circle-->
											</div><!--/.trip-circle-->
											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="single-tab-select-box">

														<h2>from</h2>

														<div class="travel-select-icon">
															<select class="form-control js-example-basic-single" required name="from">
															  	<option value="default" selected="selected">enter your location</option><!-- /.option-->
																
																		<option value=""></option>
																	
															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-3 col-sm-4" id="departure">
													<div class="single-tab-select-box">
														<h2>departure</h2>
														<div class="travel-check-icon">
																<input type="text" name="departure" required class="form-control" data-toggle="datepicker" placeholder="{{date('Y-m-d')}}" value="">
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-3 col-sm-4" id="return">
													<div class="single-tab-select-box">
														<h2>return</h2>
														<div class="travel-check-icon">
																<input type="text"  name="return" required class="form-control return" data-toggle="datepicker" placeholder="{{date('Y-m-d')}}" value="">
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-1 col-sm-4">
													<div class="single-tab-select-box">
														<h2>adults</h2>
														<div class="travel-select-icon">
															<input type="number" min=1 class="form-control" name="adults">
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-1 col-sm-4">
													<div class="single-tab-select-box">
														<h2>childs</h2>
														<div class="travel-select-icon">
															<select class="form-control js-example-basic-single">

															  	<option value="default" selected="selected">1</option><!-- /.option-->

															  	<option value="2">2</option><!-- /.option-->

															  	<option value="4">4</option><!-- /.option-->
															  	<option value="8">8</option><!-- /.option-->

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

											</div><!--/.row-->

											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="single-tab-select-box">

														<h2>to</h2>

														<div class="travel-select-icon">
															<select class="form-control js-example-basic-single" name="to" required>
															  	<option value="default" selected="selected">enter your destination location</option><!-- /.option-->
																		<option value=""></option>
															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->

													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->
												<div class="clo-sm-5">
													<div class="about-btn pull-right">
														<button class="about-view travel-btn">
															search	
														</button><!--/.travel-btn-->
													</div><!--/.about-btn-->
												</div><!--/.col-->
												
											</div><!--/.row-->

										</div>

									</div><!--/.tabpannel-->
									</form><!--- search form--->
								</div><!--/.tab content-->
							</div><!--/.desc-tabs-->
        				</div><!--/.single-travel-box-->
        			</div><!--/.col-->
        		</div><!--/.row-->
        	</div><!--/.container-->

        </section><!--/.travel-box-->
		<!--travel-box end-->
                
                @foreach($flights as $flight)
                @foreach($flight['segments'] as $segment)
                
                <section>
                    <div class="container">
                        <div class="row">
                <div class="fli-list-body-section" style="border-bottom: 1px solid rgb(216, 234, 255);">
                    <div class="dept-options" style="margin: 0px 130px;">
                        <div class="dept-options-section clearfix">
                            <div class="col-md-2">
                                <div class="pull-left airline-info">
                                    <div class="pull-left">
                                        <span class=" ">
                                            <span class="arln-logo logo1" style="background-image: url(&quot;https://imgak.mmtcdn.com/flights/assets/media/dt/common/icons/AI.png?v=4&quot;);"></span>

                                        </span>
                                    </div>
                                    <div class="pull-left airways-info-sect">
                                        <p><span class="airways-name ">{{$carriers[$segment['flightSegment']['carrierCode']]}}</span></p>
                                        <p class="fli-code">{{$segment['flightSegment']['aircraft']['code']}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                            <div class="pull-left">
                                <div class="">
                                    <div class="make_relative">
                                        <div class="timing-option ">
                                            <label for="jrnya96a9365-3208-48bd-8829-dbcd418d8c2e_DEL$BLR$1110190610$AI-803" class="clearfix radio" style="cursor: default;">
                                                <span style="width: 18px; height: 18px; display: block; margin-right: 9px; margin-top: 4px; float: left;">&nbsp;</span>
                                                <div class="fli-time-section pull-left departure">
                                                    <div class="dept-time">{{\Carbon\Carbon::parse($segment['flightSegment']['departure']['at'])->format('h:i')}}</div>
                                                    <p class="dept-city">{{$segment['flightSegment']['departure']['iataCode']}}</p>
                                                </div>
                                                <div class="pull-left fli-stops make_relative">
                                                    <p class="fli-duration">
                                                        {{$segment['flightSegment']['duration']}}
                                                        <!--<strong>02</strong> hrs <strong>45</strong> mins--> 
                                                    </p>
                                                    <div class="make_relative fli-stops-sep">
                                                        <p class="fli-stops-seperator"></p>
                                                    </div>
                                                    <p class="fli-stops-desc">Non stop</p>
                                                </div>
                                                <div class="fli-time-section pull-left arrival">
                                                    <div class="text-left pull-left wdh_full">
                                                        <p class="reaching-time append_bottom3">{{\Carbon\Carbon::parse($segment['flightSegment']['arrival']['at'])->format('h:i')}}
                                                            <span class="plusDay-info make_relative">
                                                                <span class="fli-trvlDays LatoBold"></span>
                                                                    
                                                            </span>
                                                        </p>
                                                        <p class="arrival-city">{{$segment['flightSegment']['arrival']['iataCode']}}</p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-1">
                            <div class="pull-left  make_relative price">
                                <p><span class="actual-price">$ {{$flight['price']['total']}}</span></p>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="pull-left make_relative">
                                <button id="bookbutton-RKEY:b1c80e9e-1602-409d-9539-2bf9ce1e8e54:0" class="fli_primary_btn text-uppercase ">Book Now</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                                </div>
                        </div>
                                </section>
                @endforeach
                @endforeach
                            


<?php 
//print_r($carriers['UA']);
//dump($flights);
//dump($currencies);
//dump($aircraft);
//dump($locations);
?>

@endsection