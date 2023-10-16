<body style="background-color: #2266c0;">

<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations du formulaire avec $_POST
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $error = "";

   // disponibilité de l'username et de l'email
    if (isUsernameAvailable($username) && isEmailAvailable($email)) {
        userRegistration($username, $email, $password);
    } else {
        if (!isUsernameAvailable($username)) {
            $error = "Username indisponible";
        }
        if (!isEmailAvailable($email)) {
            $error = "Email indisponible";
        }
    }
}
?>




	<section id="login-container">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 midway-horizontal midway-vertical fadeInDown animated">
			<div id="logbox" class="register">
				<h1><i class="fa fa-soundcloud"></i> Inscrivez-vous !</h1>
				<?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $_SESSION['message']; ?>
					<?php unset($_SESSION['message']); ?>
				</div>
				<?php } ?>
				<form method="POST" action="validation.php">
					<div class="form-input">
						<span class="username">
							<input type="text" name="username" placeholder="Username">
						</span>
					</div>
					<div class="form-input">
						<span class="email">
							<input type="text" name="email" placeholder="Email">
						</span>
					</div>
					<div class="form-input">
						<span class="password">
							<input type="password" name="password" placeholder="Password">
						</span>
					</div>

					<div class="form-submit">
						<input type="submit" value="Je m'inscris !">
					</div>
					<p class="account">Vous avez un compte ? <a href="login.php">Connectez-vous !</a></p>
				</form>
                <?php
                $error = "";

                if (isUsernameAvailable($username) && isEmailAvailable($email)) {
                    userRegistration($username, $email, $password);
                } else {
                    if (!isUsernameAvailable($username)) {
                        $error .= "Username indisponible. ";
                    }
                    if (!isEmailAvailable($email)) {
                        $error .= "Email indisponible. ";
                    }
                }


                if (isset($_POST['email'])) {
                    echo '<p class="email">Email: ' . htmlspecialchars($_POST['email']) . '</p>';
                }

                if (isset($_POST['username'])) {
                    echo '<p class="username">Username: ' . htmlspecialchars($_POST['username']) . '</p>';
                }



                if (isset($_POST['password'])) {
                    echo '<p class="password">Password: ' . htmlspecialchars($_POST['password']) . '</p>';
                }
                ?>

            </div>

		</div>
	</section>
