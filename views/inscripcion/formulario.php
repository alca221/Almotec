
<fieldset>
    <legend>Datos Personales</legend>

    <label for="nombre">Nombres:</label>
    <input type="text" id="nombre" name="plan[nombre]" placeholder="Nombres" value="<?php echo s( $plan->nombre ); ?>">

    <label for="apellido">Apellidos:</label>
    <input type="text" id="apellido" name="plan[apellido]" placeholder="Apellidos" value="<?php echo s( $plan->apellido ); ?>">


    <label for="rut">Rut:</label>
    <input type="number" id="rut" name="plan[rut]" placeholder="Rut" value="<?php echo s($plan->rut); ?>">

    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" placeholder="Direccion" name="direccion" value="<?php echo s($usuario->direccion); ?>">

    <div class="inscripcion" >
    <label for="regiones_id">Región</label>
    <select >
    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Maule">Maule</option>
                    <option value="Ñuble">Ñuble</option>
                  
    </select>

    <label for="comunas_id">Comuna</label>
    <select >
        <option selected value="">-- Seleccione --</option>
        <option value="Curico">Curico</option>
                    <option value="Chillan">Chillan</option>
    </select>
</div>

<div class="inscripcion" >
<label for="telefono">Telefono</label>
    <input type="tel" id="telefono" placeholder="Ingresa tu Telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>" >

    <label for="f_nacimiento">Fecha Nacimiento:</label>
    <input type="date" id="f_nacimiento" name="plan[f_nacimiento]" placeholder="Fecha de nacimiento" value="<?php echo s($plan->f_nacimiento); ?>">
    </div>

    <label for="email">E-mail</label>
    <input type="email" id="email" placeholder="E-mail" name="email" value="<?php echo s($usuario->email); ?>" >

    <div class="inscripcion" >
        
    <label for="estadoCivil">Estado Civil</label>
    <select >
        <option selected value="">-- Seleccione --</option>
        <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
 </select>

       
    <label for="sexo">Sexo</label>
 
          <select > 
        <option selected value="">-- Seleccione --</option>
        <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
    </select>

    <label for="f_ingreso">Fecha Ingreso:</label>
    <input type="date" id="f_ingreso" name="plan[f_ingreso]" placeholder="Fecha de nacimiento" value="<?php echo s($plan->f_ingreso); ?>">
    </div>
      
   

        <label for="nacionalidad">Nacionalidad</label>
        <select >
        <option selected value="">-- Seleccione --</option>
        <option value="Chilena">Chilena</option>
                    <option value="Extranjera">Extranjera</option>
    </select>
</div>
    </fieldset>

    <fieldset>

    <legend>Datos Previcionales</legend>

    <div class="inscripcion" >

    <label for="afp">Afp</label>
    <select >
        <option selected value="">-- Seleccione --</option>
        <option value="Capital">Capital</option>
                    <option value="Modelo">Modelo</option>
    </select>

    <label for="salud">Salud</label>
    <select >
        <option selected value="">-- Seleccione --</option>
        <option value="Fonasa">Fonasa</option>
                    <option value="Isapre">Isapre</option>
    </select>
    </div>


</fieldset>


<fieldset>

<legend>Forma de Pago</legend>

<div class="inscripcion" >

<label for="tipoPago">Forma de pago</label>

<select >
    <option selected value="">-- Seleccione --</option>
    <option value="Efectivo">Efectivo</option>
                    <option value="Deposito">Deposito</option>
</select>

</div>


</fieldset>

<fieldset>
<legend>Datos Bancarios</legend>

<div class="inscripcion" >

<label for="banco">Institución Bancaria</label>
<select >
    <option selected value="">-- Seleccione --</option>
    <option value="Banco Estado">Banco Estado</option>
                    <option value="BCI">BCI</option>
</select>

<label for="tipoCuenta">Tipo Cuenta</label>
<select >
    <option selected value="">-- Seleccione --</option>
    <option value="Corriente">Corriente</option>
                    <option value="Chequera Electronica">Chequera Electronica</option>
</select>
</div>

<label for="numerouenta">Numero de Cuenta</label>
    <input type="tel" id="numerouenta" placeholder="Numero de Cuenta" name="numerouenta" value="<?php echo s($usuario->numerouenta); ?>" >


</fieldset>


