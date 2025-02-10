<?php echo View::forge('common/header', ['title' => 'Create Hotel']); ?>
<?php echo View::forge('common/navigation'); ?>
<link rel="stylesheet" href="<?= Uri::create('assets/css/hotel/create.css'); ?>">

<div class="wrapper">
    <?php echo View::forge('common/sidebar'); ?>
    
    <div class="main-content">
        <h1>Create a New Hotel</h1>

        <?php if ($errors = Session::get_flash('error')): ?>
            <div class="error-messages">
                <?php foreach ($errors as $field => $message): ?>
                    <p><strong><?php echo ucfirst($field); ?>:</strong> <?php echo $message; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <!-- Hotel Create Form -->
        <form action="<?= Uri::create('hotel/store'); ?>" method="POST">
            <div class="form-group">
                <label for="hotel_name">Hotel Name</label>
                <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter hotel name" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter hotel address" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter hotel email" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="images[]" id="image" class="form-control" multiple>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter a brief description of the hotel" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn create-btn">Create Hotel</button>
            </div>
        </form>
    </div>
</div>

<?php echo View::forge('common/footer'); ?>
