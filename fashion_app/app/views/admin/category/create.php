<h1>Add Category</h1>
<div class="container-fluid">

    <form action="store" enctype="multipart/form-data" method="POST" class="mb-2">


        <!-- Name Input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="status" id="exampleCheckbox" class="form-check-input">
                <label for="exampleCheckbox" class="form-check-label">Check me</label>
            </div>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</div>