<?php 
include 'partials/header.php';
?>




<section class="form__section">
    <div class="container form__section-container">
        <h2>Kullanıcı Düzenle</h2>
        <form class="form__selection" enctype="multipart/form-data">
            <input type="text" placeholder="İsim">
            <input type="text" placeholder="Soyisim">
            <select>
                <option value="0">Yazar</option>
                <option value="1">Yönetici</option>
            </select>
            <button type="submit" class="btn kayit-btn">Değişikliği Uygula</button>
        </form>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>
