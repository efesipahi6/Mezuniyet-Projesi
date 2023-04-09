<?php 
include 'partials/header.php';
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Paylaşım Yap</h2>
        <div class="alert__message error">
            <p>HATA MESAJI</p>
        </div>
        <form class="form__selection" enctype="multipart/form-data">
            <input type="text" placeholder="Başlık">
            <select>
                <option value="1">Sanat</option>
                <option value="1">Vahşi Yaşam</option>
                <option value="1">Seyahat</option>
                <option value="1">Bilim & Teknoloji</option>
                <option value="1">Yemek</option>
                <option value="1">Müzik</option>
            </select>
            <div class="form__control inline">
                <input type="checkbox" id="is_featured" checked>
                <label for="is_featured">Önerilen</label>
            </div>
            <div class="form__control inline">
                <label for="thumbnail">Küçük Resim Ekle</label>
                <input type="file" id="thumbnail">
            </div>
            <textarea rows="10" placeholder="Metin"></textarea>
            <button type="submit" class="btn kayit-btn">Paylaş</button>
        </form>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>