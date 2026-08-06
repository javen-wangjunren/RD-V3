<style>
    .vr-slicker .arrow-btn{
        display: inline-block; width: 40px; height: 40px; line-height: 40px; text-align: center; background-color: #fff;
        color: #000; border-radius: 50%; cursor: pointer; position: absolute;  top: 50%; transform: translateY(-50%);  z-index: 1;
        font-size: 20px; transition: all .34s;
    }
    .vr-slicker .arrow-left {
        left: 20px;
    }
    .vr-slicker .arrow-right {
        right: 20px;
    }
    @media (min-width: 1140px) {
        .pnlm-container  {
            width: 100% !important;
            height: 540px !important;
        }
    }
</style>

<div class="vr-slicker">
    <div class="item">
        <?php echo do_shortcode('[wpvr id="703"]')?>
    </div>
    <div class="item">
        <?php echo do_shortcode('[wpvr id="711"]')?>
    </div>
</div>