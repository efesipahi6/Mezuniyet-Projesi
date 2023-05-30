<?php
include 'partials/header.php';

// bir hata olursa form verilerini geri alma
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;

// session datayı silme
unset($_SESSION['add-user-data']);
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Kullanıcı Ekle</h2>
        <?php if (isset($_SESSION['add-user'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>

        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="İsim">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Soyisim">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Kullanıcı Adı">
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-Posta">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Şifre oluştur">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Şifreyi onayla">
            <select name="userrole">
                <option value="0">Kullanıcı</option>
                <option value="1">Yönetici</option>
            </select>
            <div class="form__control">
                <label for="avatar">Kullanıcı Fotoğrafı</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Kullanıcıyı Ekle</button>
        </form>
    </div>
</section>



<?php
include '../partials/footer.php';
?>