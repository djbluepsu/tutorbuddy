@extends('templates.default')
@section('content')
		

		<body>
			<form class="form-inline" role="form" method="post" action="{{ route('tutor.register') }}">
				<div class="jumbotron">
					<h1 class= "align-center">Tutoring Registration Form</h1>
				</div>

				<div class="form-group" class="m-x-auto">
					<legend>Select your available times</legend>
					<div>

						
						<span>By Day:</span>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="timeday1" multiple="multiple" data-toggle="dropdown"> Select your available days!
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="monday_after" value="1"> Monday 3:15-4:15</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="tuesday_after" id= "tuesday_after" value="1"> Tuesday 3:15-4:15</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="wednesday_after" id= "wednesday_after" value="1"> Wednesday 3:15-4:15</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="thursday_after" value="1"> Thursday 3:15-4:15</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="friday_after" value="1"> Friday 3:15-4:15</label></a></li>
								</ul>
						</div>
						<span>By Free Period:</span>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="timeday1" multiple="multiple" data-toggle="dropdown"> Select your available free periods!
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_a1" value="1"> A1 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_a2" value="1"> A2 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_a3" value="1"> A3 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_a4" value="1"> A4 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_b1" value="1"> B1 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_b2" value="1"> B2 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_b3" value="1"> B3 Free</label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="free_b4" value="1"> B4 Free</label></a></li>
								</ul>


	
               







							<script type="text/javascript">
							$(document).ready(function() {
								$('#timeday1').bootstrap-multiselect(
								{
									buttonClass: 'btn btn-link'
									buttonContainer: '<div class="btn-group" />'
									includeSelectAllOption: true
									nonSelectedText: "Check All that Apply!"
									buttonText: function(options, select) {
						                if (options.length === 0) {
						                    return 'No option selected ...';
						                }
						                else if (options.length > 3) {
						                    return 'More than 3 options selected!';
						                }
						                 else {
						                     var labels = [];
						                     options.each(function() {
						                         if ($(this).attr('label') !== undefined) {
						                             labels.push($(this).attr('label'));
						                         }
						                         else {
						                             labels.push($(this).html());
						                         }
						                     });
						                     return labels.join(', ') + '';
						                 }
									/*
									buttonText: function(options, select) {
										if (options.length === 0) {
											return nonSelectedText;
										}
										else if (options.length === 2) {
											return "Great! You're available at both times!"
										}
										else {
											var labels = [];
											options.each(function() {
												if ($(this).attr('label') !== undefined) {
													labels.push($(this).attr('label'));
												}
												else {
													labels.push($(this).html());
												}
											});
											return labels.join(', ') + '';
										}
									}
									*/
								});
							});
							</script>
						</div>
						<!--
						<select class="c-select" id="timeday1" multiple="multiple">
							<option selected>Select one of the following: </option>
							<option value="free">Free Block</option>
							<option value="afterschool">Afterschool (3:00-4:30)</option>
						</select>
					-->
						<script type="text/javascript">
							$(document).ready(function() {
								$('#timeday1').bootstrap-multiselect(
								{
									buttonClass: 'btn btn-link'
									buttonContainer: '<div class="btn-group" />'
								}
									);
							});
						</script>
					</div>
					<br>
					<label for="numsessions" class="control-label">How many sessions can you tutor in one week?</label>
                <input type="number" name="num_slots" class="form-control" id="num_slots" value="0" min='1' step= "1">
					<div>
						<legend>Select Subjects</legend>	
						<span>Select the Courses You Are Able to Teach:</span>
						<br>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="subjects" multiple="multiple" data-toggle="dropdown"> Math
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li class="divider"></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="alg1_a" value="1"> Algebra I A </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="alg1_b" value="1"> Algebra I B </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="alg1" value="1"> Algebra I </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="geometry" value="1"> Geometry </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="alg2trig" value="1"> Algebra II/Trigonometry </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="accel_Math_1" value="1"> Accelerated Math I </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="accel_Math_2" value="1"> Accelerated Math II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="FST" value="1"> Functions, Statistics, and Trigonometry (FST) </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="precalc" value="1"> Pre-Calculus </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="discrete_math" value="1"> Discrete Mathematics </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_stats" value="1"> AP Statistics </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_calc_AB" value="1"> AP Calculus AB </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_calc_BC" value="1"> AP Calculus BC and Multivariable Calculus </label></a></li>
								</ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="subjects" multiple="multiple" data-toggle="dropdown"> Science
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li class="divider"></li>
									<li class="dropdown-header"> Life Sciences Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_Bio" value="1"> AP Biology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="APES" value="1"> AP Environmental Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="biology" value="1"> Biology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="mo_bio" value="1"> Molecular Biology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="biotech" value="1"> Biotechnology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="env_sci" value="1"> Environmental Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="forensic_sci" value="1"> Forensic Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="marine_bio" value="1"> Marine Biology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="anatomy" value="1"> Anatomy and Physiology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="zoology" value="1"> Zoology </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Physics Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_physics_1" value="1"> AP Physics 1 </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_physics_2" value="1"> AP Physics 2 </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_physics_c" value="1"> AP Physics C </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="physics" value="1"> Physics </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Chemistry Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_chem" value="1"> AP Chemistry </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="xl_chem" value="1"> Accelerated Chemistry </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chem" value="1"> Chemistry </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Other Science Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="earth_sci" value="1"> Earth Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="physical_sci" value="1"> Physical Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="eng_sci" value="1"> Engineering Science </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="a_goode_class" value="1"> AP Computer Science </label></a></li>

								</ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="subjects" multiple="multiple" data-toggle="dropdown"> Arts
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li class="divider"></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_studio_art_drawing" value="1"> AP Studio Art Drawing </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_studio_art_2D" value="1"> AP Studio Art 2D </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_studio_art_3D" value="1"> AP Studio Art 3D </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_art_history" value="1"> AP Art History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_music_theory" value="1"> AP Music Theory </label></a></li>
								</ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="History" multiple="multiple" data-toggle="dropdown"> Social Studies
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li class="divider"></li>
									<li class="dropdown-header"> History Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="whistory" value="1"> World History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="ushistory" value="1"> US History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apush" value="1"> AP US History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apeuro" value="1"> AP European History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apworld" value="1"> AP World History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="aphumangeo" value="1"> AP Human Geography </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apusgov" value="1"> AP U.S. Government and Politics </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apcompgov" value="1"> AP Comparative Government and Politics </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Economics Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="econ" value="1"> Economics </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="apecon" value="1"> AP Economics </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Psychology Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="psych" value="1"> Psychology </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="appsych" value="1"> AP Psychology </label></a></li>
								</ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="subjects" multiple="multiple" data-toggle="dropdown"> World Languages
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li class="divider"></li>
									<li class="dropdown-header"> AP and AT Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_chinese" value="1"> AP Chinese Language and Culture </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_french" value="1"> AP French Language and Culture </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_spanish" value="1"> AP Spanish Language and Culture </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AT_chinese_history" value="1"> AT Chinese Language: History </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_nn" value="1"> Chinese Near Native I </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="AP_chinese_nn" value="1"> Chinese AP-Near Native II </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Chinese Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_nov" value="1"> Chinese Novice </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_i_1" value="1"> Chinese Intermediate </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_i_2" value="1"> Chinese Intermediate II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_i_3" value="1"> Chinese Intermediate III </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_ih_1" value="1"> Chinese Intermediate High </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_ih_2" value="1"> Chinese Intermediate High II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="chinese_ih_3" value="1"> Chinese Intermediate High III </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> French Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_nov" value="1"> French Novice </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_i_1" value="1"> French Intermediate </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_i_2" value="1"> French Intermediate II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_i_3" value="1"> French Intermediate III </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_ih_1" value="1"> French Intermediate High </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_ih_2" value="1"> French Intermediate High II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_ih_3" value="1"> French Intermediate High III </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="french_adv" value="1"> French Advanced </label></a></li>
									<li class="divider"></li>
									<li class="dropdown-header"> Spanish Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_nov" value="1"> Spanish Novice </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_i_1" value="1"> Spanish Intermediate </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_i_2" value="1"> Spanish Intermediate II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_i_3" value="1"> Spanish Intermediate III </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_ih_1" value="1"> Spanish Intermediate High </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_ih_2" value="1"> Spanish Intermediate High II </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_ih_3" value="1"> Spanish Intermediate High III </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="spanish_adv" value="1"> Spanish Advanced </label></a></li>
									<li class="dropdown-header"> Japanese Options </li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="japanese_4" value="1"> Japanese IV </label></a></li>
									
								</ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default" id="subjects" multiple="multiple" data-toggle="dropdown"> English
								<span class="caret"></span>
							</button>
								<ul class="multiselect-container dropdown-menu">
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="eng9" value="1"> English 9 </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="wstudies" value="1"> World Studies </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="eng10" value="1"> English 10 </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="amstudies" value="1"> American Studies </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="aplang" value="1"> AP English Language and Composition
									 </label></a></li>
									<li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="aplit" value="1"> AP English Literature and Composition
									 </label></a></li>
								</ul>
						</div>
				</div>

				<!-- Old Code
				<div class="form-group">
					<legend>Desired Dates</legend>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Monday </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Tuesday </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Wednesday </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Thursday </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value="" disabled> Friday </label>
					</div>
				</div>
				-->
				<!--
				<br>
				<br>
				<div class="form-group">
					<legend>Desired Times</legend>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Free Block </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value=""> Lunch </label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value=""> 3:15-4:15 (Afterschool) </label>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<legend>Subjects</legend>
					<div class="checkbox">
						<button type="button" class="btn btn-primary"> Math </button>
						<button type="button" class="btn btn-warning"> Science </button>
						<button type="button" class="btn btn-danger"> Social Studies </button>
						<button type="button" class="btn btn-success"> Language </button>
					</div>
				</div>
			-->
			<br>
			<div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type='hidden' name= '_token' value= '{{Session::token()}}'>
			</form>
						
		</body>

  
@stop