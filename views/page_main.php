<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Szélerőművek beadandó</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname']." (".$_SESSION['userlogin'].")" ?></em></div>
            <h1 class="header">&nbsp;Magyarországi szélerőművek</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
                
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&nbsp;&nbsp;&nbsp;&nbsp;Készítette: &nbsp;&nbsp;&nbsp;&nbsp;Tóth Zsuzsanna&nbsp;&nbsp;&nbsp;&nbsp;<?= date("Y") ?></footer>
    </body>
</html>