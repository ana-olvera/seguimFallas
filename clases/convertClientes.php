<?php
    require_once "../config/Modelo.php";
    class convertClientes extends Modelo
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function get_users()
        {
            $result = $this->_db->query('SELECT * FROM solicitudes');
            $users = $result->fetch_all(MYSQLI_ASSOC);
            return $users;
        }
    }

?>