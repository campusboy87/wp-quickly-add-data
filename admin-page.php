<?php
$storage = new WpQadStorage();
$data    = $storage->get_lang_json();
//d($data);
?>

<script>
    var qad = <?php echo $data; ?>;
</script>


<div class="wrap wp-qad">

    <h1><?php echo get_admin_page_title(); ?></h1>

    <h2 class="nav-tab-wrapper wp-clearfix">
        <a href="#" class="nav-tab nav-tab-active">Языки</a>
        <a href="#" class="nav-tab">Пакеты</a>
        <a href="#" class="nav-tab">Демо контент</a>
    </h2>
    
    <div class="list-lang-valid">
        <!--  Место для скомпилированных шаблонов handlebars -->
    </div>

    <script id="lang-valid" type="text/x-handlebars-template">
        <div class="lang-item">
            <h2>{{locale-name}}</h2>
        </div>
    </script>

</div>