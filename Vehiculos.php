
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>queryautoimpor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet"href="vehiculos.css? 20249">
</head>
<body> 
 <H1>VEHICULOS EN VENTA</H1>
   </main> 
    <h2 id class="correo">
      Whatsapp: 849-751-2803 <br>
        Crreo: queryautoimport@gmail.com <br>
          </h2>
            <main>
            
  <div class ="sociales">
      <a href="vehiculos.php">Volver atras</a> 
        <a href="http://localhost/Venta_de_Vehiculos/">INICIO</a>
          <a href="https://wa.me/18497512803" target="blank"><img src="iconos/whatsapp.png"width= "35 px" height="35 px" ></a> 
           <a href="https://www.instagram.com/" target="blank"><img src="iconos/instagram.png"width= "35 px" height="35px" ></a>
             <a href="https://web.facebook.com/" target="blank"><img src="iconos/facebook.png"width= "35 px" height="35px" ></a>
                <a href="mailto:querycalzados@gmail.com" target="blank"><img src="iconos/correo.png"width= "40 px" height="35 px" ></a>
                </div>
                
 <img class = "logo"
   src="iconos/logo2.png" alt="esto es una imagen"><br><br><br><br>
     
  <form action="vehiculos.php" method ="post">
      <div class ="prepare">  
         <LAbel>AÑO</LAbel>
           <input type="text" name = "ano"> 
             <LAbel>MARCA</LAbel>
               <input type="text" name = "marca"> 
                 <input type="submit" name= "consultar" value="BUCAR"  class="btn btn-success"> <br>
                   </div>
                     </form>
<?php

require "./database/database.php";
if(isset($_POST["consultar"]));{
  //para corregir errores warnnyn
 
  error_reporting (0);
  $ano = $_POST['ano'];
    $marca = $_POST['marca']; 
      $posts = array();
        $stmt = $conn->prepare("select * from tab_auto where ano like '%$ano%' AND marca like '%$marca%'");
          $stmt->execute();
            while($row = $results = $stmt->fetch(PDO::FETCH_ASSOC))
              array_push($posts, $row);
                $echo="consulta exitosa"; 
                 }
                   ?>
<div class="container mt-5 mb-5 py 2s">
  <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 g-4 mb-5">
    <?php for($i = 0; $i < count($posts); $i++){
       $imagesName = explode(",", $posts[$i]['images']); ?>
         <div class="col">
           <div class="carousel slide" id="carousel<?=$posts[$i]['id'] ?>" data-bs-ride="false">
              <div class="carousel-indicators">
                 <?php for($j = 0; $j < count($imagesName); $j++) {
                    if($j == 0){ ?>
                      <button class="active" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide-to="<?= $j ?>" aria-current="true" aria-label="Slide<?= $i ?>"></button>
                         <?php }else{ ?>
                            <button class="" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide-to="<?= $j ?>" aria-current="true" aria-label="Slide<?= $i ?>"></button>
                              <?php } ?>
                                <?php } ?>
                                  </div>

                        
                                                                                                  
                            <div class="carousel-inner">
                                <?php for($j = 0; $j < count($imagesName); $j++) {
                                    if($j == 0){ ?>
                                        <div class="carousel-item active">
                                           <?php }else{ ?>
                                               <div class="carousel-item">
                                                 <?php } ?>
                                                    <img width="100%"  src="./assets/images/posts/<?= $imagesName[$j] ?>">
                                                       </div>
                                                          <?php } ?>
                                                             <?php if(count($imagesName) > 1){ ?>
                                                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                                                                   <button class="carousel-control-next" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                                                                      <?php } ?>
                                                                        </div>
                                                                           </div>
                                                                           
<div class="card mt 1">
   <div class="card-body">
     <?= $posts[$i]['descripcion']?> 
        </div>
          </div>
             <img class = "enviar" 
                src="iconos/whatsapp01.png"width= "35 px" height="30 px"><a href="https://wa.me/18497512803" target="blank">Enviar Mensaje </a>
                  </div>
                    <?php } ?>
                       </div>



</body>
</html>