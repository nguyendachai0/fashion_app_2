<h1>Edit Product</h1>
<div class="container-fluid">

    <form action="<?= BASE_URL ?>admin/product/update" enctype="multipart/form-data" method="POST" class="mb-2">

        <input value="<?= $product['id'] ?>" type="hidden" name="id" ?>
        <!-- Name Input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?= $product['title'] ?>" type=" text" id="title" name="title" class="form-control" required>
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" id="description" name="description" class="form-control" required><?= $product['description'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input <?= ($product['status'] == 1) ? 'checked' : '' ?> type="checkbox" name="status" id="exampleCheckbox" class="form-check-input">
                <label for="exampleCheckbox" class="form-check-label">Check me</label>
            </div>
        </div>



        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <!-- Replace the values and labels with your actual category data -->
                <option>____Choose category_____</option>
                <?php foreach ($allCategoryTitle as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?= ($product['category_id'] == $category['id']) ? 'selected' : '' ?>><?= $category['title'] ?></option>
                <?php endforeach; ?>
                <!-- Add more options as needed -->
            </select>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</div>