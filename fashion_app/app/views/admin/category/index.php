<h1>Category List</h1>
<a class="btn btn-secondary" href="./category/create">Create</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <th scope="row"><?php echo $category['id']; ?></th>
                <td><?php echo $category['title']; ?></td>
                <td><?php echo $category['description']; ?></td>

                <td><img class="rounded-circle img-fluid" src="../uploads/category/thumbnails/thumb_<?= $category['image']; ?>"></td>
                <td>
                    <!-- Example: Edit and Delete buttons -->


                    <a href="category/edit/<?= $category['id']; ?>" class=" btn btn-primary">Edit</a>
                    <form method="post" action="category/delete" ?>
                        <input type="hidden" name="id" value="<?= $category['id']; ?>">
                        <button class=" btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>