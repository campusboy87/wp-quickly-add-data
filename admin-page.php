<?php
$storage = new WpQadStorage();
$data    = $storage->get_lang_json();
//d($data);
?>

<div class="wrap wp-qad">

    <h1><?php echo get_admin_page_title(); ?></h1>

    <h2 class="nav-tab-wrapper wp-clearfix">
        <a href="#" class="nav-tab nav-tab-active">Языки</a>
        <a href="#" class="nav-tab">Пакеты</a>
        <a href="#" class="nav-tab">Демо контент</a>
    </h2>
    
    


    <script>
        var qad = <?php echo $data; ?>;
    </script>

    <script id="lang-valid" type="text/x-handlebars-template">
        <div class="entry">
            {{#each langs}}
            <h2>{{locale-name}}</h2>
            {{/each}}
        </div>
    </script>

</div>