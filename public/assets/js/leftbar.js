var a = document.getElementsByClassName('leftbar');
a = a[0];
var ul = a.children[0];

for(var i=0; i<ul.children.length; i++)
{
	var li = ul.children[i];
	li.addEventListener("click",function(){
		var ax = this.children[0].getAttribute("href");
		window.location = ax;
	});
}


document.getElementById('menu').addEventListener("click", function(){
	document.getElementById('leftbar').classList.toggle("tLf");
});