<h1>User List</h1>
<a class="btn btn-secondary" href="./user/create">Create</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

            <th scope="col">Role</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?php echo $user['id']; ?></th>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>

                <td><?php echo $user_roles[$user['role_as']]; ?></td>
                <td><img class="rounded-circle img-fluid" src="../uploads/user/thumbnails/thumb_<?= $user['image']; ?>"></td>
                <td>
                    <!-- Example: Edit and Delete buttons -->
                    <a href="user/edit/<?= $user['id']; ?>" class="btn btn-primary">Edit</a>
                    <form method="post" action="user/delete" ?>
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <button class=" btn btn-danger">Deleted</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>