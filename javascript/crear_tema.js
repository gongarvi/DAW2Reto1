
colorPrincipal  = document.getElementById("colorPrincipal");
colorTexto      = document.getElementById("colorTexto");

// colorPrincipal.addEventListener("click",crearPickr("colorPrincipal"));
// colorPrincipal.onfocus(crearPickr("colorPrincipal"))
// colorTexto.addEventListener("focus",crearPickr("colorTexto"));


crearPicker("#colorPrincipal");
crearPicker("#colorTexto");

function crearPicker(nombreInput) {
    const pickr = Pickr.create({
    el: nombreInput,
    useAsButton:true,
    theme: 'classic', // or 'monolith', or 'nano'
    components: {

        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,
            input: true,
        }
    }
    // },
    // onChange(hsva) {
    //   console.log("hi");            
    // }
  });

  pickr.on('change', (color, instance) => {
    $(nombreInput).val(color.toHEXA().toString());
    $(nombreInput).parent().find(".input-group-text").css("background-color",color.toHEXA().toString());
  });
} ;
    
//Validación del Input Tema
document.getElementById("nombreTema").addEventListener("blur", () => {
  var tema = document.getElementById("nombreTema").value;
  if (tema == null || tema.length == 0 || /^\s+$/.test(tema)) {
      document.getElementById("nombreTema").style.backgroundColor = '#FF5F5F';
  }
  else{
      document.getElementById("nombreTema").style.backgroundColor = 'white';
  }
});
//Validación del Input Color principal
document.getElementById("colorPrincipal").addEventListener("blur", () => {
  var color = document.getElementById("colorPrincipal").value;
  if (color == null || color.length == 0 || /^\s+$/.test(color)) {
      document.getElementById("colorPrincipal").style.backgroundColor = '#FF5F5F';
  }
  else{
      document.getElementById("colorPrincipal").style.backgroundColor = 'white';
  }
});
//Validación del Input Color secundario Texto
document.getElementById("colorTexto").addEventListener("blur", () => {
  var tema = document.getElementById("colorTexto").value;
  if (tema == null || tema.length == 0 || /^\s+$/.test(tema)) {
      document.getElementById("colorTexto").style.backgroundColor = '#FF5F5F';
  }
  else{
      document.getElementById("colorTexto").style.backgroundColor = 'white';
  }
});
 
