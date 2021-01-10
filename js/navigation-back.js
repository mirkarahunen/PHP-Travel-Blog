// VARIABLES --------------------------------------------------------------------------------------------------
var burgerMenu = document.querySelector('#burger');

var mobileNavigation = document.querySelector('.navigation.mobile.back');

var subMenu = document.querySelector('.dropdown');


// FUNCTIONS ----------------------------------------------------------------------------------------------------


//Function for hiding dropdown menu
function hideMenu() {
  subMenu.classList.remove('active');
}

//Function for showing dropdown menu
function showMenu() {
  subMenu.classList.add('active');
}


//BURGER MENU ----------------------------------------------------------------------------------------------------

burgerMenu.addEventListener('click', function() {
  mobileNavigation.classList.toggle('active');
  //console.log(mobileNavigation);
});
