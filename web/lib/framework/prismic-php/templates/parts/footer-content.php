<?php use Prismic\Dom\RichText; ?>
<footer id="footer">
    <div class="lottie-scroll" data-entrance="lottie-anim" data-offset=".7" data-offset-mobile=".75" data-json-desktop="mewn-logo" data-json-mobile="mewn-logo" data-preserve="xMinYMid meet">
        <span class="sr-only">Mewn Logo</span>
    </div>
    <div class="bottom c-100">
        <span><?php echo $globalModules->left_footer_text[0]->text ?></span>
        <div class="right">
            <a href="<?php echo $globalModules->button_footer_url_1[0]->text ?>"><?php echo $globalModules->button_footer_text_1[0]->text ?></a>
            <a href="<?php echo $globalModules->button_footer_url_2[0]->text ?>"><?php echo $globalModules->button_footer_text_2[0]->text ?></a>
        </div>
    </div>
    <div class="back"></div>
</footer>
