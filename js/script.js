(function($) {
    $(function() {
        var timer;
        console.log(Modernizr);
        console.log(window);

        // appel du plugin de colorisation syntaxique
        SyntaxHighlighter.all();

        // redimensionnement auto de la hauteur du wrapper en fct de la hauteur de page
        var wrapper_height = parseInt($("#wrapper").css('height'));
        $(window).resize(function() {
            var h1 = window.innerHeight;

            if(h1 > wrapper_height) {
                $("#wrapper").css("height", window.innerHeight+window.scrollY+"px");
            } else {
                $("#wrapper").css("height", wrapper_height+"px");
            }
        }).resize();

        // changement de couleur du box-shadow du wrapper
        /*if(window.localStorage.getItem("index_color")) {
            update_color(window.localStorage.getItem("index_color"));
        } else {
            update_color(0);
        }*/
    });
})(jQuery);

function update_color(index) {
    // window.localStorage.setItem("index_color", index);

    var color = ["#d00", "#0d0", "#00d"];
    $('#wrapper').css('boxShadow', "0 0 25px "+color[index]);

    var next_index = index+1;
    if(next_index > color.length-1) {
        next_index = 0;
    }

    timer = setTimeout('update_color('+next_index+')', 5000);
}