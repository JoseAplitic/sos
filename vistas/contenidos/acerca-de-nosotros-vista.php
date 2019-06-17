<style>
    body{background-color:#f5f5f5;}
    .contenido{background-color:#fff;}
    .breadcumb{color:#404040;font-size: 12pt;font-weight: bold;padding:20px;}
    .breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;}
    .breadcumb a{text-decoration: none;color: #404040;}
    .breadcumb a:hover{color: #ff110b;}
    .breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
    .breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
    .breadcumb ol li:last-child:after{display: none;}
    .contenido .wrap{display:flex;flex-flow:row wrap;align-items: stretch;}
    .contenido .wrap .column-2{width:50%;padding:20px;display:flex;flex-flow:column nowrap;justify-content: center;}
    .contenido .wrap .col-num-1 .bloque{margin-bottom:20px;border-bottom: 1px solid #9d9d9d;}
    .contenido .wrap .col-num-2{background:#eb100a;color:#000;text-align:center;color:#fff;}
    .contenido .wrap .col-num-2 .bloque{padding: 0px 80px;}
    .contenido .wrap .col-num-2 .bloque .icono{margin-bottom: 20px;}
    .contenido .wrap .col-num-2 .bloque h4{margin-bottom:20px;}
    .contenido .wrap .col-num-2 .bloque .icono img{width:100px;}
    .divisor{border-bottom:1px solid #fff;margin:20px 0px 40px 0px;}
    .contenido h3{font-size:24pt;line-height:1.2;margin-bottom:30px;}
    .contenido h4{font-size:14pt;line-height:1.2;margin-bottom:5px;}
    .contenido p{font-size:12pt;line-height:1.2;margin-bottom:30px;}
</style>

<div class="contenido boxed-width">
    <div class="breadcumb full-width">
		<div class="content boxed-width">
			<ol class="breadcrumb">
				<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
				<li class="active">Acerca de Nosotros</li>
			</ol>
		</div>
	</div>
    <div class="wrap">
        <div class="column-2 col-num-1">
            <div class="bloque">
                <h3>Quién es Smart Office Solutions</h3>
                <p>Es la empresa tecnológica mas vanguardista de Guatemala, dedicada a la creación y comercialización de soluciones tecnológicas a la medida de las necesidades de los clientes. Es la empresa líder en gestión documental en Guatemala y una de las empresas con mayor crecimiento del mercado.</p>
            </div>
            <div class="bloque">
                <h3>Why Smart Office Solutions?</h3>
                <p>Nos debemos a la búsqueda de diseñar soluciones para nuestro clientes, creemos en que el beneficio monetario es una consecuencias de un trabajo bien hecho. Nuestro objetivo es brindar servicios de calidad y afianzar clientes y así obtener promoción en base buenas referencias.<br><br>- Maximizar la eficiencia de los procesos de las emrpesas.<br><br>- Minimizar y evidenciar los costos ocultos en las operaciones organizacionales.<br><br>- Servir con compromiso y espíritu de servicio.</p>
            </div>
            <div class="bloque">
                <h3>How Smart Office Solutions?</h3>
                <p>Contamos con la experiencia de un equipo multidisciplinario conformado por profesionales y expertos en soluciones tecnólogicas. Además del apoyo de las marcas, las cuales representamos y que a través de sus consultores podemos realizar una asesoría asertiva para encontrar la solución a las necesidades de nuestros clientes. Todo esto utilizando herramientas y sistemas que nos ayudan a integrar nuestro conocimiento y los beneficios de la red de nuestros proveedores para generar la propuesta de valor de Smart Office Solutions.</p>
            </div>
            <div class="bloque">
                <h3>What Smart Office Solutions?</h3>
                <p>Somos proveedores de diferentes soluciones integradas por hardware y software de las marcas que representamos entre las cuales se encuentran:<br><br><b>Hardware:</b> Dell, Dell Enterprice, HP, HP Enterprice, Lenovo, Logitec, APC, Seagate, Cisco, entre otros.<br><br><b>Software:</b> Docuware, Microsoft, Odoo, entre otros.</p>
            </div>
        </div>
        <div class="column-2 col-num-2">
            <div class="bloque">
                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/acerca-nosotros-img-3.jpg" alt="Soluciones que Funcionan"></div>
                <div class="descripcion">
                    <h4>Soluciones que Funcionan</h4>
                    <p>A través de nuestro servicio personalizado y la herramienta de trabajo nos encargamos de encontrar soluciones tecnológicas que se acoplen a tus necesidades, buscamos en el mar de oferta tecnológico y basado en tus preferencias te ofrecemos opciones que te ayuden en lo que más necesitas.</p>
                </div>
            </div>
            <div class="divisor"></div>
            <div class="bloque">
                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/acerca-nosotros-img-2.jpg" alt="Mejores Precios del Mercado"></div>
                <div class="descripcion">
                    <h4>Mejores Precios del Mercado</h4>
                    <p>Trabajamos y negociamos con nuestros proveedores para ofrecerte siempre los mejores precios por tus productos. Buscamos que te sientas satisfecho con cada centavo invertido.</p>
                </div>
            </div>
            <div class="divisor"></div>
            <div class="bloque">
                <div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/acerca-nosotros-img-1.jpg" alt="Asistencia Personalizada"></div>
                <div class="descripcion">
                    <h4>Asistencia Personalizada</h4>
                    <p>Contamos con un equipo de trabajo altamente calificado y profesional que te apoyarán durante todo el proceso de compra desde la atención a sus consultas hasta la entrega de su pedido.<br>De esta manera nos aseguramos de su completa satisfacción.</p>
                </div>
            </div>
        </div>
    </div>
</div>