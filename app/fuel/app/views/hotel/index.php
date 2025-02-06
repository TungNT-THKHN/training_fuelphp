<?php echo View::forge('common/header', ['title' => 'Home page']); ?>
<?php echo View::forge('common/navigation'); ?>
<link rel="stylesheet" href="<?= Uri::create('assets/css/hotel/index.css'); ?>">

<div class="wrapper">
    <?php echo View::forge('common/sidebar'); ?>
    
    <div class="main-content">
        <h1>Hotels list</h1>
        <!-- Hotel Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($hotel->hotel_name); ?></td>
                        <td><?php echo htmlspecialchars($hotel->address); ?></td>
                        <td><?php echo htmlspecialchars($hotel->phone); ?></td>
                        <td><?php echo htmlspecialchars($hotel->email); ?></td>
                        <td>
                            <a href="<?= Uri::create('hotel/edit/' . $hotel->id); ?>" class="btn btn-edit">Edit</a>
                            <form action="<?= Uri::create('hotel/delete/' . $hotel->id); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this hotel?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="action-buttons">
            <a href="<?= Uri::create('hotel/create'); ?>" class="btn create-btn">Create</a>
        </div>
    </div>
</div>

<?php echo View::forge('common/footer'); ?>
