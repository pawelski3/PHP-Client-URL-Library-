<?php

$c=curl_init();
curl_setopt($c,CURLOPT_URL,'http://api.nbp.pl/api/exchangerates/tables/A/?format=json');
//curl_setopt($c,CURLOPT_HEADER,1);
curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
$txt=curl_exec($c);

curl_close($c);
$obj = json_decode($txt);
//var_dump(json_decode($txt));
//echo ($txt);

//echo "<br>";
//echo is_array($txt)?'yes':'no';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <title>Curl3
</title>


<script type="text/javascript">

function rate()
	{
		
		//var obj = JSON.parse(text);
		var t= '<?php echo $txt ?>';
		var obj = JSON.parse(t);
		
		document.getElementById("data").innerHTML="Kursy walut NBP na dzień: "+obj[0].effectiveDate;
		
		//document.getElementById("demo").innerHTML = obj.name + ", " + obj.age; 
		//document.getElementById("intro").innerHTML=t.EffectiveDate;
		//var get=t.getElementsByTagName('effectiveDate');
		var nod=document.getElementById('Haupt2');
		//var element = document.createElement('div');
		//element.id="ccc";
		//nod.appendChild(element);
		var i=0;
		var hj=3;
		function divs(){
			if (i==36){return 0}
			var element = document.createElement('div');
			element.id="id"+i;
			element.className="class Haupt";
			/*var mod=i%2;
			if (mod==0){element.className="class Haupt";}else
				{element.className="class Haupt2";}*/
			//element.className="class Haupt";
			nod.appendChild(element);
				
				var innerelement1=document.createElement('div');
				var innerelement2=document.createElement('div');
				var innerelement3=document.createElement('div');
				var innerelement4=document.createElement('div');
				
				innerelement1.id="pid1-"+i;
				//innerelement1.className="pid1";
				innerelement2.id="pid2-"+i;
				//innerelement2.className="pid2";
				innerelement3.id="pid3-"+i;
				//innerelement3.className="pid3";
				innerelement4.id="pid4-"+i;
				//innerelement4.className="pid4";
				var mod=i%2;
				if (mod==0){innerelement1.className="pid1";
							innerelement2.className="pid2";
							innerelement3.className="pid3";
							innerelement4.className="pid4";}
						else
							{innerelement1.className="pid1b";
							innerelement2.className="pid2b";
							innerelement3.className="pid3b";
							innerelement4.className="pid4b";}
				
				var nod1=document.getElementById("id"+i);
				nod1.appendChild(innerelement1);
				nod1.appendChild(innerelement2);
				nod1.appendChild(innerelement3);
				nod1.appendChild(innerelement4);
			
					if (i==0){
					document.getElementById("pid1-"+i).innerHTML="Lp.";
					document.getElementById("pid2-"+i).innerHTML="Waluta";
					document.getElementById("pid3-"+i).innerHTML="Symbol";
					document.getElementById("pid4-"+i).innerHTML="Kurs";
					i=i+1;
					divs()
					}
			
			document.getElementById("pid1-"+i).innerHTML=i;
			document.getElementById("pid2-"+i).innerHTML=obj[0].rates[i-1].currency;
			document.getElementById("pid3-"+i).innerHTML=obj[0].rates[i-1].code;
			document.getElementById("pid4-"+i).innerHTML=obj[0].rates[i-1].mid;
			
			
			
			
			//document.getElementById("id"+i).innerHTML=obj[0].rates[i].currency+" kurs średni "+obj[0].rates[i].mid;
			
			i=i+1;
			document.getElementById("intro").innerHTML=i;
			if (i<=36){divs()} else {return 0};
			}
		//document.getElementById("intro").innerHTML=obj[0].effectiveDate;
		//document.getElementById("ccc").innerHTML="ccc";
		divs();
	}


</script>
<style>
    body {
    
	background-position: top center;
	background-repeat: no-repeat;
	background-image: url(spin.jpg);
	background-attachment: fixed;
	color: #000000;
	
    }
	
	span{
		width: 300px;
		min-height:30px;
		border: 2px solid green;
	}
	
	.pid1{
		background-color: yellow;
		width: 8%;
		float: left;
		
		}
	
	.pid2{
		background-color: yellow;
		width: 50%;
		float: left;
		border-left: 2px solid green;
		}
	
	.pid3{
		background-color: yellow;
		width: 20%;
		float: left;
		border-left: 2px solid green;
		}
	
	.pid4{
		background-color: yellow;
		width: 20%;
		float: left;
		border-left: 2px solid green;
		
		}
		
	.pid1b{
		background-color: green;
		width: 8%;
		float: left;
		
		}
	
	.pid2b{
		background-color: green;
		width: 50%;
		float: left;
		border-left: 2px solid black;
		}
	
	.pid3b{
		background-color: green;
		width: 20%;
		float: left;
		border-left: 2px solid black;
		}
	
	.pid4b{
		background-color: green;
		width: 20%;
		float: left;
		border-left: 2px solid black;
		
		}
	
	.Haupt{
		width: 500px;
		
		margin-left: auto;
		margin-right: auto;
		clear: both;
		
	}
	
	#Haupt2{
		width: 496px;
		min-height:718px;
		border: 3px solid green;
		margin-left: auto;
		margin-right: auto;
		clear: both;
		
		
	}
	
	#data{
	margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: auto;
	width:1000px;
	min-height:200px;
	
	color:Black;
	font-size: 90px;
	
	text-align:center;
	vertical-align:middle;
}
	
	
	
</style>
 </head>

  <body id="body" onload="rate()">
<div id='data'>div</div>
 <div id='intro'>div</div>
<div id='Haupt2'></div>

</body>
