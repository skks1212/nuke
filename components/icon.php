<style>
    .icons-container::before {
        background: url('med/steps-2.svg');
        background-size: cover;
        background-position: bottom;
        position: absolute;
        content: "";
        height: 200px;
        top: -200px;
        left: 0px;
        right: 0px;
    }
</style>
<section class="icons-container relative bg-[#016170] text-center px-[calc(50vw-600px)] pb-[100px]">

    <div class="text-white text-4xl font-bold">
        Keeping you happy
    </div>
    <br>
    <br>
    <div class="flex items-center flex-wrap justify-center gap-6">
        <div class="icon">
            <i class="fa-solid fa-truck-bolt"></i>
            <div class="content">
                <h3>Free Shipping</h3>
                <p>Free shipping accross all countries</p>
            </div>
        </div>
        <div class="icon">
            <i class="fa-solid fa-face-tongue-money"></i>
            <div class="content">
                <h3>100% Money Back</h3>
                <p>Returning under 7 days</p>
            </div>
        </div>
        <div class="icon">
            <i class="fa-solid fa-shield-check"></i>
            <div class="content">
                <h3>Payment Secure</h3>
                <p>100% secure payment</p>
            </div>
        </div>
        <div class="icon">
            <i class="fa-solid fa-clock"></i>
            <div class="content">
                <h3>Support 24/7</h3>
                <p>Contact us anytime</p>
            </div>
        </div>
    </div>

</section>

<script>
    tc.c(".icon", "w-[40%] bg-slate-900 rounded-xl p-8 flex items-center justify-center gap-6 border-[5px] border-[#00E0C6]");
    tc.c(".icon i", "text-6xl text-[#00E0C6]");
    tc.c(".content", "text-left");
    tc.c(".content h3", "text-3xl font-semibold text-[#00E0C6]");
</script>