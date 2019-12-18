	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Informasi Hukum
					</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start home-about Area -->
	<section class="home-about-area section-gap aboutus-about" id="about">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-8 col-md-12 home-about-left">
					<h6>JA Sadewa & Rekan</h6>
					<h1>
						Ruang Konsultasi <br>
						Online
					</h1>
					<p class="sub">JA Sadewa & Rekan akan menjadi partner digital perihal masalah yang dihadapi</p>
					<p class="pb-20">

					</p>
					<a class="primary-btn" href="#">Pelajari Masalah Anda</a>
				</div>
				<div class="col-lg-4 col-md-12 home-about-right relative">
					<form method="post" action="<?php echo base_url('user/info_hukum/kirim_pesan') ?>" class="form-wrap">
						<?php echo $this->session->flashdata('pesan') ?>
						<h4 class="text-white pb-20">Konsultasi Disini</h4>
						<?php echo form_error('kategori', '<small class="text-danger pl-3">', '</small><br>'); ?>
						<?php echo form_error('nama', '<small class="text-danger pl-3">', '</small><br>'); ?>
						<?php echo form_error('email', '<small class="text-danger pl-3">', '</small><br>'); ?>
						<?php echo form_error('pesan', '<small class="text-danger pl-3">', '</small><br>'); ?>
						<div class="form-select" id="service-select">
							<select name="kategori">
								<option value="">Pilih Kategori Masalah</option>
								<option value="Keluarga">Keluarga</option>
								<option value="Bisnis">Bisnis</option>
								<option value="Hutang piutang">Hutang Piutang</option>
								<option value="Pidana dan Laporan Polisi">Pidana dan Laporan Polisi</option>
								<option value="Pertanahan dan Property">Pertanahan dan Property</option>
								<option value="Lainnya">Lainnya</option>
							</select>

						</div>
						<input type="text" name="nama" class="form-control" placeholder="Nama">

						<!-- <input type="phone" class="form-control" placeholder="Phone Number"> -->
						<input type="text" name="email" class="form-control" placeholder="Email">

						<textarea type="text" name="pesan" id="" cols="30" rows="5" placeholder="Pesan" class="form-control"></textarea>

						<button type="submit" class="primary-btn">Kirim Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End home-about Area -->

	<!-- Start cat Area -->
	<section class="cat-area section-gap aboutus-cat" id="feature">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-cat d-flex flex-column">
						<a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-magic-wand"></span></span></a>
						<h4 class="mb-20" style="margin-top: 23px;">Konsultasi Online</h4>
						<p>
							Mudah dan efektif. Temukan solusi permasalahan hukum danda bersama konsultan hukum kami melalui media online digital.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat">
						<a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-rocket"></span></span></a>
						<h4 class="mt-40 mb-20">Pembuatan Dokumen</h4>
						<p>
							Bersama kami, pastikan pembuatan atau review dokumen hukum anda dikerjakan dengan teliti dan aman terlindungi
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat">
						<a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-bug"></span></span></a>
						<h4 class="mt-40 mb-20">Pendampingan Hukum</h4>
						<p>
							Mitra konsultan hukum kami akan mendampingi anda. Hadapi permsalahn hukum dengan tenang dan optimal
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End cat Area -->

	<!-- Start service Area -->
	<section class="service-area section-gap" id="service">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 pb-30 header-text text-center">
					<h1 class="mb-10">Kategori Permasalah Hukum</h1>
					<p>

					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s1.jpg" alt="">
						</div>
						<h4>1. Keluarga</h4>
						<p>
							Perceraian, hak asuh, harta suami-istri dan penetapan waris
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s2.jpg" alt="">
						</div>
						<h4>2. Bisnis</h4>
						<p>
							Regulasi usaha, permodalan, joint venture, kontrak kerjasama atau kontrak vendor
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s3.jpg" alt="">
						</div>
						<h4>3. Hutang piutang</h4>
						<p>
							Regulasi usaha, permodalan, joint venture, kontrak kerjasama atau kontrak vendor
						</p>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s1.jpg" alt="">
						</div>
						<h4>4. Pidana dan Laporan Polisi</h4>
						<p>

						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s2.jpg" alt="">
						</div>
						<h4>5. Pertanahan dan Properti</h4>
						<p>
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img src="img/s3.jpg" alt="">
						</div>
						<h4>6. Lainya</h4>
						<p>

						</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End service Area -->


	<!-- Start faq Area -->
	<section class="faq-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-3 col-md-6">
					<div class="single-faq">
						<div class="circle">
							<div class="inner"></div>
						</div>
						<h5><span class="counter">Firma </span>Hukum</h5>
						<p>

						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-faq">
						<div class="circle">
							<div class="inner"></div>
						</div>
						<h5><span class="counter">Minyak </span> dan Gas</h5>
						<p>

						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-faq">
						<div class="circle">
							<div class="inner"></div>
						</div>
						<h5 class="counter">Ferdinal Travel</h5>
						<p>

						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-faq">
						<div class="circle">
							<div class="inner"></div>
						</div>
						<h5 class="counter">Ferdinal Logistik</h5>
						<p>

						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End faq Area -->