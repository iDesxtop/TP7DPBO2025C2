<!-- Form Pencarian -->
<form method="GET" class="search-form">
    <input type="hidden" name="page" value="genre">
    <input type="text" name="search" placeholder="Search by name or description" 
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button type="submit">Search</button>
    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="?page=genre">Clear</a>
    <?php endif; ?>
</form>

<h3>Genre List</h3>
<a href="?page=add_genre" class="btn">Add Genre</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Genre Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    <?php 
    // Kondisikan pencarian atau tampilkan semua data
    $games = isset($_GET['search']) && !empty($_GET['search']) 
            ? $genre->searchGenre($_GET['search']) 
            : $genre->getAllGenre();
    
    if(count($games) > 0):
        foreach ($games as $p): 
    ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nama_genre'] ?></td>
        <td><?= $p['deskripsi'] ?></td>
        <td>
            <!-- Tombol Update dengan metode GET -->
            <a href="?page=update_genre&id=<?= $p['id'] ?>" class="btn">Update</a>            
            <!-- Form Delete tetap menggunakan POST -->
            <form method="POST" style="display: inline;">
                <input type="hidden" name="genre_id" value="<?= $p['id'] ?>">
                <button type="submit" name="delete_genre">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="4">No data found</td>
    </tr>
    <?php endif; ?>
</table>