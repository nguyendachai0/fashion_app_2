<h1>Edit User</h1>
<div class="container-fluid">

    <form action="<?= BASE_URL ?>admin/user/update" enctype="multipart/form-data" method="POST" class="mb-2">

        <input value="<?= $user['id'] ?>" type="hidden" name="id" ?>
        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="<?= $user['name'] ?>" type="text" id="name" name="name" class="form-control" required>
        </div>

        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input value="<?= $user['email'] ?>" type="text" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-select" required>

                <option>____Choose role_____</option>
                <?php foreach ($user_roles as $key => $value) : ?>
                    <option value="<?= $key ?>" <?= ($user['role_as'] == $key) ? 'selected' : ''; ?>><?= $value ?></option>
                <?php endforeach; ?>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>




        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <!-- Category Select Field -->


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</div>