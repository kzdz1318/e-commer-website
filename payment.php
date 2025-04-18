<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if (!$login) {
    header("Location: login.php");
    exit();
}
?>

<style>
    .payment-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 500px;
        margin: 50px auto;
        padding: 40px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center;
    }
    
    .payment-container h2 {
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ddd;
        font-size: 24px;
        color: #333;
    }
    
    .payment-container a {
        display: block;
        width: 80%;
        max-width: 250px;
        margin: 10px 0;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        background: #ff5722;
        border-radius: 5px;
        transition: background 0.3s ease;
    }
    
    .payment-container a:hover {
        background: #e64a19;
    }
    
    .back a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 18px;
        color: #fff;
        background: #555;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }
    
    .back a:hover {
        background: #333;
    }
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment-container">
                <h2>Choose Payment Option</h2>
                <a href="paymentoffline.php">Offline Payment</a>
                <a href="paymentonline.php">Online Payment</a>
            </div>
            <div class="back">
                <a href="cart.php">Previous</a>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>