define(['jquery'], function($) {
    'use strict';
    return function(config, element) {

        $(element).click(function(){
            var x = document.getElementsByClassName("col3");
            console.log(x[1].textContent)
            var value=0.0;
            var i;
            for (i = 1; i < x.length; i++) {
                if(value < parseFloat(x[i].textContent))
                    value=parseFloat(x[i].textContent);
            }
            alert("La nota mas alta es " + value)
        });
    }
});
