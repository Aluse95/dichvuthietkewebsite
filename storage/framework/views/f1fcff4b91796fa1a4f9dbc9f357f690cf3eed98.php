<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div id="price-table-web" class="">
    <div class="text-center">
      <h2><?php echo e($title); ?></h2>
      <div class="service-price">
          <table class="table table-striped">
              <thead>
              <tr>
                  <th scope="col">

                  </th>
                  <th scope="col">
                      <p>Gói Basic</p>
                      <p>6.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói Advance</p>
                      <p>9.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói PRO</p>
                      <p>15.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói EXTRA</p>
                      <a href="/"><p>Liên hệ</p></a>
                  </th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>Tặng tên miên quôc te (.com hoặc .net)</td>
                  <td class="border"></td>
                  <td class="border"></td>
                  <td class="border"></td>
                  <td class="border"></td>
              </tr>
              <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
              </tr>
              <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
              </tr>

              </tbody>
          </table>
      </div>
    </div>
      <div class="">
          <h2 class="mt-5"><?php echo $brief; ?></h2>
          <div class="price-table-img">

          </div>
      </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_website/styles/website_price.blade.php ENDPATH**/ ?>