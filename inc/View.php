<?php


class View {
    public $page=1;


    public function __construct()
    {

    }

    public function render($tplName)
    {


        $stylesheetLink = Model::generateLink(array('css','bootstrap.css'));
        $jsLink = Model::generateLink(array('js','bootstrap.js'));
        $tinymceLink = Model::generateLink(array('js','tinymce','tinymce.min.js'));
        $newsLink = Model::generateLink(array('news'));
        $guestbookLink = Model::generateLink(array('guestbook'));
        $registerLink = Model::generateLink(array('registration'));
        include 'inc/views/pages/'.$tplName.'.php';
    }


}