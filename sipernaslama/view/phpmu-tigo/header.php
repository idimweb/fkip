				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<div class="header-logo">
						<?php
						  $logo=mysqli_query($koneksi, "SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
						  $link=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT url FROM identitas"));
						  while($b=mysqli_fetch_array($logo)){
							echo "<a href='$link[url]'><img src='logo/$b[gambar]'/></a>";
						  }
						?>
					</div>
					<div class="header-menu">
						<ul>
							<?php
							  $topmenu=mysqli_query($koneksi, "SELECT * FROM menu where position='Top' AND aktif='Ya' ORDER BY urutan ASC");
							  while($me=mysqli_fetch_array($topmenu)){
								echo "<li><a href='$me[link]'>$me[nama_menu]</a></li>";
							  }
							?>
						</ul>
						<?php
						  $linkk=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));
							echo "<p>$linkk[meta_deskripsi] hubungi kami di : $linkk[no_telp] - $linkk[email]</p>";
						?>
					</div>

					<div class="header-addons">
						<div class="header-search">
							<form method="POST" action="hasil-pencarian.html">
								<input type="text" placeholder="Search something.." name="kata" value="" class="search-input" />
								<input type="submit" value="Search" class="search-button" />
							</form>
						</div>
					</div>

				<!-- END .wrapper -->
				</div>

				<div class="main-menu sticky">
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						<ul class="the-menu">
							<?php
								function get_menu($data, $parent = 0) {
								      static $i = 1;
								      $tab = str_repeat(" ", $i);
								      if ($data[$parent]) {
									      $html = "$tab<li>";
									      $i++;
									      foreach ($data[$parent] as $v) {
										       $child = get_menu($data, $v->id_menu);
											   $html .= "$tab<li>";
											   	if ($child) {
												   $html .= '<a class="'.$css.'" href="'.$v->link.'"><span>'.$v->nama_menu.'</span></a>';
												}else{
													$html .= '<a class="'.$css.'" href="'.$v->link.'">'.$v->nama_menu.'</a>';
												}
											    if ($child) {
											       $i--;
											       $html .= "<ul>$child";
											       $html .= "$tab</ul>";
										       }
										       $html .= '</li>';
									      }
									      $html .= "$tab</li>";
									      return $html;
								      }else{
									      return false;
								      }
							    }

							      $result = mysqli_query($koneksi, "SELECT * FROM menu where position = 'Bottom' AND aktif='Ya' ORDER BY urutan");
							      while ($row = mysqli_fetch_object($result)) {
								       $data[$row->id_parent][] = $row;
							      }
							      $menu = get_menu($data);
							      echo "$menu";
							?>
						</ul>

					<!-- END .wrapper -->
					</div>

				</div>

				<div class="secondary-menu">

					<!-- BEGIN .wrapper -->
					<div class="wrapper">

						<ul>
							<?php
								$tag = mysqli_query($koneksi, "SELECT * FROM tag order by RAND() DESC LIMIT 14");
								while ($t = mysqli_fetch_array($tag)){
									echo "<li><a href='tag-$t[tag_seo].html'>$t[nama_tag]</a></li>";
								}

							?>
						</ul>

					<!-- END .wrapper -->
					</div>

				</div>
