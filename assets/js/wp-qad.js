jQuery(document).ready(function ($) {

    function render_lang() {
        var container = $('.list-lang-valid');
        var itemLang = $('#lang-valid');
        var source = itemLang.html();
        var template = Handlebars.compile(source);

        for (var i = 0; i < qad.langs.length; i++) {

            // Запрашиваем данные по языку
            $.getJSON(qad.langs[i].url, function (data) {
                container.append( template(data) );
            });

        }

    }

    render_lang();
});