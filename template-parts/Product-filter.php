<form id="pokeSearch">
					<div id="effect-line" style="background-image: url(<?= set_image("effect-line") ?>)"></div>
					<div id='mobile-btn-colse'>close</div>
					<!-- <input name="price_max" placeholder="price_max" type="text"/> -->
					
					 <div class="input_wrapper">
					 	<label for="price_max_filter">Choose maximum Price 💰:</label>
  						<input type="range" id="price_max_filter" class="range_filter" value="200" name="price_max" min="0" max="200">	
						<span class="display_filter_amount">200</span><span> $</span>
					 </div>

					<!-- <input name="price_min" placeholder="price_min" type="text"/> -->
					
					 <div class="input_wrapper">
					 	<label for="price_min_filter">Choose minimum Price 💰:</label>	
						<input type="range" id="price_min_filter" class="range_filter" value="0"  name="price_min" min="0" max="200">	
						<span class="display_filter_amount">0</span><span> $</span>
					 </div>




					
					<!-- <input name="level_max" placeholder="level_max" type="text"/> -->
					
					 <div class="input_wrapper">	
						<label for="level_max_filter">Choose maximum Level 🆙:</label>
						<input type="range" id="level_max_filter" class="range_filter"  value="100" name="level_max" min="0" max="50">	
						<span class="display_filter_amount">50</span><span> LEVEL</span>
					 </div>
					
					
					
					
					
					
					 <!-- <input name="level_min" placeholder="level_min" type="text"/> -->
					 
					 <div class="input_wrapper">	
					 	<label for="level_min_filter">Choose minimum Level 🆙:</label>
						<input type="range" id="level_min_filter" class="range_filter" value="0"  name="level_min" min="0" max="50">	
						<span class="display_filter_amount">0</span><span> LEVEL</span>
					 </div>
					
					
					
					
					
					<!-- <input name="stardust_max" placeholder="stardust_max" type="text"/> -->
					
					 <div class="input_wrapper">	
					 	<label for="stardust_max_filter">Choose maximum stardust &#128293:</label>
						<input type="range" id="stardust_max_filter" value="10000000" class="range_filter"  name="stardust_max" min="0" max="10000000">	
						<span class="display_filter_amount">10000000</span><span> STARTDUST</span>
					 </div>
					
					
					
					
					<!-- <input name="stardust_min" placeholder="stardust_min" type="text"/> -->
					
					 <div class="input_wrapper">	
						<label for="stardust_min_filter">Choose minimum stardust &#128293:</label>
						<input type="range" id="stardust_min_filter" value="0" class="range_filter"  name="stardust_min" min="0" max="999999">	
						<span class="display_filter_amount">0</span><span> STARTDUST</span>
					 </div>
					 
					  
					<div class="input_wrapper">
						<label for="pokemon_shiny">Shiny ?:</label>
							<select name="pokemon_shiny">
								<option value="Any">Any</option>
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
					</div> 
					

					<label class="label_advanced_search" for="advanced_search_checkbox" >Advanced search</label>
					<input id="advanced_search_checkbox" type="checkbox" onclick="activate_advanced_search()">
					<div id="advanced-search" class="hide-advanced-search">
						<input type="hidden" id="advanced_search_stats" name="advanced_search_stats" value="false">
						<!-- <input name="pokemon_name" placeholder="pokemon_name" type="text"/> -->
						
						<div class="input_wrapper autocomplete">	
							<label for="pokemon_name_filter">Choose pokemon name &#128293:</label>
							<input name="pokemon_name" id="pokemon_name_filter" placeholder="Pokemon name" type="text"/>
						</div>


						<!--  -->
						
						<div class="input_wrapper">	
							<label for="pokemon_cp_filter">Choose pokemon cp &#128293:</label>
							<input name="pokemon_cp" id="pokemon_cp_filter" placeholder="Pokemon cp" type="number" min="0"/>
							<!-- <input type="range" id="pokemon_cp_filter" class="range_filter"  name="pokemon_cp" min="0" max="5000">	
							<span class="display_filter_amount">2500</span><span> CP</span> -->
						</div>

						<!-- <input name="pokemon_attack_one" placeholder="pokemon_attack_one" type="text"/> -->
						
						<div class="input_wrapper">	
							<label for="pokemon_attack_one_filter">Choose pokemon attack one &#128293:</label>
							<input name="pokemon_attack_one" id="pokemon_attack_one_filter" placeholder="Pokemon attack one" type="text"/>
						</div>


						<!-- <input name="pokemon_attack_two" placeholder="pokemon_attack_two" type="text"/> -->
						
						<div class="input_wrapper">
							<label for="pokemon_attack_two_filter">Choose pokemon attack two &#128293:</label>	
							<input name="pokemon_attack_two" id="pokemon_attack_two_filter" placeholder="Pokemon attack two" type="text"/>
						</div>

					 </div>
					<input type="submit" value="Filter" />
</form>