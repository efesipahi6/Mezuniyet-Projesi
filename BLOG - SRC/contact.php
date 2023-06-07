<?php 
include 'partials/header.php';
?>


    <!-- İLETİŞİM BAŞLANGIÇ -->
    <section class="contact">
      <div class="contact-top">
          <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12236.707646733103!2d32.8288637!3d39.9374323!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a60865db145c0a6!2zQW5rYXJhIMOcbml2ZXJzaXRlc2kgR8O8bmXFnyBNZXlkYW7EsQ!5e0!3m2!1str!2str!4v1667318828293!5m2!1str!2str"
             width="100%" height="500"  style="border:0; padding-left: 50px; padding-right: 50px; margin-top: 50px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div>
      <div class="contact-bottom">
        <div class="container">
          <div class="contact-titles">
              <h2>Bizimle iletişime geç</h2>
              <p>Görüş, öneri ve şikayetlerinizi bize iletmekten korkmayın.</p>
          </div>
          <div class="contact-elements">
              <form action="#" class="contact-form">
                  <div class="">
                      <label>Adınız:<span>*</span></label>
                      <input type="text" name="name" placeholder="Adınız" >
                  </div>

                  <div class="">
                      <label>E-Mail Adresiniz:<span>*</span></label>
                      <input type="text" name="email" placeholder="E-Posta" >
                  </div>

                  <div class="">
                      <label>Konu:<span>*</span></label>
                      <input type="text" name="konu" placeholder="Konu" >
                  </div>

                  <div class="">
                      <label>Mesajınız:<span>*</span></label>
                      <textarea placeholder="Mesaj" name="message" type="text"></textarea>
                  </div>
                <div class="button-area">
                <button type="submit" class="btn btn-sm form-button">Mesajı Gönder</button>
                <span>Mesajınız gönderiliyor...</span>
                </div>
              </form>
          </div>
      </div>
      </div>
    </section>
    <!-- İLETİŞİM BİTİŞ -->


<!-- <section class="empty__page">
    <div class="con-wrapper">
        <header>İletişim Formu</header>
        <form action="#">
            <div class="dbl-field">
                <div class="field">
                    <input type="text" placeholder="Adınız">
                    <i class="fas fa-user"></i>
                </div>

                <div class="field">
                    <input type="text" placeholder="E-Posta">
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="dbl-field">
                <div class="field">
                    <input type="text" placeholder="Telefon Numaranız">
                    <i class="fas fa-phone-alt"></i>
                </div>

                <div class="field">
                    <input type="text" placeholder="Konu">
                    <i class="fas fa-globe"></i>
                </div>

            </div>
            <div class="message">
                <textarea placeholder="Mesajınızı yazın."></textarea>
                <i class="material-icons">message</i>
            </div>
            <div class="button-area">
                <button type="submit">Mesajı Gönder</button>
                <span>Mesajınız gönderiliyor...</span>
            </div>
        </form>
    </div>






        <h1>İletişim Sayfası</h1>
    </section>  -->







<?php 
include 'partials/footer.php';
?>
