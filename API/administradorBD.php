<?php
include_once('config.php');

class administradorBD{

        public function executeQuery($sql){
                $conecta = mysqli_connect(config::obtieneServidorBD(),config::obtieneUsuarioBD(),config::obtienePasswordBD());
                if(!$conecta){
			echo 'ERROR conexion';
                        die('No puedo conectarme:' .mysqli_connect_error());
                }

                mysqli_select_db($conecta,config::obtieneNombreBD());

                $result = mysqli_query($conecta,$sql);
                mysqli_close($conecta);
                return $result;
        }
}

?>

