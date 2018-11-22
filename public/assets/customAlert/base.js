function newDiv(classes, text = "")
{
	var a = document.createElement("div");
	a.className = classes;
	
	if(text!=""){
		var t = document.createTextNode(text);
		a.appendChild(t);
	}

	return a;
}

function newButton(classes, text)
{
	var a = document.createElement("button");
	a.innerHTML = text;
	a.className = classes;
	return a;
}

function c_alert(obj)
{
	var cov = newDiv("c-al-overlay");
	var mod = newDiv("c-al-modal");
	var ched = newDiv("c-al-header", obj.headerText);
	var cbody = newDiv("c-al-body");
	var cms = newDiv("c-al-message", obj.message);
	var bact = newDiv("c-al-action");
	var bd = newButton("modal-button btn-danger", obj.acceptCaption);
	var bp = newButton("modal-button btn-primary", obj.denyCaption);

	bact.appendChild(bp); bact.appendChild(bd);
	cbody.appendChild(cms); cbody.appendChild(bact);
	mod.appendChild(ched); mod.appendChild(cbody);
	cov.appendChild(mod);

	bp.addEventListener("click",function(){
		obj.ondeny();
		cov.parentNode.removeChild(cov);	
	});

	bd.addEventListener("click", function(){
		obj.onaccept();
		cov.parentNode.removeChild(cov);
	});

	var cc = document.querySelector('body');
	cc.appendChild(cov);
}


// c_alert({
// 	headerText:"Konfirmasi", message:"Ini Pesan", 
// 	acceptCaption: "Oke", denyCaption: "Cancel",
// 	onaccept : function(){
// 		alert('oy');
// 	},
// 	ondeny : function(){
// 		alert('ey');
// 	}	
// });
