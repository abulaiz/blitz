var e_jarak = document.getElementById('harga_jarak');
var e_berat = document.getElementById('harga_berat');

var harga_jarak = Number(e_jarak.value);
var harga_berat = Number(e_berat.value);
var modalOverlay = document.getElementById('modal-overlay');
var jarak = [];
var allowSubmit = false;

e_jarak.parentNode.removeChild(e_jarak);
e_berat.parentNode.removeChild(e_berat);

document.getElementById('provinsi').addEventListener('change',function() {
    modalOverlay.classList.toggle("closed");
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'kantor/kota');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	    	var kota = document.getElementById('kota');
	        for(var y=0; y<kota.children.length; y++){
	        	if(kota.children[y].value!="")
	        		kota.removeChild(kota.children[y]);	        	
	        }

	        var res = JSON.parse(xhr.responseText);
	        for(var i=0; i<res.length; i++)
	        {
		        var opt = document.createElement('option');
		        opt.value = res[i].id; opt.innerHTML = res[i].nama;
		        kota.appendChild(opt);
	        }
    		setTimeout(function(){
    			modalOverlay.classList.toggle("closed");
    		},500);	        
	    }
	};
	xhr.send(encodeURI('id='+this.value));

});


document.getElementById('kota').addEventListener('change',function() {
    modalOverlay.classList.toggle("closed");
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'kantor/cabang');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	    	var kode_tujuan = document.getElementById('kode_tujuan');
		    while(kode_tujuan.firstChild){
		      kode_tujuan.removeChild(kode_tujuan.firstChild);
		    } 	
	        var res = JSON.parse(xhr.responseText);

	        // Option Opt
	        var opt = document.createElement('option');
	        opt.value = ""; opt.innerHTML = "--Pilih Pos Tujuan--";
	        kode_tujuan.appendChild(opt);
	        for(var i=0; i<res.data.length; i++)
	        {
	        	var opt = document.createElement('option');
		        opt.value = res.data[i].kode; opt.innerHTML = res.data[i].kode+" - "+res.data[i].kecamatan;
		        kode_tujuan.appendChild(opt);
	        }

	        jarak = res.jarak;
    		setTimeout(function(){
    			modalOverlay.classList.toggle("closed");
    		},500);	        
	    }
	};
	xhr.send(encodeURI('id='+this.value));
});

function toRP(x)
{
	x = x.toString();
	var sisa = x.length % 3;
	if(sisa==0) sisa = 3;
	var b = x.substr(0, sisa);
	for(var i = sisa; i<x.length; i+=3)
	{
		b = b+"."+x.substr(i, 3);
	}
	return "Rp "+b;
}

function update_harga()
{
	var selected = document.getElementById('kode_tujuan').value;
	var berat = document.getElementById('berat_benda').value;
	var harga = (harga_berat*berat)+(harga_jarak*Number(jarak[selected]));
	if(berat=="" || selected=="")
		document.getElementById('harga').innerHTML = "-";
	else
		document.getElementById('harga').innerHTML = toRP(harga);

	document.getElementById('harga_asli').value = harga;
}


document.getElementById('kode_tujuan').addEventListener('change',update_harga);
document.getElementById('berat_benda').addEventListener('keyup',update_harga);

function validate()
{
	if(allowSubmit) return true;

    modalOverlay.classList.toggle("closed");
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'pengirim/cek');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
	    if (xhr.status === 200) {
	    	var res = JSON.parse(xhr.responseText);
	    	if(res.registered){

				c_alert({
					headerText:"Konfirmasi", 
					message:"Penyewa dengan ID tersebut telah terdaftar atas nama "+res.data+". Gunakan yang telah terdaftar ?", 
					acceptCaption: "Teruskan", denyCaption: "Batal",
					onaccept : function(){
		    			allowSubmit = true;
		    			document.getElementById('form').submit();
					},
					ondeny : function(){}	
				});

	    	} else {
    			allowSubmit = true;
    			document.getElementById('form').submit();
	    	}

    		setTimeout(function(){
    			modalOverlay.classList.toggle("closed");
    		},500);	        
	    }
	};
	xhr.send(encodeURI('id='+document.getElementById('id').value));

	return false;
}


function previewFile()
{
	var preview = document.querySelector('#imagePrev');
	var file = document.querySelector('input[type=file]').files[0];

	var reader = new FileReader();

	reader.onloadend = function(){
		preview.src = reader.result;
	};

	if(file){
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}
}