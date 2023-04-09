<?php 
include 'partials/header.php';
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Kullanıcı Ekle</h2>
        <div class="alert__message error">
            <p>HATA MESAJI</p>
        </div>
        <form class="form__selection" enctype="multipart/form-data">
            <input type="text" placeholder="İsim">
            <input type="text" placeholder="Soyisim">
            <input type="text" placeholder="Kullanıcı Adı">
            <input type="email" placeholder="E-Mail Adresi">
            <input type="password" placeholder="Şifre Oluştur">
            <input type="password" placeholder="Şifreyi Tekrarla">
            <select>
                <option value="0">Yazar</option>
                <option value="1">Yönetici</option>
            </select>
            <div class="form__control">
                <label for="avatar">Profil Fotoğrafı</label>
                <input type="file" id="avatar">
            </div>
            <button type="submit" class="btn kayit-btn">Ekle</button>
        </form>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>
