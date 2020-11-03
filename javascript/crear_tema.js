
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
}   
    
 
