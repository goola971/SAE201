<aside class="sidebar">
	<article class="menu">
		<p>Menu</p>
		<nav>
			<ul>
				<li>
					<a href="index.php" id="index">
						<img src="../res/tableaudebord.svg" alt="" />
						Tableau de bord
					</a>
				</li>
				<li>
					<a href="reservation.php" id="reservation">
						<img src="../res/reservation.svg" alt="" />
						<?php
						if (isset($_SESSION['user']['role'])) {
							if ($_SESSION['user']['role'] == 'Etudiant(e)') {
								echo 'Mes reservations';
							} else {
								echo 'Reservations';
							}
						}
						?>
					</a>
				</li>
				<li>
					<a href="" id="materiel">
						<img src="../res/materiel.svg" alt="" />
						Materiels
					</a>
				</li>
				<li>
					<a href="salles.php" id="salles">
						<img src="../res/salles.svg" alt="" />
						Salles
					</a>
				</li>
			</ul>
		</nav>
	</article>
	<article class="autre menu">
		<p>Autre</p>
		<nav>
			<ul>
				<li>
					<a href="profil.php" id="profil">
						<img src="../res/profil.svg" alt="" />
						Mon profil
					</a>
				</li>
				<li>
					<a href="" id="ent">
						<img src="../res/univ.svg" alt="" />
						Accéder à L'ent
					</a>
				</li>
			</ul>
		</nav>
	</article>
</aside>