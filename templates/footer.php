</div> <!-- closing .container -->

<footer>
  <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
    <div style="margin-bottom: 10px;">
      <a href="/admin/index.php" style="color: white;">Admin Panel</a>
    </div>
  <?php endif; ?>
  <p>&copy; <?php echo date("Y"); ?> Agricultural Marketplace. All rights reserved.</p>
</footer>

</body>
</html>