<h1>Edit Category</h1>
<div class="container-fluid">

    <form action="<?= BASE_URL ?>admin/category/update" enctype="multipart/form-data" method="POST" class="mb-2">

        <input value="<?= $category['id'] ?>" type="hidden" name="id" ?>
        <!-- Name Input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?= $category['title'] ?>" type=" text" id="title" name="title" class="form-control" required>
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" id="description" name="description" class="form-control" required><?= $category['description'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input <?= ($category['status'] == 1) ? 'checked' : '' ?> type="checkbox" name="status" id="exampleCheckbox" class="form-check-input">
                <label for="exampleCheckbox" class="form-check-label">Check me</label>
            </div>
        </div>





        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</div>