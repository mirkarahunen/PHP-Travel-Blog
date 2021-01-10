// VARIABLES ----------------------------------------------------------------------------------------------------

var allImages = document.querySelectorAll('.gallery-images .images img');

var closeButtons = document.querySelectorAll('.modal i.fa-window-close');

var prevButtons = document.querySelectorAll('.prev-button');
var nextButtons = document.querySelectorAll('.next-button');

var nextButtonIcons = document.querySelectorAll('.next-button i');
var prevButtonIcons = document.querySelectorAll('.prev-button i');

var imageText = document.querySelector('.data-caption');
var modalWindow = document.querySelector('#modal-window-');
var modalImage = document.querySelector('#modal-image-');

// MODAL IMAGES FUNCTION ----------------------------------------------------------------------------------------------------

//Create a function to show the modal image
function showModalImage(index) {

  var modalWindow = document.querySelector('#modal-window-' + index);
  var modalImage = document.querySelector('#modal-image-' + index);


  //Add modal window
  modalWindow.classList.add('show');

  //Show active image
  modalImage.classList.add('show');                                              //allImages[index].classList.add('active');
}


//Add event on click for all images
for (var i = 0; i < allImages.length; i++) {
  allImages[i].addEventListener('click', function(evt) {
    //console.log(evt.type);

    //Set new active image/index
    var activeIndex = parseInt(evt.target.getAttribute('data-index'));
    //console.log(evt.target);
    //console.log(activeIndex);
    showModalImage(activeIndex);
    activeImage = activeIndex;
    //console.log(activeImage);
  });
}


// BUTTONS IN MODAL WINDOW ----------------------------------------------------------------------------------------------------

//Add event on the button
for ( var i = 0; i < prevButtons.length; i++ ) {
prevButtons[i].addEventListener('click', function() {
  //console.log(event.type);
  activeImage = activeImage - 1;
  //console.log(activeImage);
  if (activeImage < 1) activeImage = allImages.length - 0;

  //console.log(activeImage);
  showModalImage(activeImage);

  //At click hide modal window
  var modalWindow = this.closest(".modal");
  modalWindow.classList.remove('show');
});
}

//Add event on the button
for ( var i = 0; i < nextButtons.length; i++ ) {
nextButtons[i].addEventListener('click', function(index) {

  activeImage = activeImage + 1;


  if (activeImage > allImages.length) activeImage = 1;
  console.log(activeImage);

  showModalImage(activeImage);

  //At click hide modal window
  var modalWindow = this.closest(".modal");
  modalWindow.classList.remove('show');

});
}

for ( var i = 0; i < closeButtons.length; i++ ) {
  //Add event on the button
  closeButtons[i].addEventListener('click', function() {
    //console.log( this );

    var modalWindow = this.closest(".modal");

    //At click hide modal window
    modalWindow.classList.remove('show');
  });
}
