<?php
namespace Models;
require_once  __DIR__ ."/BaseModel.php";


use PDO;


class OrderModel extends BaseModel {
    public function createOrder($user_id, $store_id, $discount_id, $address, $order_date, $total, $status = 'Pending') {
        $stmt = $this->db->prepare("INSERT INTO `ORDER` (user_id, store_id, discount_id, address, total, status, order_date) VALUES (:user_id, :store_id, :discount_id, :address, :total, :status, :order_date)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
        $stmt->bindParam(':discount_id', $discount_id, PDO::PARAM_INT);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function addProductToOrder($order_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO ORDER_PRODUCT (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateOrderStatus($order_id, $status) {
        $stmt = $this->db->prepare("UPDATE `ORDER` SET status = :status WHERE id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getOrdersByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM `ORDER` WHERE user_id = :user_id ORDER BY order_date DESC");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `ORDER` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getProductInOrder($order_id) {
        $stmt = $this->db->prepare("SELECT PRODUCT.*, ORDER_PRODUCT.quantity FROM PRODUCT JOIN ORDER_PRODUCT ON PRODUCT.id = ORDER_PRODUCT.product_id WHERE ORDER_PRODUCT.order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteOrder($order_id) {
        $stmt = $this->db->prepare("DELETE FROM `ORDER` WHERE id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllOrders() {
        $stmt = $this->db->prepare("
            SELECT 
                o.id AS order_id, 
                CONCAT(a.first_name, ' ', a.last_name) AS customer_name,
                ua.address AS customer_address, 
                o.total AS order_total,
                o.status
            FROM `ORDER` o
            LEFT JOIN `ACCOUNT` a ON o.user_id = a.id
            LEFT JOIN `USER_ADDRESS` ua ON o.address = ua.id
            JOIN `ADMIN_STORE` admin_store ON admin_store.store_id = o.store_id
            WHERE admin_store.admin_id = :admin_id -- Thay :admin_id bằng giá trị ID của admin
            ORDER BY o.order_date DESC;
            "
        );

        $stmt->bindParam(':admin_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllOrdersForUser() {
        $stmt = $this->db->prepare("
            SELECT 
                o.id AS order_id, 
                CONCAT(a.first_name, ' ', a.last_name) AS customer_name,
                ua.address AS customer_address, 
                o.total AS order_total,
                d.percentage,
                o.status
            FROM `ORDER` o
            LEFT JOIN `ACCOUNT` a ON o.user_id = a.id
            LEFT JOIN `USER_ADDRESS` ua ON o.address = ua.id
            LEFT JOIN `DISCOUNT` d ON d.id = o.discount_id
            WHERE o.user_id = :user_id
            ORDER BY o.order_date DESC;
            "
        );

        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function detail($order_id) {
        $stmt = $this->db->prepare("
            SELECT o.id AS order_id, 
                CONCAT(a.first_name, ' ', a.last_name) AS customer_name,
                ua.address AS customer_address,
                o.total,
                o.order_date,
                p.id AS order_detail_id,
                od.quantity, 
                p.name AS product_name, 
                (p.price * od.quantity) AS item_total,
                d.percentage,
                d.code,
                o.status
            FROM `ORDER` o
            LEFT JOIN `ACCOUNT` a ON o.user_id = a.id
            LEFT JOIN `USER_ADDRESS` ua ON o.address = ua.id
            LEFT JOIN `ORDER_PRODUCT` od ON o.id = od.order_id
            LEFT JOIN `PRODUCT` p ON od.product_id = p.id
            LEFT JOIN `DISCOUNT` d ON o.discount_id = d.id
            WHERE o.id = :order_id
        ");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getSalesData($month) {
    //     $stmt = $this->db->prepare("
    //         SELECT 
    //             DATE(order_date) AS order_day,
    //             SUM(total) AS total_sales
    //         FROM `ORDER`
    //         WHERE MONTH(order_date) = :month AND YEAR(order_date) = YEAR(CURDATE()) AND status = 'Delivered'
    //         GROUP BY DATE(order_date)
    //         ORDER BY order_day ASC;
    //     ");
    //     $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    function getSalesData($month) {
        $year = date('Y');
        $start_date = "$year-$month-01";
        $end_date = date('Y-m-t', strtotime($start_date)); // Lấy ngày cuối tháng

        $query = "
            WITH all_dates AS (
                SELECT 
                    DATE_FORMAT(DATE_ADD(:month_start_date, INTERVAL n DAY), '%Y-%m-%d') AS order_date
                FROM (
                    SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL 
                    SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL 
                    SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL 
                    SELECT 15 UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL 
                    SELECT 20 UNION ALL SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24 UNION ALL 
                    SELECT 25 UNION ALL SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29 UNION ALL 
                    SELECT 30 UNION ALL SELECT 31
                ) AS numbers
                WHERE DATE_ADD(:month_start_date, INTERVAL n DAY) <= :month_end_date
            )
            SELECT 
                ad.order_date,
                COALESCE(SUM(o.total), 0) AS total_sales
            FROM all_dates ad
            LEFT JOIN `ORDER` o
                ON DATE(o.order_date) = ad.order_date AND o.status = 'Delivered'
            GROUP BY ad.order_date
            ORDER BY ad.order_date ASC;
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':month_start_date' => $start_date,
            ':month_end_date' => $end_date
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
