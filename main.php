<?php 
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
 <link rel="stylesheet" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>   
        body {
            font-family: Arial;
        }

        
        .tab {
            overflow: hidden;
            border: 20px solid #ccc;
            background-color: #f1f1f1;
        }

            
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                margin: 0px auto;
                padding: 30px 40px;
                transition: 0.3s;
                font-size: 50px;
            }

                
                .tab button:hover {
                    background-color: #ddd;
                }

                
                .tab button.active {
                    background-color: #ccc;
                }

        
        .tabcontent {
            display: none;
            padding: 10px 22px;
            border: 1px solid #ccc;
            border-top: none;
        }


        button[name="button"]{
        background-color: black;
        border: none;
        color: black;
        padding: 20px 40px;
        font-size: 30px;
        cursor: pointer;
        font-size: 30px;
        }


        button[name="button"]:hover {
            background-color: black;
        }
        
 
    </style>
</head>
 <body class="body_korzina">
     <div class="parent">


         <div class="header">
             <h2 class="title">
             </h2>
         </div>
         <div class="fon_of_tovar">
         <form action='profile.php' target="_blank">
            <button>Переход на главную </button>
        </form>
             <div>
                 <button class="button" onclick="document.location ='donwload'">открыть католог </button>
             </div>
             <?php
             if ($_SESSION['admin']){
                 echo "<form action='sotrudniki.php' target='_blank'>
            <button>Сотрудники</button>
                </form>";
             }
             
             
             
             
             ?>
        </div>
         
         <div class="footer"></div>
     </div>
        


        <script>

            function openCataloge(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

        </script>

    </body>
</html> 
