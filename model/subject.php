<?php
    class Subject {

        // Atributos
        private $id;
        private $name;
        private $studies;
        private $lessons;
        private $data;

        function __construct($id, $name, $studies, $lessons, $data) {
            $this->id      = $id;
            $this->name    = $name;
            $this->studies = $studies;
            $this->lessons = $lessons;
            $this->data    = $data;
        }

        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getStudies() {
            return $this->studies;
        }

        function getLessons() {
            return $this->lessons;
        }

        function getData() {
            return $this->data;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setStudies($studies) {
            $this->studies = $studies;
        }

        function setLessons($lessons) {
            $this->lessons = $lessons;
        }

        function setData($data) {
            $this->data = $data;
        }
    }
?>