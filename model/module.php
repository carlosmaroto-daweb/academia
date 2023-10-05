<?php
    /* 
    * Esta clase forma la estructura de datos que puede tener un módulo,
    * es utilizada para instanciar módulos y poder manejar sus datos.
    * 
    * @author: Carlos Maroto
    * @version: v1.0.0 Carlos Maroto
    */
    class Module {

        // Atributos
        private $id;
        private $name;
        private $studies;
        private $lessons;
        private $data;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id            Int id del módulo
         * @param name          String nombre del módulo
         * @param studies       JSON estudios del módulo
         * @param lessons       JSON temas del módulo
         * @param data          JSON datos del módulo
        */
        function __construct($id, $name, $studies, $lessons, $data) {
            $this->id      = $id;
            $this->name    = $name;
            $this->studies = $studies;
            $this->lessons = $lessons;
            $this->data    = $data;
        }

        /*
        * Método de consulta del atributo id.
        * 
        * @return Devuelve el id del módulo
        */
        function getId() {
            return $this->id;
        }

        /*
        * Método de consulta del atributo name.
        * 
        * @return Devuelve el nombre del módulo
        */
        function getName() {
            return $this->name;
        }

        /*
        * Método de consulta del atributo studies.
        * 
        * @return Devuelve los estudios del módulo
        */
        function getStudies() {
            return $this->studies;
        }

        /*
        * Método de consulta del atributo lessons.
        * 
        * @return Devuelve las temas del módulo
        */
        function getLessons() {
            return $this->lessons;
        }

        /*
        * Método de consulta del atributo data.
        * 
        * @return Devuelve los datos del módulo
        */
        function getData() {
            return $this->data;
        }
    }
?>