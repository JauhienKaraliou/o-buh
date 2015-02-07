<?php


class View {
    public $page=1;


    public function __construct()
    {

    }

    public function render($tplName)
    {

        $newsLink = Model::generateLink(array('posts'));
        $stylesheetLink = Model::generateLink(array('css','bootstrap.css'));
        $jsLink = Model::generateLink(array('js','bootstrap.js'));
        $registerLink = Model::generateLink(array('users','registration'));
        $tinymceLink = Model::generateLink(array('js','tinymce','tinymce.min.js'));
        include 'inc/views/'.$tplName.'.php';
    }


}