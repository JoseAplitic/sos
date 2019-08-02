<?php
	if($peticionAjax){
		require_once "../modelos/cuentaModelo.php";
	}else{
		require_once "./modelos/cuentaModelo.php";
	}

	class cuentaControlador extends cuentaModelo
	{

        public function cargar_cuenta_personal($id)
        {
            $datos = cuentaModelo::cargar_cuenta_personal($id);
            return $datos;
        }
        
        public function actualizar_cuenta_personal()
        {
            $datos = cuentaModelo::actualizar_cuenta_personal();
            if($datos->rowCount()>0)
            {
                echo "Se han actualizado los datos correctamente.";
            }
            else
            {
                echo "No se han podido actualizar los datos, vuelve a intentarlo.";
            }
        }

        public function cargar_cuenta_empresarial($id)
        {
            $datos = cuentaModelo::cargar_cuenta_empresarial($id);
            return $datos;
        }
        
        public function actualizar_cuenta_empresarial()
        {
            $datos = cuentaModelo::actualizar_cuenta_empresarial();
            if($datos->rowCount()>0)
            {
                echo "Se han actualizado los datos correctamente.";
            }
            else
            {
                echo "No se han podido actualizar los datos, vuelve a intentarlo.";
            }
        }
        
    }