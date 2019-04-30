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

	protected function iniciar_sesion_persona_modelo($datos)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM clientes WHERE correo=:Correo AND clave=:Clave");
		$sql->bindParam(':Correo',$datos['Correo']);
		$sql->bindParam(':Clave',$datos['Clave']);
		$sql->execute();
		return $sql;
	}

	protected function iniciar_sesion_empresa_modelo($datos)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM empresas WHERE correo=:Correo AND clave=:Clave");
		$sql->bindParam(':Correo',$datos['Correo']);
		$sql->bindParam(':Clave',$datos['Clave']);
		$sql->execute();
		return $sql;
	}
}