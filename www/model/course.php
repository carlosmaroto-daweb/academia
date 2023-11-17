<?php
    /* 
     * Esta clase forma la estructura de datos que puede tener una asignatura,
     * es utilizada para instanciar asignaturas y poder manejar sus datos.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class Course {

        // Atributos
        private $id;
        private $name;
        private $id_subject;
        private $studies;
        private $location;
        private $type;
        private $start_date;
        private $end_date;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id             Int id de la asignatura
         * @param name           String nombre de la asignatura
         * @param id_subject   String imagen de cabecera de la asignatura
         * @param studies        String contenido de previsualización de la asignatura
         * @param location  String contenido de previsualización de la asignatura en formato imagen
         * @param type        String contenido de la asignatura
         * @param start_date  String contenido de la asignatura en formato imagen
         * @param end_date  String contenido de la asignatura en formato imagen
        */
        function __construct($id, $name, $id_subject, $studies, $location, $type, $start_date, $end_date) {
            $this->id            = $id;
            $this->name          = $name;
            $this->id_subject  = $id_subject;
            $this->studies       = $studies;
            $this->location = $location;
            $this->type       = $type;
            $this->start_date = $start_date;
            $this->end_date = $end_date;
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
        function getAssignedSubject() {
            return $this->id_subject;
        }

        /*
         * Método de consulta del atributo studies.
         * 
         * @return Devuelve el contenido de previsualización de la asignatura
        */
        function getStudies() {
            return $this->studies;
        }

        /*
         * Método de consulta del atributo location.
         * 
         * @return Devuelve el contenido de previsualización de la asignatura en formato imagen
        */
        function getLocation() {
            return $this->location;
        }

        /*
         * Método de consulta del atributo type.
         * 
         * @return Devuelve el contenido de la asignatura
        */
        function getType() {
            return $this->type;
        }

        /*
         * Método de consulta del atributo start_date.
         * 
         * @return Devuelve el contenido de la asignatura en formato imagen
        */
        function getStartDate() {
            return $this->start_date;
        }

        /*
         * Método de consulta del atributo end_date.
         * 
         * @return Devuelve el contenido de la asignatura en formato imagen
        */
        function getEndDate() {
            return $this->end_date;
        }
    }
?>