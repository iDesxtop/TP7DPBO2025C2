<h3>Publisher List</h3>

<a href="?page=add_publisher" class="btn">Add Publisher</a>

<!-- Form Pencarian -->
<form method="GET" class="search-form">
    <input type="hidden" name="page" value="publisher">
    <input type="text" name="search" placeholder="Search by name or region" 
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button type="submit">Search</button>
    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="?page=publisher">Clear</a>
    <?php endif; ?>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Publisher Name</th>
        <th>Tahun Berdiri</th>
        <th>Negara Asal</th>
        <th>Email Kontak</th>
        <th>Action</th>
    </tr>
    <?php 
    // Kondisikan pencarian atau tampilkan semua data
    $publisher = isset($_GET['search']) && !empty($_GET['search']) 
            ? $publisher->searchPublisher($_GET['search']) 
            : $publisher->getAllPublisher();
    
    if(count($publisher) > 0):
        foreach ($publisher as $p): 
    ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nama_publisher'] ?></td>
        <td><?= $p['tahun_berdiri'] ?></td>
        <td><?= $p['negara_asal'] ?></td>
        <td><?= $p['email_kontak'] ?></td>
        <td>
            <!-- Tombol Update dengan metode GET -->
            <a href="?page=update_publisher&id=<?= $p['id'] ?>" class="btn">Update</a>            
            <!-- Form Delete tetap menggunakan POST -->
            <form method="POST" style="display: inline;">
                <input type="hidden" name="publisher_id" value="<?= $p['id'] ?>">
                <button type="submit" name="delete_publisher">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="6">No data found</td>
    </tr>
    <?php endif; ?>
</table>