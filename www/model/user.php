<?php
    /* 
    * Esta clase forma la estructura de datos que puede tener un usuario,
    * es utilizada para instanciar usuarios y poder manejar sus datos.
    * 
    * @author: Carlos Maroto
    * @version: v1.0.0 Carlos Maroto
    */
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

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id            Int id del usuario
         * @param email         String email del usuario
         * @param password      String password del usuario
         * @param name          String name del usuario
         * @param last_name     String apellido del usuario
         * @param phone_number  String teléfono del usuario
         * @param dni           String dni del usuario
         * @param type          String tipo del usuario
        */
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

        /*
        * Método de consulta del atributo id.
        * 
        * @return Devuelve el id del usuario
        */
        function getId() {
            return $this->id;
        }

        /*
        * Método de consulta del atributo email.
        * 
        * @return Devuelve el correo del usuario
        */
        function getEmail() {
            return $this->email;
        }

        /*
        * Método de consulta del atributo password.
        * 
        * @return Devuelve la contraseña del usuario
        */
        function getPassword() {
            return $this->password;
        }

        /*
        * Método de consulta del atributo name.
        * 
        * @return Devuelve el nombre del usuario
        */
        function getName() {
            return $this->name;
        }

        /*
        * Método de consulta del atributo last_name.
        * 
        * @return Devuelve el apellido del usuario
        */
        function getLastName() {
            return $this->last_name;
        }

        /*
        * Método de consulta del atributo phone_number.
        * 
        * @return Devuelve el número de teléfono del usuario
        */
        function getPhoneNumber() {
            return $this->phone_number;
        }

        /*
        * Método de consulta del atributo dni.
        * 
        * @return Devuelve el dni del usuario
        */
        function getDni() {
            return $this->dni;
        }

        /*
        * Método de consulta del atributo type.
        * 
        * @return Devuelve el tipo del usuario
        */
        function getType() {
            return $this->type;
        }
    }
?>