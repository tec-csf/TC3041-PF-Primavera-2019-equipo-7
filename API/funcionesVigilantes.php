<?php
include_once('config.php');
include_once('administradorBD.php');

class Vigilante{
	
	public function mostrarInfo($correo)
	{
		echo 'Correo: ' . $correo  . '!<br>';
		return;
	}

	private function obtieneInfo($correo)
	{
		$sql = "SELECT * FROM VIGILANTES WHERE correo = '". $correo."' ;";
		$db = new administradorBD();
		return $db->executeQuery($sql);	
	}

	public function eliminaVigilante($correo)
	{
		$result = $this->obtieneJSONInfo($correo);
		$json = json_decode($result,true);

		if($json[0]['Codigo']=="0")
                {
			$resultFin[] = array('Codigo' => '0','Mensaje' => 'Usuario no encontrado');
                        return json_encode($resultFin);
                }


		$sql = "DELETE FROM VIGILANTES WHERE correo = '".$correo."';";
		$db = new administradorBD();
                $db->executeQuery($sql);
		
		$resultFin[] = array('Codigo' => '1','Mensaje' => 'Usuario eliminado correctamente');
                return json_encode($resultFin);

	}

	public function aniadeVigilante($nombre, $apellidos, $correo, $contrasenia, $permiso)
	{
		$result = $this->obtieneJSONInfo($correo);
		
                $json = json_decode($result,true);

                if($json[0]['Codigo']=="1")
                {
                        $resultFin[] = array('Codigo' => '0','Mensaje' => 'El correo ya está en uso');
                        return json_encode($resultFin);
                }

		$sql = "INSERT INTO VIGILANTES(nombre, apellidos, correo, contrasenia, permiso) VALUES ('".$nombre."', '".$apellidos."', '".$correo."', '".$contrasenia."', ". $permiso.");";
		$db = new administradorBD();
		$db->executeQuery($sql);
		$resultFin[] = array('Codigo' => '1','Mensaje' => 'Usuario añadido correctamente');
                return json_encode($resultFin);
	}

	public function actualizaVigilanteQueryDifCor($correoOrig, $correoNuevo, $nombre,$apellidos,$permiso)
        {
                $sql = "UPDATE VIGILANTES SET nombre = '".$nombre."', apellidos = '".$apellidos."', correo = '".$correoNuevo."', permiso =".$permiso." WHERE correo='".$correoOrig."';";

		$db = new administradorBD();

                $db->executeQuery($sql);
		$resultFin[] = array('Codigo' => '1','Mensaje' => 'El usuario se actualizó correctamente');
                return json_encode($resultFin);


        }

	public function actualizaVigilanteQueryMisCor($correoOrig, $nombre,$apellidos,$permiso)
        {
                $sql = "UPDATE VIGILANTES SET nombre = '".$nombre."', apellidos = '".$apellidos."', permiso =".$permiso." WHERE correo='".$correoOrig."';";

                $db = new administradorBD();

                $db->executeQuery($sql);
		
		$resultFin[] = array('Codigo' => '1','Mensaje' => 'El usuario se actualizó correctamente');
                return json_encode($resultFin);

        }


	 public function actualizaVigilanteCompleto($correoOrig, $correoNuevo, $nombre,$apellidos,$permiso)
        {
		$result = $this->obtieneJSONInfo($correoNuevo);
		$result2 = $this->obtieneJSONInfo($correoOrig);
		$json = json_decode($result,true);	
		$json2 = json_decode($result2,true);

		if($json2[0]['Codigo']=="0")
                {
                        #Se cambiará de correo a uno nuevo que no existe
                         $resultFin[] = array('Codigo' => '01','Mensaje' => 'El usuario a actualizar no existe');
                         return json_encode($resultFin);
                }		


		if($json[0]['Codigo']=="0") 
		{
			#Se cambiará de correo a uno nuevo que no existe
			return $this->actualizaVigilanteQueryDifCor($correoOrig, $correoNuevo, $nombre, $apellidos,$permiso);
		}
		else
		{
			if($correoNuevo==$correoOrig)
			{
				#El correo que se quiere editar es el mismo que el nuevo
				return $this->actualizaVigilanteQueryMisCor($correoOrig, $nombre, $apellidos, $permiso);
			}
			else
			{
				$resultFin[] = array('Codigo' => '02','Mensaje' => 'El nuevo correo ya está en uso');
                        	return json_encode($resultFin);
			}

		}

        }


	
	public function obtieneJSONInfo($correo)
	{
		$result = $this->obtieneInfo($correo);
		$json = array();
		
		if(mysqli_num_rows($result))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$json[] = $row;
			}
			$codigo[] = array('Codigo' => '1','Mensaje' => 'Bienvenido');
			$resultFin = array_merge($codigo,$json);
		}
		else
		{
			$resultFin[] = array('Codigo' => '0','Mensaje' => 'Usuario no encontrado');
		}
		return json_encode($resultFin);
	}

	public function obtieneJSONInfoArray($correo)
        {
                $result = $this->obtieneInfo($correo);
                $json = array();
                while($row = mysqli_fetch_assoc($result))
                {
                        $json['id'] = $row['vigilante_id'];
                        $json['nombre'] = $row['nombre'];
                        $json['apellidos'] = $row['apellidos'];
                        $json['correo'] = $row['correo'];
                        $json['contrasenia'] = $row['contrasenia'];
                        $json['permiso'] = $row['permiso'];
                        $data[] = $json;
                }
                return json_encode($data);
        }
}

?>
