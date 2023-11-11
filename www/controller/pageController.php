<?php
  /* 
   * Esta clase define rutas como inicio, política de privacidad, política de 
   * cookies, aviso legal y contacto para cambiar la vista del usuario.
   * 
   * @author: Carlos Maroto
   * @version: v1.0.0 Carlos Maroto
  */
  class pageController {

    // Atributos
    private $view;

    /*
     * Método que asigna el valor de la vista a contact.
    */
    function contact() {
      $this->view = 'contact';
    }

    /*
     * Método que asigna el valor de la vista a cookiesPolicy.
    */
    function cookiesPolicy() {
      $this->view = 'cookiesPolicy';
    }

    /*
     * Método que asigna el valor de la vista a disclaimer.
    */
    function disclaimer() {
      $this->view = 'disclaimer';
    }

    /*
     * Método de consulta que devuelve la variable privada view que contiene
     * el nombre de la vista que va a ser cargada a continuación.
     * 
     * @return Nombre de la vista a ser cargada.
    */
    function getView() {
      return $this->view;
    }

    /*
     * Método que asigna el valor de la vista a index.
    */
    function index() {
      $this->view = 'index';
    }

    /*
     * Método que asigna el valor de la vista a privacyPolicy.
    */
    function privacyPolicy() {
      $this->view = 'privacyPolicy';
    }
  }
?>