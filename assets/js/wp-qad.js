jQuery(document).ready(function ($) {

    function render_lang() {
        var container = $('#lang-valid');
        var arr = { langs : [] };

        for (var i = 0; i < qad.langs.length; i++) {

            // Запрашиваем данные по языку
            $.getJSON(qad.langs[i].url, function (data) {
                console.log(data);
                arr.langs.push(data);
            });

        }

        console.log( arr );

        var source   = container.html();
        var template = Handlebars.compile(source);

        var html    = template(arr);

        container.html(html);



        var data = {
            groupName: 'Customers',
            users: [
                { name: { firstName: 'John', lastName: 'Smith' }},
                { name: { firstName: 'Thomas', lastName: 'Anderson' }}
            ]
        };

        console.log( data );
    }

    render_lang();
});