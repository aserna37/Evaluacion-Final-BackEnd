<?php
  $data=file_get_contents('../data-1.json');
  $casas=json_decode($data);
  $retorno='';
  foreach ($casas as $casa) {

    $id=$casa->Id;
    $direccion=$casa->Direccion;
    $ciudad=$casa->Ciudad;
    $telefono=$casa->Telefono;
    $codigo_postal=$casa->Codigo_Postal;
    $tipo=$casa->Tipo;
    $precio=$casa->Precio;

    $retorno.= '<div class="resultado row">
          <div class="colImagen col s12 m6 l6">
            <img src="img/home.jpg" id="imgHome" alt="bienRaiz">
          </div>
          <div class="col-data col s12 m6 l6">
            <table class="tabla_sin">
              <tr>
                <td class="celda_sin1"><strong>Id</strong></td>
                <td class="celda_sin2">'.$id.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Direccion</strong></td>
                <td class="celda_sin2">'.$direccion.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Ciudad</strong></td>
                <td class="celda_sin2">'.$ciudad.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Telefono</strong></td>
                <td class="celda_sin2">'.$telefono.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Codigo Postal</strong></td>
                <td class="celda_sin2">'.$codigo_postal.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Tipo</strong></td>
                <td class="celda_sin2">'.$tipo.'</td>
              </tr>
              <tr>
                <td class="celda_sin1"><strong>Precio</strong></td>
                <td class="celda_sin2">'.$precio.'</td>
              </tr>
            </table>
          </div>
        </div>';
  }
  echo $retorno;

?>
