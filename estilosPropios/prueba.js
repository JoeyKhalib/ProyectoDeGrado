<script>
var valor = true
function FbotonOn() {
  var uno = document.getElementById('botonOn');
  valor?uno.innerText = "off":uno.innerText = "on";
  valor=!valor
}
</script>