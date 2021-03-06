<style>
*{
	font-family:sans-serif;
}
#countdown_container{
	border-radius: 2px;
	text-align: center;
	font-weight: bold;
	background: #a0a0a0;
	border: 5px dashed #ffffff;
	display: inline-block;
	padding: 0 5px;
}

#countdown_timer>div{
	float: left;
	//background:#777777; /*black theme*/
	background:#e0e0e0; /*white theme*/
	padding:15px 20px;
	margin:10px 5px;
	text-align:center;
	border-radius: 4px;
}

#countdown_timer>div>div:first-child{
	font-size:28px;
	//color:#ff6000; /*black theme*/
	color:#0ab306; /*white theme*/
	text-shadow: 0px 1px 0px #056d03; /*white theme*/
}

#countdown_timer>div>div:last-child{
	text-transform: capitalize;
	font-size:14px;
	//color:#fff; /*black theme*/
	color:#444; /*white theme*/
}
</style>

<div id="countdown_container">
	<div id="countdown_timer"></div>
	<div style="clear:both"></div>
</div>

<script>
var countDownDate = new Date("<?php echo str_replace("-", "/", $tmi_terhis); ?> 08:00:00").getTime(); //geri sayılacak ileri zamanki bir tarihi milisaniye cinsinden elde ediyoruz
var dayText	= "Gun";
var hourText	= "Saat";
var minuteText	= "Dakika";
var secondText	= "Saniye";
if (countDownDate){ //tarih var ise
	var x = setInterval(function() { //sayacı belirli aralıklarla yenile
		var now = new Date().getTime(); //şimdiki zamanı al
		var distance = countDownDate - now; //geri sayılacak tarih ile şimdiki tarih arasındaki zaman farkını al
		if (distance < 0) { //zaman farkı yok ise belirtilen zamanı geçti
			clearInterval(x); //sayacı sil
			$("#countdown_timer").html("Geri sayim yapilacak ileri bir tarih yoktur");
		}else { //zaman farkı var ise
			//aradaki zaman farkını gün,saat,dakika,saniye olarak böl
			var days = Math.floor(distance / (1000 * 60 * 60 * 24)),
				hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
				minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
				seconds = Math.floor((distance % (1000 * 60)) / 1000),
				days = (days?'<div><div>'+days+'</div><div>'+dayText+'</div></div>':''), //gun varsa gun degerini yaz
				hours = (hours?'<div><div>'+hours+'</div><div>'+hourText+'</div></div>':''), //saat varsa saat degerini yaz
				minutes = (minutes?'<div><div>'+minutes+'</div><div>'+minuteText+'</div></div>':''), //dakika varsa dakika degerini yaz
				seconds = (seconds?'<div><div>'+seconds+'</div><div>'+secondText+'</div></div>':''); //saniye varsa saniye degerini yaz
			document.getElementById("countdown_timer").innerHTML = days + hours + minutes + seconds; //yazdır
		}
	}, 1000); //1 saniyede bir sayaç güncellenecek
}
</script>
