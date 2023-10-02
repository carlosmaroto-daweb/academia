<?php
    require_once 'model/db.php';
    require_once 'model/subject.php';
    require_once 'model/user.php';

    class CourseManagement {
        
        private $db;
        private $asignature;
        private $users;

        function __construct() {
            $this->db = new Db();
        }
    }
?>