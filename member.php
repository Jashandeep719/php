<?php 
include 'templates/header.php'; 
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>
<h2>Welcome, Member!</h2>
<p>This page is accessible only to registered members.</p>
<?php include 'templates/footer.php'; ?>
