				<div class="wrapper">

					<ul class="right">
						<?php
							$topmenu=mysqli_query($koneksi, "SELECT * FROM menu where position='Top' ORDER BY id_menu ASC");
							while($me=mysqli_fetch_array($topmenu)){
								echo "<li><a href='$me[link]'>$me[nama_menu]</a></li>";
							}
						$year = date('Y');
						?>
					</ul>

					<p>&copy; <?php echo $year; ?> Copyright <b>phpmu.com</b> News. All Rights reserved.<br/>Develop by. <b style='color:orange'>Robby Prihandaya</b> - Redesign by. <b style='color:orange'>Idinov</b></p>

				</div>
