<?php include 'conexion.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
    <style>
        footer 
        {
            padding: 8em 0 6em 0;
            background: #fffffff2;
            text-align: center;
            display: block;
        }
        footer .copyright 
        {
			color: black;
			font-size: 0.8em;
			letter-spacing: 0.225em;
			list-style: none;
            text-align: center;
		}
        footer  p
        {
            color: black;
            list-style: none;
            text-align: center;
            font-size: 1em;
            font-family: cursive;
        }
        footer li 
        {
            display: inline;
            line-height: 3.5em;
            padding: 0.5em;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        /* CSS margenes por abajo  */
        footer ul
        {
            margin-bottom: 1.5rem!important;
        }
        /* CSS info@ufveats.es */
        footer .copyright  a
        {
            color: black;
        }
        footer .copyright a:hover
        {
            color: rgb(42, 20, 172);
        }
        /*  */
        footer .copyright table 
        {
          border: 1px solid black;
          margin-left: auto;
          margin-right: auto;
        }
        /* CSS imagen sobre */
        footer .copyright img
        {
            display: block;
            width: 45px;
        }
        footer .eslogan li
        {
            color: rgb(10, 177, 30);
            list-style: none;
            text-align: center;
            font-size: 1em;
            font-family: cursive;
        }
        footer .logo img
        {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        @media screen and (max-width: 980px) 
        {
            footer 
            {
                padding: 4em 4em 2em 3em;
            }
        }
        @media screen and (max-width: 575.98px)
        {
            footer .logo img
            {
                width: 100%;
            }
        }
        </style>
</head>
<body>
    <footer id="footer">
        <hr>
        <p>¿TIENES DUDAS?</p>
        <ul class="copyright">
            <table>
                <tr>
                       <th> <img src="../../media/img/sobre.png"></img></th>
                       <th> <a href="mailto:info@ufveats.es">info@ufveats.es</a> </th> 
                </tr>
            </table> 
        </ul>
        <ul class="copyright">
            <li>UFV eats</li>
            <span class="punt">|</span>
            <li>Todos los derechos reservados ©2020-2021 </li>
    
        </ul>
        <ul class="eslogan">
            <li>"Por una cafeteria para todos"</li>
        </ul>
        <ul class="logo"> 
                <img src="../../media/img/franciscoVitoria2.jpg"></img>
        </ul>
    </footer>
</body>
</html>