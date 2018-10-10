<script type="text/javascript">
  $(document).ready(function(){
    $('.model__quick_view_product_info .btn-number').click(function(e){
      e.preventDefault();
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
          if(type == 'minus') {

              if(currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }

          } else if(type == 'plus') {

              if(currentVal < input.attr('max')) {
                  input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }

          }
      } else {
          input.val(0);
      }
    });
	
    $('.model__quick_view_product_info .input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
	
    $('.model__quick_view_product_info .input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".model__quick_view_product_info .btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".model__quick_view_product_info .btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
	
    $(".model__quick_view_product_info .input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
           // Allow: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) || 
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
    });
    
//    if($('.add-to-cart-bg').length>0 || $('.single-page-add-to-cart').length>0){
//      dynamicAddToCart();
//    }
  });
</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-md-5">
      <div class="model__quick_view_product_image">
        <?php if( !empty($single_product_details['_product_related_images_url']->product_image) && $single_product_details['_product_related_images_url']->product_image != '/images/upload.png'): ?>
          <img src="<?php echo e($single_product_details['_product_related_images_url']->product_image); ?>" alt="<?php echo e(basename($single_product_details['_product_related_images_url']->product_image)); ?>" class="img-responsive"/>
        <?php else: ?>
          <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="" class="img-responsive" />
        <?php endif; ?>

        <?php if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0): ?>
        <div class="product-gallery-image">
          <div id="gallery-image-slider-carousel" class="carousel slide" data-ride="carousel">
            <?php $numb =1; $flag =1; $is_last_tag_added = false;?>
            <div class="carousel-inner">
              <?php $__currentLoopData = $single_product_details['_product_related_images_url']->product_gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if($numb == 1): ?>
                      <?php if($flag == 1): ?>
                        <div class="item active">
                      <?php else: ?>
                        <div class="item">
                      <?php endif; ?>
                      <div class="col-xs-4 col-sm-4">
                        <div class="text-center">
                          <img src="<?php echo e($row->url); ?>"  alt="<?php echo e(basename( $row->url )); ?>" />
                        </div>
                      </div>

                      <?php $is_last_tag_added = false;?>
                    <?php elseif($numb == 3): ?>
                      <div class="col-xs-4 col-sm-4">
                        <div class="text-center">
                          <img src="<?php echo e($row->url); ?>"  alt="<?php echo e(basename( $row->url )); ?>" />
                        </div>
                      </div>
                      <?php $numb = 0; $is_last_tag_added = true;?>
                      </div>
                    <?php else: ?>
                      <div class="col-xs-4 col-sm-4">
                        <div class="text-center">
                          <img src="<?php echo e($row->url); ?>"  alt="<?php echo e(basename( $row->url )); ?>" />
                        </div>
                      </div>
                      <?php $is_last_tag_added = false;?>
                    <?php endif; ?>

                    <?php 
                     $numb++;
                     $flag++;
                    ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                  <?php if(!$is_last_tag_added): ?>
                     </div>
                  <?php endif; ?> 
            </div>
            <div class="slider-control-main text-center">
              <div class="prev-btn">
                <a href="#gallery-image-slider-carousel" class="control-carousel" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                </a>
              </div>

              <div class="next-btn">
                <a href="#gallery-image-slider-carousel" class="control-carousel" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>      

    <div class="col-xs-12 col-sm-7 col-md-7">
      <div class="model__quick_view_product_info">
        <h2 class="product-title"><?php echo e($single_product_details['post_title']); ?></h2>
        <div class="star-rating"><span style="width:<?php echo e($comments_rating_details['percentage']); ?>%"></span></div>

        <div class="model__quick_view_product_price">
          <?php if(get_product_type($single_product_details['id']) == 'simple_product'): ?>
          <?php if($single_product_details['_product_regular_price'] && $single_product_details['_product_regular_price'] >0 && $single_product_details['_product_sale_price'] && $single_product_details['_product_sale_price']>0 && $single_product_details['_product_regular_price'] > $single_product_details['_product_sale_price'] ): ?>
          <span class="offer-price"><?php echo price_html( $single_product_details['_product_regular_price'] ); ?></span>
          <?php endif; ?>
          <span class="solid-price"><?php echo price_html( $single_product_details['_product_price'] ); ?></span>

          <?php if($single_product_details['_product_regular_price'] && $single_product_details['_product_sale_price'] && $single_product_details['_product_regular_price'] > $single_product_details['_product_sale_price'] && $single_product_details['_product_sale_price_start_date'] && $single_product_details['_product_sale_price_end_date'] && $single_product_details['_product_sale_price_end_date'] >= date("Y-m-d")): ?>
          <p class="offer-message-label">&#10148; <?php echo e(trans('frontend.offer_msg')); ?>  <i><?php echo date("F j, Y", strtotime($single_product_details['_product_sale_price_start_date'])); ?> <?php echo e(trans('frontend.to')); ?> <?php echo date("F j, Y", strtotime($single_product_details['_product_sale_price_end_date'])); ?> </i></p>
          <?php endif; ?>

        <?php elseif(get_product_type($single_product_details['id']) == 'configurable_product' || get_product_type($single_product_details['id']) == 'customizable_product'): ?>
          <span class="solid-price"><?php echo get_product_variations_min_to_max_price_html($currency_symbol, $single_product_details['id']); ?> </span>
        <?php endif; ?>
        </div> 

        <div class="model__quick_view_product_stock">
          <?php if( get_product_type($single_product_details['id']) == 'simple_product' || (get_product_type($single_product_details['id']) == 'customizable_product' && count(get_product_variations($single_product_details['id'])) == 0)): ?>

            <?php if( $single_product_details['_product_manage_stock_availability'] == 'in_stock' || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['_product_manage_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['_product_manage_stock_availability'] == 'in_stock') ): ?>
              <p class="availability-status"><span><?php echo e(trans('frontend.single_product_availability_label')); ?>: </span> <span class="in-stock"><?php echo e(trans('frontend.single_product_availability_status_instock_label')); ?></span></p>
            <?php else: ?>
              <p class="availability-status"><span><?php echo e(trans('frontend.single_product_availability_label')); ?>: </span> <span class="in-stock"><?php echo e(trans('frontend.single_product_availability_status_outstock_label')); ?></span></p>
            <?php endif; ?>

            <?php if( ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['_product_manage_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['_product_manage_stock_availability'] == 'in_stock') ): ?>
              <p class="availability-status"><span><?php echo e(trans('frontend.single_product_available_stock_label')); ?>: </span> <span class="stock-amount"><?php echo e($single_product_details['_product_manage_stock_qty']); ?></span></p>
            <?php endif; ?>

            <?php if($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['_product_manage_stock_availability'] == 'in_stock'): ?>
              <p class="stock-notify-msg">&#10148; <?php echo e(trans('frontend.product_available_msg')); ?></p>
            <?php endif; ?>
          <?php endif; ?>
        </div> <hr>

        <?php if($single_product_details['post_content']): ?>
        <p class="product-description"><?php echo get_limit_string(string_decode($single_product_details['post_content']), 200); ?></p>
        <hr>
        <?php endif; ?>

        <?php if(get_product_type($single_product_details['id']) == 'configurable_product'): ?>
          <a href="<?php echo e(route('details-page', $single_product_details['post_slug'])); ?>" class="btn btn-xs select-options-bg"><i class="fa fa-hand-o-up"></i> <?php echo e(trans('frontend.select_options')); ?></a>
        <?php endif; ?>
        
        <?php if(get_product_type($single_product_details['id']) == 'customizable_product'): ?>
          <a href="<?php echo e(route('customize-page', $single_product_details['post_slug'])); ?>" class="btn btn-xs product-customize-bg"><i class="fa fa-gears"></i> <?php echo e(trans('frontend.customize')); ?></a>
        <?php endif; ?>

        <?php if(get_product_type($single_product_details['id']) == 'simple_product' && ($single_product_details['_product_manage_stock_availability'] == 'in_stock' || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['_product_manage_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['_product_manage_stock_availability'] == 'in_stock'))): ?>
<!--        <div class="product-add-to-cart-content add-to-cart-content">  
          <div class="product-add-to-cart-button-content">
            <ul>
              <li>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                      <span class="fa fa-minus"></span>
                    </button>
                  </span>
                    <input type="text" id="quantity" name="quant[1]" class="form-control input-number" value="1" min="1" max="10" style="width:55px;"/>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                      <span class="fa fa-plus"></span>
                    </button>
                  </span>
                </div>
              </li>  
              <li>
                <a href="" class="btn btn-default btn-md add-to-cart-bg" data-target="quick_view" data-id=""><i class="fa fa-shopping-cart"></i></a>
              </li>
              <li>
                <a href="" class="btn btn-default btn-md product-wishlist" data-id=""><i class="fa fa-heart"></i></a>
              </li>
            </ul>
          </div>  
        </div>-->
        <?php endif; ?>

        <div class="model__quick_view_product_meta">
          <?php if($single_product_details['_product_sku']): ?>  
            <p><label><?php echo e(trans('frontend.sku')); ?>:</label> <span><?php echo e($single_product_details['_product_sku']); ?></span></p>
          <?php endif; ?>

          <?php if($single_product_details['_product_enable_as_latest'] == 'yes'): ?>
            <p><label><?php echo e(trans('frontend.condition_label')); ?>:</label> <span><?php echo e(trans('frontend.new_label')); ?></span></p>
          <?php endif; ?>

          <?php if(count(get_product_brands_lists($single_product_details['id'])) > 0): ?>
            <p><label><?php echo e(trans('frontend.brand_label')); ?>:</label> <span><?php echo e(get_single_page_product_brands_lists( get_product_brands_lists($single_product_details['id']) )); ?></span></p>
          <?php endif; ?>

          <?php if(get_single_page_product_categories_lists($single_product_details['id'])): ?>
            <p><label><?php echo e(trans('frontend.category_label')); ?>:</label> <span><?php echo e(get_single_page_product_categories_lists($single_product_details['id'])); ?></span></p>
          <?php endif; ?>

          <?php if(count(get_product_tags_lists($single_product_details['id']))>0): ?>
            <p><label><?php echo e(trans('frontend.tag_label')); ?>:</label> <span><?php echo e(get_single_page_product_tags_lists(get_product_tags_lists($single_product_details['id']))); ?></span></p>
          <?php endif; ?>
        </div>
      </div>
    </div>    
  </div>      
</div>