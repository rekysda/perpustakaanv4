
							</div>
						</div>
				</div>
<div class="col-md-3">
					<!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
					<form action="<?= base_url('opac/carijudul/')?>" method="post">
						<div class="input-group">
							<input name="cariall" type="text" class="form-control c-square c-theme-border" placeholder="Cari buku...">
							<?= form_error('cariall', '<span class="help-block">', '</small>'); ?>
							<span class="input-group-btn">
							<button class="btn c-theme-btn c-theme-border c-btn-square" type="submit">Search!</button>						
							</span>
						</div>
					</form>
							<i><a href="<?= base_url('opac/cariadv')?>">Advanced Search!</a></i>- Anda Login Sebagai <i><a href="<?= base_url('auth/logoutmember/')?>"><?= $this->session->userdata('nama'); ?> Logout</a></i>
					<div class="c-content-ver-nav">
						<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
							<h3 class="c-font-bold c-font-uppercase">HISTORY PEMINJAMAN</h3>
							<div class="c-line-left c-theme-bg">
							</div>						
<?php if($get_peminjamaneksemplar) {?>
<?php foreach ($get_peminjamaneksemplar as $dt) : ?>
<?= $dt['namapeminjam'] ?><br>
<?php endforeach; ?>
<?php } ?>						
						</div>
					</div>

					<!-- END: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
				</div>