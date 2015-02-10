<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?= $stylesheetLink?>"/>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?= $jsLink?>"></script>
    <script type="text/javascript" src="<?=$tinymceLink?>"></script>
    <script>
        tinymce.init({
            selector: "textarea#elm1",
            theme: "modern",
            width: 300,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>




    <meta charset="utf-8">
    <title>MVC</title>
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">OK Buh</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=$newsLink?>">News<span class="sr-only">(current)</span></a></li>
                <li><a href="<?=$guestbookLink?>">Guestbook</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Protocols<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Import</a></li>
                        <li><a href="#">Export</a></li>
                        <li><a href="#">Users</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="<?=$registerLink?>">Registration</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

