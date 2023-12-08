<main>
    <div class="main-title">
        <h3>DASHBOARD</h3>
    </div>
    <div class="main-cards">
        <div class="card">
            <div class="card-inner">
                <h3>PRODUCTS</h3>
            </div>
            <h1><?= $totalProducts ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>CATEGORIES</h3>
            </div>
            <h1><?= $totalCategories ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>CUSTOMERS</h3>
            </div>
            <h1><?= $totalCustomers ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Orders</h3>
            </div>
            <h1><?= $totalOrders ?></h1>
        </div>
    </div>
    <div class="main-chart">
        <div class="list-chart">
            <h1>Revenue in twelve months</h1>
            <div class="simple-bar-chart">

                <?php foreach ($revenueMonth as $rev) : ?>

                    <div class="item" style="--clr: #069CDB; --val: <?= number_format(intval($rev['monthly_revenue']) / (int) $totalRevenue * 100, 1) ?> ">
                        <div class="label"><?= $rev['month'] ?></div>
                        <div class="value">
                            <?= number_format(intval($rev['monthly_revenue']) / (int) $totalRevenue * 100, 1) ?> %

                        </div>
                    </div>
                <?php endforeach; ?>


            </div>

        </div>
        <div class="list-chart">
            <h1>Top 3 selling products</h1>
            <div class="simple-bar-chart">
                <?php foreach ($top3SoldProducts as $product) : ?>
                    <div class="item" style="--clr: #5EB344; --val: <?= ($product['total_sold']) / (int) $totalItemsOrdered * 100 ?>">
                        <div class="label"><?= $product['title'] ?></div>
                        <div class=" value"><?= number_format(($product['total_sold']) / (int) $totalItemsOrdered * 100, 2) ?>% </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
    <div class="container-chart">
        <div class="container-lists">
            <div class="container-list">
                <div class="pie" style="--p:<?= $incomeTarget ?>"> <?= $incomeTarget ?>%</div>
                <p>Income Targetv</p>
            </div>
            <div class="container-list">
                <div class="pie" style="--p:<?= $spendingsTarget ?>;--c:darkblue;--b:10px"><?= $spendingsTarget ?> %</div>
                <p>Expenses Target</p>
            </div>
            <div class="container-list">
                <div class="pie no-round" style="--p:<?= $expensesTarget ?>;--c:purple;--b:15px"> <?= $expensesTarget ?>%</div>
                <p>Spendings Target</p>
            </div>
            <div class="container-list">
                <div class="pie animate no-round" style="--p:<?= $totalsTarget ?>;--c:orange;"> <?= $totalsTarget ?>%</div>
                <p>Totals Target</p>
            </div>
        </div>
    </div>

</main>