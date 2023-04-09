<?php 
include 'partials/header.php';
?>



<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Paylaşım Yap</h5>
                    </a>
                </li>

                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Paylaşımları Yönet</h5>
                    </a>
                </li>

                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Kullanıcı Ekle</h5>
                    </a>
                </li>

                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Kategori Ekle</h5>
                    </a>
                </li>

                <li>
                    <a href="manage-users.php"  class="active"><i class="uil uil-users-alt"></i>
                        <h5>Kullanıcıları Yönet</h5>
                    </a>
                </li>

                <li>
                    <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                        <h5>Kategorileri Yönet</h5>
                    </a>
                </li>
            </ul>
        </aside>



        <main>
            <h2>Kullanıcıları Yönet</h2>
            <table>
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Kullanıcı Adı</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                        <th>Yönetici</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>örnek kullanıcı adı</td>
                        <td>Ünvan</td>
                        <td><a href="edit-user.php" class="btn sm">Düzenle</a></td>
                        <td><a href="delete-user.php" class="btn sm danger metinbeyaz">Sil</a></td>
                        <td>Yes</td>
                    </tr>

                    <tr>
                        <td>örnek kullanıcı adı 2</td>
                        <td>Ünvan 2</td>
                        <td><a href="edit-user.php" class="btn sm">Düzenle</a></td>
                        <td><a href="delete-user.php" class="btn sm danger metinbeyaz">Sil</a></td>
                        <td>No</td>
                    </tr>

                    <tr>
                        <td>örnek kullanıcı adı 3</td>
                        <td>Ünvan 3</td>
                        <td><a href="edit-user.php" class="btn sm">Düzenle</a></td>
                        <td><a href="delete-user.php" class="btn sm danger metinbeyaz">Sil</a></td>
                        <td>Yes</td>
                    </tr>

                </tbody>
            </table>
        </main>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>
