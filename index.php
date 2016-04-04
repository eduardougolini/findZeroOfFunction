<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ache o 0</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <script type="text/javascript" src="js/lib/jquery-1.12.2.js"></script>
        <script type="text/javascript" src="js/lib/ejs.js"></script>
        <script type="text/javascript" src="js/InterfaceController.js"></script>
    </head>
    <body>
        <div id="calculusBlock">
            <div class="functionBlock">
                <label>f(x)</label>
                <input type="text" class="functionInput" />
                <label class="exampleLabel">Exemplo: x^4 + 2x^3 - 13x^2 - 14x + 30</label>
            </div>
            
            <div class="limitBlock">
                <label>Limite Inferior</label>
                <input class="inferiorLimit" type="number" />
                <label>Limite Superior</label>
                <input class="superiorLimit" type="number" />
            </div>
            
            <div class="errorBlock">
                <label>Taxa de erro</label>
                <input type="text" class="errorInput" />
            </div>
            
            <div class="typeBlock">
                <label>Método</label>
                <select class="typeSelector">
                    <option value="bisseccao">Bissecção</option>
                    <option value="cordas">Cordas</option>
                    <option value="pegaso">Pégaso</option>
                    <option value="newton">Newton</option>
                </select>
            </div>
            
            <a class="calculateButton">Clique para calcular</a>

            <div class="resultBlock"></div>
            
        </div>
    </body>
</html>
