<?php
include(__DIR__ . '../../PHPScripts/session_manager.php');

$is_logged_in = isset($_SESSION['username']);
$user = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in && $_SESSION['username'] !== 'admin') {
    header("Location: " . __DIR__ . "../../Login.php?status=noaccess");
    exit();
}


$servername = "server330"; # make the database and make a better way to hide this.
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";
$dbname = "webcsosl_orders";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_status = 'Completed';
$stmt = $conn->prepare("SELECT order_id, customer_name, customer_email, order_date, total_amount, order_status FROM orders WHERE order_status != ?");
$stmt->bind_param("s", $order_status);
$stmt->execute();

$result = $stmt->get_result();

$active_orders = [];

while ($row = $result->fetch_assoc()) {
    $active_orders[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panal For Staff">
    <title>Control Panal - WebCrafted Pro</title>
    <link rel="icon" href="../../images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="../../CSS/Footer.css">
    <link rel="stylesheet" href="../../CSS/Nav.css">
    <link rel="stylesheet" href="../../CSS/all.css">
    <link rel="stylesheet" href="../../CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="../../JavaScript/AnimationWait.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
    <script src="JavaScript/Update.js"></script>
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="../../Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="../../Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="../../index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="../../Websites.php">Websites</a></li>
                <li id="contact"><a href="../../ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <li><a href="../../Account.php"><img src="../../images/icons/Account.webp" alt="Account"
                            style="margin-top: -8px;"></a></li>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="../../images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont" style="margin: 3vh 28vw 0;">
            <?php
            echo "<h3>Welcome to the Control Panal, $user</h3>";
            ?>
            <div class="orders">
                <h4>Active Orders</h4>
                <div class="active">
                    <?php if (!empty($active_orders)): ?>
                        <form id="order-form" method="POST" action="update_orders.php">
                            <table>
                                <tr class="tr1">
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Order Date</th>
                                    <th>Total Amount</th>
                                    <th>Order Status</th>
                                </tr>
                                <?php foreach ($active_orders as $order): ?>
                                    <tr class="tr2">
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td contenteditable="true" class="editable" data-name="customer_name"
                                            data-order-id="<?php echo $order['order_id']; ?>">
                                            <?php echo $order['customer_name']; ?>
                                        </td>
                                        <td contenteditable="true" class="editable" data-name="customer_email"
                                            data-order-id="<?php echo $order['order_id']; ?>">
                                            <?php echo $order['customer_email']; ?>
                                        </td>
                                        <td><?php echo $order['order_date']; ?></td>
                                        <td><?php echo $order['total_amount']; ?></td>
                                        <td contenteditable="true" class="editable" data-name="order_status"
                                            data-order-id="<?php echo $order['order_id']; ?>">
                                            <?php echo $order['order_status']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </form>
                    <?php else: ?>
                        <p>No Active Orders</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>