<?php echo View::forge('common/header', ['title' => 'Create Hotel']); ?>
<?php echo View::forge('common/navigation'); ?>
<link rel="stylesheet" href="<?= Uri::create('assets/css/hotel/create.css'); ?>">

<div class="wrapper">
    <?php echo View::forge('common/sidebar'); ?>
    
    <div class="main-content">
        <h1>Edit Hotel: <?= $hotel->hotel_name?></h1>

        <!-- Hotel Create Form -->
        <form action="<?= Uri::create('hotel/update/' . $hotel->id); ?>" method="POST">
            <div class="form-group">
                <label for="hotel_name">Hotel Name</label>
                <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter hotel name" required value="<?= $hotel->hotel_name ?? '' ?>">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter hotel address" required value="<?= $hotel->address ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required value="<?= $hotel->phone ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter hotel email" required value="<?= $hotel->email ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter a brief description of the hotel" required><?= $hotel->description ?? '' ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn create-btn">Save</button>
            </div>
        </form>
    </div>
</div>

<?php echo View::forge('common/footer'); ?>
