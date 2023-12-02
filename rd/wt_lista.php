<?php include("../data/conexion.php"); ?>
<?php include('includes/header.php'); ?>
<?php include('whatsaap.php'); ?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="whatsaap/stilo_list.css">

    <!-- Lista de contactos -->
    <div id="contact-list">
        <div class="contact">
            <img src="contact1.jpg" alt="Contacto 1">
            <div class="contact-details">
                <div class="contact-name">Nombre del Contacto 1</div>
                <div>Último mensaje...</div>
            </div>
        </div>
        <div class="contact">
            <img src="contact2.jpg" alt="Contacto 2">
            <div class="contact-details">
                <div class="contact-name">Nombre del Contacto 2</div>
                <div>Último mensaje...</div>
            </div>
        </div>
        <!-- Agrega más contactos según sea necesario -->
    </div>

<?php include('includes/footer.php'); ?>