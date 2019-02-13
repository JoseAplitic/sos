<?php
if($peticionAjax)
{
	require_once "../core/mainModel.php";
}
else
{
	require_once "./core/mainModel.php";
}

class loginModelo extends mainModel
{

	protected function iniciar_sesion_modelo($datos)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM usuarios WHERE (usuario=:Usuario OR correo=:Usuario) AND clave=:Clave");
		$sql->bindParam(':Usuario',$datos['Usuario']);
		$sql->bindParam(':Clave',$datos['Clave']);
		$sql->execute();
		return $sql;
	}
}