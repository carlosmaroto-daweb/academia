<?php
    class User {

        // Atributos
        private $id;
        private $email;
        private $password;
        private $name;
        private $last_name;
        private $phone_number;
        private $dni;
        private $type;

        function __construct($id, $email, $password, $name, $last_name, $phone_number, $dni, $type) {
            $this->id           = $id;
            $this->email        = $email;
            $this->password     = $password;
            $this->name         = $name;
            $this->last_name    = $last_name;
            $this->phone_number = $phone_number;
            $this->dni          = $dni;
            $this->type         = $type;
        }

        function getId() {
            return $this->id;
        }

        function getEmail() {
            return $this->email;
        }

        function getPassword() {
            return $this->password;
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

        function getDni() {
            return $this->dni;
        }

        function getType() {
            return $this->type;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPassword($password) {
            $this->password = $password;
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

        function setDni($dni) {
            $this->dni = $dni;
        }

        function setType($type) {
            $this->type = $type;
        }
    }
?>