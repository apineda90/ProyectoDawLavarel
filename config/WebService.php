<?php

namespace Illuminate\Support\Facades\WebService;
use SoapClient;

class WebService {

        public $soapclient;

        function __construct() {
                $this->soapclient = new SoapClient('http://ws.espol.edu.ec/saac/wsandroid.asmx?wsdl');
        }

        function getAutentication($usuario,$password)
        {

                $response = $this->soapclient->autenticacion(array('authUser'=>$usuario,'authContrasenia'=>$password));

                $d = get_object_vars($response);

                /* Se retorna la matricula del estudiante (String). */
                if ($d['autenticacionResult'] ==1)
                        return 1;
                else
                        return -1;
        }

        function consultarCodigo($usuario)
        {


                $response = $this->soapclient->wsConsultaCodigoEstudiante(array('user'=>$usuario));

                $d = get_object_vars($response);


                $a=get_object_vars(($d['wsConsultaCodigoEstudianteResult']));
                $xml=simplexml_load_string($a['any']);

                $xml1 = $xml->NewDataSet[0];

                if($xml1 != null)
                {
                    $xml2 = $xml1->MATRICULA[0];
                    $xml3 = $xml2->COD_ESTUDIANTE[0]->__toString();
                    $identificacion_alfa = $xml->NewDataSet[0]->MATRICULA[0]->COD_ESTUDIANTE[0]->__toString();
                    return $xml3;
                }

                return -1;
        }

        /* El codigo se lo debe obtener con la funcion anterior. */
        function getDatosUser($codigo)
        {
                $response = $this->soapclient->wsInfoEstudiante(array('codigoEstudiante'=>$codigo));

                $d = get_object_vars($response);
                $a=get_object_vars($d['wsInfoEstudianteResult']);
                $xml=simplexml_load_string($a['any']) or die("Error: Cannot create object");

		$identificacion_alfa = $xml->NewDataSet[0]->INFOESTUDIANTE[0]->IDENTIFICACION[0];
		$identificacion = ((string)$identificacion_alfa);
		$nombre_alfa = $xml->NewDataSet[0]->INFOESTUDIANTE[0]->NOMBRECOMPLETO[0];
		$nombre = (string)$nombre_alfa;
		return array('nombre'=>$nombre,'identificacion'=>$identificacion);

        }
}

?>
