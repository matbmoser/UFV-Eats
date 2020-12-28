<?php include 'conexion.php';?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>About</title>
        <meta charset="utf-8">
        <style>
            body, html 
            {
                height: 100%;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            *
            {
                box-sizing: border-box;
            }
            img 
            {
                max-width: 100%;
                height: auto;
            }
            
            .column 
            {
                float: left;
                width: 32.3%;
                margin-bottom: 16px;
                padding: 0px 10px;
            }
            .card 
            {
                box-shadow: 4px 4px 4px 4px rgba(201, 13, 13, 0.2);
                background-color: darkslategrey;
            }
            .container 
            {
                padding: 0 0;
            }
            .container h2{
                font-size: 20px;
                font-family: cursive;
            }
            .container::after, .row::after 
            {
                content: "";
                clear: both;
                display: block;
            }
            .title 
            {
                color: grey;
            }
            .texto p
            {
                font-size: 35px;
                font-family: cursive;
                text-align: center;
                color:brown;
                border: 2px solid red;
                border-radius: 12px;
                background-color:goldenrod;
            }
            .texto h1
            {
                font-size: 35px;
                font-family: cursive;
                text-align: center;
                border: 2px solid red;
                border-radius: 12px;
            }
            /********************************\
            /* Media Queries */
            @media screen and (max-width: 650px) 
            {
                .column 
                {
                    width: 100%;
                    display: block;
                }

            }
         </style>
    </head>
    <body>
        <img src="primerafotoabout.png" alt="primerafotoabout" width="100%">
        <img src="about-us1.jpg" alt="about-us1" width="100%">
        <section class="texto">
            <p>Nuestra Mision</p>
            <h1>La creacion de la  página web  permite tanto a los profesores como a los alumnos y personas que vengan de visita a la Universidad Francisco de
                Vitoria conocer los menús que se sirven en la cafetería. Aunque la finalidad no es únicamente la de mostrar el menú del día, que puede facilitar
                en gran medida la decisión de las personas sobre lo que quieren comer, sino que sobre todo está destinado a ayudar a aquellos con alergias alimenticias
                intolerancias o gente que sigue algún tipo de dieta específica, que son los usuarios para los que realmente está destinada nuestra página web.</h1>
        </section>
        <img src="integrantes.JPG" alt="integrantes" width="100%">
        <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="mathias.jpg" alt="Mathias" style="width:100%">
                            <div class="container">
                                <h2>Mathias Brunkow Moser</h2>
                                <p class="title">PO & Desarrollador</p>
                                <p>Ingeniería Informática, con Ciberseguridad y Hacking Ético.</p>
                            </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <img src="aina.jpg" alt="Aina" style="width:100%">
                        <div class="container">
                            <h2>Aina Mora Columbrans</h2>
                            <p class="title">SM & Desarrollador</p>
                            <p>Ingeniería Informática, con Ciberseguridad y Hacking Ético.</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <img src="rafa.jpg" alt="Rafael" style="width:100%">
                        <div class="container">
                            <h2>Rafael Camarero Rodríguez</h2>
                            <p class="title">Desarrollador</p>
                            <p>Ingeniería Informática, con Ciberseguridad y Hacking Ético.</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <img src="charly.jpg" alt="Carlos" style="width:100%">
                        <div class="container">
                            <h2>Carlos Simon Hernandez</h2>
                            <p class="title">Desarrollador</p>
                            <p>Ingeniería Informática, experto en Robótica.</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <img src="martin.jpg" alt="Carlos" style="width:100%">
                        <div class="container">
                            <h2>Martin Diz Figueroa</h2>
                            <p class="title">Desarrollador</p>
                            <p>Ingeniería Informática, experto en Robótica.</p>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>