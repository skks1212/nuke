<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="dashboard">home</a>
         <a href="products">products</a>
         <a href="orders">orders</a>
         <a href="users">users</a>
      </nav>

      <div>
         <a href="../logout.php" onclick="return confirm('logout from this website?');" class="delete-btn" style="margin:0px;padding:10px;">logout</a>
      </div>

   </section>

</header>