<div id="createAuctionModal" class="modal">
    <div class="modal-content">
        <form action="auction.php" method="post" autocomplete="">
            <?php
            if (count($errors) == 1) {
            ?>
                <div class="alert alert-danger text-center">
                    <?php
                    foreach ($errors as $showerror) {
                        echo $showerror;
                    }
                    ?>
                </div>
            <?php
            } elseif (count($errors) > 1) {
            ?>
                <div class="alert alert-danger">
                    <?php
                    foreach ($errors as $showerror) {
                    ?>
                        <li><?php echo $showerror; ?></li>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            <div class="modal-header">
                <h2>Create Auction Product</h2>
                <span class="close">&times;</span>
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <input class="form-control" type="text" name="productName" placeholder="Product Name" required value="<?php echo $productName ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="description" placeholder="Description" required value="<?php echo $description ?>">
            </div>
            <div class="form-group">
                <label>Starting Price</label>
                <input class="form-control" type="text" name="startingPrice" placeholder="Starting Price" required value="<?php echo $startingPrice ?>">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="productImageURL">
            </div>
            <div class="form-group">
                <label>End Time</label>
                <input class="form-control" type="datetime-local" name="closeTime">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="createProduct">Create Auction</button>
            </div>
        </form>
    </div>
</div>