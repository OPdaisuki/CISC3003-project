<?php
session_start();
include_once '../PHP/conn.php';

// 获取当前登录租户的ID
$tenant_id_query = "SELECT tenant_id FROM tenant WHERE tn_name = '".$_SESSION['loggedUsername']."'";
$tenant_id_result = mysqli_query($conn, $tenant_id_query);
if ($tenant_id_row = mysqli_fetch_assoc($tenant_id_result)) {
    $tenant_id = $tenant_id_row['tenant_id'];
} else {
    echo '<h1>My Orders - Tenant</h1>';
    echo '<p>No tenant record found for the logged user.</p>';
    exit;
}

// 创建新的订单
$insert_sql = "INSERT INTO deal (landlord_id, tenant_id, admin_id, house_id, status_id, payment_status) VALUES (22220001, $tenant_id, 10100001, 11110001, 1, 1)";
$insert_result = mysqli_query($conn, $insert_sql);

if (!$insert_result) {
    echo '<p>Failed to create order.</p>';
    exit;
}

// 显示更新后的订单信息
$sql = "SELECT d.deal_id, d.house_id, ts.description AS status_description, ps.description AS payment_status, d.transaction_certificate
        FROM deal d
        JOIN Transaction_Status ts ON d.status_id = ts.status_id
        JOIN Payment_Status ps ON d.payment_status = ps.status_id
        WHERE d.tenant_id = $tenant_id";

$result = mysqli_query($conn, $sql);

echo '<h1>My Orders - Tenant</h1>';
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="order">';
        echo '<p>Deal ID: ' . $row['deal_id'] . '</p>';
        echo '<p>House ID: ' . $row['house_id'] . '</p>';
        echo '<p>Status: ' . $row['status_description'] . '</p>';
        echo '<p>Payment Status: ' . $row['payment_status'] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No orders found.</p>';
}
?>
