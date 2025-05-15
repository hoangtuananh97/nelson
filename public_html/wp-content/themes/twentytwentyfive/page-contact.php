<?php
get_header('header.php');
?>
<main>
    <section class="banner_page relative"
             style="background-image: url(https://thenelson.vn/storage/banner-contact.png)">
        <img src="https://thenelson.vn/storage/banner-contact.png" alt="" class="hide-pc">
        <div class="banner_logo"><img src="https://thenelson.vn/assets/images/banner-logo.png" alt=""></div>
        <div class="banner_page_text font-600 text-white text-uppercase text-center">Liên hệ</div>
    </section>
    <section class="contact pd-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="font-600 font-size-32 text-uppercase text-2e text-uppercase text-center mgb-10"
                        data-aos="fade-down" data-aos-duration="1000" data-delay="1500">
                        SIGN UP FOR INFORMATION
                    </h1>
                    <div class="desc_title" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                        For more information, please leave your information. Our consulting team will contact you as
                        soon as possible.
                    </div>
                    <div class="form_contact mgt-60">
                        <form action="<?php echo home_url()?>/contact/send" method="POST">
<!--                            <input type="hidden" name="_token" value="8mBHXbokg0jTqSp7e6pfLmfCKnymO7NDZmUQJb8f">-->
                            <div class="row">

                                <input type="hidden" name="subject" value="Liên hệ từ khách hàng">

                                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <input type="text" placeholder="Họ và tên đệm" required name="first_name"
                                           value="" class="frm_item">
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <input type="text" placeholder="Tên" required name="last_name"
                                           value="" class="frm_item">
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <input type="email" placeholder="email" name="email" required
                                           value="" class="frm_item">
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <input type="number" placeholder="Số điện thoại" required name="phone"
                                           value="" min="0" class="frm_item">
                                </div>
                                <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <textarea placeholder="Địa chỉ" name="address"
                                              class="frm_item"></textarea>
                                </div>
                                <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                                    <textarea placeholder="Nội dung" name="content"
                                              class="frm_item"></textarea>
                                </div>
                                <div class="col-md-12 mgt-30" data-aos="fade-up" data-aos-duration="1000"
                                     data-delay="1500">
                                    <div class="flex-center-center">
                                        <button type="submit" class="link">Gửi <i
                                                class="fal fa-long-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact_info mgt-60" data-aos="fade-up" data-aos-duration="1000" data-delay="1500">
                <div class="contact_info_flex">
                    <div class="ct_item flex-center">
                        <span><img src="https://thenelson.vn/assets/images/icon-phone.png" alt=""> </span>
                        <div>
                            <p class="font-size-14 font-500 text-uppercase">HOTLINE</p>
                            <a href="tel:0902278118" title=""
                               class="font-size-22 font-500">
                                0902278118
                            </a>
                        </div>
                    </div>
                    <div class="ct_item flex-center">
                        <span><img src="https://thenelson.vn/assets/images/icon-main.png" alt=""> </span>
                        <div>
                            <p class="font-size-14 font-500 text-uppercase">EMAIL</p>
                            <a href="mailto:thenelson@indochinacapital.com" title=""
                               class="font-size-22 font-500">
                                thenelson@indochinacapital.com
                            </a>
                        </div>
                    </div>
                    <div class="ct_item flex-center">
                        <span><img src="https://thenelson.vn/assets/images/icon-map.png" alt=""> </span>
                        <div>
                            <p class="font-size-14 font-500 text-uppercase">Địa chỉ</p>
                            <a href="#" title="" class="font-size-22 font-500">
                                Số 9, Ngõ 29, Láng Hạ, Ba Đình, Hà Nội
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.492154063938!2d105.8101080758721!3d21.012984888318947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab00293ea42f%3A0x9655ea73d2ac6d8d!2sThe%20Nelson%20Private%20Residences!5e0!3m2!1svi!2s!4v1732100007451!5m2!1svi!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</main>

<?php
get_footer('footer.php');
?>
