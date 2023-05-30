<?php
include 'partials/header.php';

// veritabanındaki kategorileri alma
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// yanlış bir şey varsa form bilgilerini geri alma
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

// form bilgilerini silme
unset($_SESSION['add-post-data']);
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Gönderi Ekle</h2>
        <?php if (isset($_SESSION['add-post'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Başlık">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>
            <textarea rows="10" name="body" placeholder="Metin"><?= $body ?></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">Öne çıkan gönderi olarak ayarla</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Gönderi fotoğrafı ekle</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Gönderiyi paylaş</button>
        </form>
    </div>
</section>


<?php
include '../partials/footer.php';
?>