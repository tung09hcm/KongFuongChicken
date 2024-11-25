<?php
namespace Models;

use PDO;

class AdminPermissionModel extends BaseModel {
    public function setPermissions($admin_id, $permissions) {
        $stmt = $this->db->prepare("INSERT INTO ADMIN_PERMISSION (admin_id, can_manage_user, can_manage_review, can_manage_order, can_manage_product, can_manage_discount, can_manage_promotion, can_add_admin, can_delete_admin, can_manage_store, can_manage_post) VALUES (:admin_id, :can_manage_user, :can_manage_review, :can_manage_order, :can_manage_product, :can_manage_discount, :can_manage_promotion, :can_add_admin, :can_delete_admin) ON DUPLICATE KEY UPDATE can_manage_user = :can_manage_user, can_manage_review = :can_manage_review, can_manage_order = :can_manage_order, can_manage_product = :can_manage_product, can_manage_discount = :can_manage_discount, can_manage_promotion = :can_manage_promotion, can_add_admin = :can_add_admin, can_delete_admin = :can_delete_admin,can_manage_store = :can_manage_store, can_manage_post = :can_manage_post ");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->bindParam(':can_manage_user', $permissions['can_manage_user'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_review', $permissions['can_manage_review'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_order', $permissions['can_manage_order'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_product', $permissions['can_manage_product'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_discount', $permissions['can_manage_discount'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_promotion', $permissions['can_manage_promotion'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_add_admin', $permissions['can_add_admin'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_delete_admin', $permissions['can_delete_admin'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_store', $permissions['can_manage_store'], PDO::PARAM_BOOL);
        $stmt->bindParam(':can_manage_post', $permissions['can_manage_post'], PDO::PARAM_BOOL);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function setPermissionsByName($admin_id, $permission_name, $value) {
        $allowed_permissions = [
            'can_manage_user',
            'can_manage_review',
            'can_manage_order',
            'can_manage_product',
            'can_manage_discount',
            'can_manage_promotion',
            'can_add_admin',
            'can_delete_admin',
            'can_manage_store',
            'can_manage_post'
        ];
    
        if (!in_array($permission_name, $allowed_permissions)) {
            throw new \Exception("Invalid permission name");
        }
    
        $sql = "UPDATE ADMIN_PERMISSION SET $permission_name = :value WHERE admin_id = :admin_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':value', $value, PDO::PARAM_BOOL);
        $stmt->bindParam(':admin_id', $admin_id);
        return $stmt->execute();
    }

    public function getPermissions($admin_id) {
        $stmt = $this->db->prepare("SELECT * FROM ADMIN_PERMISSION WHERE admin_id = :admin_id");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getPermissionsByName($admin_id, $permission_name) {
        $allowed_permissions = [
            'can_manage_user',
            'can_manage_review',
            'can_manage_order',
            'can_manage_product',
            'can_manage_discount',
            'can_manage_promotion',
            'can_add_admin',
            'can_delete_admin',
            'can_manage_store',
            'can_manage_post'
        ];
    
        if (!in_array($permission_name, $allowed_permissions)) {
            throw new \Exception("Invalid permission name");
        }
    
        $stmt = $this->db->prepare("SELECT $permission_name FROM ADMIN_PERMISSION WHERE admin_id = :admin_id");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
