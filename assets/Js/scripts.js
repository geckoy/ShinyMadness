function main_scripts()
{
  (function($) {
  /* Test area */



  /* Global */
      /* Loading screen */
          $(document).ready(function(){
              $(".loaderscrn").addClass('hiddenvisibility');
              $('body').removeClass('bodycontroloverflowhidden');
          });

      // Mobile navbar
          $('.navbar-toggler').on('click', function(){
              $('#collapsibleNavbar').addClass('show');
              
              $('body').addClass('overflownone');
          });
          $('.closebtnmobile').on('click', function(){
              $('#collapsibleNavbar').removeClass('show');
              $('body').removeClass('overflownone');
          });
      /* Search form */
          $(".search-field").focus(function(){
              $(this).css("background-color", "yellow");
          });
          
      /* Shop Page */
      const wanted_path = /Product/i;
      if(wanted_path.test(window.location.pathname))
      {
        $(document).ready( function () {
          $('#Pokemons-table').DataTable({
            responsive: true
          });
          $('#pokemons_items_table').DataTable({
            responsive: true
          });
          $('#pokemons_candies_table').DataTable({
            responsive: true
          });
        }); 
      }
        var $display_item = $(".display_item"); 
        var $display_pokemon = $(".display_pokemon"); 
        $display_item.on("click",function()
        {
          $display_item_clicked = $(this);
          if(! $display_item_clicked.hasClass("pokemons_card_is_selected"))
          {
          $display_item_clicked.prev().removeClass("pokemons_card_is_selected");
          $display_item_clicked_parent = $display_item_clicked.parents(".card-body");
          $display_item_clicked_parent.find(".pokemons_wrapper").addClass("d-none");
          $display_item_clicked_parent.find(".items_wrapper").removeClass("d-none")
          $display_item_clicked.addClass('pokemons_card_is_selected');
          }
        });
        
        $display_pokemon.on("click",function()
        {
          $display_pokemon_clicked = $(this);
          if(! $display_pokemon_clicked.hasClass("pokemons_card_is_selected"))
          {
            $display_pokemon_clicked.next().removeClass("pokemons_card_is_selected");
            $display_pokemon_clicked_parent = $display_pokemon_clicked.parents(".card-body");
            $display_pokemon_clicked_parent.find(".items_wrapper").addClass("d-none");
            $display_pokemon_clicked_parent.find(".pokemons_wrapper").removeClass("d-none");
            $display_pokemon_clicked.addClass('pokemons_card_is_selected');
          }
        }); 

        /* OpenTip */

          Opentip.styles.pokemon_data = {
            extends:"alert",
            background:"#232526",
            borderWidth:0,
            showOn:"click",
          }
          
         
          
          

  })( jQuery );
}
main_scripts();
/* Advanced search activation */
    function activate_advanced_search() {
        var $advanced_search_checkbox = document.getElementById('advanced_search_checkbox');
        var $advanced_search_wrapper = document.getElementById('advanced-search');
        var $advanced_search_stats = document.getElementById('advanced_search_stats');
        if ($advanced_search_checkbox.checked == true){
            $advanced_search_wrapper.classList.remove("hide-advanced-search");
            $advanced_search_stats.value = "true";
        } else {
            $advanced_search_wrapper.classList.add("hide-advanced-search");
            $advanced_search_stats.value = "false";
        }  
    }
    
    function tester()
    {
      jQuery(document).ready(function(){
        var src = jQuery("#OpentipJs-js").attr("src");
        //jQuery("#OpentipJs-js").remove();
        jQuery("#OpentipJs-js").attr('src', '');
        //jQuery('<script>').attr('src', src).appendTo('head');
        jQuery('#OpentipJs-js').attr('src', src);
      });
    }
    function refresher()
    {
      main_scripts();
      add_to_cart_ajax();
      opentip_exec();
    }
    function setCookie(cname, cvalue, exminutes) 
    {
        var d = new Date();
        d.setTime(d.getTime() + (exminutes*60000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "mytarts" + cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) 
    {
        var name =  "mytarts" + cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
    }
      
    function deleteCookie(cname)
    {   
        if(getCookie(cname))
        {
            document.cookie = "mytarts" + cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        }
    }

    /* Auto complete function */

    function autocomplete(inp, arr) 
    {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          /*close all autocomplete lists in the document,
          except the one passed as an argument:*/
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }
    ////////////////////////////// collapsible function 
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("collapsible_active");
        var collapsible_content = this.nextElementSibling;
        if (collapsible_content.style.maxHeight){
          collapsible_content.style.maxHeight = null;
        } else {
          collapsible_content.style.maxHeight = collapsible_content.scrollHeight + "px";
        } 
      });
    }





    ////////////////////////////// init auto complete for POKES
    var pokemon_name = document.getElementById("pokemon_name_filter");
   
       
    

    let pokedex = ["Abomasnow",
        "AbomasnowMega Abomasnow",
        "Abra",
        "Absol",
        "AbsolMega Absol",
        "Accelgor",
        "AegislashBlade Forme",
        "AegislashShield Forme",
        "Aerodactyl",
        "AerodactylMega Aerodactyl",
        "Aggron",
        "AggronMega Aggron",
        "Aipom",
        "Alakazam",
        "AlakazamMega Alakazam",
        "Alomomola",
        "Altaria",
        "AltariaMega Altaria",
        "Amaura",
        "Ambipom",
        "Amoonguss",
        "Ampharos",
        "AmpharosMega Ampharos",
        "Anorith",
        "Arbok",
        "Arcanine",
        "Arceus",
        "Archen",
        "Archeops",
        "Ariados",
        "Armaldo",
        "Aromatisse",
        "Aron",
        "Articuno",
        "Audino",
        "AudinoMega Audino",
        "Aurorus",
        "Avalugg",
        "Axew",
        "Azelf",
        "Azumarill",
        "Azurill",
        "Bagon",
        "Baltoy",
        "Banette",
        "BanetteMega Banette",
        "Barbaracle",
        "Barboach",
        "Basculin",
        "Bastiodon",
        "Bayleef",
        "Beartic",
        "Beautifly",
        "Beedrill",
        "BeedrillMega Beedrill",
        "Beheeyem",
        "Beldum",
        "Bellossom",
        "Bellsprout",
        "Bergmite",
        "Bibarel",
        "Bidoof",
        "Binacle",
        "Bisharp",
        "Blastoise",
        "BlastoiseMega Blastoise",
        "Blaziken",
        "BlazikenMega Blaziken",
        "Blissey",
        "Blitzle",
        "Boldore",
        "Bonsly",
        "Bouffalant",
        "Braixen",
        "Braviary",
        "Breloom",
        "Bronzong",
        "Bronzor",
        "Budew",
        "Buizel",
        "Bulbasaur",
        "Buneary",
        "Bunnelby",
        "Burmy",
        "Butterfree",
        "Cacnea",
        "Cacturne",
        "Camerupt",
        "CameruptMega Camerupt",
        "Carbink",
        "Carnivine",
        "Carracosta",
        "Carvanha",
        "Cascoon",
        "Castform",
        "Caterpie",
        "Celebi",
        "Chandelure",
        "Chansey",
        "Charizard",
        "CharizardMega Charizard X",
        "CharizardMega Charizard Y",
        "Charmander",
        "Charmeleon",
        "Chatot",
        "Cherrim",
        "Cherubi",
        "Chesnaught",
        "Chespin",
        "Chikorita",
        "Chimchar",
        "Chimecho",
        "Chinchou",
        "Chingling",
        "Cinccino",
        "Clamperl",
        "Clauncher",
        "Clawitzer",
        "Claydol",
        "Clefable",
        "Clefairy",
        "Cleffa",
        "Cloyster",
        "Cobalion",
        "Cofagrigus",
        "Combee",
        "Combusken",
        "Conkeldurr",
        "Corphish",
        "Corsola",
        "Cottonee",
        "Cradily",
        "Cranidos",
        "Crawdaunt",
        "Cresselia",
        "Croagunk",
        "Crobat",
        "Croconaw",
        "Crustle",
        "Cryogonal",
        "Cubchoo",
        "Cubone",
        "Cyndaquil",
        "Darkrai",
        "DarmanitanStandard Mode",
        "DarmanitanZen Mode",
        "Darumaka",
        "Dedenne",
        "Deerling",
        "Deino",
        "Delcatty",
        "Delibird",
        "Delphox",
        "DeoxysAttack Forme",
        "DeoxysDefense Forme",
        "DeoxysNormal Forme",
        "DeoxysSpeed Forme",
        "Dewgong",
        "Dewott",
        "Dialga",
        "Diancie",
        "DiancieMega Diancie",
        "Diggersby",
        "Diglett",
        "Ditto",
        "Dodrio",
        "Doduo",
        "Donphan",
        "Doublade",
        "Dragalge",
        "Dragonair",
        "Dragonite",
        "Drapion",
        "Dratini",
        "Drifblim",
        "Drifloon",
        "Drilbur",
        "Drowzee",
        "Druddigon",
        "Ducklett",
        "Dugtrio",
        "Dunsparce",
        "Duosion",
        "Durant",
        "Dusclops",
        "Dusknoir",
        "Duskull",
        "Dustox",
        "Dwebble",
        "Eelektrik",
        "Eelektross",
        "Eevee",
        "Ekans",
        "Electabuzz",
        "Electivire",
        "Electrike",
        "Electrode",
        "Elekid",
        "Elgyem",
        "Emboar",
        "Emolga",
        "Empoleon",
        "Entei",
        "Escavalier",
        "Espeon",
        "Espurr",
        "Excadrill",
        "Exeggcute",
        "Exeggutor",
        "Exploud",
        "Farfetch'd",
        "Fearow",
        "Feebas",
        "Fennekin",
        "Feraligatr",
        "Ferroseed",
        "Ferrothorn",
        "Finneon",
        "Flaaffy",
        "FlabÃ©bÃ©",
        "Flareon",
        "Fletchinder",
        "Fletchling",
        "Floatzel",
        "Floette",
        "Florges",
        "Flygon",
        "Foongus",
        "Forretress",
        "Fraxure",
        "Frillish",
        "Froakie",
        "Frogadier",
        "Froslass",
        "Furfrou",
        "Furret",
        "Gabite",
        "Gallade",
        "GalladeMega Gallade",
        "Galvantula",
        "Garbodor",
        "Garchomp",
        "GarchompMega Garchomp",
        "Gardevoir",
        "GardevoirMega Gardevoir",
        "Gastly",
        "Gastrodon",
        "Genesect",
        "Gengar",
        "GengarMega Gengar",
        "Geodude",
        "Gible",
        "Gigalith",
        "Girafarig",
        "GiratinaAltered Forme",
        "GiratinaOrigin Forme",
        "Glaceon",
        "Glalie",
        "GlalieMega Glalie",
        "Glameow",
        "Gligar",
        "Gliscor",
        "Gloom",
        "Gogoat",
        "Golbat",
        "Goldeen",
        "Golduck",
        "Golem",
        "Golett",
        "Golurk",
        "Goodra",
        "Goomy",
        "Gorebyss",
        "Gothita",
        "Gothitelle",
        "Gothorita",
        "GourgeistAverage Size",
        "GourgeistLarge Size",
        "GourgeistSmall Size",
        "GourgeistSuper Size",
        "Granbull",
        "Graveler",
        "Greninja",
        "Grimer",
        "Grotle",
        "Groudon",
        "GroudonPrimal Groudon",
        "Grovyle",
        "Growlithe",
        "Grumpig",
        "Gulpin",
        "Gurdurr",
        "Gyarados",
        "GyaradosMega Gyarados",
        "Happiny",
        "Hariyama",
        "Haunter",
        "Hawlucha",
        "Haxorus",
        "Heatmor",
        "Heatran",
        "Heliolisk",
        "Helioptile",
        "Heracross",
        "HeracrossMega Heracross",
        "Herdier",
        "Hippopotas",
        "Hippowdon",
        "Hitmonchan",
        "Hitmonlee",
        "Hitmontop",
        "Honchkrow",
        "Honedge",
        "HoopaHoopa Confined",
        "HoopaHoopa Unbound",
        "Hoothoot",
        "Hoppip",
        "Horsea",
        "Houndoom",
        "HoundoomMega Houndoom",
        "Houndour",
        "Huntail",
        "Hydreigon",
        "Hypno",
        "Igglybuff",
        "Illumise",
        "Infernape",
        "Inkay",
        "Ivysaur",
        "Jellicent",
        "Jigglypuff",
        "Jirachi",
        "Jolteon",
        "Joltik",
        "Jumpluff",
        "Jynx",
        "Kabuto",
        "Kabutops",
        "Kadabra",
        "Kakuna",
        "Kangaskhan",
        "KangaskhanMega Kangaskhan",
        "Karrablast",
        "Kecleon",
        "KeldeoOrdinary Forme",
        "KeldeoResolute Forme",
        "Kingdra",
        "Kingler",
        "Kirlia",
        "Klang",
        "Klefki",
        "Klink",
        "Klinklang",
        "Koffing",
        "Krabby",
        "Kricketot",
        "Kricketune",
        "Krokorok",
        "Krookodile",
        "Kyogre",
        "KyogrePrimal Kyogre",
        "Kyurem",
        "KyuremBlack Kyurem",
        "KyuremWhite Kyurem",
        "Lairon",
        "Lampent",
        "LandorusIncarnate Forme",
        "LandorusTherian Forme",
        "Lanturn",
        "Lapras",
        "Larvesta",
        "Larvitar",
        "Latias",
        "LatiasMega Latias",
        "Latios",
        "LatiosMega Latios",
        "Leafeon",
        "Leavanny",
        "Ledian",
        "Ledyba",
        "Lickilicky",
        "Lickitung",
        "Liepard",
        "Lileep",
        "Lilligant",
        "Lillipup",
        "Linoone",
        "Litleo",
        "Litwick",
        "Lombre",
        "Lopunny",
        "LopunnyMega Lopunny",
        "Lotad",
        "Loudred",
        "Lucario",
        "LucarioMega Lucario",
        "Ludicolo",
        "Lugia",
        "Lumineon",
        "Lunatone",
        "Luvdisc",
        "Luxio",
        "Luxray",
        "Machamp",
        "Machoke",
        "Machop",
        "Magby",
        "Magcargo",
        "Magikarp",
        "Magmar",
        "Magmortar",
        "Magnemite",
        "Magneton",
        "Magnezone",
        "Makuhita",
        "Malamar",
        "Mamoswine",
        "Manaphy",
        "Mandibuzz",
        "Manectric",
        "ManectricMega Manectric",
        "Mankey",
        "Mantine",
        "Mantyke",
        "Maractus",
        "Mareep",
        "Marill",
        "Marowak",
        "Marshtomp",
        "Masquerain",
        "Mawile",
        "MawileMega Mawile",
        "Medicham",
        "MedichamMega Medicham",
        "Meditite",
        "Meganium",
        "MeloettaAria Forme",
        "MeloettaPirouette Forme",
        "MeowsticFemale",
        "MeowsticMale",
        "Meowth",
        "Mesprit",
        "Metagross",
        "MetagrossMega Metagross",
        "Metang",
        "Metapod",
        "Mew",
        "Mewtwo",
        "MewtwoMega Mewtwo X",
        "MewtwoMega Mewtwo Y",
        "Mienfoo",
        "Mienshao",
        "Mightyena",
        "Milotic",
        "Miltank",
        "Mime Jr",
        "Minccino",
        "Minun",
        "Misdreavus",
        "Mismagius",
        "Moltres",
        "Monferno",
        "Mothim",
        "Mr Mime",
        "Mudkip",
        "Muk",
        "Munchlax",
        "Munna",
        "Murkrow",
        "Musharna",
        "Natu",
        "Nidoking",
        "Nidoqueen",
        "Nidoranâ™‚",
        "Nidoranâ™€",
        "Nidorina",
        "Nidorino",
        "Nincada",
        "Ninetales",
        "Ninjask",
        "Noctowl",
        "Noibat",
        "Noivern",
        "Nosepass",
        "Numel",
        "Nuzleaf",
        "Octillery",
        "Oddish",
        "Omanyte",
        "Omastar",
        "Onix",
        "Oshawott",
        "Pachirisu",
        "Palkia",
        "Palpitoad",
        "Pancham",
        "Pangoro",
        "Panpour",
        "Pansage",
        "Pansear",
        "Paras",
        "Parasect",
        "Patrat",
        "Pawniard",
        "Pelipper",
        "Persian",
        "Petilil",
        "Phanpy",
        "Phantump",
        "Phione",
        "Pichu",
        "Pidgeot",
        "PidgeotMega Pidgeot",
        "Pidgeotto",
        "Pidgey",
        "Pidove",
        "Pignite",
        "Pikachu",
        "Piloswine",
        "Pineco",
        "Pinsir",
        "PinsirMega Pinsir",
        "Piplup",
        "Plusle",
        "Politoed",
        "Poliwag",
        "Poliwhirl",
        "Poliwrath",
        "Ponyta",
        "Poochyena",
        "Porygon",
        "Primeape",
        "Prinplup",
        "Probopass",
        "Psyduck",
        "PumpkabooAverage Size",
        "PumpkabooLarge Size",
        "PumpkabooSmall Size",
        "PumpkabooSuper Size",
        "Pupitar",
        "Purrloin",
        "Purugly",
        "Pyroar",
        "Quagsire",
        "Quilava",
        "Quilladin",
        "Qwilfish",
        "Raichu",
        "Raikou",
        "Ralts",
        "Rampardos",
        "Rapidash",
        "Raticate",
        "Rattata",
        "Rayquaza",
        "RayquazaMega Rayquaza",
        "Regice",
        "Regigigas",
        "Regirock",
        "Registeel",
        "Relicanth",
        "Remoraid",
        "Reshiram",
        "Reuniclus",
        "Rhydon",
        "Rhyhorn",
        "Rhyperior",
        "Riolu",
        "Roggenrola",
        "Roselia",
        "Roserade",
        "Rotom",
        "RotomFan Rotom",
        "RotomFrost Rotom",
        "RotomHeat Rotom",
        "RotomMow Rotom",
        "RotomWash Rotom",
        "Rufflet",
        "Sableye",
        "SableyeMega Sableye",
        "Salamence",
        "SalamenceMega Salamence",
        "Samurott",
        "Sandile",
        "Sandshrew",
        "Sandslash",
        "Sawk",
        "Sawsbuck",
        "Scatterbug",
        "Sceptile",
        "SceptileMega Sceptile",
        "Scizor",
        "ScizorMega Scizor",
        "Scolipede",
        "Scrafty",
        "Scraggy",
        "Scyther",
        "Seadra",
        "Seaking",
        "Sealeo",
        "Seedot",
        "Seel",
        "Seismitoad",
        "Sentret",
        "Serperior",
        "Servine",
        "Seviper",
        "Sewaddle",
        "Sharpedo",
        "SharpedoMega Sharpedo",
        "ShayminLand Forme",
        "ShayminSky Forme",
        "Shedinja",
        "Shelgon",
        "Shellder",
        "Shellos",
        "Shelmet",
        "Shieldon",
        "Shiftry",
        "Shinx",
        "Shroomish",
        "Shuckle",
        "Shuppet",
        "Sigilyph",
        "Silcoon",
        "Simipour",
        "Simisage",
        "Simisear",
        "Skarmory",
        "Skiddo",
        "Skiploom",
        "Skitty",
        "Skorupi",
        "Skrelp",
        "Skuntank",
        "Slaking",
        "Slakoth",
        "Sliggoo",
        "Slowbro",
        "SlowbroMega Slowbro",
        "Slowking",
        "Slowpoke",
        "Slugma",
        "Slurpuff",
        "Smeargle",
        "Smoochum",
        "Sneasel",
        "Snivy",
        "Snorlax",
        "Snorunt",
        "Snover",
        "Snubbull",
        "Solosis",
        "Solrock",
        "Spearow",
        "Spewpa",
        "Spheal",
        "Spinarak",
        "Spinda",
        "Spiritomb",
        "Spoink",
        "Spritzee",
        "Squirtle",
        "Stantler",
        "Staraptor",
        "Staravia",
        "Starly",
        "Starmie",
        "Staryu",
        "Steelix",
        "SteelixMega Steelix",
        "Stoutland",
        "Stunfisk",
        "Stunky",
        "Sudowoodo",
        "Suicune",
        "Sunflora",
        "Sunkern",
        "Surskit",
        "Swablu",
        "Swadloon",
        "Swalot",
        "Swampert",
        "SwampertMega Swampert",
        "Swanna",
        "Swellow",
        "Swinub",
        "Swirlix",
        "Swoobat",
        "Sylveon",
        "Taillow",
        "Talonflame",
        "Tangela",
        "Tangrowth",
        "Tauros",
        "Teddiursa",
        "Tentacool",
        "Tentacruel",
        "Tepig",
        "Terrakion",
        "Throh",
        "ThundurusIncarnate Forme",
        "ThundurusTherian Forme",
        "Timburr",
        "Tirtouga",
        "Togekiss",
        "Togepi",
        "Togetic",
        "Torchic",
        "Torkoal",
        "TornadusIncarnate Forme",
        "TornadusTherian Forme",
        "Torterra",
        "Totodile",
        "Toxicroak",
        "Tranquill",
        "Trapinch",
        "Treecko",
        "Trevenant",
        "Tropius",
        "Trubbish",
        "Turtwig",
        "Tympole",
        "Tynamo",
        "Typhlosion",
        "Tyranitar",
        "TyranitarMega Tyranitar",
        "Tyrantrum",
        "Tyrogue",
        "Tyrunt",
        "Umbreon",
        "Unfezant",
        "Unown",
        "Ursaring",
        "Uxie",
        "Vanillish",
        "Vanillite",
        "Vanilluxe",
        "Vaporeon",
        "Venipede",
        "Venomoth",
        "Venonat",
        "Venusaur",
        "VenusaurMega Venusaur",
        "Vespiquen",
        "Vibrava",
        "Victini",
        "Victreebel",
        "Vigoroth",
        "Vileplume",
        "Virizion",
        "Vivillon",
        "Volbeat",
        "Volcanion",
        "Volcarona",
        "Voltorb",
        "Vullaby",
        "Vulpix",
        "Wailmer",
        "Wailord",
        "Walrein",
        "Wartortle",
        "Watchog",
        "Weavile",
        "Weedle",
        "Weepinbell",
        "Weezing",
        "Whimsicott",
        "Whirlipede",
        "Whiscash",
        "Whismur",
        "Wigglytuff",
        "Wingull",
        "Wobbuffet",
        "Woobat",
        "Wooper",
        "WormadamPlant Cloak",
        "WormadamSandy Cloak",
        "WormadamTrash Cloak",
        "Wurmple",
        "Wynaut",
        "Xatu",
        "Xerneas",
        "Yamask",
        "Yanma",
        "Yanmega",
        "Yveltal",
        "Zangoose",
        "Zapdos",
        "Zebstrika",
        "Zekrom",
        "Zigzagoon",
        "Zoroark",
        "Zorua",
        "Zubat",
        "Zweilous"];
    
        autocomplete(pokemon_name, pokedex);