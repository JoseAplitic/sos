<style>
    body{background-color:#f5f5f5;}
    .contenido{background-color:#fff;padding: 20px;}
    .breadcumb{color:#404040;font-size: 12pt;font-weight: bold;margin-bottom:20px;}
    .breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;}
    .breadcumb a{text-decoration: none;color: #404040;}
    .breadcumb a:hover{color: #ff110b;}
    .breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
    .breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
    .breadcumb ol li:last-child:after{display: none;}
    .contenido .wrap{display:flex;flex-flow:row wrap;align-items: stretch;}
    .contenido .wrap .column-4{width:25%;padding:20px;}
    .contenido .wrap .column-4.col-num-1, .contenido .wrap .column-4.col-num-3{background-color:#e9e9e9;}
    .contenido .wrap .column-4.col-num-2, .contenido .wrap .column-4.col-num-4{background-color:#f4f4f4;}
    .contenido h3{font-size:24pt;line-height:1.2;margin-bottom:30px;}
    .contenido h4{font-size:14pt;line-height:1.2;margin-bottom:5px;}
    .contenido p{font-size:12pt;line-height:1.2;margin-bottom:30px;}
    .contenido img{width: 100%;margin-bottom:20px;}
</style>

<div class="contenido boxed-width">
    <div class="breadcumb full-width">
		<div class="content boxed-width">
			<ol class="breadcrumb">
				<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
				<li class="active">Formas de Pago</li>
			</ol>
		</div>
	</div>
    <div class="titulo">
        <h3>Formas de Pago</h3>
    </div>
    <div class="wrap">
        <div class="column-4 col-num-1">
            <h4>TARJETA DE CRÉDITO</h4>
            <p>Aceptamos las principales tarjetas de crédito para que realizes el pago de tus compras en línea.</p>
            <img src="<?=SERVERURL?>/vistas/assets/img/tarjeta-credito.jpg" alt="Pago con tarjeta de credito visa o mastercard">
        </div>
        <div class="column-4 col-num-2">
            <h4>VISA EN CUOTAS O CUOTAS CREDOMATIC</h4>
            <p>Realizamos tus compras en 2, 3, 6, 10 y 12 cuotas precio de contado sin ningún recargo adicional con tus tarjetas Visa o Mastercard.</p>
            <img src="<?=SERVERURL?>/vistas/assets/img/visacuotas.jpg" alt="Pago con visacuotas">
        </div>
        <div class="column-4 col-num-3">
            <h4>CHEQUE</h4>
            <img src="<?=SERVERURL?>/vistas/assets/img/cheque.jpg" alt="Pago con cheque">
            <p>
                <b>Cheque</b><br>
                Debemos de esperar la confirmación de tus fondos para poder despachar tu orden.<br><br>
                <b>Cheque Previsado</b><br>
                Aplican recargos extras por el uso de este servicio.<br><br>
                <b>Cheque de Caja</b>
            </p>
        </div>
        <div class="column-4 col-num-4">
            <h4>EFECTIVO</h4>
            <img src="<?=SERVERURL?>/vistas/assets/img/efectivo.jpg" alt="Pago con efectivo">
            <p>Realizamos tus compras en efectivo al realizar un depósito en cualquier agencia bancaría. Al final de tu orden tendras los datos para hacer el depósito y enviarnos confirmación.</p>
        </div>
    </div>
</div>