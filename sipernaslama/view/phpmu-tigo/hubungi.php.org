						<div class="full-width">
							<div class="block">
								<div class="block-title">
									<a href="index.html" class="right">Back to homepage</a>
									<h2>Contact Us</h2>
								</div>
								<div class="block-content">
									
									<div class="map-border">
										<div class="google-maps">
											<?php
											  $ma=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));
											?>
											<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$ma[maps]"; ?>"></iframe>
										</div>
									</div>

									<div class="paragraph-row">
										<div class="column6">
											<?php $alamat = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mod_alamat")); echo "$alamat[alamat]";?>
										</div>
										<div class="column6">
											<div style="width:370px" id="writecomment">

												<form action="hubungi-aksi.html" method="POST" onSubmit="return validasicontact(this)">
													<p class="contact-form-user">
														<label for="c_name">Nickname<span class="required">*</span></label>
														<input type="text" placeholder="Nickname" name='nama' id="c_name" />
													</p>
													<p class="contact-form-email">
														<label for="c_email">E-mail<span class="required">*</span></label>
														<input type="text" placeholder="E-mail" name='email' id="c_email" />
													</p>
													<p class="contact-form-message">
														<label for="c_message">Message<span class="required">*</span></label>
														<textarea style='width:430px' name='pesan' placeholder="Your message.." id="c_message"></textarea>
													</p>
													<p><input type="submit" class="styled-button" value="Send a message" /></p>
												</form>
												
											</div>
										</div>
									</div>
									
								</div>
							</div>

						</div>