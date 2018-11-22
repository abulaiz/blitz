var x = document.getElementsByClassName('open-modal');

var modalOverlay = document.querySelector("#modal-overlay");

for(var i=0; i<x.length; i++)
{

  var modal = document.querySelector(x[i].getAttribute("data-target"));
  var closeButton = document.querySelector(x[i].getAttribute("data-close"));

  modal.classList.toggle("closed");

  closeButton.addEventListener("click", function() {
    modal.classList.toggle("closed");
    modalOverlay.classList.toggle("closed");
  });

  x[i].addEventListener("click", function() {
    modal.classList.toggle("closed");
    modalOverlay.classList.toggle("closed");
  });

}