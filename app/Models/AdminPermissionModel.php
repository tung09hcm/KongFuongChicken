<?php
namespace App\Models;



use PDO;

class AdminPermissionModel extends BaseModel {
    public function setPermissions($admin_id, $permissions) {
        $stmt = $this->db->prepare("INSERT INTO Admin_Permission (admin_id, can_manage_user, can_manage_review, can_manage_order, can_manage_product, can_manage_discount, can_manage_promotion, can_add_admin, can_delete_admin) VALUES (:admin_id, :can_manage_user, :can_manage_review, :can_manage_order, :can_manage_product, :can_manage_discount, :can_manage_promotion, :can_add_admin, :can_delete_admin) ON DUPLICATE KEY UPDATE can_manage_user = :can_manage_user, can_manage_review = :can_manage_review, can_manage_order = :can_manage_order, can_manage_product = :can_manage_product, can_manage_discount = :can_manage_discount, can_manage_promotion = :can_manage_promotion, can_add_admin = :can_add_admin, can_delete_admin = :can_delete_admin");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->bindParam(':can_manage_user', $permissions['can_manage_user'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_review', $permissions['can_manage_review'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_order', $permissions['can_manage_order'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_product', $permissions['can_manage_product'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_discount', $permissions['can_manage_discount'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_promotion', $permissions['can_manage_promotion'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_add_admin', $permissions['can_add_admin'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_delete_admin', $permissions['can_delete_admin'], PDO::PARAM_BOOL);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getPermissions($admin_id) {
        $stmt = $this->db->prepare("SELECT * FROM Admin_Permission WHERE admin_id = :admin_id");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
