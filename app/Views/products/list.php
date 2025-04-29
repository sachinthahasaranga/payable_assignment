<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Products</h2>
        <a href="<?= base_url('products/create') ?>" class="btn btn-primary">Add Product</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="input-group mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search by Name or Category">
        <button id="searchButton" class="btn btn-primary">Search</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <tr id="noResults" style="display: none;">
                    <td colspan="5" class="text-center">No Products Found</td>
                </tr>

                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= esc($product['name']) ?></td>
                    <td><?= esc($product['price']) ?></td>
                    <td><?= esc($product['category']) ?></td>
                    <td><?= esc($product['description']) ?></td>
                    <td>
                        <a href="<?= base_url('products/edit/'.$product['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('products/delete/'.$product['id']) ?>" class="btn btn-danger btn-sm delete-btn">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('assets/js/script.js') ?>"></script>

</body>
</html>
