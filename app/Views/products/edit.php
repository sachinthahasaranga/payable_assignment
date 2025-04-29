<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Product</h2>

    <form action="<?= base_url('products/update/' . $product['id']) ?>" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="<?= esc($product['name']) ?>" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" id="price" name="price" value="<?= esc($product['price']) ?>" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" id="category" name="category" value="<?= esc($product['category']) ?>" class="form-control" required>
            </div>

            <div class="col-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required><?= esc($product['description']) ?></textarea>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5">Update</button>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
