<?php
    require_once("config/modelo.php");
    class usuariosModelo extends Modelo
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function get_allUsers()
        {
            $result = $this->_db->query('SELECT id_usuarios, id_persona, nombre_usuario, password_usuario FROM usuarios;');
            while ($row = $result->fetch_assoc())  {
                $idUsuario=$row['id_usuarios'];
                $idPersona=$row['id_persona'];
                $nombreUsuario=$row['nombre_usuario'];
                $pswUsuario=$row['password_usuario'];
                $users[] = array('idUsuario'=> $idUsuario, 'idPersona'=> $idPersona, 'nombreUsuario'=> $nombreUsuario, 'pswUsuario'=> $pswUsuario);

            }
            return $users;
        }
        public function get_user($usuario, $password)
        {
            $result = $this->_db->query("SELECT u.id_usuarios, u.id_persona, u.nombre_usuario, u.password_usuario, concat(p.nombre_personas,' ',p.apPat_personas,' ',p.apMat_personas) as nombre, p.area_personas FROM usuarios u, personas p WHERE u.nombre_usuario='".$usuario."' AND u.password_usuario='".$password."' AND u.id_persona = p.id_personas;");
            if(count($result)==1)
            {
                while ($row = $result->fetch_assoc())  {
                $nombreUsuario=$row['nombre'];
                $areaPersona=$row['area_personas'];
                $user[] = array('bandLogin'=> 1, 'areaPersona'=> $areaPersona, 'nombreUsuario'=> $nombreUsuario);
            }
                return $user;
            }else{
                return $user=0;
            }
        }
    }

?>