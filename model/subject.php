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
        private $studies;
        private $lessons;
        private $data;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id            Int id de la asignatura
         * @param name          String nombre de la asignatura
         * @param studies       JSON estudios de la asignatura
         * @param lessons       JSON temas de la asignatura
         * @param data          JSON datos de la asignatura
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
        * Método de consulta del atributo studies.
        * 
        * @return Devuelve los estudios de la asignatura
        */
        function getStudies() {
            return $this->studies;
        }

        /*
        * Método de consulta del atributo lessons.
        * 
        * @return Devuelve las temas de la asignatura
        */
        function getLessons() {
            return $this->lessons;
        }

        /*
        * Método de consulta del atributo data.
        * 
        * @return Devuelve los datos de la asignatura
        */
        function getData() {
            return $this->data;
        }
    }
?>