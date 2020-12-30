$(function(){
    button = document.getElementById('dark-mode')
    button.addEventListener('click', function(){
            if(localStorage.getItem("light") === "true"){
                localStorage.setItem("light", "false");
                cambiarModo();
                cambiarBoton(button);
            } else{
                localStorage.setItem("light", "true");
                cambiarModo();
                cambiarBoton(button);
            }
    });
   
   });

   document.addEventListener("readystatechange", function() {
           
        if (document.readyState === "interactive") {
           if(localStorage.getItem("light") === "true"){
                   cambiarModo();
                   cambiarBoton(document.getElementById('dark-mode'));
           }
        }
   });
   
   function cambiarModo(){
<<<<<<< HEAD
           
           var button = document.getElementById('dark-mode');
           var element = document.body;
           var main = document.getElementsByClassName('form-signin')[0];
           var logo = document.getElementById("mylogo");
=======
>>>>>>> 97106070931398f85b844d83686397bfdc538af9

           if(localStorage.getItem("light") === "true"){
                   document.documentElement.style.setProperty('--bg-color', '#f8f9fa');
                   document.documentElement.style.setProperty('--color', '#212529');

           }else{
                   document.documentElement.style.setProperty('--bg-color', '#212529');
                   document.documentElement.style.setProperty('--color', '#f8f9fa');
           }
   }

   function cambiarBoton(button){
<<<<<<< HEAD
       var element = document.body;
       var logo = document.getElementById("mylogo");

       if(localStorage.getItem("light") === "false"){
            button.classList.remove("btn-outline-dark");
            button.classList.add("btn-outline-light");
            logo.src = "../media/img/logo2.png";
            button.innerHTML = "<i class='fas fa-sun mr-1'></i> <span>Light Mode</span>";
        }else {
            button.classList.remove("btn-outline-light");
            button.classList.add("btn-outline-dark");
            logo.src = "../media/img/logo1.png";
            button.innerHTML = "<i class='fas fa-moon mr-1'></i> <span>Dark Mode</span>";
=======
       var logo = document.getElementById("logo");
       var mylogo = document.getElementById("mylogo");
       if(logo != null){
        if(localStorage.getItem("light") === "false"){
                button.classList.remove("btn-outline-dark");
                button.classList.add("btn-outline-light");
                logo.src = "http://localhost/IS2/media/img/logo2.png";
                button.innerHTML = "<i class='fas fa-sun mr-1'></i> <span>Light Mode</span>";
        }else {
                button.classList.remove("btn-outline-light");
                button.classList.add("btn-outline-dark");
                logo.src = "http://localhost/IS2/media/img/logo1.png";
                button.innerHTML = "<i class='fas fa-moon mr-1'></i> <span>Dark Mode</span>";
        }
        }
        else{
                if(localStorage.getItem("light") === "false"){
                        button.classList.remove("btn-outline-dark");
                        button.classList.add("btn-outline-light");
                        mylogo.src = "http://localhost/IS2/media/img/logo1.png";
                        button.innerHTML = "<i class='fas fa-sun mr-1'></i> <span>Light Mode</span>";
                    }else {
                        button.classList.remove("btn-outline-light");
                        button.classList.add("btn-outline-dark");
                        mylogo.src = "http://localhost/IS2/media/img/logo2.png";
                        button.innerHTML = "<i class='fas fa-moon mr-1'></i> <span>Dark Mode</span>";
                    }
>>>>>>> 97106070931398f85b844d83686397bfdc538af9
        }
   }