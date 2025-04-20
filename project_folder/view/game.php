<h3>Game List</h3>
<div class="actions-bar">
    <a href="?page=add_game" class="btn">Add Game</a>
    
    <!-- Form Pencarian -->
    <form method="GET" class="search-form">
        <input type="hidden" name="page" value="game">
        <input type="text" name="search" placeholder="Search by name or description" 
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Search</button>
        <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
            <a href="?page=game">Clear</a>
        <?php endif; ?>
    </form>
</div>

<table border="1">
    <!-- Header table tetap sama -->
    <tr>
        <th>ID</th>
        <th>Game Name</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>Price</th>
        <th>Release Year</th>
        <th>Platform</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    
    <?php 
    // Kondisikan pencarian atau tampilkan semua data
    $games = isset($_GET['search']) && !empty($_GET['search']) 
            ? $game->searchGames($_GET['search']) 
            : $game->getAllGame();
    
    if(count($games) > 0):
        foreach ($games as $p): 
    ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nama_game'] ?></td>
        <td><?= $p['nama_genre'] === null ? 'Not Available' : $p['nama_genre'] ?></td>
        <td><?= $p['nama_publisher'] === null ? 'Not Available' : $p['nama_publisher'] ?></td>
        <td><?= $p['harga'] ?></td>
        <td><?= $p['tahun_rilis'] ?></td>
        <td><?= $p['platform'] ?></td>
        <td><?= $p['deskripsi_game'] ?></td>
        <td>
            <a href="?page=update_game&id=<?= $p['id'] ?>" class="btn">Update</a>            
            <form method="POST" style="display: inline;">
                <input type="hidden" name="game_id" value="<?= $p['id'] ?>">
                <button type="submit" name="delete_game">Delete</button>
            </form>
        </td>
    </tr>
    <?php 
        endforeach; 
    else: 
    ?>
    <tr>
        <td colspan="9" style="text-align: center;">No games found.</td>
    </tr>
    <?php endif; ?>
</table>