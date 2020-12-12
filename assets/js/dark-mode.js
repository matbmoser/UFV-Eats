$(function(){

    var button = document.getElementById('dark-mode');
    var element = document.body;
    var main = document.getElementsByClassName('form-signin')[0];
    var logo = document.getElementById("mylogo");
    
    button.addEventListener('click', function(){
           var light= element.classList.toggle("light-mode");
           localStorage.setItem("light", light);
           main.classList.toggle("dark-mode");
           if(this.getElementsByTagName("span")[0].innerHTML === "Dark Mode"){
                   this.classList.remove("btn-outline-dark");
                   this.classList.add("btn-outline-light");
                   logo.src = "../media/img/logo2.png";
                   this.innerHTML = "<i class='fas fa-sun mr-1'></i> <span>Light Mode</span>";
           }else{
                   this.classList.remove("btn-outline-light");
                   this.classList.add("btn-outline-dark");
                   logo.src = "../media/img/logo1.png";
                   this.innerHTML = "<i class='fas fa-moon mr-1'></i> <span>Dark Mode</span>";
           }
    });
   
   });
   
   
   document.addEventListener("readystatechange", function() {
           
        if (document.readyState == "interactive") {
           if(localStorage.getItem("light") === "true"){
                   cambiarModo();
           }
        }
   });
   
   function cambiarModo(){
           
           var button = document.getElementById('dark-mode');
           var element = document.body;
           var main = document.getElementsByClassName('form-signin')[0];
           var logo = document.getElementById("mylogo");
           
           element.classList.toggle("light-mode");
           main.classList.toggle("dark-mode");
           if(button.getElementsByTagName("span")[0].innerHTML === "Dark Mode"){
                   button.classList.remove("btn-outline-dark");
                   button.classList.add("btn-outline-light");
                   logo.src = "../media/img/logo2.png";
                   button.innerHTML = "<i class='fas fa-sun mr-1'></i> <span>Light Mode</span>";
           }else{
                   button.classList.remove("btn-outline-light");
                   button.classList.add("btn-outline-dark");
                   logo.src = "../media/img/logo1.png";
                   button.innerHTML = "<i class='fas fa-moon mr-1'></i> <span>Dark Mode</span>";
           }
   }