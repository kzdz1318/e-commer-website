<?php include 'inc/header.php'; ?>

<?php
// Fetch all categories from the database
$query = "SELECT `catId`, `catName` FROM `tbl_category`";
$getCat = $db->select($query);
?>

<style>
    .category-container {
        width: 80%;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center;
    }
    .category-container h2 {
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ddd;
        font-size: 24px;
        color: #333;
    }
    .category-list {
        list-style: none;
        padding: 0;
    }
    .category-list li {
        margin: 10px 0;
    }
    .category-list a {
        display: block;
        padding: 12px;
        font-size: 18px;
        color: #fff;
        background: #007bff;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }
    .category-list a:hover {
        background: #0056b3;
    }
</style>

<div class="main">
    <div class="content">
        <div class="category-container">
            <h2>All Categories</h2>
            <ul class="category-list">
                <?php 
                if ($getCat) {
                    while ($result = $getCat->fetch_assoc()) { 
                ?>
                <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"> <?php echo $result['catName']; ?> </a></li>
                <?php 
                    }
                } else {
                    echo "<li>No categories available.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>