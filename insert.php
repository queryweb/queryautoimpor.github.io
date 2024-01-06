<?php
    session_start();
    require "./controllers/posts.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inmobiliriaQR</title>
    <link rel="stylesheet"href="insert.css? 20231124">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

<H1>PUBLICAR VEHICULOS</H1>

</main> 
  
  <h2 id class="correo">
    Whatsapp: 849-751-2803 <br>
    Crreo: queryautoimporta@gmail.com

    </h2>

<div class="container justify-content-center">


        <!-- formulario -->

        <div class="mt-5 mx-auto ">
            <div>
                <?php if(isset($_SESSION['error'])){ ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']?>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['error']);

                } ?>

                <?php if(isset($_SESSION['success'])){ ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['success']?>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']);

                } ?>


                <form action="controllers/new-post-photo.php" method="POST" enctype="multipart/form-data">

                    <h5 class="mb-2 mx-0 ">ELEGIR ARCHIVO</h5>

                    <div class="d-flex justify-content-between">
                       
                    <input type="file" class="form-control mb-1 mx-1 " name="files[]" multiple id="file" accept=".png, .jpg, .jpeg" style="width: 40%" required>
                        
                        <textarea name="descripcion" id="descripcion" rows="1" class="form-control mb-1 mx-5 "style="resize: none;" placeholder="CARATERISTICAS" required></textarea>
                        <textarea name="ano" id="ano" rows="1" class="form-control mb-5 mx-5" style="resize: none;" placeholder="INTRUDUSCA EL AÑO" required></textarea>
                        <select name="marca" id="marca" rows="1" class="form-control mb-5 mx-5" style="resize: none;" placeholder="INTRODUSCA LA MARCA" required></textarea>

                        <option></option>
       
        <option>Honda Civic</option>
         <option>Toyota</option>
         <option> Chevrolet Tahoe</option>
         <option> Toyota Hilux 4x4</option>
         <option>Toyota Hilux limited TSS </option>
         <option>Honda Accord Sport 2.0T</option>
         <option>Hyundai Starex</option>
         <option>Toyota Camry SE</option>
         <option> Suzuki Celerio </option>
         <option></option>
         <option></option>
         <option></option>
         <option></option>
         <option></option>
         
        



      
         </select> 
        <button class="btn btn-success mb-5" type="submit" style="width: 20%;" name="btn-new-post-photo">Publicar</button>     
          
    </div>

                </form>

            </div>
        </div>

    </div>

                        
                        

    <div class="container mt-5 mb-5 py 3">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 mb-5">

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




                            <div class="card mt-0">
                            <div class="card-body">
                            <?= $posts[$i]['marca'] ?>
                            AÑO  <?= $posts[$i]['ano'] ?>
                            </div>
                        </div>




                            <div class="carousel-inner">
                                <?php for($j = 0; $j < count($imagesName); $j++) {
                                    if($j == 0){ ?>
                                        <div class="carousel-item active">

                                        <?php }else{ ?>
                                        
                                        <div class="carousel-item">

                                        <?php } ?>

                                            <img width="100%" src="./assets/images/posts/<?= $imagesName[$j] ?>">

                                        </div>
                                <?php } ?>

                                <?php if(count($imagesName) > 1){ ?>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel<?=$posts[$i]['id'] ?>" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                            
                                <?php } ?>
                            
                                </div>
                             </div>

                        <div class="card mt-0">
                            <div class="card-body">
                            <?= $posts[$i]['descripcion'] ?><br>
                            CODIGO ----> <?= $posts[$i]['id'] ?> 
                            </div>
                          </div>
                    
                    </div>
                
                <?php } ?>
                </div>


    </div>
    
</body>
</html>
