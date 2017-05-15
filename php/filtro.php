<?php
  $data=file_get_contents('../data-1.json');
  $casas=json_decode($data);
  if(empty($_POST['ciudad'])) $ciudad=""; else $ciudad=$_POST['ciudad'];
  if(empty($_POST['tipo'])) $tipo=""; else $tipo=$_POST['tipo'];
  $precioMinimo=$_POST['precioMinimo'];
  $precioMaximo=$_POST['precioMaximo'];
  $tipoOrden=$_POST['tipoOrden'];
  $precioOb=0;
  $retorno='';


  function unique_multidim_array($array, $key) {
      $temp_array = array();
      $i = 0;
      $key_array = array();

      foreach($array as $val) {
          if (!in_array($val[$key], $key_array)) {
              $key_array[$i] = $val[$key];
              $temp_array[$i] = $val;
          }
          $i++;
      }
      return $temp_array;
  }

  $dataFiltrada=array();

  foreach ($casas as $casa) {
    $precioOb=substr($casa->Precio,1);
    if($precioMaximo==100000) $precioMaximo=100000;
    if(($casa->Ciudad==$ciudad or $casa->Tipo==$tipo) and ($precioOb>=$precioMinimo and $precioOb<=$precioMaximo) or ($ciudad=="" and $tipo=="")){
      //and ($casa->Precio>=$precioMinimo and $casa->Precio<=$precioMaximo)
      $aux=Array ("id"=>$casa->Id,
                  "direccion"=>$casa->Direccion,
                  "ciudad"=>$casa->Ciudad,
                  "telefono"=>$casa->Telefono,
                  "codigo_postal"=>$casa->Codigo_Postal,
                  "tipo"=>$casa->Tipo,
                  "precio"=>$casa->Precio
                );
      array_push($dataFiltrada,$aux);
    }
  }
  $dataFiltrada=unique_multidim_array($dataFiltrada,'id');
  foreach ($dataFiltrada as $key => $row) {
    $auxArr[$key] = $row[$tipoOrden];
  }
  array_multisort($auxArr,SORT_ASC,$dataFiltrada);
  foreach ($dataFiltrada as $data) {
    $id=$data['id'];
    $direccion=$data['direccion'];
    $ciudadData=$data['ciudad'];
    $telefono=$data['telefono'];
    $codigo_postal=$data['codigo_postal'];
    $tipoData=$data['tipo'];
    $precio=$data['precio'];
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
                <td class="celda_sin2">'.$ciudadData.'</td>
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
                <td class="celda_sin2">'.$tipoData.'</td>
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
