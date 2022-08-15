<html>
    <head>
          <meta charset="UTF-8">
         <script src="js/jquery.js"></script>
         <script type="text/javascript" src="node_modules/@selectize/selectize/dist/js/standalone/selectize.js"></script>

             <script>
                 $(function() {
                     
                    var miejsce;
                    var wojewodztwo;
                    var globalSse = null;
                  
          
                    
                    $('.wybor_miejsca').hover(mouseEnter, mouseLeave);
function mouseEnter() {
    
                    $(this).animate({
'background-position-y': '+30%',
                    },1000).addClass('shadow');
                    
};
function mouseLeave() {

                    $(this).animate({
'background-position-y': '0%',
                    },1000).removeClass('shadow');
};
                    
                    

 
                    
                
                    var limit = 0;
                    
                    function zwrocFirmy(dane){
                        
                        var dajMiejsca = dane.dajMiejsca;
                        
                       
                       function ile_firm(){
        dane.dajMiejsca = "ile";
        $.ajax({
         type: "GET",
         url: "dajMiejscaPracy.php",
         data: dane,
         async: false,
         success: function(odp){
             
        ile = odp;
     
         }
        });
          
        return ile;

    };
    
    var ile = ile_firm();
    
    $("#ile").show().html("Ilość: "+ile).prop("ile",ile);
    
    
   if(ile != 0){ 
    
    
    if(dajMiejsca != "sse"){
    dane.dajMiejsca = "daj";
    }else{
        dane.dajMiejsca = "sse";
    }
                          
                          
           $.getJSON('dajMiejscaPracy.php',dane,function(odp){
                
           
                
                if(limit == 0){
                
                $("#wybrane").html("");
               }
                
                $("#wybrane").show();
                    
                
               $.each(odp,function(k,w){
                   
                    
                    $("#wybrane").append("<div class='miejscePodrozy'>"+w.nazwa+"</div>");
                    
                })
                    
                 $("#wait_dol").hide();
            });


            
  }else{
        
        $("#brak").html("Niestety brak miejsc!").show();
         $("#wybrane").html("");
        
    }
           };
           
            $(".sse_img").click(function(){
                        
                        limit = 0;
                        
                        
                        $("#mapa_sse").hide();
                        $("#wybrane").show();
                        $("#filtry").show();
                        /*  $("#filtrNipSelect").show();*/
                        
                          var sse = $(this).attr("sse");
                          
                          globalSse = sse;
                            
                            var dane = {
                       'dajMiejsca':'sse',
                'sse':sse,
                'limit':limit
                 };
                
                 
                 zwrocFirmy(dane);
                            
                        
                    });
                    
                  
  
         
           function type(value,filtr) {
            
           
             daneAutocomplete = 
             {
                 'autocomplete':true,
                 'filtr':filtr,
                 'autocompletesse':globalSse,
                 'wojewodztwo':wojewodztwo,
                 'miejsce':miejsce,
                  'filtrWojewodztwo':wojewodztwo,
                'keyword':value,
             }
             
             function daj_tagi(){
      
        $.ajax({
         type: "GET",
         url: "dajMiejscaPracy.php",
         data: daneAutocomplete,
         async: false,
         success: function(odp){
        daneAuto = odp;
         }
        });
         
        return daneAuto;

    };
    
    var daneAuto = daj_tagi();
    
    
  var tags = daneAuto.split(",");
  
  
  
  if(filtr == "filtrNazwa"){
  var selectize = select_nazwa[0].selectize;
}else if(filtr == "filtrMiasto"){
  var selectize = select_miasto[0].selectize;
}else if(filtr == "filtrNip"){
  var selectize = select_nip[0].selectize;
}


  selectize.clearOptions();
     tags.forEach(function(text){
         
          selectize.addOption({value:text,text:text});
         
     });
     
    
         
            };
            
              function change()
            {

              limit = 0;
                
                
                 
  var miasto_items = $("#filtrMiastoSelect :selected").val() ?? null;
  
  var nip_items = $("#filtrNipSelect :selected").val() ?? null;

  var nazwa_items = $("#filtrNazwaSelect :selected").val() ?? null;


    
    
     var dane = {
                    'dajMiejsca':"daj",
                'miejsce':miejsce,
                'filtrWojewodztwo':wojewodztwo,
                'filtrNazwa':nazwa_items,
                'filtrMiasto':miasto_items,
                'filtrNip':nip_items,
                'limit':limit
                 };
                 
                  if(globalSse){
                     dane.dajMiejsca = "sse";
                     dane.sse = globalSse;
                 }
                 
             

              zwrocFirmy(dane);
        

            }
            
            
            
          
            

	var select_miasto = $('#filtrMiastoSelect').selectize({
onType:function(value){
	       type(value,"filtrMiasto")
	    },
	     onChange:function(){
	       change();
	    },
	    maxItems:1,
	    placeholder:"Wpisz miasto",
	    create:false,
	    searchConjunction:',',
	});
	
	 var select_nip = $('#filtrNipSelect').selectize({
	  onType:function(value){
	       type(value,"filtrNip")
	    },
	     onChange:function(){
	       change();
	    },
	    maxItems:1,
	    placeholder:"Wpisz nip",
	    create:false,
	    searchConjunction:',',
	});
     
     
             var select_nazwa = $('#filtrNazwaSelect').selectize({
	    maxItems:1,
	    onType:function(value){
	       type(value,"filtrNazwa")
	    },
	     onChange:function(){
	       change();
	    },
	    placeholder:"Wpisz nazwe",
	    create:false,
	    searchConjunction:',',
	});
                    
                    
                    var selectize_clear_nip = select_nip[0].selectize;
                    var selectize_clear_miasto= select_miasto[0].selectize;
                    var selectize_clear_nazwa= select_nazwa[0].selectize;
                    
                $('.wybor_miejsca').click(function(){
                        
                        $('.wybor_miejsca').removeClass('shadow2');
                        
                        limit = 0;
                        
                        $(this).addClass('shadow2');
                        
                        $('.woj_obr').hide();
                        $("#mapa_sse").hide();
                         $("#podwybor_firmy").hide();
                        $("#wybrane").hide();
                        $("#filtry").hide();
                        $("#mapa_woj").hide();
                        $("#brak").hide();
                          $("#wait_dol").hide();
                        $("#ile").hide();
                        
                         $("#mapy").fadeIn(800);
                         
                                     
                
                 selectize_clear_nip.clearOptions();
                  selectize_clear_miasto.clearOptions();
                   selectize_clear_nazwa.clearOptions();
                
                        $("#mapa_woj").hide(function(){
                           $("#mapa_woj").show();
                       });
                        
                        if($(this).attr("id") == "wot"){
                        
                       
                      
                       globalSse = null;
                        }else{
                            
                            $("#podwybor_firmy").show();
                           
                            
                        }
                       
                       //$('#wybor_miejsca').slideUp(400);
                        
                        
                        miejsce = $(this).attr("id");
                        
                    });
                    
                    $(".podwybor").click(function(){
                        
                         $('.woj_obr').hide();
                         selectize_clear_nip.clearOptions();
                  selectize_clear_miasto.clearOptions();
                   selectize_clear_nazwa.clearOptions();
 limit = 0;
                        
                        $("#wybrane").hide();
                        $("#filtry").hide();
                        $("#mapa_woj").hide();
                        $("#brak").hide();
                          $("#wait_dol").hide();
                        $("#ile").hide();
                        
                         $("#mapy").fadeIn(800);
                        
                        if($(this).attr("id") == "woj"){
                              $("#mapa_woj").hide(function(){
                           $("#mapa_woj").show();
                         globalSse = null;
                       });
                       
                       $("#mapa_sse").hide();
                       
                        }else{
                            
                            $("#mapa_woj").hide();
                            $("#mapa_sse").show();
                            
                    
                        }
                        
                    })
                    
                    
                   
                    
            
            
    $('area').click(function(){
        
        wojewodztwo = $(this).attr("woj");
        
        $('.woj_obr').hide();
        $('.woj_obr[woj='+$(this).attr("woj")+']').show();
        $("#mapa_woj").hide();
        $("#filtry").show();
            
        /*  if(miejsce == "wot"){
              $("#filtrNipSelect").hide();
          }else{
              $("#filtrNipSelect").show();
          }
            */
            

            var dane = {
                'dajMiejsca':"daj",
                'miejsce':miejsce,
                'filtrWojewodztwo':wojewodztwo,
                'limit':limit
            };
            
            zwrocFirmy(dane);
            
            
      
    }).hover(function(){
        $('.woj_obr').hide();
        $('.woj_obr[woj='+$(this).attr("woj")+']').show();
    });
    
        $(window).scroll(function(){
            
            
            
            if($("#wybrane").is(":visible")){
            
            
            
            
              if($(window).scrollTop() + ($(window).height()+70) > $(document).height()) {
                  
                 var ilosc = $("#ile").prop("ile");
    
              if(ilosc != 0){
                  
                  if(ilosc >= limit){
                  
                  limit += 10;
                  
                   var dane = {
                       'dajMiejsca':'daj',
                'miejsce':miejsce,
                'filtrWojewodztwo':wojewodztwo,
                'filtrNazwa':$("#filtrNazwaSelect :selected").val(),
                'filtrMiasto':$("#filtrMiastoSelect :selected").val(),
                'filtrNip':$("#filtrNipSelect :selected").val(),
                'limit':limit
                 };
                 
                 if(globalSse){
                     dane.dajMiejsca = "sse";
                     dane.sse = globalSse;
                 }
                 
                 $("#wait_dol").show();
                 
                 zwrocFirmy(dane);
                 
                     }else{
        
        $("#brak").html("Obejżałeś już wszystkie miejsca").show();
        
    }
                  
              }else{
                  
                  $("#brak").html("Niestety brak miejsc!").show();
                  $("#wybrane").html("");
                  
              }
              }
              
            }
       
        
        
        
         if($(window).scrollTop() > 524){
            $('.back-to-top').fadeIn(200);
        }else{
            $('.back-to-top').fadeOut(200);

        }
        
        
    
});//window scroll 


 $('.sse_img').hover(mouseEnter, mouseLeave);
function mouseEnter() {
    
var src = $(this).attr("sse");
    
    $(this).attr("src","images/sse/"+src+"2.png");
                    
};
function mouseLeave() {

                    var src = $(this).attr("sse");
    
    $(this).attr("src","images/sse/"+src+"1.png");
};
                    
    
    
       $('.back-to-top').on('click', function(){
       
        $("html,body").animate({
            scrollTop: 0,
        },1500);
        
    });
    
    
    
                 });
             </script>
              <style type="text/css"> 
           body{
           background-image: url('images/tloslide.jpg'); 
      
      background-repeat: no-repeat;
     background-position:center;
      background-size: cover;
      height:100%;
      z-index: 1;
           }
           
           area{
               cursor: pointer;
           }
           
           #overlay{
            z-index: -2;
              position: fixed;
             top:0;
             left: 0;
             right: 0;
             display: block;
             bottom: 0;
               background-color: rgba(0, 0, 0, 0.9);

           }
           
           li,ul{
               text-decoration: none;
               list-style: none;
           }
           
           #mapy{
               position: relative;
               margin:5em auto;
               width:90%;
               max-width: 900px;
               height: 60%;
               background-color: rgba(0, 0, 0, 0.6);
              box-shadow: rgba(0, 0, 0, 0.19) 0px 3em 5em, rgba(0, 0, 0, 0.23) 0px 1em 1em;
               border-radius: 4em;
             z-index: 10;
               text-align: center;
               display: none;
              
           }
           
           #filtry{
               display: none;
               position: relative;
               top:5em;
           }
           
           #filtrNazwaSelect,#filtrNipSelect,#filtrMiastoSelect{
               height: 3em;
               width:28%;
               font-size:1.5em;
               padding-left: 1em;
               border-radius: 0.6em;
               float: left;
           }
           
           .filtr:nth-child(2) {
            margin:0 1em;
           }
           
           #ile{
               display:none;
               float: left;
               color:white;
               font-size: 3em;
               margin-top:2.2em;
           }
           
          .miejscePodrozy,#brak{
    text-align: center;
    color:black;
    background-color: white;
    cursor:pointer;
    
    position: relative;
   
    padding:1.3em 0.2em;
    margin-top:0.2em;
    border-bottom: 0.04em solid Gainsboro;
    border-top:0.04em solid Gainsboro;

}

#brak{
    font-size: 4em;
    display: none;
}

.miejscePodrozy:hover{
        
      box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        
}

           
           .wybor_miejsca{
                box-shadow: rgba(0, 0, 0, 0.25) 1em -5em 3em -1em inset;
                height: 6.2em;
               max-height:110px;
               border-radius: 0.7em;
               max-width: 700px;
               margin:0.5em auto;
               cursor: pointer;
               padding-top:0.4em;
              font-size: 4em;
              color:#EAEEE8;
              font-weight: 600;
             box-shadow: rgba(255, 255, 255, 0.4) 0px 1em 3em 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
              text-shadow: 0px 0px 3em rgba(225, 255, 210, 1);
              z-index: 10;
           }
           
           .shadow{
               box-shadow: rgba(255, 255, 255, 0.25) 0em -2em 1em -1em inset;
           }
           
            .shadow2{
               box-shadow: rgba(255, 255, 255, 0.25) 0em -2em 1em -1em inset;
           }
           
           #wybor_miejsca{
               margin-top:15em;
               text-align: center;
           }
           
           #wybor_miejsca > h1{
              color:#BCD4E6;
               font-size: 3em;
           }
           
           #mapa_woj{
 z-index: 20;
               display:none;
               
           }
           
           #mapa_sse{
               display: none;
                position: relative;
               z-index: 999;
           }
           
           .sse_img{
               
           }
           
           .sse_text{
               color: white;
           }
           
           .sse_label{
               float:left;
               cursor:pointer;
           }
        
           
            #map_poland{ 
                position: absolute;
                top:5em;
                left:2em;
                z-index: 20; 
            } 
            .woj_obr{ 
                position: absolute;
               top:5em;
               
               left:2em;
                z-index: 30; 
                display: none; 
            } 
            
            #wroc,#wybrane{
                display: none;
            }
            
            #wybrane{
               
                font-size: 4em;
                color: white;
            }
            
            #wot{
                
 background-image: url('images/wot.jpg'); 
      background-repeat: no-repeat;
      background-size: cover;
      
            }
            #firmy{
                background-image: url('images/fabryka.jpg'); 
      background-repeat: no-repeat;
      background-size: cover;
            }
            
            .back-to-top {
	position: fixed;
	z-index: 999;
	right: 1em;
	bottom: 1em;
	display: none;
	border-radius: 5em;
	background-color: lavender;
	
	
}

#podwybor_firmy{
    display: none;
     max-width: 900px;
      margin:0.5em auto;
    padding:1em 10%;
    text-align: center;
}

.podwybor{
    color:white;
    cursor:pointer;
   width:45%;
    font-size: 2.5em;
    float: left;
    background-color: rgba(0,0,0,0.2);
}

.podwybor:first-child{
    margin-right:5%;
}

           
.podwybor:nth-child(2){
    margin-left:5%;
}

#wait_dol{
    display:none;
    z-index: 999;
    background-color: #303030;
   box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    padding:2.5em 0px;
    margin:2.3em 0px;
}

.back-to-top > img{
    width: 6em;
}

.back-to-top:hover {
	background-color: SpringGreen;
}

            
        </style> 
        <link rel="stylesheet" href="node_modules/@selectize/selectize/dist/css/selectize.css">
        
    </head>
    <body>
        <div id="overlay"></div>
        
         <div id="wybor_miejsca">
             <h1>Wybierz miejsce, do którego chcesz dojeżdżać z drugą osobą</h1>
                <div class="wybor_miejsca" id="firmy">Do Firmy</div>
                <div class="wybor_miejsca" id="wot">Do jednostki WOT</div>
            </div>
            
            <div id="podwybor_firmy">
                 <div class="podwybor" id="sse">SSE</div>
                <div class="podwybor" id="woj">Wojewodztwo</div>
                <div style="clear:both"></div>
            </div>
        
        <div id="mapy">
            
           
            
            <div id="wroc">Wróć</div>
            
            <div id="filtry">
                
           
                <select id="filtrNazwaSelect" class="filtrSelect" typ="nazwa"></select>
                
                <select id="filtrMiastoSelect" class="filtrSelect" typ='miasto'></select>
                
                <select id="filtrNipSelect" class="filtrSelect" typ="nip"></select>
                
               
            </div>
            
            <div id="ile"></div>
            <div style="clear:both"></div>
     
            <div id="wybrane"></div>
            <div id="brak"></div>
                  
    <div id="wait_dol"><img class='wait' src="to/img/loader.gif"></div>
   
            
        
        <div id="mapa_woj">
            
            <img src="images/mapa/mapa-polski.png" usemap="#image-map" id="map_poland">


<ul>
  <li><img usemap="#image-map" woj="podlaskie" src="images/mapa/podlaskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="lubelskie" src="images/mapa/lubelskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="dolnoslaskie" src="images/mapa/dolnoslaskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="lubuskie" src="images/mapa/lubuskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="slaskie" src="images/mapa/slaskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="lodzkie" src="images/mapa/lodzkie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="wielkopolskie" src="images/mapa/wielkopolskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="pomorskie" src="images/mapa/pomorskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="warminsko-mazurskie" src="images/mapa/warminsko-mazurskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="swietokrzyskie" src="images/mapa/swietokrzyskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="opolskie" src="images/mapa/opolskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="mazowieckie" src="images/mapa/mazowieckie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="zachodnio-pomorskie" src="images/mapa/zachodnio-pomorskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="kujawsko-pomorskie" src="images/mapa/kujawsko-pomorskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="malopolskie" src="images/mapa/malopolskie.png" class="woj_obr"></li>
    <li><img usemap="#image-map" woj="podkarpackie" src="images/mapa/podkarpackie.png" class="woj_obr"></li>
</ul>

<map name="image-map" id="tt">
    <area target="" alt="" title="" woj="dolnoslaskie" coords="157,325,49,383,42,417,146,465,133,487,163,526,183,514,179,494,251,400,241,377" shape="poly">
    <area target="" alt="" title="" woj="lubuskie" coords="52,373,35,356,31,273,31,237,128,195,113,276,154,321,105,350" shape="poly">
    <area target="" alt="" title="" woj="zachodnio-pomorskie" coords="19,232,152,173,189,118,213,46,19,91,32,106,39,125,19,113,0,205,14,211" shape="poly">
    <area target="" alt="" title="" woj="opolskie" coords="194,494,263,403,312,420,257,530,247,544,249,505,230,502" shape="poly">
    <area target="" alt="" title="" woj="wielkopolskie" coords="167,319,126,277,138,191,155,189,194,123,228,142,240,239,328,276,262,383,207,343" shape="poly">
    <area target="" alt="" title="" woj="pomorskie" coords="230,131,204,113,223,45,323,1,354,25,337,28,342,45,357,39,343,123,246,117" shape="poly">
    <area target="" alt="" title="" woj="kujawsko-pomorskie" coords="341,262,251,228,234,136,246,126,352,131,385,177,355,253,346,257,341,259" shape="poly">
    <area target="" alt="" title="" woj="warminsko-mazurskie" coords="359,57,349,121,393,167,515,138,620,51" shape="poly">
    <area target="" alt="" title="" woj="podlaskie" coords="634,261,527,144,636,54,677,219" shape="poly">
    <area target="" alt="" title="" woj="mazowieckie" coords="528,412,452,379,452,324,362,258,396,185,519,148,624,276,539,307,532,388" shape="poly">
    <area target="" alt="" title="" woj="lodzkie" coords="386,434,318,405,269,397,342,286,359,273,444,329,437,383" shape="poly">
    <area target="" alt="" title="" woj="lubelskie" coords="631,284,554,320,539,413,556,442,614,498,673,505,677,485,707,476,707,451,697,439,709,433" shape="poly">
    <area target="" alt="" title="" woj="slaskie" coords="318,425,266,538,301,553,306,573,325,585,329,615,364,592,333,553,393,493,386,444" shape="poly">
    <area target="" alt="" title="" woj="swietokrzyskie" coords="408,485,398,441,439,397,531,421,541,451,495,504,444,511" shape="poly">
    <area target="" alt="" title="" woj="podkarpackie" coords="551,460,505,511,524,611,549,616,622,640,622,620,668,516,609,509" shape="poly">
    <area target="" alt="" title="" woj="malopolskie" coords="403,501,352,552,381,586,396,629,420,634,437,620,464,612,477,621,492,621,488,613,515,608,495,518,439,523" shape="poly">
</map>
            
        </div>
        
        <div id="mapa_sse">
            
            <div class="sse_label">
                <img class="sse_img" sse="arp_mielec" src="images/sse/arp_mielec1.png"/>
               <div class="sse_text">Mielec</div>
            </div>
            
            <div class="sse_label">
                <img class="sse_img" sse="ssse" src="images/sse/ssse1.png"/>
               <div class="sse_text">Słupska</div>
            </div>
            
             <div class="sse_label">
                <img class="sse_img" sse="lsse" src="images/sse/lsse1.png"/>
               <div class="sse_text">Łódzka</div>
            </div>
            
               <div class="sse_label">
                <img class="sse_img" sse="wmsse" src="images/sse/wmsse1.png"/>
               <div class="sse_text">Warmińsko - Mazurska</div>
            </div>
            
            <div class="sse_label">
                <img class="sse_img" sse="krakow_sse" src="images/sse/krakow_sse1.png"/>
               <div class="sse_text">Krakowski park technologiczny</div>
            </div>
             
             <div class="sse_label">
                <img class="sse_img" sse="wsse" src="images/sse/wsse1.png"/>
               <div class="sse_text">Wałbrzyska</div>
            </div>
            
             <div class="sse_label">
                <img class="sse_img" sse="sta_sse" src="images/sse/sta_sse1.png"/>
               <div class="sse_text">Starachowicka</div>
            </div>
            
            <div class="sse_label">
                <img class="sse_img" sse="kssse" src="images/sse/kssse1.png"/>
               <div class="sse_text">Kostrzyńsko - Słubicka</div>
            </div>
            
             <div class="sse_label">
                <img class="sse_img" sse="sse_mp" src="images/sse/sse_mp1.png"/>
               <div class="sse_text">Małej przedsiebiorczosci</div>
            </div>
            
               <div class="sse_label">
                <img class="sse_img" sse="suwalska_sse" src="images/sse/suwalska_sse1.png"/>
               <div class="sse_text">Suwalska</div>
            </div>
            
            <div class="sse_label">
                <img class="sse_img" sse="legnicka_sse" src="images/sse/legnicka_sse1.png"/>
               <div class="sse_text">Legnicka</div>
            </div>
             
             <div class="sse_label">
                <img class="sse_img" sse="tsse" src="images/sse/tsse1.png"/>
               <div class="sse_text">Tarnobrzeska</div>
            </div>
           
           <div class="sse_label">
                <img class="sse_img" sse="ksse" src="images/sse/ksse1.png"/>
               <div class="sse_text">Katowicka</div>
            </div>
            
           
           <div class="sse_label">
                <img class="sse_img" sse="strefa_gda" src="images/sse/strefa_gda1.png"/>
               <div class="sse_text">Pomorska</div>
            </div>
             
             <div style="clear:both"></div>
            
        </div>
        
     
        
        </div>
        
        <a href="#" class="back-to-top"><img src='to/img/up-arrow.png'/></a>

    </body>
</html>