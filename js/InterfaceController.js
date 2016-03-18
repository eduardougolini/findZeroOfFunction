
var calculate = function (functionVal, errorVal) {
    
}


var initialializeHandlers = function () {
    $('#calculusBlock .calculateButton').click(function (e) {
        e.stopImmediatePropagation();
        
        var functionVal = $('#calculusBlock .functionInput').val();
        var errorVal = $('#calculusBlock .errorInput').val();
        
        calculate(functionVal, errorVal);
    });
};