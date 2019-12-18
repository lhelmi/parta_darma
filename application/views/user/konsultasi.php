<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Konsultasi
                </h1>

            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5>Margaasih, Bandung</h5>
                        <p></p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>0812-1469-9108</h5>
                        <p></p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>patradarmawja@gmail.com</h5>
                        <p>Konsultasikan bersama kami</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form method="post" action="<?php echo base_url('user/konsultasi/kirim_pesan') ?>" class="contact-form text-right">
                    <div class="row">
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="col-lg-6 form-group">
                            <input type="text" name="nama" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                            <input type="text" name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Pesan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea type="text" name="pesan" class="form-control" rows="6"></textarea>
                            <button type="submit" class="genric-btn primary circle mt-30" style="float: right;">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->