<?php
function getStatusButtonClass($status)
{
    switch ($status) {
        case 'Pending':
            return 'warning';
        case 'Processing':
            return 'info';
        case 'Shipped':
            return 'success';
            // Add other status cases and corresponding classes as needed
        default:
            return 'secondary';
    }
}

?>
<h1>Order List</h1>
<a class="btn btn-secondary" href="./order/create">Create</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <th scope="row" class="order-id"><?= $order['id']; ?></th>
                <td><?= $order['first_name'] ?> <?= $order['last_name'] ?></td>
                <td><?= $order['total_price']; ?></td>
                <td>



                    <select name="status" class="status" data-order_id="<?= $order['id'] ?>">
                        <option value="pending" <?= ($order['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                        <option value="processing" <?= ($order['status'] == 'processing') ? 'selected' : '' ?>>Processing</option>
                        <option value="completed" <?= ($order['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                    </select>

                </td>
                <td>
                    <a href="order/edit/<?= $order['id']; ?>" class="btn btn-primary">Edit</a>
                    <form method="post" action="order/delete">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('.status').on('change', function() {
            var orderId = $(this).data('order_id');

            var newStatus = $(this).val();

            $.ajax({
                url: "order/update/status",
                type: "POST",
                data: {
                    orderId: orderId,
                    newStatus: newStatus
                },

                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // You might want to update UI elements here
                },
                error: function() {
                    // Handle error
                    alert('Error updating status. Please try again.');
                }
            });
        });
    });
</script>