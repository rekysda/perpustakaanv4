
							</div>
						</div>
				</div>
<div class="col-md-3">
					<!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
					<form action="<?= base_url('opac/carijudul/')?>" method="get">
						<div class="input-group">
							<input name="cariall" type="text" class="form-control c-square c-theme-border" placeholder="Cari buku...">
							<?= form_error('cariall', '<span class="help-block">', '</small>'); ?>
							<span class="input-group-btn">
							<button class="btn c-theme-btn c-theme-border c-btn-square" type="submit">Search!</button><br>
							</span>
						</div>
					</form>
					<?php  if (options('signin_opac') == '1') {?>
					Anda Login Sebagai <i><a href="<?= base_url('auth/logoutmember/')?>"><?= $this->session->userdata('nama'); ?> Logout</a></i>
					<?php } ?>
					<div class="c-content-ver-nav">
						<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
							<h3 class="c-font-bold c-font-uppercase">HASIL PENCARIAN</h3>
							<div class="c-line-left c-theme-bg">
							</div>
							Ditemukan <?= $get_numbukuall ?> dari pencarian Anda melalui kata kunci: <?= $katakunci ?>
						</div>
					</div>

					<!-- END: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
				</div>