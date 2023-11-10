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
        private $header_image;
        private $preview;
        private $content;

        /*
         * Constructor que inicializa todos los atributos a los pasados como argumento.
         * 
         * @param id             Int id del módulo
         * @param name           String nombre del módulo
         * @param header_image   String imagen de cabecera del módulo
         * @param preview        String contenido de previsualización del módulo
         * @param content        String contenido del módulo
        */
        function __construct($id, $name, $header_image, $preview, $content) {
            $this->id           = $id;
            $this->name         = $name;
            $this->header_image = $header_image;
            $this->preview      = $preview;
            $this->content      = $content;
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
         * Método de consulta del atributo header_image.
         * 
         * @return Devuelve la imagen de cabecera del módulo
        */
        function getHeaderImage() {
            return $this->header_image;
        }

        /*
         * Método de consulta del atributo preview.
         * 
         * @return Devuelve el contenido de previsualización del módulo
        */
        function getPreview() {
            return $this->preview;
        }

        /*
         * Método de consulta del atributo content.
         * 
         * @return Devuelve el contenido del módulo
        */
        function getContent() {
            return $this->content;
        }
    }
?>