<style>
    .breadcumb{background-color: #f5f5f5;color:#404040;font-size: 12pt;font-weight: bold;}
    .breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;padding: 10px 20px;}
    .breadcumb a{text-decoration: none;color: #404040;}
    .breadcumb a:hover{color: #ff110b;}
    .breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
    .breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
    .breadcumb ol li:last-child:after{display: none;}
</style>
<main class="full-width">
    <div class="breadcumb full-width">
        <div class="contenido boxed-width">
            <ol class="breadcrumb">
				<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
				<li class="active"><?php echo $infoCat['id']; ?></li>
			</ol>
        </div>
    </div>
    <div class="filtrador-subheader full-width">
        <div class="contenido boxed-width">
            <h2><?php echo $infoCat['nombre']; ?></h2>
            <p><?php echo $infoCat['descripcion']; ?></p>
        </div>
    </div>
    <div class="filtrador boxed-width">
        <div class="sidebar">
            Sidebar
        </div>
        <div class="productos">
            Productos
        </div>
    </div>
</main>