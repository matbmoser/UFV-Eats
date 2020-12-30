var contador = 1;
 
function menu(){
 
		if(contador == 1){

			$(".mobileMenu").animate({
				right: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$(".mobileMenu").animate({
				right: '-200%'
			});
		}
 
}; 

$(document).ready(function(){
  $(".navbar-toggler").click( function() {
    menu(); 
  });
});