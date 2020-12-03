define(['jquery'], function($) {
    'use strict';
    return function(config, element) {

        $(element).click(function(){
            var x = document.getElementsByClassName("col3");
            var i;
            for (i = 0; i < x.length; i++) {
                (x[i].style.display == "none") ? x[i].style.display= "inline" : x[i].style.display= "none" ;
            }
        });

    }
});
