var e_token = document.getElementById('token');
var token = e_token.value;
e_token.parentNode.removeChild(e_token);

function update(toStatus, id)
{
	window.location = "update_pengiriman?id="+id+"&toStatus="+toStatus+"&_token="+token;
}

var a1 = document.getElementsByClassName('sedang-dikirim');
for(var i=0; i<a1.length; i++){
	a1[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('1', id_p);
	});
	a1[i].innerHTML = "Batalkan Pengiriman";
}

var a2 = document.getElementsByClassName('belum-dikirim');
for(var i=0; i<a2.length; i++){
	a2[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('2', id_p);
	});
	a2[i].innerHTML = "Kirim Barang";
}

var a3 = document.getElementsByClassName('konfirmasi');
for(var i=0; i<a3.length; i++){
	a3[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('3', id_p);
	});
	a3[i].innerHTML = "Barang Telah Datang";
}

var a4 = document.getElementsByClassName('antarkan');
for(var i=0; i<a4.length; i++){
	a4[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('4', id_p);
	});
	a4[i].innerHTML = "Antarkan ke penerima";
}

var a5 = document.getElementsByClassName('batal-antarkan');
for(var i=0; i<a5.length; i++){
	a5[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('3', id_p);
	});
	a5[i].innerHTML = "Batalkan Antar";
}

var a6 = document.getElementsByClassName('terkirim');
for(var i=0; i<a6.length; i++){
	a6[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		update('5', id_p);
	});
	a6[i].innerHTML = "Barang terkirim";
}


// Hapus Pengiriman
var ha = document.getElementsByClassName('hapus');
for(var i=0; i<ha.length; i++){
	ha[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;

		c_alert({
			headerText:"Konfirmasi", 
			message:"Apakah anda yakin menghapus data ini ?", 
			acceptCaption: "Hapus", denyCaption: "Batal",
			onaccept : function(){
				window.location = "delete_pengiriman?id="+id_p+"&_token="+token;
			},
			ondeny : function(){}	
		});


	});
}


function toogleClass(overlay, modal){
    modal.classList.toggle("closed");
    overlay.classList.toggle("closed");	
}


var overlay_detail = document.getElementById('detail');
var overlay_loader = document.getElementById('loader');
var close = document.getElementById('closeModal');
var modalB = document.getElementById('modal');

close.addEventListener("click", function(){
	toogleClass(overlay_detail, modalB);
});

var dt = document.getElementsByClassName('detail');
for(var i=0; i<dt.length; i++){
	dt[i].addEventListener('click', function(){
		var id_p =  this.parentNode.id;
		overlay_loader.classList.toggle("closed");
		// setTimeout(function(){
		// 	overlay_loader.classList.toggle("closed");
		// 	toogleClass(overlay_detail, modalB);
		// },100);

		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'detail/pengiriman');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
		    if (xhr.status === 200) {
				var res = JSON.parse(xhr.responseText);     
				var k = Object.keys(res.text);
				for(var i=0; i<k.length; i++){
					document.getElementById(k[i]).innerHTML = res.text[k[i]];
				}
				document.getElementById('img-prev').src = res.img;
				overlay_loader.classList.toggle("closed");
				toogleClass(overlay_detail, modalB);				
		    }
		};
		xhr.send(encodeURI('id='+id_p+'&_token='+token));		


	});
}