<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // kategoriyi veritabanından getirme
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location: ' . ROOT_URL . 'admin/manage-categories');
    die();
}
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Kategori Düzenle</h2>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Kategori Başlığı">
            <textarea rows="4" name="description" placeholder="Açıklama"><?= $category['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Güncelle</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>