<?php
    /* 
     * Esta clase forma la estructura de datos que puede tener una asignatura,
     * es utilizada para instanciar asignaturas y poder manejar sus datos.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class Subject {

        // Atributos
        private $id;
        private $name;
        private $header_image;
        private $preview;
        private $preview_image;
        private $content;
        private $content_image;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id             Int id de la asignatura
         * @param name           String nombre de la asignatura
         * @param header_image   String imagen de cabecera de la asignatura
         * @param preview        String contenido de previsualización de la asignatura
         * @param preview_image  String contenido de previsualización de la asignatura en formato imagen
         * @param content        String contenido de la asignatura
         * @param content_image  String contenido de la asignatura en formato imagen
        */
        function __construct($id, $name, $header_image, $preview, $preview_image, $content, $content_image) {
            $this->id            = $id;
            $this->name          = $name;
            $this->header_image  = $header_image;
            $this->preview       = $preview;
            $this->preview_image = $preview_image;
            $this->content       = $content;
            $this->content_image = $content_image;
        }

        /*
         * Método de consulta del atributo id.
         * 
         * @return Devuelve el id de la asignatura
        */
        function getId() {
            return $this->id;
        }

        /*
         * Método de consulta del atributo name.
         * 
         * @return Devuelve el nombre de la asignatura
        */
        function getName() {
            return $this->name;
        }

        /*
         * Método de consulta del atributo header_image.
         * 
         * @return Devuelve la imagen de cabecera de la asignatura
        */
        function getHeaderImage() {
            return $this->header_image;
        }

        /*
         * Método de consulta del atributo preview.
         * 
         * @return Devuelve el contenido de previsualización de la asignatura
        */
        function getPreview() {
            return $this->preview;
        }

        /*
         * Método de consulta del atributo preview_image.
         * 
         * @return Devuelve el contenido de previsualización de la asignatura en formato imagen
        */
        function getPreviewImage() {
            return $this->preview_image;
        }

        /*
         * Método de consulta del atributo content.
         * 
         * @return Devuelve el contenido de la asignatura
        */
        function getContent() {
            return $this->content;
        }

        /*
         * Método de consulta del atributo content_image.
         * 
         * @return Devuelve el contenido de la asignatura en formato imagen
        */
        function getContentImage() {
            return $this->content_image;
        }
    }
?>