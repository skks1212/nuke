<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>

<body class="bg-slate-900 text-white">
    <?php include "components/header.php"; ?>
    <a href="#home" id="top-btn" class="fixed right-20 bottom-20 bg-[#00E0C6] flex w-[50px] h-[50px] justify-center items-center z-10 rounded-full invisible opacity-0 transition">
        <i class="far fa-chevron-up"></i>
    </a>
    <?php include "components/landing.php"; ?>
    <?php include "components/icon.php"; ?>
    <?php include "components/product.php"; ?>
    <?php include "components/contact.php"; ?>
    <?php include "components/footer.php"; ?>
    <script>
        $(document).on("scroll", function() {
            if ($(this).scrollTop() > 200) {
                $("#top-btn").css("visibility", "visible").css("opacity", "1");
            } else {
                $("#top-btn").removeAttr("style");
            }
        });
    </script>
</body>

</html>