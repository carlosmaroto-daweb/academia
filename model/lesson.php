<?php
    /* 
    * Esta clase forma la estructura de datos que puede tener una lección,
    * es utilizada para instanciar lecciones y poder manejar sus datos.
    * 
    * @author: Carlos Maroto
    * @version: v1.0.0 Carlos Maroto
    */
    class Lesson {

        // Atributos
        private $id;
        private $name;
        private $files;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id     Int id de la lección
         * @param name   String nombre de la lección
         * @param files  String archivos de la lección
        */
        function __construct($id, $name, $files) {
            $this->id    = $id;
            $this->name  = $name;
            $this->files = $files;
        }

        /*
        * Método de consulta del atributo id.
        * 
        * @return Devuelve el id de la lección
        */
        function getId() {
            return $this->id;
        }

        /*
        * Método de consulta del atributo name.
        * 
        * @return Devuelve el nombre de la lección
        */
        function getName() {
            return $this->name;
        }

        /*
        * Método de consulta del atributo header_image.
        * 
        * @return Devuelve los archivos de la lección
        */
        function getFiles() {
            return $this->files;
        }
    }
?>