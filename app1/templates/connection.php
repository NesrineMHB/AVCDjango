<?php
$contact=false;
$newsLetters=false;

//Base de donnée
if((!empty($_POST["send"])) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['newl']) && 
	   isset($_POST['message']))
	{
    $contact=true;
		// protéger les champs
		$name=strip_tags($_POST['name']);
		$email=strip_tags($_POST['email']);
		$newl=strip_tags($_POST['newl']);
		$message=strip_tags($_POST['message']);
		
    $bdd = new PDO('mysql:host=localhost;dbname=test','root', '');
  /*  $check= $bdd->prepare("SELECT * from adm where email=?");
			$check->execute(array($email));
			$existe=$check->rowCount(); 
	
    if($existe!=0){
        $db_msg = "Vous etes deja enregistré.";
		$type_db_msg = "error";
        */
   
        $req=$bdd->prepare("INSERT INTO adm (name, email, nwl, message) values (?,?,?,?)");
        $result=$req->execute(array($name,$email,$newl,$message));
	
	if($result){
		$db_msg = "Vos informations de contact sont enregistrées avec succés.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}
    
	
}




/////////////////////////////////////////:


//Base de donnée

if(($_POST["newsletter"]=="Envoyer") && isset($_POST['email']))
	{
    
    $newsLetters=true;
		// protéger les champs
		$email=strip_tags($_POST['email']);
		
    $bdd = new PDO('mysql:host=localhost;dbname=test','root', '');
    $check= $bdd->prepare("SELECT * from newsletters where email=?");
			$check->execute(array($email));
			$existe=$check->rowCount(); 
	
    if($existe!=0){
        $db_msg = "Vous etes deja enregistré.";
		$type_db_msg = "error";
    }else{
        $req=$bdd->prepare("INSERT INTO newsletters (email) values (?)");
        $result=$req->execute(array($email));
	
	if($result){
		$db_msg = "Vos informations de contact sont enregistrées avec succés.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}
    }
	
}


?>

<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
   
    <title>ADM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/logo-green-small-1x.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700&display=swap" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
   
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body >
  
    <header id="debut" >
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i> +33 663105549 </a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>nesrine@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block" style="margin-bottom: -2rem;">
                                
                                <a href="#" class="icon-button twitter"><i class="fa fa-twitter "></i><span></span></a>
                                <a href="#" class="icon-button facebook"><i class="fa fa-facebook  "></i><span></span></a>
                                <a href="#" class="icon-button instagram"><i class="fa fa-instagram "></i><span></span></a>
                                <a href="#" class="icon-button youtube"><i class="fa fa-youtube"></i><span></span></a>
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area" style="background-color:#0095c6">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img//logo-green-small-1x.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#debut">Accueil</a></li>
                                        <li><a href="#about">A decouvrir <i class="ti-angle-down"></i></a>
                                            <ul class="submenu" >
                                                <li><a href="#about">A propos</a></li>
                                                <li><a href="event.html">Nos evenemnts</a></li>
                                                <li><a href="#missions">Nos missions</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Agir <i class="ti-angle-down"></i></a>  
                                            <ul class="submenu">
                                                <li><a href="#">Faire un don</a></li>
                                                <li><a href="Volunteer.html">Rejoindre l'aventure</a></li>
                                            </ul>
                                         </li>
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="#contact">Contact</a></li>
                                    </ul>
                                </nav>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a data-scroll-nav='1' href="#">Faire un Don</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section style="padding: 3rem 3rem;
 
   
    }">
        <div style="margin : 3rem 1rem"> 
            <?php if ($newsLetters) { ?>
              <p style="font-size:2rem" class='<?php echo "newletters"; ?>Message'><?php echo $db_msg ?></p>
            <?php } ?>
            <?php if ($contact) { ?>
              <p style="font-size:2rem" class='<?php echo "khraa"; ?>Message'><?php echo $db_msg ?></p>
            <?php } ?>
            
            </div>
            <a href="#section-tours" class="btn btn--white btn--animated"><< Retour à l'accueil</a>

   
    </section>
        <footer class="footer">

            
            <div class="u-center-text " style="margin-bottom: -1rem; font-size: 30px ;font-weight: 200;">
                <h3 class="heading-secondary" style=" font-size: 20px ;font-weight: 300;color:antiquewhite;">
                    souscrire à notre NewsLetters
                </h3>
            </div>
            <div style="text-align: center;max-width: 60%; margin-left: 20%; ">

                <form id="form1" enctype="multipart/form-data" method="post" action="connection.php" class="form">
					<div class="form__group" style="position: relative;">
						<input
                               
							type="email"
							class="form__input"
							style="width: 100%;"
							placeholder="Email address"
							id="email"
                               name="email"
							required
						/>
						<label for="email" class="form__label" style="color: antiquewhite;">Votre adresse mail</label>
						<input 
                               style="position: absolute; top: 0; right: 0; margin-top: 2%;color: transparent;background-color: transparent;z-index: 800;cursor: pointer; border-color: transparent"
                               type="submit" name="newsletter" id="newsletter" value="Envoyer" />
						<img
							style="position: absolute; top: 0; right: 0; margin-top: 2%;"
							src="https://img.icons8.com/color/48/000000/send-mass-email.png"
						/>
					</div>
				</form>

                
            </div>
            <div class="row">
                
                <div class="col--1-of-3 c1">
                    <div class="u-center-text " style=" font-size: 30px ;font-weight: 200;">
                        <h3 class="heading-secondary" style=" font-size: 20px ;font-weight: 300;color:antiquewhite;margin-bottom: 20px;">
                            Plus 
                        </h3>
                        <p>ADM Copyright &copy; ++++ logo</p>

                    </div>
                </div>
               
                <div class="col--1-of-3 c2">
                    <div class="u-center-text " style="margin-bottom: -2rem; font-size: 30px ;font-weight: 200;">
                        <h3 class="heading-secondary" style=" font-size: 20px ;font-weight: 300;color:antiquewhite;margin-bottom: 20px;">
                            Suivez-nous sur 
                        </h3>
                    <div>
                    <a href="#" class="icon-button twitter"><i class="fa fa-twitter "></i><span></span></a>
                    <a href="#" class="icon-button facebook"><i class="fa fa-facebook  "></i><span></span></a>
                    <a href="#" class="icon-button instagram"><i class="fa fa-instagram "></i><span></span></a>
                    <a href="#" class="icon-button youtube"><i class="fa fa-youtube"></i><span></span></a>
                </div>   
            </div>    
                    

                </div>
                

                <div class="col--1-of-3 c3">
                    <div class="u-center-text " style="margin-bottom: -2rem; font-size: 30px ;font-weight: 200;">
                        <h3 class="heading-secondary" style=" font-size: 20px ;font-weight: 300;color:antiquewhite;margin-bottom: 20px;">
                            Contact
                        </h3>
                        <div class="short_contact_list">
                            
                               <div><a href="#" > <i class="fa fa-phone"></i> +33 663105549 </a></div> 
                                <a href="#"> <i class="fa fa-envelope"></i>nesrine@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



    <!-- JS here -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
   
    <script src="js/waypoints.min.js"></script>

    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
 
    <script src="js/main.js"></script>
</body>

</html>
