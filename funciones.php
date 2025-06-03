<?php
//FUNCIONES
function miSelect ($lsTabla, $lsNombreCampoId, $lnValorDefect) 
{
    global $cnn;

    $lcCadena = '<select class="form-select rounded-3" name="' . $lsNombreCampoId . '">
                    <option value="0" ' . ($lnValorDefect == 0 ? "selected" : "")Seleccione una provincia</option>
    <?php
      $sql = "SELECT * FROM provincias WHERE !deleted";
      $resp = mysqli_query($cnn, $sql);
      while ($prov = mysqli_fetch_array($resp)) {
        $selected = (isset($campos['idprovincia']) && $campos['idprovincia'] == $prov['idprovincia']) ? 'selected' : '';
        echo "<option value='{$prov['idprovincia']}' $selected>{$prov['provincia']}</option>";
      }
    ?>
  </select>
  
}

miSelect();

?>

<?php
function miSelect($lcTabla, $lcNombreCampoId, $lnValorDefecto)
{

    global $cnn;

    $lcCadena = '<select class="form-select" name="' . $lcNombreCampoId . '">
                    <option value="0" ' . ($lnValorDefecto == 0 ? "selected" : "") . '>Seleccionar una provincia </option>';

    $sql = 'select * from ' . $lcTabla . ' where !deleted ';
    $resp = mysqli_query($cnn, $sql);
    while ($camposcbo = mysqli_fetch_array($resp)) {
        $lcSeleccionado = ($camposcbo['idprovincia'] == $lnValorDefecto ? 'selected' : '');
        $lcCadena .= '<option value="' . $camposcbo['idprovincia'] . '" ' . $lcSeleccionado . '>' . $camposcbo['provincia'] . '</option>';
    }
    $lcCadena .= '</select>';

    return $lcCadena;
}