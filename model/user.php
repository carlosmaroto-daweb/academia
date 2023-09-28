<?php
    class User {

        private $id;
        private $dni;
        private $name;
        private $last_name;
        private $phone_number;
        private $email;
        private $type;

        function __construct($id, $dni, $name, $last_name, $phone_number, $email, $type) {
            $this->id = $id;
            $this->dni = $dni;
            $this->name = $name;
            $this->last_name = $last_name;
            $this->phone_number = $phone_number;
            $this->email = $email;
            $this->type = $type;
        }

        function getId() {
            return $this->id;
        }

        function getDni() {
            return $this->dni;
        }

        function getName() {
            return $this->name;
        }

        function getLastName() {
            return $this->last_name;
        }

        function getPhoneNumber() {
            return $this->phone_number;
        }

        function getEmail() {
            return $this->email;
        }

        function getType() {
            return $this->type;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setDni($dni) {
            $this->dni = $dni;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setLastName($last_name) {
            $this->last_name = $last_name;
        }

        function setPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setType($type) {
            $this->type = $type;
        }
    }
?>