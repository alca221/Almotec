<main class="contenedor seccion ">
        <h1>Contacto</h1>

<?php if($mensaje) { ?>
<!-- //mensaje enviado desde PaginasControler -->
 <p class='alerta exito'> <?php echo $mensaje; ?> </p>;
<?php } ?>

  <h2>Llene el formulario para Contactar</h2>
<div class="contenido-servicios" >
        <!-- <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture> -->
        <div class="imagen">
        <picture>
            <source srcset="build/img/redes1.webp" type="image/webp">
            <source srcset="build/img/redes1.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/redes1.jpg" alt="Servicio de redes">
        </picture>
        <picture>
            <source srcset="build/img/telecom1.webp" type="image/webp">
            <source srcset="build/img/telecom1.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/telecom1.jpg" alt="Servicio de telecomunicaciones">
        </picture>
   
</div>
      

        <form class="formulario " action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Servicios</legend>

                <label for="opciones">Indique el servicio que necesita</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Informática">Informática</option>
                    <option value="Telecomunicaciones">Telecomunicaciones</option>
                    <option value="Automatización">Automatización</option>
                    <option value="Electricidad">Electricidad</option>
                </select>

                <label for="Tipo Servicio">Tipo de Servicio</label>
                <select id="opciones2" name="contacto[tipo2]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Proyecto">Proyecto</option>
                    <option value="Mantención">Mantención</option>
                    <option value="Asesoria">Asesoria</option>
                    <option value="Otro">Otro</option>
                </select>
                <!-- <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required> -->

            </fieldset>

            <fieldset>
                <legend>Información de contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <!-- el value define lo que se envia -->
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">E-mail</label>
                    <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>

         

            
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
        </div>
    </main>
