let formItem = null;
let txtNombreInput = null;
let txtNombreError = null;
let txtCorreoInput = null;
let txtCorreoError = null;
let txtDireccionInput = null;
let txtDireccionError = null;
let txtTelefonoInput = null;
let txtTelefonoError = null;

let btnGuardar = null;
document.addEventListener("DOMContentLoaded",
  function(){
    formItem = document.getElementById("formToValidate");
    txtNombreInput = document.getElementById("txtNombre");
    txtNombreError = document.getElementById("txtNombreError");
    txtCorreoInput = document.getElementById("txtCorreo");
    txtCorreoError = document.getElementById("txtCorreoError");
    txtDireccionInput = document.getElementById("txtDireccion");
    txtDireccionError = document.getElementById("txtDireccionError");
    txtTelefonoInput = document.getElementById("txtTelefono");
    txtTelefonoError = document.getElementById("txtTelefonoError");

    btnGuardar = document.getElementById("btnGuardar");

    btnGuardar.addEventListener("click", function(e){
      e.preventDefault();
      e.stopPropagation();
      let txtNombreRE = (/^\s*$/);
      let txtNombreRE2 = (/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/);
      let txtCorreoRE = (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/);
      let txtDireccionRE = (/^\s*$/);
      let txtTelefonoRE = (/^[0-9\-\+]{8,15}$/);
      let errors = {
        "txtNombreError":'',
        "txtCorreoError": '',
        "txtDireccionError":'',
        "txtTelefonoError":'',
        "txtFechaError":'',
        "hasErrors":false
      };
      if( txtNombreRE.test(txtNombreInput.value) ){
        errors.txtNombreError = "Nombre no Puede ir vacio";
        errors.hasErrors = true;
      }
      if(!txtNombreRE2.test(txtNombreInput.value) ){
        errors.txtNombreError = "Nombre no tiene el formato correcto";
        errors.hasErrors = true;
      }
      if (!txtCorreoRE.test(txtCorreoInput.value)){
        errors.txtCorreoError = "Correo Electrónico no Tiene el Formato Correcto";
        errors.hasErrors = true;
      }
      if (txtDireccionRE.test(txtDireccionInput.value)){
        errors.txtDireccionError = "Direccion no puede ir vacio";
        errors.hasErrors = true;
      }
      if (!txtTelefonoRE.test(txtTelefonoInput.value)){
        errors.txtTelefonoError = "Telefono no tiene el formato correcto";
        errors.hasErrors = true;
      }


      if(errors.hasErrors){
          txtNombreError.innerHTML = errors.txtNombreError;
          txtCorreoError.innerHTML = errors.txtCorreoError;
          txtDireccionError.innerHTML = errors.txtDireccionError;
          txtTelefonoError.innerHTML = errors.txtTelefonoError;
      }else{
          alert("Formulario Validado")
          formItem.submit();
      }
    });
  }
);
