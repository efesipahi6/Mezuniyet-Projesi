<?php
include 'partials/header.php';

// yanlış olursa verileri geri al
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Kategori Ekle</h2>
        <?php if (isset($_SESSION['add-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']) ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
            <input type="text" value="<?= $title ?>" name="title" placeholder="Kategori Başlığı">
            <textarea rows="4" value="<?= $description ?>" name="description" placeholder="Açıklama"></textarea>
            <button type="submit" name="submit" class="btn">Kategori Ekle</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>