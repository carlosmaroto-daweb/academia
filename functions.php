<?php
    /*
     * Método que comprueba si el usuario se ha logeado y si es de tipo administrador.
     * 
     * @return Devuelve true si el usuario se ha logeado y si es de tipo administrador, en caso contrario false.
    */
    function isAdmin() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'admin';
    }

    /*
    * Método que comprueba si el usuario se ha logeado y si es de tipo secretaría.
    * 
    * @return Devuelve true si el usuario se ha logeado y si es de tipo secretaría, en caso contrario false.
    */
    function isSecretary() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'secretary';
    }

    /*
    * Método que comprueba si el usuario se ha logeado y si es de tipo estudiante.
    * 
    * @return Devuelve true si el usuario se ha logeado y si es de tipo estudiante, en caso contrario false.
    */
    function isStudent() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'student';
    }

    /*
    * Método que comprueba si el usuario se ha logeado y si es de tipo profesor.
    * 
    * @return Devuelve true si el usuario se ha logeado y si es de tipo profesor, en caso contrario false.
    */
    function isTeacher() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'teacher';
    }
?>