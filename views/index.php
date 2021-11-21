<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>

  <!-- Mi estilo para la Card -->
  <link type="text/css" rel="stylesheet" href="css/card.css"  media="screen,projection"/>

  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <!--
  <video src="img/video.mp4" id="vidFondo"></video>
-->
  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="index.php?accion=filtrajson" method="post" id="formulario">

        <!-- <input type="text" name="accion" id="accion" value="filtrajson"> -->

        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php foreach($ciudades as $ciudad): ?>
                <option value="<?php echo $ciudad['Ciudad']; ?>"><?php echo $ciudad['Ciudad']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php foreach($tipos as $tipo): ?>
                <option value="<?php echo $tipo['Tipo']; ?>"><?php echo $tipo['Tipo']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reporte</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center; flex-direction: column">
            <h5 style="text-align: center;">Resultados de los bienes disponibles<?php echo $Tipo; ?></h5>
            <div class="divider"></div>

              <!-- MOUESTRA TODOS LOS BIENES DISPONIBLES DEL JSON -->
              <div class="container__button">
                <a class="card__button" href="index.php?accion=listarjson">MOSTRAR TODO</a>
              </div>

              <div class="list_card__items">

                <?php foreach($json as $item): ?>

                    <div class="card_bienes">

                      <div class="card__img">
                        <img src="img/home.jpg" width="280px" height="200px" alt="Imagen del bien">
                      </div>

                      <div class="card_datos">
                          <!-- <p>Id <?php echo $item['Id']; ?></p> -->
                          <p><span>Dirección: </span><?php echo $item['Direccion']; ?></p>
                          <p><span>Ciudad: </span><?php echo $item['Ciudad']; ?></p>
                          <p><span>Teléfono: </span><?php echo $item['Telefono']; ?></p>
                          <p><span>Código Postal: </span><?php echo $item['Codigo_Postal']; ?></p>
                          <p><span>Tipo: </span><?php echo $item['Tipo']; ?></p>
                          <p><span>Precio: </span><?php echo $item['Precio']; ?></p>

                          <div class="container__button" style="justify-content: flex-start;">
                            <a class="card__button" style="background-color: #8A8635;" href="index.php?accion=agregar&id=<?php echo $item['Id']; ?>">GUARDAR</a>
                          </div>

                        </div>

                    </div>

                <?php endforeach; ?>
              </div>

          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center; flex-direction: column">
            <h5 style="text-align: center;">Bienes guardados</h5>
            <div class="divider"></div>

            <!-- MOUESTRA TODOS LOS BIENES DISPONIBLES DEL JSON -->
            <!--
            <div class="container__button">
              <a class="card__button" href="index.php?accion=listar">MOSTRAR TODO</a>
            </div>
            -->

            <div class="list_card__items">

              <?php foreach($data as $r): ?>

                  <div class="card_bienes">

                    <div class="card__img">
                      <img src="img/home.jpg" width="280px" height="200px" alt="Imagen del bien">
                    </div>

                    <div class="card_datos">
                        <!-- <p>Id <?php echo $r->id; ?></p> -->
                        <p><span>Dirección: </span><?php echo $r->direccion; ?></p>
                        <p><span>Ciudad: </span><?php echo $r->ciudad; ?></p>
                        <p><span>Teléfono: </span><?php echo $r->telefono; ?></p>
                        <p><span>Código Postal: </span><?php echo $r->codigo_postal; ?></p>
                        <p><span>Tipo: </span><?php echo $r->tipo; ?></p>
                        <p><span>Precio: </span>$<?php echo str_replace(".",",",$r->precio); ?></p>

                        <div class="container__button" style="justify-content: flex-start;">
                          <a class="card__button" style="background-color: #8A8635;" href="index.php?accion=eliminar&id=<?php echo $r->id; ?>">ELIMINAR</a>
                        </div>

                      </div>

                  </div>

              <?php endforeach; ?>
            </div>


          </div>
        </div>
      </div>
      
      <div id="tabs-3" >
        
      <form action="index.php?accion=excel" method="post">

        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center; flex-direction: column">
            <h5 style="text-align: center;">Exportar Reporte</h5>
            <div class="divider"></div>
              <br>
              <h5 style="text-align: center;">Filtros</h5>
              <p style="color:red; text-align: center;">*En caso de querer toda la data dejar las listas vacías*</p>

                
                <div class="filtroCiudad input-field">
                  <p><label for="selectCiudadMisBienes">Ciudad:</label><br></p>
                  <select name="ciudadMisBienes" id="selectCiudadMisBienes">
                    <option value="" selected>Elige una ciudad</option>
                    <?php foreach($ciudades as $ciudad): ?>
                      <option value="<?php echo $ciudad['Ciudad']; ?>"><?php echo $ciudad['Ciudad']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="filtroTipo input-field">
                  <p><label for="selectTipoMisBienes">Tipo:</label></p>
                  <br>
                  <select name="tipoMisBienes" id="selectTipoMisBienes">
                    <option value="">Elige un tipo</option>
                    <?php foreach($tipos as $tipo): ?>
                      <option value="<?php echo $tipo['Tipo']; ?>"><?php echo $tipo['Tipo']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="container__button" style="justify-content: flex-center;">
                  <input type="submit" value="EXPORTAR EXCEL" class="card__button" style="background-color: #396EB0;" >
                </div>


                <!--
                <div class="container__button" style="justify-content: flex-center;">
                  <a class="card__button" style="background-color: #396EB0;" href="index.php?accion=excel">EXPORTAR EXCEL</a>
                </div>
                -->


          </div>
        </div>
        
        </form>
      </div>


    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Alertas -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();

          //? Mensaje de alertas
          switch ('<?php echo $this->mensaje[0] ?>') {

                case 'Guardado':
                  Swal.fire({
                    icon: 'success',
                    title: '<?php echo $this->mensaje[1]; ?>',
                    text: 'Verifique en su lista de bienes',
                  });
                break;

                case 'Eliminado':
                  Swal.fire({
                    icon: 'info',
                    title: '<?php echo $this->mensaje[1]; ?>',
                    text: 'Verifique en su lista de bienes',
                  });
                break;

                case 'Advertencia':
                  Swal.fire({
                    icon: 'warning',
                    title: '<?php echo $this->mensaje[1]; ?>',
                    text: 'Verifique en su lista de bienes',
                  });
                break;

                case 'Error':
                    toastr.info('<?php echo $this->mensaje[1]; ?>');
                break;
                
                    default:
                    break;
            }

      });
    </script>

    <script>
      <?php
        echo "var t ='$Tipo';";
        echo "var c ='$Ciudad';";
      ?>
      $("#selectCiudad").val(c);
      $("#selectTipo").val(t);
    </script>

</body>
  </html>
