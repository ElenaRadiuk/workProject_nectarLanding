<?php
/**
Template Name: offer
 */
get_header();?>
<div class="offer-page">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
            <?php the_content();?>
    <?php endwhile;?>

</div>
    <script>
        jQuery(document).ready(function($) {
            $(".mainmenu,.btn-order, .btn-order-steps").on("click","a", function (event) {
                event.preventDefault();

                var id  = $(this).attr('href'),
                    top = $(id).offset().top;
                $('body,html').animate({scrollTop: top}, 1500);
            });

            // $('#btn-top-test').click(function () {
            //     var inputTest = $('#testtoorder').find('input');
            //     if (inputTest.attr('checked') == 'checked') {
            //         inputTest.removeAttr('checked', 'checked');
            //     }
            //     inputTest.attr('checked', 'checked');
            // });

            $('.btn-order a').click(function () {
                var attrBtn = $(this).parent().attr('data-item');
                var inputTest = $('#testtoorder').find('input[name^="checkbox"]');
                var inputTest2 = $('#sunflowerRawHoney4order').find('input[name^="checkbox"]');
                var inputTest3 = $('#sunflowerRawHoney25order').find('input[name^="checkbox"]');
                var inputTest4 = $('#sunflowerRawHoney290order').find('input[name^="checkbox"]');
                if (inputTest.attr('checked') == 'checked') {
                    inputTest.removeAttr('checked', 'checked');
                }
                switch (attrBtn){
                    case 'testtoorder':
                        inputTest.attr('checked', 'checked');
                        break;
                    case 'sunflowerRawHoney4order':
                        inputTest2.attr('checked', 'checked');
                        break;
                    case 'sunflowerRawHoney25order':
                        inputTest3.attr('checked', 'checked');
                        break;
                    case 'sunflowerRawHoney290order':
                        inputTest4.attr('checked', 'checked');
                        break;
                }
            });



            $('.less_honey').click(function () {
                var $input = $(this).parent().find('input.sum_honey');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.more_honey').click(function () {
                var $input = $(this).parent().find('input.sum_honey');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });

            $('.sumorder_honey input.sum_honey').on( "keydown", function(event) {
                if((event.which >=48 && event.which <=57)
                    || (event.which >=96 && event.which <=105)
                    || event.which==8
                    || (event.which >=37 && event.which <=40)
                    || event.which==46) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>


<?php get_footer('with-map'); // Подключаем футер ?>