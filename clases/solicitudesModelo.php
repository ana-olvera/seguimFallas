<?php
    require_once("../config/modelo.php");
    class solicitudesModelo extends Modelo
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function get_solicitudes()
        {
            $result = $this->_db->query('select s.id_solicitud,DATE_FORMAT(s.fecha_solicitud,"%d-%m-%Y") AS fecha_solicitud ,concat(p.nombre_personas," ",p.apPat_personas," ",p.apMat_personas) as nombre,a.descripcion_catAplicativo,e.descripcion_catestatus
                                         from solicitudes s, personas p, cat_aplicativos a, cat_estatus e
                                         where s.solicitante_solicitud = p.id_personas and a.id_catAplicativo = s.aplicativo_solicitud and e.id_catestatus = s.estatus_solicitud
                                         order by s.id_solicitud;');
            $hoy = date("Y-m-d");
            $solicitudes = array();
            while ($row = $result->fetch_assoc())  {
                $folio=$row['id_solicitud'];
                $fechaSol=$row['fecha_solicitud'];
                $solicitante=$row['nombre'];
                $aplicativo=$row['descripcion_catAplicativo'];
                $segundos=strtotime($hoy)- strtotime($row['fecha_solicitud']);
                $diasTransc= intval($segundos/60/60/24);
                $estatus=$row['descripcion_catestatus'];
                $solicitudes[] = array('folio'=> $folio, 'fechaSol'=> $fechaSol, 'solicitante'=> $solicitante, 'aplicativo'=> $aplicativo, 'diasTransc'=> $diasTransc , 'estatus'=> $estatus);

            }
            return $solicitudes;
        }
    }

?>