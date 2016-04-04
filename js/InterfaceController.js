$(document).ready(function() {
    
    $('#calculusBlock .calculateButton').click(function (e) {
        e.stopImmediatePropagation();
        
        var functionVal = $('#calculusBlock .functionInput').val();
        var errorVal = $('#calculusBlock .errorInput').val();
        var method = $('#calculusBlock .typeSelector option:selected').val();
        var inferiorLimit = $('#calculusBlock .inferiorLimit').val();
        var superiorLimit = $('#calculusBlock .superiorLimit').val();
        
        
        $.post("Controller/CalculatorController.php",{
            method: method,
            userFunction: functionVal,
            userError: errorVal,
            inferiorLimit: inferiorLimit,
            superiorLimit: superiorLimit
        }, function(data) {
            var ejsData = new EJS({url: '/js/templates/method.ejs.tmpl'});
            $("#calculusBlock .resultBlock").html(ejsData.render({
                data: data
            }));
        });
    });
    
});