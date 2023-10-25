<?php
    /* 
    * Esta clase forma la estructura de datos que puede tener un curso,
    * es utilizada para instanciar cursos y poder manejar sus datos.
    * 
    * @author: Carlos Maroto
    * @version: v1.0.0 Carlos Maroto
    */
    class Course {

        // Atributos
        private $id;
        private $name;
        private $studies;
        private $header_image;
        private $preview;
        private $content;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id             Int id del curso
         * @param name           String nombre del curso
         * @param studies        JSON estudios del curso
         * @param header_image   String imagen de cabecera del curso
         * @param preview        String contenido de previsualización del curso
         * @param content        String contenido del curso
        */
        function __construct($id, $name, $studies, $header_image, $preview, $content) {
            $this->id           = $id;
            $this->name         = $name;
            $this->studies      = $studies;
            $this->header_image = $header_image;
            $this->preview      = $preview;
            $this->content      = $content;
        }

        /*
        * Método de consulta del atributo id.
        * 
        * @return Devuelve el id del curso
        */
        function getId() {
            return $this->id;
        }

        /*
        * Método de consulta del atributo name.
        * 
        * @return Devuelve el nombre del curso
        */
        function getName() {
            return $this->name;
        }

        /*
        * Método de consulta del atributo studies.
        * 
        * @return Devuelve los estudios del curso
        */
        function getStudies() {
            return $this->studies;
        }

        /*
        * Método de consulta del atributo header_image.
        * 
        * @return Devuelve la imagen de cabecera del curso
        */
        function getHeaderImage() {
            return $this->header_image;
        }

        /*
        * Método de consulta del atributo preview.
        * 
        * @return Devuelve el contenido de previsualización del curso
        */
        function getPreview() {
            return $this->preview;
        }

        /*
        * Método de consulta del atributo content.
        * 
        * @return Devuelve el contenido del curso
        */
        function getContent() {
            return $this->content;
        }
    }
?>