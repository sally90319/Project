<?php
require_once "./connect.php";
require_once "./utilities.php";

if (!isset($_GET["id"])) {
  echo "請循正常管道進入本頁";
  exit;
}

$id = $_GET["id"];
$sql = "UPDATE `products` SET `is_valid` = 0 WHERE `id` = ?;";
//使用者軟刪除的 SQL 語法是長這樣

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
} catch (PDOException $e) {
  echo "Error: {$e->getMessage()}<br>";
  alertGoTo("刪除商品失敗", "./index.php");
  exit;
}

alertGoTo("刪除商品成功", "./index.php");
?>