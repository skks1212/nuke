<div id="home" style="background:url('med/bg_5.svg');background-size:cover;background-position:center;background-attachment:fixed;" class="h-[calc(100vh+200px)] pb-[200px] flex items-center gap-20 justify-between px-[calc(50vw-600px)]">
    <div class="text-[#00E0C6] text-7xl font-bold">
        Shoes just
        got an upgrade
    </div>
    <img src="med/shoes.png" class="shoe w-[50%]" alt="">
</div>

<style>
    .shoe {
        animation: fly 10s infinite;
    }

    @keyframes fly {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(30px);
        }

        100% {
            transform: translateY(0px);
        }
    }
</style>