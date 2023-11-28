    <h1>Product List</h1>
    <a class="btn btn-secondary" href="./product/create">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row"><?php echo $product['id']; ?></th>
                    <td><?php echo $product['title']; ?></td>
                    <td><?php echo $product['category_id']; ?></td>
                    <td><?php echo $product['status']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><img class="rounded-circle img-fluid" src="../uploads/product/thumbnails/thumb_<?= $product['image']; ?>"></td>
                    <td>
                        <!-- Example: Edit and Delete buttons -->
                        <a href="product/edit/<?= $product['id']; ?>" class=" btn btn-primary">Edit</a>
                        <form method="post" action="product/delete" ?>
                            <input type="hidden" name="id" value="<?= $product['id']; ?>">
                            <button class=" btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>