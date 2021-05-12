<section id="newpassword">
	<div class="container-fluid mt-4 px-4">
		<div class="container rounded">
			<form class="text-center border border-light p-5 bg-logindiv" action="index.php?action=login" method="POST">
				<p class="h4 mb-4">Passwort ändern</p>
				<div class="form-row mb-2">
					<input type="password" class="form-control mb-4" name="newPass" placeholder="Neues Passwort" required>
				</div>
				
                <div class="form-row mb-2">
					<input type="password" class="form-control mb-4" name="newPassVerification" placeholder="Neues Passwort wiederholen" required>
				</div>

				
                <input type="submit" name="submit" value="Passwort ändern" class="btn btn-primary">
				<input type="reset" name="reset" value="Abbrechen" class="btn btn-danger">
				
				
                <br><br>
                <div class="row">
					<?php
						if(isset($_SESSION['login']) && isset($_SESSION['username'])) {
							if($_SESSION['login'] == true) {
								echo '<a href="index.php?page=profilepage&user='.$_SESSION['username'].'">Zurück zum Profil</a>';
							}
						}
						else {
							echo
							'<small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
								<a href="index.php?page=login">Zurück zur Anmeldung</a>
							</small>';
						}
					?>
				</div>
			</form>
		</div>
	</div>
</section>