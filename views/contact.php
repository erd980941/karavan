<div class="section-title">
    <span>İletişim</span>
    <h2>İletişim</h2>
    <p>
        <?php echo $siteContactInformationData['site_contact_text'] ?>
    </p>
</div>

<div class="row" data-aos="fade-up">
    <div class="col-lg-3">
        <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Adres</h3>
            <p>
                <?php echo $siteContactInformationData['site_address'] ?>
                <br>
                <?php echo $siteContactInformationData['site_district'] ?> /
                <?php echo $siteContactInformationData['site_city'] ?>
            </p>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="mailto:<?php echo $siteContactInformationData['site_email'] ?>">
            <div class="info-box  mb-4">
                <i class="bx bx-envelope"></i>
                <h3>E-Posta</h3>
                <p>
                    <?php echo $siteContactInformationData['site_email'] ?>
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="tel:<?php echo $siteContactInformationData['site_tel'] ?>">
            <div class="info-box  mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>
                    <?php echo $siteContactInformationData['site_tel'] ?>
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a
            href="https://wa.me/<?php echo preg_replace('/[^\d\+]/', '', $siteContactInformationData['site_whatsapp']) ?>">
            <div class="info-box  mb-4">
                <i class='bx bxl-whatsapp'></i>
                <h3>Whatsapp</h3>
                <p>
                    <?php echo $siteContactInformationData['site_whatsapp'] ?>
                </p>
            </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="<?php echo $socialMediaData['trendyol'] ?>">
            <div class="info-box mb-4">
                <i class='bx bx-store'></i>
                <h3>Trendyol</h3>
                <p>
                    <?php echo $socialMediaData['trendyol'] ?>
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="<?php echo $socialMediaData['n11'] ?>">
            <div class="info-box  mb-4">
                <i class='bx bx-store'></i>
                <h3>N11</h3>
                <p>
                    <?php echo $socialMediaData['n11'] ?>
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="<?php echo $socialMediaData['hepsiburada'] ?>">
            <div class="info-box  mb-4">
                <i class='bx bx-store'></i>
                <h3>Hepsiburada</h3>
                <p>
                    <?php echo $socialMediaData['hepsiburada'] ?>
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="<?php echo $socialMediaData['sahibinden'] ?>">
            <div class="info-box  mb-4">
                <i class='bx bx-store'></i>
                <h3>Sahibinden</h3>
                <p>
                    <?php echo $socialMediaData['sahibinden'] ?>
                </p>
            </div>
        </a>
    </div>
</div>

<div class="row" data-aos="fade-up">

    <div class="col-lg-9 ">
        <iframe class="mb-4 mb-lg-0" src="<?php echo $siteContactInformationData['site_maps'] ?>" frameborder="0"
            style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
    </div>

    <div class="col-lg-3">
        <div class="info-box-social h-100" >
            <h4 class="mt-3">Sosyal Medya</h4>
            <div class="row justify-content-around h-100 align-items-center row-cols-2">
                <div class="col text-center">
                    <a href="<?php echo $socialMediaData['facebook'] ?>" class="facebook ">
                        <i class="bx bxl-facebook"></i><br>
                        <h6 class="mt-2">Facebook</h6>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="<?php echo $socialMediaData['instagram'] ?>" class="instagram">
                        <i class="bx bxl-instagram"></i>
                        <h6 class="mt-2">Instagram</h6>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="<?php echo $socialMediaData['linkedin'] ?>" class="linkedin">
                        <i class="bx bxl-linkedin"></i>
                        <h6 class="mt-2">LinkedIn</h6>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="<?php echo $socialMediaData['youtube'] ?>" class="youtube">
                        <i class="bx bxl-youtube"></i>
                        <h6 class="mt-2">YouTube</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>