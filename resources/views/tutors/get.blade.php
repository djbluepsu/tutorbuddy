@extends('templates.default')
@section('content')
<body>
			<form class="form-inline" role="search" action="{{ route('tutor.find') }}">
				<div class="jumbotron">
					<h1 class= "align-center">Tutoring Request Form</h1>
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
						</div>
								<span> Select a class:</span>

						<select class="c-select" name="class_select">
							<option selected disabled hidden>Select one of the following classes: </option>
							<option value="alg1_a"> Algebra I A </option>
							<option value="alg1_b"> Algebra I B </option>
							<option value="alg1"> Algebra I </option>
							<option value="geometry"> Geometry </option>
							<option value="alg2trig"> Algebra II/Trigonometry </option>
							<option value="accel_Math_1"> Accelerated Math I </option>
							<option value="accel_Math_2"> Accelerated Math II </option>
							<option value="FST"> Functions, Statistics, and Trigonometry (FST) </option>
							<option value="precalc"> Pre-Calculus </option>
							<option value="discrete_math"> Discrete Mathematics </option>
							<option value="AP_stats"> AP Statistics </option>
							<option value="AP_calc_AB"> AP Calculus AB </option>
							<option value="AP_bio"> AP Biology </option>
							<option value="APES"> AP Environmental Science </option>
							<option value="biology"> Biology </option>
							<option value="mo_bio"> Molecular Biology </option>
							<option value="biotech"> Biotechnology </option>
							<option value="env_sci"> Environmental Science </option>
							<option value="forensic_sci"> Forensic Science </option>
							<option value="marine_bio"> Marine Biology </option>
							<option value="anatomy"> Anatomy and Physiology </option>
							<option value="zoology"> Zoology </option>
							<option value="AP_physics_1" > AP Physics 1 </option>
							<option value="AP_physics_2" > AP Physics 2 </option>
							<option value="AP_physics_c" > AP Physics C </option>
							<option value="physics" > Physics </option>
							<option value="AP_chem" > AP Chemistry </option>
							<option value="xl_chem" > Accelerated Chemistry </option>
							<option value="chem" > Chemistry </option>
							<option value="earth_sci" > Earth Science </option>
							<option value="physical_sci" > Physical Science </option>
							<option value="eng_sci"> Engineering Science </option>
							<option value="a_goode_class"> AP Computer Science </option>
							<option value="AP_studio_art_drawing"> AP Studio Art Drawing </option>
							<option value="AP_studio_art_2D"> AP Studio Art 2D </option>
							<option value="AP_studio_art_3D"> AP Studio Art 3D </option>
							<option value="AP_art_history"> AP Art History </option>
							<option value="AP_music_theory" > AP Music Theory </option>
							<option value="whistory"> World History </option>
							<option value="ushistory"> US History </option>
							<option value="apush"> AP US History </option>
							<option value="apeuro"> AP European History </option>
							<option value="apworld"> AP World History </option>
							<option value="aphumangeo"> AP Human Geography </option>
							<option value="apusgov"> AP U.S. Government and Politics </option>
							<option value="apcompgov"> AP Comparative Government and Politics </option>
							<option value="econ"> Economics </option>
							<option value="apecon"> AP Economics </option>
							<option value="psych"> Psychology </option>
							<option value="appsych"> AP Psychology </option>
							<option value="AP_chinese"> AP Chinese Language and Culture </option>
							<option value="AP_french"> AP French Language and Culture </option>
							<option value="AP_spanish"> AP Spanish Language and Culture </option>
							<option value="AT_chinese_history"> AT Chinese Language: History </option>
							<option value="chinese_nn"> Chinese Near Native I </option>
							<option value="AP_chinese_nn"> Chinese AP-Near Native II </option>
							<option value="chinese_nov"> Chinese Novice </option>
							<option value="chinese_i_1"> Chinese Intermediate </option>
							<option value="chinese_i_2"> Chinese Intermediate II </option>
							<option value="chinese_i_3" > Chinese Intermediate III </option>
							<option value="chinese_ih_1" > Chinese Intermediate High </option>
							<option value="chinese_ih_2" > Chinese Intermediate High II </option>
							<option value="chinese_ih_3" > Chinese Intermediate High III </option>
							<option value="french_nov" > French Novice </option>
							<option value="french_i_1" > French Intermediate </option>
							<option value="french_i_2" > French Intermediate II </option>
							<option value="french_i_3" > French Intermediate III </option>
							<option value="french_ih_1" > French Intermediate High </option>
							<option value="french_ih_2" > French Intermediate High II </option>
							<option value="french_ih_3" > French Intermediate High III </option>
							<option value="french_adv" > French Advanced </option>
							<option value="spanish_nov" > Spanish Novice </option>
							<option value="spanish_i_1" > Spanish Intermediate </option>
							<option value="spanish_i_2" > Spanish Intermediate II </option>
							<option value="spanish_i_3" > Spanish Intermediate III </option>
							<option value="spanish_ih_1" > Spanish Intermediate High </option>
							<option value="spanish_ih_2" > Spanish Intermediate High II </option>
							<option value="spanish_ih_3" > Spanish Intermediate High III </option>
							<option value="spanish_adv" > Spanish Advanced </option>
							<option value="japanese_4" > Japanese IV </option>
							<option value="eng9" > English 9 </option>
							<option value="wstudies" > World Studies </option>
							<option value="eng10" > English 10 </option>
							<option value="amstudies" > American Studies </option>
							<option value="aplang" > AP English Language and Composition </option>
							<option value="aplit" > AP English Literature and Composition </option>
						</select>
					
			<div class="form-group">
                <button type="submit" class="btn btn-primary">Find Tutors!</button>
            </div>
            <input type='hidden' name= '_token' value= '{{Session::token()}}'>
			</form>
						
		</body>
@stop