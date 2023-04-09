<?php 
include 'partials/header.php';
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Kategori Ekle</h2>
        <div class="alert__message error">
            <p>HATA MESAJI</p>
        </div>
        <form class="form__selection" action="">
            <input type="text" placeholder="Başlık">
            <textarea rows="4" placeholder="Açıklama"></textarea>
            <button type="submit" class="btn kayit-btn">Kategori Ekle</button>
        </form>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>